<?php

namespace Webkul\RestApi\Docs\Admin\Models\Marketing;

/**
 * @OA\Schema(
 *     title="CartRuleCoupon",
 *     description="CartRuleCoupon model",
 * )
 */
class CartRuleCoupon
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
     *     title="Code",
     *     description="Coupon code",
     *     example="342J1OHFAQDZ"
     * )
     *
     * @var string
     */
    private $code;

    /**
     * @OA\Property(
     *     title="Usage Limit",
     *     description="Coupon code usage limit",
     *     example=1
     * )
     *
     * @var integer
     */
    private $usage_limit;

    /**
     * @OA\Property(
     *     title="Usage Per Customer",
     *     description="Coupon code usage per customer",
     *     example=1
     * )
     *
     * @var integer
     */
    private $usage_per_customer;

    /**
     * @OA\Property(
     *     title="Times Used",
     *     description="How many times this code used",
     *     example=1
     * )
     *
     * @var integer
     */
    private $times_used;

    /**
     * @OA\Property(
     *     title="Type",
     *     description="Coupon type",
     *     example=0
     * )
     *
     * @var integer
     */
    private $type;

    /**
     * @OA\Property(
     *     title="Is Primary",
     *     description="Is primary",
     *     example=0
     * )
     *
     * @var integer
     */
    private $is_primary;

    /**
     * @OA\Property(
     *     title="Cart Rule ID",
     *     description="Cart rule ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $cart_rule_id;
    
    /**
     * @OA\Property(
     *     title="Expired at",
     *     description="Expired at",
     *     example="2020-01-27",
     *     format="date",
     *     type="string"
     * )
     *
     * @var \Date
     */
    private $expired_at;

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