<?php

namespace Webkul\RestApi\Docs\Admin\Models\Sale;

/**
 * @OA\Schema(
 *     title="Invoice",
 *     description="Invoice model",
 * )
 */
class Invoice
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
     *     title="Invoice's State/Status",
     *     description="Invoice's State/Status",
     *     example="paid",
     *     enum={"pending", "paid", "refunded"}
     * )
     *
     * @var string
     */
    private $state;

    /**
     * @OA\Property(
     *     title="Invoice Email Sent",
     *     description="Invoice Email Sent Status",
     *     example=true,
     * )
     *
     * @var boolean
     */
    private $email_sent;

    /**
     * @OA\Property(
     *     title="Total Invoiced Quantity",
     *     description="Total invoiced quantity",
     *     example=2,
     * )
     *
     * @var integer
     */
    private $total_qty;

    /**
     * @OA\Property(
     *     title="Store Base Currency Code",
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
     *     title="Invoice Sub Total",
     *     description="Invoice Sub Total",
     *     example=18.22
     * )
     *
     * @var float
     */
    private $sub_total;

    /**
     * @OA\Property(
     *     title="Formatted Invoice Sub Total",
     *     description="Formatted invoice sub total",
     *     example="€18.22",
     * )
     *
     * @var string
     */
    private $formatted_sub_total;

    /**
     * @OA\Property(
     *     title="Invoice Base Sub Total",
     *     description="Invoice base sub total",
     *     example=20.00
     * )
     *
     * @var float
     */
    private $base_sub_total;

    /**
     * @OA\Property(
     *     title="Formatted Invoice Base Sub Total",
     *     description="Formatted Invoice base sub total",
     *     example="$20.00",
     * )
     *
     * @var string
     */
    private $formatted_base_sub_total;

    /**
     * @OA\Property(
     *     title="Invoice Grand Total",
     *     description="Invoice grand total",
     *     example=18.22
     * )
     *
     * @var float
     */
    private $grand_total;

    /**
     * @OA\Property(
     *     title="Formatted Invoice Grand Total",
     *     description="Formatted invoice grand total",
     *     example="€18.22",
     * )
     *
     * @var string
     */
    private $formatted_grand_total;

    /**
     * @OA\Property(
     *     title="Invoice Base Grand Total",
     *     description="Invoice base grand total",
     *     example=20.00
     * )
     *
     * @var float
     */
    private $base_grand_total;

    /**
     * @OA\Property(
     *     title="Formatted Invoice Base Grand Total",
     *     description="Formatted invoice base grand total",
     *     example="$20.00",
     * )
     *
     * @var string
     */
    private $formatted_base_grand_total;

    /**
     * @OA\Property(
     *     title="Shipping Amount",
     *     description="Order's shipping amount",
     *     example=18.22
     * )
     *
     * @var float
     */
    private $shipping_amount;

    /**
     * @OA\Property(
     *     title="Formatted Shipping Amount",
     *     description="Formatted shipping amount",
     *     example="€18.22",
     * )
     *
     * @var string
     */
    private $formatted_shipping_amount;

    /**
     * @OA\Property(
     *     title="Base Shipping Amount",
     *     description="Base shipping amount",
     *     example=20.00
     * )
     *
     * @var float
     */
    private $base_shipping_amount;

    /**
     * @OA\Property(
     *     title="Formatted Base Shipping Amount",
     *     description="Formatted base shipping amount",
     *     example="$20.00",
     * )
     *
     * @var string
     */
    private $formatted_base_shipping_amount;

    /**
     * @OA\Property(
     *     title="Tax Amount",
     *     description="Order's tax amount",
     *     example=18.22
     * )
     *
     * @var float
     */
    private $tax_amount;

    /**
     * @OA\Property(
     *     title="Formatted Tax Amount",
     *     description="Formatted tax amount",
     *     example="€18.22",
     * )
     *
     * @var string
     */
    private $formatted_tax_amount;

    /**
     * @OA\Property(
     *     title="Base Tax Amount",
     *     description="Base tax amount",
     *     example=20.00
     * )
     *
     * @var float
     */
    private $base_tax_amount;

    /**
     * @OA\Property(
     *     title="Formatted Base Tax Amount",
     *     description="Formatted base tax amount",
     *     example="$20.00",
     * )
     *
     * @var string
     */
    private $formatted_base_tax_amount;

    /**
     * @OA\Property(
     *     title="Discount Amount",
     *     description="Order's discount amount",
     *     example=18.22
     * )
     *
     * @var float
     */
    private $discount_amount;

    /**
     * @OA\Property(
     *     title="Formatted Discount Amount",
     *     description="Formatted discount amount",
     *     example="€18.22",
     * )
     *
     * @var string
     */
    private $formatted_discount_amount;

    /**
     * @OA\Property(
     *     title="Base Discount Amount",
     *     description="Base discount amount",
     *     example=20.00
     * )
     *
     * @var float
     */
    private $base_discount_amount;

    /**
     * @OA\Property(
     *     title="Formatted Base Discount Amount",
     *     description="Formatted base discount amount",
     *     example="$20.00",
     * )
     *
     * @var string
     */
    private $formatted_base_discount_amount;

    /**
     * @OA\Property(
     *     title="Order Address",
     *     description="Order address"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Sale\OrderAddress
     */
    private $order_address;
    
    /**
     * @OA\Property(
     *     title="Invoice Items",
     *     description="Invoice items"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Sale\InvoiceItem
     */
    private $items;

    /**
     * @OA\Property(
     *     title="Invoice's Transaction ID",
     *     description="Invoice's transaction id",
     *     example="TXNS5845AAEFVF"
     * )
     *
     * @var string
     */
    private $transaction_id;
    
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
}