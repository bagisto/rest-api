<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Sale;

use Illuminate\Http\Request;
use Webkul\RestApi\Http\Resources\V1\Admin\Sale\RefundResource;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\RefundRepository;

class RefundController extends SaleController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return RefundRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return RefundResource::class;
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

        if (! $order->canRefund()) {
            return response([
                'message' => __('rest-api::app.sales.refunds.creation-error'),
            ], 400);
        }

        $request->validate([
            'refund.items.*' => 'required|numeric|min:0',
        ]);

        $data = $request->all();

        if (! $data['refund']['shipping']) {
            $data['refund']['shipping'] = 0;
        }

        $totals = $this->getRepositoryInstance()->getOrderItemsRefundSummary($data['refund']['items'], $orderId);

        if (! $totals) {
            return response([
                'message' => __('rest-api::app.sales.refunds.invalid-qty-error'),
            ], 400);
        }

        $maxRefundAmount = $totals['grand_total']['price'] - $order->refunds()->sum('base_adjustment_refund');

        $refundAmount = $totals['grand_total']['price'] - $totals['shipping']['price'] + $data['refund']['shipping'] + $data['refund']['adjustment_refund'] - $data['refund']['adjustment_fee'];

        if (! $refundAmount) {
            return response([
                'message' => __('rest-api::app.sales.refunds.invalid-amount-error'),
            ], 400);
        }

        if ($refundAmount > $maxRefundAmount) {
            return response([
                'message' => __('rest-api::app.sales.refunds.limit-error', ['amount' => core()->formatBasePrice($maxRefundAmount)]),
            ], 400);
        }

        $refund = $this->getRepositoryInstance()->create(array_merge($data, ['order_id' => $orderId]));

        return response([
            'data'    => new RefundResource($refund),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Refund']),
        ]);
    }
}
