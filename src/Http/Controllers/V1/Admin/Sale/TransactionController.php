<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Sale;

use Illuminate\Http\Request;
use Webkul\RestApi\Http\Resources\V1\Admin\Sale\OrderTransactionResource;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderTransactionRepository;
use Webkul\Sales\Repositories\ShipmentRepository;

class TransactionController extends SaleController
{
    /**
     * Order repository instance.
     *
     * @var \Webkul\Sales\Repositories\OrderRepository
     */
    protected $orderRepository;

    /**
     * Invoice repository instance.
     *
     * @var \Webkul\Sales\Repositories\InvoiceRepository
     */
    protected $invoiceRepository;

    /**
     * Invoice repository instance.
     *
     * @var \Webkul\Sales\Repositories\ShipmentRepository
     */
    protected $shipmentRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Sales\Repositories\OrderRepository  $orderRepository
     * @param  \Webkul\Sales\Repositories\InvoiceRepository  $invoiceRepository
     * @param  \Webkul\Sales\Repositories\ShipmentRepository $shipmentRepository
     * @return void
     */
    public function __construct(
        OrderRepository $orderRepository,
        InvoiceRepository $invoiceRepository,
        ShipmentRepository $shipmentRepository
    ) {
        parent::__construct();
        
        $this->orderRepository = $orderRepository;

        $this->invoiceRepository = $invoiceRepository;

        $this->shipmentRepository = $shipmentRepository;
    }

    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return OrderTransactionRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return OrderTransactionResource::class;
    }

    /**
     * Save the tranaction.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'invoice_id'     => 'required',
            'payment_method' => 'required',
            'amount'         => 'required|numeric|min:0.0001',
        ]);

        $invoice = $this->invoiceRepository->where('increment_id', $request->invoice_id)->first();
        
        if (! $invoice) {
            return response([
                'message' => __('rest-api::app.sales.transactions.invoice-missing'),
            ], 400);
        }
        
        if ($invoice->state == 'paid') {
            return response([
                'message' => __('rest-api::app.sales.transactions.already-paid'),
            ], 400);
        }

        $transactionTotal = $this->getRepositoryInstance()->where('invoice_id', $invoice->id)->sum('amount');
        
        $transactionAmtfinal = $request->amount + $transactionTotal;

        if ($transactionAmtfinal > $invoice->base_grand_total) {
            return response([
                'message' => __('rest-api::app.sales.transactions.transaction-amount-exceeds'),
            ], 400);
        }

        $order = $this->orderRepository->find($invoice->order_id);

        $data = [
            'paidAmount' => $request->amount,
        ];

        $randomId = random_bytes(20);
        $transactionId = bin2hex($randomId);

        $transactionData['transaction_id'] = $transactionId;
        $transactionData['type'] = $request->payment_method;
        $transactionData['payment_method'] = $request->payment_method;
        $transactionData['invoice_id'] = $invoice->id;
        $transactionData['order_id'] = $invoice->order_id;
        $transactionData['amount'] = $request->amount;
        $transactionData['status'] = 'paid';
        $transactionData['data'] = json_encode($data);

        $transaction = $this->getRepositoryInstance()->create($transactionData);

        $transactionTotal = $this->getRepositoryInstance()->where('invoice_id', $invoice->id)->sum('amount');

        if ($transactionTotal >= $invoice->base_grand_total) {
            $shipments = $this->shipmentRepository->where('order_id', $invoice->order_id)->first();

            if (isset($shipments)) {
                $this->orderRepository->updateOrderStatus($order, 'completed');
            } else {
                $this->orderRepository->updateOrderStatus($order, 'processing');
            }

            $this->invoiceRepository->updateState($invoice, 'paid');
        }

        return response([
            'message' => __('rest-api::app.sales.transactions.transaction-saved'),
            'data'    => new OrderTransactionResource($transaction),
        ]);
    }
}
