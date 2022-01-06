<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Sale;

use Illuminate\Http\Request;
use Webkul\Sales\Repositories\OrderItemRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\RefundRepository;

class RefundController extends SaleController
{
    /**
     * Order repository instance.
     *
     * @var \Webkul\Sales\Repositories\OrderRepository
     */
    protected $orderRepository;

    /**
     * Order item repository instance.
     *
     * @var \Webkul\Sales\Repositories\OrderItemRepository
     */
    protected $orderItemRepository;

    /**
     * Refund repository instance.
     *
     * @var \Webkul\Sales\Repositories\RefundRepository
     */
    protected $refundRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Sales\Repositories\OrderRepository  $orderRepository
     * @param  \Webkul\Sales\Repositories\OrderItemRepository  $orderItemRepository
     * @param  \Webkul\Sales\Repositories\RefundRepository  $refundRepository
     * @return void
     */
    public function __construct(
        OrderRepository $orderRepository,
        OrderItemRepository $orderItemRepository,
        RefundRepository $refundRepository
    ) {
        $this->orderRepository = $orderRepository;

        $this->orderItemRepository = $orderItemRepository;

        $this->refundRepository = $refundRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\View
     */
    public function index()
    {
        $refunds = $this->refundRepository->all();

        return response([
            'data' => $refunds,
        ]);
    }

    /**
     * Show the view for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\View
     */
    public function show($id)
    {
        $refund = $this->refundRepository->findOrFail($id);

        return response([
            'data' => $refund,
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

        if (! $order->canRefund()) {
            return response([
                'message' => __('admin::app.sales.refunds.creation-error'),
            ], 400);
        }

        $request->validate([
            'refund.items.*' => 'required|numeric|min:0',
        ]);

        $data = $request->all();

        if (! $data['refund']['shipping']) {
            $data['refund']['shipping'] = 0;
        }

        $totals = $this->refundRepository->getOrderItemsRefundSummary($data['refund']['items'], $orderId);

        if (! $totals) {
            return response([
                'message' => __('admin::app.sales.refunds.invalid-qty'),
            ], 400);
        }

        $maxRefundAmount = $totals['grand_total']['price'] - $order->refunds()->sum('base_adjustment_refund');

        $refundAmount = $totals['grand_total']['price'] - $totals['shipping']['price'] + $data['refund']['shipping'] + $data['refund']['adjustment_refund'] - $data['refund']['adjustment_fee'];

        if (! $refundAmount) {
            return response([
                'message' => __('admin::app.sales.refunds.invalid-refund-amount-error'),
            ], 400);
        }

        if ($refundAmount > $maxRefundAmount) {
            return response([
                'message' => __('admin::app.sales.refunds.refund-limit-error', ['amount' => core()->formatBasePrice($maxRefundAmount)]),
            ], 400);
        }

        $this->refundRepository->create(array_merge($data, ['order_id' => $orderId]));

        return response([
            'message' => __('admin::app.response.create-success', ['name' => 'Refund']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $orderId
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateQty(Request $request, $orderId)
    {
        $data = $this->refundRepository->getOrderItemsRefundSummary($request->all(), $orderId);

        if (! $data) {
            return response('Not found!', 400);
        }

        return response([
            'data' => $data,
        ]);
    }
}
