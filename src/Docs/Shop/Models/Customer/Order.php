<?php

namespace Webkul\RestApi\Docs\Shop\Models\Customer;

/**
 * @OA\Schema(
 *     title="Order",
 *     description="Order model",
 * )
 */
class Order
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
     *     title="Increment ID",
     *     description="Increment ID",
     *     example="OrderPrefix1"
     * )
     *
     * @var string
     */
    private $increment_id;

    /**
     * @OA\Property(
     *     title="Email",
     *     description="Customer's Email",
     *     example="example@example.com",
     * )
     *
     * @var string
     */
    private $customer_email;

    /**
     * @OA\Property(
     *     title="First Name",
     *     description="Customer's First Name",
     *     example="John",
     * )
     *
     * @var string
     */
    private $customer_first_name;

    /**
     * @OA\Property(
     *     title="Last Name",
     *     description="Customer's Last Name",
     *     example="John",
     * )
     *
     * @var string
     */
    private $customer_last_name;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="Order Status",
     *     example="completed",
     * )
     *
     * @var string
     */
    private $status;

    /**
     * @OA\Property(
     *     title="Payment Title",
     *     description="Payment Title",
     *     example="Wallet Payment",
     * )
     *
     * @var string
     */
    private $payment_title;

    /**
     * @OA\Property(
     *     title="Base Currency Code",
     *     description="Base Currency Code",
     *     example="USD",
     * )
     *
     * @var string
     */
    private $base_currency_code;

    /**
     * @OA\Property(
     *     title="Order Currency Code",
     *     description="Order Currency Code",
     *     example="USD",
     * )
     *
     * @var string
     */
    private $order_currency_code;

    /**
     * @OA\Property(
     *      title="Grand Total",
     *      description="Grand Total of the Order",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $grand_total;

    /**
     * @OA\Property(
     *      title="Formatted Grand Total",
     *      description="Formatted Grand Total of the Order",
     *      example="$10.00"
     * )
     *
     * @var float
     */
    private $formatted_grand_total;

    /**
     * @OA\Property(
     *      title="Base Grand Total",
     *      description="Base Grand Total of the Order",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $base_grand_total;

    /**
     * @OA\Property(
     *      title="Formatted Base Grand Total",
     *      description="Formatted Base Grand Total of the Order",
     *      example="$10.00"
     * )
     *
     * @var string
     */
    private $formatted_based_grand_total;

    /**
     * @OA\Property(
     *     title="Order Items",
     *     description="Order Items"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Customer\OrderItem
     */
    private $items;

    /**
     * @OA\Property(
     *     title="Order's Customer",
     *     description="Order's Customer"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Customer\Customer
     */
    private $customer;

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
}