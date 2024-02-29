<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Sale;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\RestApi\Http\Resources\V1\Admin\Sale\OrderResource;
use Webkul\Sales\Repositories\OrderCommentRepository;
use Webkul\Sales\Repositories\OrderRepository;

class OrderController extends SaleController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return OrderRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return OrderResource::class;
    }

    /**
     * Cancel action for the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel(int $id)
    {
        $result = $this->getRepositoryInstance()->cancel($id);

        return $result
            ? response(['message' => trans('rest-api::app.admin.sales.orders.cancel-success')])
            : response(['message' => trans('rest-api::app.admin.sales.orders.error.cancel-error')], 500);
    }

    /**
     * Add comment to the order
     *
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request, OrderCommentRepository $orderCommentRepository, int $id)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $data = array_merge($request->all(), ['order_id' => $id]);

        $data['customer_notified'] = isset($data['customer_notified']) ? 1 : 0;

        Event::dispatch('sales.order.comment.create.before', $data);

        $comment = $orderCommentRepository->create($data);

        Event::dispatch('sales.order.comment.create.after', $comment);

        return response([
            'data'    => $comment,
            'message' => trans('rest-api::app.admin.sales.orders.comments.create-success'),
        ]);
    }
}
