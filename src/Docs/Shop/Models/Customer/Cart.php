<?php

namespace Webkul\RestApi\Docs\Shop\Models\Customer;

/**
 * @OA\Schema(
 *     title="Cart",
 *     description="Cart model",
 * )
 */
class Cart
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
     *     title="Customer Email",
     *     description="Customer email",
     *     example="john@example.com"
     * )
     *
     * @var string
     */
    private $customer_email;

    /**
     * @OA\Property(
     *     title="Customer First Name",
     *     description="Customer first name",
     *     example="John"
     * )
     *
     * @var string
     */
    private $customer_first_name;

    /**
     * @OA\Property(
     *     title="Customer Last Name",
     *     description="Customer first name",
     *     example="Doe"
     * )
     *
     * @var string
     */
    private $customer_last_name;

    /**
     * @OA\Property(
     *     title="Shipping Method",
     *     description="Selected shipping method name for the current cart",
     *     example="flatrate_flatrate"
     * )
     *
     * @var string
     */
    private $shipping_method;

    /**
     * @OA\Property(
     *     title="Coupon Code",
     *     description="Applied coupon code to the cart",
     *     example="FLAT10%"
     * )
     *
     * @var string
     */
    private $coupon_code;

    /**
     * @OA\Property(
     *     title="Item Count",
     *     description="Total number of cart's item",
     *     format="int64",
     *     example=2
     * )
     *
     * @var integer
     */
    private $items_count;

    /**
     * @OA\Property(
     *     title="Item Quantity",
     *     description="Total quantity of cart's items",
     *     format="int64",
     *     example=4
     * )
     *
     * @var integer
     */
    private $items_qty;

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
     *     title="Channel Currency Code",
     *     description="Channel/Store Currency Code",
     *     example="USD",
     * )
     *
     * @var string
     */
    private $channel_currency_code;

    /**
     * @OA\Property(
     *     title="Cart Currency Code",
     *     description="Cart Currency Code i.e. Currency code in which product added to the cart",
     *     example="USD",
     * )
     *
     * @var string
     */
    private $cart_currency_code;

    /**
     * @OA\Property(
     *      title="Grand Total",
     *      description="Grand Total of the Cart",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $grand_total;

    /**
     * @OA\Property(
     *      title="Formatted Grand Total",
     *      description="Formatted Grand Total of the Cart",
     *      example="$10.00"
     * )
     *
     * @var float
     */
    private $formatted_grand_total;

    /**
     * @OA\Property(
     *      title="Base Grand Total",
     *      description="Base Grand Total of the Cart",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $base_grand_total;

    /**
     * @OA\Property(
     *      title="Formatted Base Grand Total",
     *      description="Formatted Base Grand Total of the Cart",
     *      example="$10.00"
     * )
     *
     * @var string
     */
    private $formatted_based_grand_total;

    /**
     * @OA\Property(
     *      title="Sub Total",
     *      description="Sub Total of the Cart",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $sub_total;

    /**
     * @OA\Property(
     *      title="Formatted Sub Total",
     *      description="Formatted Sub Total of the Cart",
     *      example="$10.00"
     * )
     *
     * @var float
     */
    private $formatted_sub_total;

    /**
     * @OA\Property(
     *      title="Base Sub Total",
     *      description="Base Sub Total of the Cart",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $base_sub_total;

    /**
     * @OA\Property(
     *      title="Formatted Base Sub Total",
     *      description="Formatted Base Sub Total of the Cart",
     *      example="$10.00"
     * )
     *
     * @var string
     */
    private $formatted_based_sub_total;

    /**
     * @OA\Property(
     *      title="Tax Total",
     *      description="Tax Total of the Cart",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $tax_total;

    /**
     * @OA\Property(
     *      title="Formatted Tax Total",
     *      description="Formatted Tax Total of the Cart",
     *      example="$10.00"
     * )
     *
     * @var float
     */
    private $formatted_tax_total;

    /**
     * @OA\Property(
     *      title="Base Tax Total",
     *      description="Base Tax Total of the Cart",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $base_tax_total;

    /**
     * @OA\Property(
     *      title="Formatted Base Tax Total",
     *      description="Formatted Base Tax Total of the Cart",
     *      example="$10.00"
     * )
     *
     * @var string
     */
    private $formatted_based_tax_total;

    /**
     * @OA\Property(
     *      title="Discount Total",
     *      description="Discount Total of the Cart",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $discount;

    /**
     * @OA\Property(
     *      title="Formatted Discount Total",
     *      description="Formatted Discount Total of the Cart",
     *      example="$10.00"
     * )
     *
     * @var float
     */
    private $formatted_discount;

    /**
     * @OA\Property(
     *      title="Base Discount Total",
     *      description="Base Discount Total of the Cart",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $base_discount;

    /**
     * @OA\Property(
     *      title="Formatted Base Discount Total",
     *      description="Formatted Base Discount Total of the Cart",
     *      example="$10.00"
     * )
     *
     * @var string
     */
    private $formatted_based_discount;

    /**
     * @OA\Property(
     *      title="Cart Guest Status",
     *      description="Cart is owned by customer or guest",
     *      example="true"
     * )
     *
     * @var boolean
     */
    private $is_guest;

    /**
     * @OA\Property(
     *      title="Cart Active Status",
     *      description="Cart status for active or inactive",
     *      example="true"
     * )
     *
     * @var boolean
     */
    private $is_active;

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
     *     title="Cart Items",
     *     description="Cart Items"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Customer\CartItem
     */
    private $items;

    /**
     * @OA\Property(
     *     title="Cart Shipping Rate",
     *     description="Selected cart's shipping rate"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Customer\CartShippingRate
     */
    private $selected_shipping_rate;

    /**
     * @OA\Property(
     *     title="Cart Payment",
     *     description="Selected cart's payment"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Customer\CartPayment
     */
    private $payment;

    /**
     * @OA\Property(
     *     title="Cart Billing Address",
     *     description="Cart billing address"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Customer\CartAddress
     */
    private $billing_address;

    /**
     * @OA\Property(
     *     title="Cart Shipping Address",
     *     description="Cart shipping address"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Customer\CartAddress
     */
    private $shipping_address;
    
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