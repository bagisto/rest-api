<?php

namespace Webkul\RestApi\Docs\Admin\Models\Sale;

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
     *     title="Status Label",
     *     description="Order status label",
     *     example="Completed",
     * )
     *
     * @var string
     */
    private $status_label;

    /**
     * @OA\Property(
     *     title="Channel Name",
     *     description="Channel in which order placed",
     *     example="Default",
     * )
     *
     * @var string
     */
    private $channel_name;
    
    /**
     * @OA\Property(
     *     title="Is Guest",
     *     description="Is guest status",
     *     example=0,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $is_guest;
    
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
     *     title="Shipping Method",
     *     description="Shipping method",
     *     example="flatrate_flatrate",
     * )
     *
     * @var string
     */
    private $shipping_method;

    /**
     * @OA\Property(
     *     title="Shipping Title",
     *     description="Shipping Title",
     *     example="Flat Rate - Flat Rate",
     * )
     *
     * @var string
     */
    private $shipping_title;

    /**
     * @OA\Property(
     *     title="Shipping Description",
     *     description="Shipping description",
     *     example="Flat Rate Shipping",
     * )
     *
     * @var string
     */
    private $shipping_description;

    /**
     * @OA\Property(
     *     title="Payment Title",
     *     description="Payment title",
     *     example="Money Transfer",
     * )
     *
     * @var string
     */
    private $payment_title;

    /**
     * @OA\Property(
     *     title="Coupon Code",
     *     description="Applied coupon code for the order",
     *     example="FLAT10%"
     * )
     *
     * @var string
     */
    private $coupon_code;

    /**
     * @OA\Property(
     *      title="Is Gift",
     *      description="Is gift order or not",
     *      example=0,
     *      enum={0, 1}
     * )
     *
     * @var integer
     */
    private $is_gift;

    /**
     * @OA\Property(
     *     title="Total Item Count",
     *     description="Total number of ordered's item",
     *     format="int64",
     *     example=2
     * )
     *
     * @var integer
     */
    private $total_item_count;

    /**
     * @OA\Property(
     *     title="Total Qty Ordered",
     *     description="Total quantity ordered",
     *     format="int64",
     *     example=4
     * )
     *
     * @var integer
     */
    private $total_qty_ordered;

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
     *      title="Grand Total Invoiced",
     *      description="Grand total invoiced of the Order",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $grand_total_invoiced;

    /**
     * @OA\Property(
     *      title="Formatted Grand Total Invoiced",
     *      description="Formatted Grand Total Invoiced of the Order",
     *      example="$10.00"
     * )
     *
     * @var float
     */
    private $formatted_grand_total_invoiced;

    /**
     * @OA\Property(
     *      title="Base Grand Total Invoiced",
     *      description="Base Grand Total Invoiced of the Order",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $base_grand_total_invoiced;

    /**
     * @OA\Property(
     *      title="Formatted Base Grand Total Invoiced",
     *      description="Formatted Base Grand Total Invoiced of the Order",
     *      example="$10.00"
     * )
     *
     * @var string
     */
    private $formatted_based_grand_total_invoiced;

    /**
     * @OA\Property(
     *      title="Grand Total Refunded",
     *      description="Grand Total Refunded of the Order",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $grand_total_refunded;

    /**
     * @OA\Property(
     *      title="Formatted Grand Total Refunded",
     *      description="Formatted Grand Total Refunded of the Order",
     *      example="$10.00"
     * )
     *
     * @var float
     */
    private $formatted_grand_total_refunded;

    /**
     * @OA\Property(
     *      title="Base Grand Total Refunded",
     *      description="Base Grand Total Refunded of the Order",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $base_grand_total_refunded;

    /**
     * @OA\Property(
     *      title="Formatted Base Grand Total Refunded",
     *      description="Formatted Base Grand Total Refunded of the Order",
     *      example="$10.00"
     * )
     *
     * @var string
     */
    private $formatted_based_grand_total_refunded;

    /**
     * @OA\Property(
     *      title="Sub Total",
     *      description="Sub Total of the order",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $sub_total;

    /**
     * @OA\Property(
     *      title="Formatted Sub Total",
     *      description="Formatted Sub Total of the order",
     *      example="$10.00"
     * )
     *
     * @var float
     */
    private $formatted_sub_total;

    /**
     * @OA\Property(
     *      title="Base Sub Total",
     *      description="Base Sub Total of the order",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $base_sub_total;

    /**
     * @OA\Property(
     *      title="Formatted Base Sub Total",
     *      description="Formatted Base Sub Total of the order",
     *      example="$10.00"
     * )
     *
     * @var string
     */
    private $formatted_based_sub_total;

    /**
     * @OA\Property(
     *      title="Sub Total Invoiced",
     *      description="Sub Total Invoiced of the order",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $sub_total_invoiced;

    /**
     * @OA\Property(
     *      title="Formatted Sub Total Invoiced",
     *      description="Formatted Sub Total Invoiced of the order",
     *      example="$10.00"
     * )
     *
     * @var float
     */
    private $formatted_sub_total_invoiced;

    /**
     * @OA\Property(
     *      title="Base Sub Total Invoiced",
     *      description="Base Sub Total Invoiced of the order",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $base_sub_total_invoiced;

    /**
     * @OA\Property(
     *      title="Formatted Base Sub Total Invoiced",
     *      description="Formatted Base Sub Total Invoiced of the order",
     *      example="$10.00"
     * )
     *
     * @var string
     */
    private $formatted_based_sub_total_invoiced;

    /**
     * @OA\Property(
     *     title="Customer",
     *     description="Order's customer"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Customer\Customer
     */
    private $customer;

    /**
     * @OA\Property(
     *     title="Channel",
     *     description="Order's channel"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Setting\Channel
     */
    private $channel;
    
    /**
     * @OA\Property(
     *     title="Shipping Address",
     *     description="Order's shipping address"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Sale\OrderAddress
     */
    private $shipping_address;
    
    /**
     * @OA\Property(
     *     title="Billing Address",
     *     description="Order's billing address"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Sale\OrderAddress
     */
    private $billing_address;
    
    /**
     * @OA\Property(
     *     title="Order Items",
     *     description="Order Items",
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/OrderItem")
     * )
     *
     * @var array
     */
    private $items;
    
    /**
     * @OA\Property(
     *     title="Invoices",
     *     description="Order's invoices'",
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/Invoice")
     * )
     *
     * @var array
     */
    private $invoices;
    
    /**
     * @OA\Property(
     *     title="Shipments",
     *     description="Order's shipments",
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/Shipment")
     * )
     *
     * @var array
     */
    private $shipments;

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