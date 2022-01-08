<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Sale;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\RestApi\Http\Resources\V1\Admin\Sale\OrderResource;
use Webkul\Sales\Repositories\OrderRepository;
use \Webkul\Sales\Repositories\OrderCommentRepository;

class OrderController extends SaleController
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
     * Cancel action for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $result = $this->getRepositoryInstance()->cancel($id);

        return $result
            ? response(['message' => __('rest-api::app.common-response.success.cancel', ['name' => 'Order'])])
            : response(['message' => __('rest-api::app.sales.orders.cancel-error')], 500);
    }

    /**
     * Add comment to the order
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Webkul\Sales\Repositories\OrderCommentRepository  $orderCommentRepository
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request, OrderCommentRepository $orderCommentRepository, int $id)
    {
        $data = array_merge($request->all(), ['order_id' => $id]);

        $data['customer_notified'] = isset($data['customer_notified']) ? 1 : 0;

        Event::dispatch('sales.order.comment.create.before', $data);

        $comment = $orderCommentRepository->create($data);

        Event::dispatch('sales.order.comment.create.after', $comment);

        return response([
            'data'    => $comment,
            'message' => __('rest-api::app.common-response.success.add', ['name' => 'Comment']),
        ]);
    }
}
