<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Sale;

use Illuminate\Http\Request;
use Webkul\RestApi\Http\Resources\V1\Admin\Sale\InvoiceResource;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\OrderRepository;

class InvoiceController extends SaleController
{
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
     * @param  \Webkul\Sales\Repositories\OrderRepository  $orderRepository
     * @param  int  $orderId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, OrderRepository $orderRepository, $orderId)
    {
        $order = $orderRepository->findOrFail($orderId);

        if (! $order->canInvoice()) {
            return response([
                'message' => __('rest-api::app.sales.invoices.creation-error'),
            ], 400);
        }

        $request->validate([
            'invoice.items.*' => 'required|numeric|min:0',
        ]);

        $data = $request->all();

        if (! $this->getRepositoryInstance()->haveProductToInvoice($data)) {
            return response([
                'message' => __('rest-api::app.sales.invoices.product-error'),
            ], 400);
        }

        if (! $this->getRepositoryInstance()->isValidQuantity($data)) {
            return response([
                'message' => __('rest-api::app.sales.invoices.invalid-qty-error'),
            ], 400);
        }

        $invoice = $this->getRepositoryInstance()->create(array_merge($data, ['order_id' => $orderId]));

        return response([
            'data'    => new InvoiceResource($invoice),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Invoice']),
        ]);
    }
}
