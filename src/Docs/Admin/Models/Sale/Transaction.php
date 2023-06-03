<?php

namespace Webkul\RestApi\Docs\Admin\Models\Sale;

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
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *     title="Transaction ID",
     *     description="Invoice's transaction id",
     *     example="TXNS5845AAEFVF"
     * )
     *
     * @var string
     */
    private $transaction_id;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="Transaction status",
     *     example="paid",
     *     enum={"paid"}
     * )
     *
     * @var string
     */
    private $status;

    /**
     * @OA\Property(
     *     title="Type",
     *     description="Transaction type",
     *     example="cashondelivery",
     *     enum={"cashondelivery", "moneytransfer"}
     * )
     *
     * @var string
     */
    private $type;

    /**
     * @OA\Property(
     *     title="Payment Method",
     *     description="Used payment method for transaction",
     *     example="cashondelivery",
     *     enum={"cashondelivery", "moneytransfer"}
     * )
     *
     * @var string
     */
    private $payment_method;

    /**
     * @OA\Property(
     *     title="Data",
     *     description="Transaction's additional information",
     *     type="object",
     *     example={
     *          "paidAmount": "28"
     *     },
     *     @OA\Property(property="paidAmount", type="integer", example="28")
     * )
     *
     * @var string
     */
    private $data;
    
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