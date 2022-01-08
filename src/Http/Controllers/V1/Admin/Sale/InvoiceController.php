<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Sale;

use Illuminate\Http\Request;
use Webkul\RestApi\Http\Resources\V1\Admin\Sale\InvoiceResource;
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
     * Create a new controller instance.
     *
     * @param  \Webkul\Sales\Repositories\OrderRepository  $orderRepository
     * @return void
     */
    public function __construct(
        OrderRepository $orderRepository
    ) {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return InvoiceRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return InvoiceResource::class;
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

        if (! $this->getRepositoryInstance()->haveProductToInvoice($data)) {
            return response([
                'message' => __('admin::app.sales.invoices.product-error'),
            ], 400);
        }

        if (! $this->getRepositoryInstance()->isValidQuantity($data)) {
            return response([
                'message' => __('admin::app.sales.invoices.invalid-qty'),
            ], 400);
        }

        $invoice = $this->getRepositoryInstance()->create(array_merge($data, ['order_id' => $orderId]));

        return response([
            'data'    => new InvoiceResource($invoice),
            'message' => __('rest-api::app.response.success.create', ['name' => 'Invoice']),
        ]);
    }
}
