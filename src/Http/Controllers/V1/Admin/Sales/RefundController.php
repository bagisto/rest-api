<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Sales;

use Illuminate\Http\Request;
use Webkul\RestApi\Http\Resources\V1\Admin\Sales\RefundResource;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\RefundRepository;

class RefundController extends SalesController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return RefundRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return RefundResource::class;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, OrderRepository $orderRepository, int $orderId): \Illuminate\Http\Response
    {
        $order = $orderRepository->findOrFail($orderId);

        if (! $order->canRefund()) {
            return response([
                'message' => trans('rest-api::app.admin.sales.refunds.error.creation-error'),
            ], 400);
        }

        $request->validate([
            'refund.items'   => 'array',
            'refund.items.*' => 'required|numeric|min:0',
        ]);

        $data = $request->all();

        if (! isset($data['refund']['shipping'])) {
            $data['refund']['shipping'] = 0;
        }

        $totals = $this->getRepositoryInstance()->getOrderItemsRefundSummary($data['refund'], $orderId);

        if (! $totals) {
            return response([
                'message' => trans('rest-api::app.admin.sales.refunds.error.invalid-qty-error'),
            ], 400);
        }

        $maxRefundAmount = $totals['grand_total']['price'] - $order->refunds()->sum('base_adjustment_refund');

        $refundAmount = $totals['grand_total']['price'] - $totals['shipping']['price'] + $data['refund']['shipping'] + $data['refund']['adjustment_refund'] - $data['refund']['adjustment_fee'];

        if (! $refundAmount) {
            return response([
                'message' => trans('rest-api::app.admin.sales.refunds.error.invalid-amount-error'),
            ], 400);
        }

        if ($refundAmount > $maxRefundAmount) {
            return response([
                'message' => trans('rest-api::app.admin.sales.refunds.error.limit-error', ['amount' => core()->formatBasePrice($maxRefundAmount)]),
            ], 400);
        }

        $refund = $this->getRepositoryInstance()->create(array_merge($data, ['order_id' => $orderId]));

        return response([
            'data'    => new RefundResource($refund->refresh()),
            'message' => trans('rest-api::app.admin.sales.refunds.create-success'),
        ]);
    }
}
