<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Sales;

use Illuminate\Http\Request;
use Webkul\RestApi\Http\Resources\V1\Admin\Sales\OrderTransactionResource;
use Webkul\Sales\Models\Invoice;
use Webkul\Sales\Models\Order;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderTransactionRepository;
use Webkul\Sales\Repositories\ShipmentRepository;

class TransactionController extends SalesController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected InvoiceRepository $invoiceRepository,
        protected ShipmentRepository $shipmentRepository,
        protected OrderTransactionRepository $orderTransactionRepository
    ) {}

    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return OrderTransactionRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return OrderTransactionResource::class;
    }

    /**
     * Save the transaction.
     */
    public function store(Request $request): \Illuminate\Http\Response
    {
        $request->validate([
            'invoice_id'     => 'required',
            'payment_method' => 'required',
            'amount'         => 'required|numeric|min:0.0001',
        ]);

        $invoice = $this->invoiceRepository->where('id', $request->invoice_id)->first();

        if (! $invoice) {
            return response([
                'message' => trans('rest-api::app.admin.sales.transactions.invoice-missing'),
            ], 400);
        }

        if ($invoice->state == 'paid') {
            return response([
                'message' => trans('rest-api::app.admin.sales.transactions.already-paid'),
            ], 400);
        }

        $transactionTotal = $this->getRepositoryInstance()->where('invoice_id', $invoice->id)->sum('amount');

        $transactionAmtFinal = $request->amount + $transactionTotal;

        if ($transactionAmtFinal > $invoice->base_grand_total) {
            return response([
                'message' => trans('rest-api::app.admin.sales.transactions.transaction-amount-exceeds'),
            ], 400);
        }

        if ($request->amount <= 0) {
            return response([
                'message' => trans('rest-api::app.admin.sales.transactions.transaction-amount-zero'),
            ], 400);
        }

        $order = $this->orderRepository->find($invoice->order_id);

        $transaction = $this->getRepositoryInstance()->create([
            'transaction_id' => bin2hex(random_bytes(20)),
            'type'           => $request->payment_method,
            'payment_method' => $request->payment_method,
            'invoice_id'     => $invoice->id,
            'order_id'       => $invoice->order_id,
            'amount'         => $request->amount,
            'status'         => 'paid',
            'data'           => json_encode([
                'paidAmount' => $request->amount,
            ]),
        ]);

        $transactionTotal = $this->getRepositoryInstance()->where('invoice_id', $invoice->id)->sum('amount');

        if ($transactionTotal >= $invoice->base_grand_total) {
            $shipments = $this->shipmentRepository->where('order_id', $invoice->order_id)->first();

            $status = isset($shipments)
                ? Order::STATUS_COMPLETED
                : Order::STATUS_PROCESSING;

            $this->orderRepository->updateOrderStatus($order, $status);

            $this->invoiceRepository->updateState($invoice, Invoice::STATUS_PAID);
        }

        return response([
            'message' => trans('rest-api::app.admin.sales.transactions.transaction-saved'),
            'data'    => new OrderTransactionResource($transaction),
        ]);
    }
}
