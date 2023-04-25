<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Illuminate\Http\Request;
use Webkul\RestApi\Http\Resources\V1\Shop\Sales\OrderResource;
use Webkul\Sales\Repositories\OrderRepository;

class OrderController extends CustomerController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return OrderRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return OrderResource::class;
    }

    /**
     * Cancel customer's order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request, $id)
    {
        $order = $this->resolveShopUser($request)->all_orders()->find($id);

        if ($order && $this->getRepositoryInstance()->cancel($order)) {
            return response([
                'message' => __('rest-api::app.common-response.success.cancel', ['name' => 'Order']),
            ]);
        }

        return response([
            'message' => __('rest-api::app.sales.orders.order-not-found'),
        ]);
    }

    public function getResources(Request $request) {
        $order = $request->user()->all_orders()->get();

        if (! sizeof($order)) {
            return response([
                'message' => "No orders found",
            ]);
        }

        return $this->getResourceCollection($order);
    }

    public function getResource(Request $request, $id) {
        $order = $request->user()->all_orders()->find($id)->get();

        if (is_null($order)) {
            return response([
                'message' => "No orders found",
            ]);
        }

        return $this->getResourceCollection($order);
    }
}
