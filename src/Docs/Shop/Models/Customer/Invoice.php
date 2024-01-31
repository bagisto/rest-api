<?php

namespace Webkul\RestApi\Docs\Shop\Models\Customer;

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
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     *     title="Increment ID",
     *     description="Increment ID",
     *     example="InvoicePrefix1"
     * )
     *
     * @var string
     */
    private $increment_id;

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
     * @var bool
     */
    private $email_sent;

    /**
     * @OA\Property(
     *     title="Total Invoiced Quantity",
     *     description="Total invoiced quantity",
     *     example=2,
     * )
     *
     * @var int
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
     *     example="18.22",
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
     *     example="20.00",
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
     *     example="18.22",
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
     *     example="20.00",
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
     *     title="Order ID",
     *     description="Order ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    private $order_id;

    /**
     * @OA\Property(
     *     title="Order's Address ID",
     *     description="Order's address id",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    private $order_address_id;

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
     *     title="Invoice Reminder Count",
     *     description="Invoice reminder count",
     *     format="int64",
     *     example=3
     * )
     *
     * @var int
     */
    private $reminders;

    /**
     * @OA\Property(
     *     title="Time for Next Invoice Reminder",
     *     description="Time for next invoice reminder",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $next_reminder_at;
}
