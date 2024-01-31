<?php

namespace Webkul\RestApi\Docs\Shop\Models\Customer;

/**
 * @OA\Schema(
 *     title="Transaction",
 *     description="Transaction model",
 * )
 */
class Transaction
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
     *     title="Transaction ID",
     *     description="Transaction id",
     *     example="TRXS19542EHS"
     * )
     *
     * @var string
     */
    private $transaction_id;

    /**
     * @OA\Property(
     *     title="Transaction Status",
     *     description="Transaction status",
     *     example="paid"
     * )
     *
     * @var string
     */
    private $status;

    /**
     * @OA\Property(
     *     title="Transaction Type",
     *     description="Transaction type",
     *     example=""
     * )
     *
     * @var string
     */
    private $type;

    /**
     * @OA\Property(
     *     title="Payment Method Used For Transaction",
     *     description="Payment method used for transaction",
     *     example="paypal_standard"
     * )
     *
     * @var string
     */
    private $payment_method;

    /**
     * @OA\Property(
     *     title="Transaction Related Info",
     *     description="Transaction related information",
     *     example="{}"
     * )
     *
     * @var object
     */
    private $data;

    /**
     * @OA\Property(
     *     title="Invoice ID",
     *     description="Invoice id",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    private $invoice_id;

    /**
     * @OA\Property(
     *     title="Order ID",
     *     description="Order id",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
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
     *     title="Transaction Amount Paid",
     *     description="Transaction amount paid",
     *     example=10.60
     * )
     *
     * @var float
     */
    private $amount;
}
