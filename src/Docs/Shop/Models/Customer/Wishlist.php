<?php

namespace Webkul\RestApi\Docs\Shop\Models\Customer;

/**
 * @OA\Schema(
 *     title="Wishlist",
 *     description="Wishlist model",
 * )
 */
class Wishlist
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
     *     title="Channel ID",
     *     description="Channel id",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $channel_id;

    /**
     * @OA\Property(
     *     title="Product ID",
     *     description="Product id",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $product_id;

    /**
     * @OA\Property(
     *     title="Customer ID",
     *     description="Customer id",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $customer_id;

    /**
     * @OA\Property(
     *     title="Product Option Info",
     *     description="Product option related information",
     *     example="{}"
     * )
     *
     * @var object
     */
    private $item_options;

    /**
     * @OA\Property(
     *     title="Product Move To Cart Date",
     *     description="Date on which wishlist's product moved to cart",
     *     example="2020-01-27",
     *     format="date",
     *     type="string"
     * )
     *
     * @var \Date
     */
    private $moved_to_cart;

    /**
     * @OA\Property(
     *     title="Wishlist Shared Status",
     *     description="Status for sharing customer's wishlist",
     *     format="true",
     * )
     *
     * @var boolean
     */
    private $shared;

    /**
     * @OA\Property(
     *     title="Date Of Moving Product",
     *     description="Date on which wishlist's product will move to cart",
     *     example="2020-01-27",
     *     format="date",
     *     type="string"
     * )
     *
     * @var \Date
     */
    private $time_of_moving;
    
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
     *     title="Additional Info About Wishlist Product",
     *     description="Additional information about wishlist product",
     *     example="{}"
     * )
     *
     * @var object
     */
    private $additional;

    /**
     * @OA\Property(
     *     title="Order's Customer",
     *     description="Order's Customer"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Customer\Customer
     */
    private $customer;
}