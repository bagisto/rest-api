<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Sales;

use Illuminate\Http\Request;
use Webkul\RestApi\Http\Resources\V1\Admin\Sales\InvoiceResource;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\OrderRepository;

class InvoiceController extends SalesController
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
     * @param  int  $orderId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, OrderRepository $orderRepository, $orderId)
    {
        $order = $orderRepository->findOrFail($orderId);

        if (! $order->canInvoice()) {
            return response([
                'message' => trans('rest-api::app.admin.sales.invoices.error.creation-error'),
            ], 400);
        }

        $request->validate([
            'invoice.items.*' => 'required|numeric|min:0',
        ]);

        $data = $request->all();

        if (! $this->getRepositoryInstance()->haveProductToInvoice($data)) {
            return response([
                'message' => trans('rest-api::app.admin.sales.invoices.error.product-error'),
            ], 400);
        }

        if (! $this->getRepositoryInstance()->isValidQuantity($data)) {
            return response([
                'message' => trans('rest-api::app.admin.sales.invoices.error.invalid-qty-error'),
            ], 400);
        }

        $invoice = $this->getRepositoryInstance()->create(array_merge($data, ['order_id' => $orderId]));

        return response([
            'data'    => new InvoiceResource($invoice),
            'message' => trans('rest-api::app.admin.sales.invoices.create-success'),
        ]);
    }
}
