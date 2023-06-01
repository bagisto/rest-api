<?php

namespace Webkul\RestApi\Docs\Admin\Models\Sale;

/**
 * @OA\Schema(
 *     title="Comment",
 *     description="Comment model",
 * )
 */
class Comment
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *     title="comment",
     *     description="Order's comment",
     *     example="Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
     * )
     *
     * @var string
     */
    private $comment;

    /**
     * @OA\Property(
     *     title="Customer Notified",
     *     description="Notify customer through email or not.",
     *     example=1,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $customer_notified;

    /**
     * @OA\Property(
     *     title="Order ID",
     *     description="Order ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $order_id;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;
    
    /**
     * @OA\Property(
     *     title="Order",
     *     description="Order"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Sale\Order
     */
    private $order;
}