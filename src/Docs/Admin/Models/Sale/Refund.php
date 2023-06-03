<?php

namespace Webkul\RestApi\Docs\Admin\Models\Sale;

/**
 * @OA\Schema(
 *     title="Refund",
 *     description="Refund model",
 * )
 */
class Refund
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
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $increment_id;
    
    /**
     * @OA\Property(
     *     title="State",
     *     description="Order's refund status",
     *     example="refunded",
     *     enum={"refunded"}
     * )
     *
     * @var string
     */
    private $state;

    /**
     * @OA\Property(
     *     title="Email Sent",
     *     description="Refund email sent status",
     *     example=1,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $email_sent;
    
    /**
     * @OA\Property(
     *     title="Total Quantity",
     *     description="Refund total quantity",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $total_qty;

    /**
     * @OA\Property(
     *     title="Base Currency Code",
     *     description="Store base currency code",
     *     example="USD",
     * )
     *
     * @var string
     */
    private $base_currency_code;

    /**
     * @OA\Property(
     *     title="Channel/Website Currency Code",
     *     description="Default Channel/Website Currency Code",
     *     example="USD",
     * )
     *
     * @var string
     */
    private $channel_currency_code;

    /**
     * @OA\Property(
     *     title="Order Currency Code",
     *     description="Order currency code at the time order placed from store",
     *     example="USD",
     * )
     *
     * @var string
     */
    private $order_currency_code;
    
    /**
     * @OA\Property(
     *     title="Adjustment Refund",
     *     description="Adjustment refund amount",
     *     example=5.50
     * )
     *
     * @var float
     */
    private $adjustment_refund;
    
    /**
     * @OA\Property(
     *     title="Base Adjustment Refund",
     *     description="Base adjustment refund amount",
     *     example=7.35
     * )
     *
     * @var float
     */
    private $base_adjustment_refund;
    
    /**
     * @OA\Property(
     *     title="Adjustment Fee",
     *     description="Adjustment fee amount",
     *     example=5.50
     * )
     *
     * @var float
     */
    private $adjustment_fee;
    
    /**
     * @OA\Property(
     *     title="Base Adjustment Fee",
     *     description="Base adjustment fee amount",
     *     example=7.35
     * )
     *
     * @var float
     */
    private $base_adjustment_fee;

    /**
     * @OA\Property(
     *     title="Sub Total",
     *     description="Refund Sub Total",
     *     example=18.22
     * )
     *
     * @var float
     */
    private $sub_total;

    /**
     * @OA\Property(
     *     title="Formatted Sub Total",
     *     description="Formatted refund sub total",
     *     example="€18.22",
     * )
     *
     * @var string
     */
    private $formatted_sub_total;

    /**
     * @OA\Property(
     *     title="Base Sub Total",
     *     description="Refund base sub total",
     *     example=20.00
     * )
     *
     * @var float
     */
    private $base_sub_total;

    /**
     * @OA\Property(
     *     title="Formatted Base Sub Total",
     *     description="Formatted refund base sub total",
     *     example="$20.00",
     * )
     *
     * @var string
     */
    private $formatted_base_sub_total;

    /**
     * @OA\Property(
     *     title="Grand Total",
     *     description="Refund grand total",
     *     example=18.22
     * )
     *
     * @var float
     */
    private $grand_total;

    /**
     * @OA\Property(
     *     title="Formatted Grand Total",
     *     description="Formatted refund grand total",
     *     example="€18.22",
     * )
     *
     * @var string
     */
    private $formatted_grand_total;

    /**
     * @OA\Property(
     *     title="Base Grand Total",
     *     description="Refund base grand total",
     *     example=20.00
     * )
     *
     * @var float
     */
    private $base_grand_total;

    /**
     * @OA\Property(
     *     title="Formatted Base Grand Total",
     *     description="Formatted refund base grand total",
     *     example="$20.00",
     * )
     *
     * @var string
     */
    private $formatted_base_grand_total;

    /**
     * @OA\Property(
     *     title="Shipping Amount",
     *     description="Refunded shipping amount",
     *     example=18.22
     * )
     *
     * @var float
     */
    private $shipping_amount;

    /**
     * @OA\Property(
     *     title="Formatted Shipping Amount",
     *     description="Refunded formatted shipping amount",
     *     example="€18.22",
     * )
     *
     * @var string
     */
    private $formatted_shipping_amount;

    /**
     * @OA\Property(
     *     title="Base Shipping Amount",
     *     description="Refunded base shipping amount",
     *     example=20.00
     * )
     *
     * @var float
     */
    private $base_shipping_amount;

    /**
     * @OA\Property(
     *     title="Formatted Base Shipping Amount",
     *     description="Refunded formatted base shipping amount",
     *     example="$20.00",
     * )
     *
     * @var string
     */
    private $formatted_base_shipping_amount;

    /**
     * @OA\Property(
     *     title="Tax Amount",
     *     description="Refunded tax amount",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $tax_amount;

    /**
     * @OA\Property(
     *     title="Formatted Tax Amount",
     *     description="Refunded formatted tax amount",
     *     example="€0.00",
     * )
     *
     * @var string
     */
    private $formatted_tax_amount;

    /**
     * @OA\Property(
     *     title="Base Tax Amount",
     *     description="Refunded base tax amount",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $base_tax_amount;

    /**
     * @OA\Property(
     *     title="Formatted Base Tax Amount",
     *     description="Refunded formatted base tax amount",
     *     example="$0.00",
     * )
     *
     * @var string
     */
    private $formatted_base_tax_amount;

    /**
     * @OA\Property(
     *     title="Discount Percent",
     *     description="Refunded discount percentage",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $discount_percent;

    /**
     * @OA\Property(
     *     title="Discount Amount",
     *     description="Refunded discount amount",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $discount_amount;

    /**
     * @OA\Property(
     *     title="Formatted Discount Amount",
     *     description="Refunded formatted discount amount",
     *     example="€0.00",
     * )
     *
     * @var string
     */
    private $formatted_discount_amount;

    /**
     * @OA\Property(
     *     title="Base Discount Amount",
     *     description="Refunded base discount amount",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $base_discount_amount;

    /**
     * @OA\Property(
     *     title="Formatted Base Discount Amount",
     *     description="Refunded formatted base discount amount",
     *     example="$0.00",
     * )
     *
     * @var string
     */
    private $formatted_base_discount_amount;

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
     *     title="Refund Items",
     *     description="Refund items"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Sale\RefundItem
     */
    private $items;
    
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