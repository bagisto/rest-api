<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Sale;

use Illuminate\Http\Request;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\OrderRepository;

class InvoiceController extends SaleController
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
     * Create a new controller instance.
     *
     * @param  \Webkul\Sales\Repositories\OrderRepository  $orderRepository
     * @param  \Webkul\Sales\Repositories\InvoiceRepository  $invoiceRepository
     * @return void
     */
    public function __construct(
        OrderRepository $orderRepository,
        InvoiceRepository $invoiceRepository
    ) {
        $this->orderRepository = $orderRepository;

        $this->invoiceRepository = $invoiceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = $this->invoiceRepository->all();

        return response([
            'data' => $invoices,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $orderId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $orderId)
    {
        $order = $this->orderRepository->findOrFail($orderId);

        if (! $order->canInvoice()) {
            return response([
                'message' => __('admin::app.sales.invoices.creation-error'),
            ], 400);
        }

        $request->validate([
            'invoice.items.*' => 'required|numeric|min:0',
        ]);

        $data = $request->all();

        if (! $this->invoiceRepository->haveProductToInvoice($data)) {
            return response([
                'message' => __('admin::app.sales.invoices.product-error'),
            ], 400);
        }

        if (! $this->invoiceRepository->isValidQuantity($data)) {
            return response([
                'message' => __('admin::app.sales.invoices.invalid-qty'),
            ], 400);
        }

        $this->invoiceRepository->create(array_merge($data, ['order_id' => $orderId]));

        return response([
            'message' => __('admin::app.response.create-success', ['name' => 'Invoice']),
        ]);
    }

    /**
     * Show the view for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = $this->invoiceRepository->findOrFail($id);

        return response([
            'data' => $invoice,
        ]);
    }
}
