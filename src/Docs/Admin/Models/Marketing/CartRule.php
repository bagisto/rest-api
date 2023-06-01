<?php

namespace Webkul\RestApi\Docs\Admin\Models\Marketing;

/**
 * @OA\Schema(
 *     title="CartRule",
 *     description="CartRule model",
 * )
 */
class CartRule
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
     *     title="Name",
     *     description="Cart rule name",
     *     example="Off 10%"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Description",
     *     description="Cart rule description",
     *     example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
     * )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     *     title="Starts From",
     *     description="Cart rule will valid from this date",
     *     example="2023-04-15",
     *     format="date",
     *     type="string"
     * )
     *
     * @var \Date
     */
    private $starts_from;

    /**
     * @OA\Property(
     *     title="Ends Till",
     *     description="Cart rule will valid till this date",
     *     example="2025-08-30",
     *     format="date",
     *     type="string"
     * )
     *
     * @var \Date
     */
    private $ends_till;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="Cart rule status",
     *     example=1,
     *     enum={0,1}
     * )
     *
     * @var integer
     */
    private $status;

    /**
     * @OA\Property(
     *     title="Coupon Type",
     *     description="Cart rule coupon type, i.e. `0` is used for `No Coupon` and `1` is for `Specific Coupon`",
     *     example=1,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $coupon_type;

    /**
     * @OA\Property(
     *     title="Use Auto Generation",
     *     description="Want to generate coupon auto or manual. Only use if `coupon_type` is set `1` (i.e. `0` is used for `No` and `1` is for `Yes`)",
     *     example=0,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $use_auto_generation;

    /**
     * @OA\Property(
     *     title="Coupon Code",
     *     description="Provide coupon code manually.  Only use if `coupon_type` is set `1` and `use_auto_generation` is set to `0`",
     *     example="FLAT10"
     * )
     *
     * @var string
     */
    private $coupon_code;
    
    /**
     * @OA\Property(
     *     title="Uses Per Coupon",
     *     description="Provide coupon use count. Only use if `coupon_type` is set `1`",
     *     example=1
     * )
     *
     * @var integer
     */
    private $uses_per_coupon;
    
    /**
     * @OA\Property(
     *     title="Uses Per Customer",
     *     description="Provide use count for a customer.",
     *     example=1
     * )
     *
     * @var integer
     */
    private $usage_per_customer;
    
    /**
     * @OA\Property(
     *     title="Times Used",
     *     description="How many times the customer used this coupon",
     *     example=0
     * )
     *
     * @var integer
     */
    private $times_used;
    
    /**
     * @OA\Property(
     *     title="Condition Type",
     *     description="Cart rule condition type, i.e. `1` is used for `All Conditions are True` and `2` is for `Any Condition is True`",
     *     example=1,
     *     enum={1, 2}
     * )
     *
     * @var integer
     */
    private $condition_type;

    /**
     * @OA\Property(
     *     title="Conditions",
     *     description="Cart rule conditions",
     *     example={{
     *         "value": "2",
     *         "operator": ">=",
     *         "attribute": "cart|items_qty",
     *         "attribute_type": "integer"
     *     }},
     *     @OA\Items(
     *          @OA\Property(property="value", type="string", example="2"),
     *          @OA\Property(property="operator", type="string", example=">="),
     *          @OA\Property(property="attribute", type="string", example="cart|items_qty"),
     *          @OA\Property(property="attribute_type", type="string", example="integer")
     *     )
     * )
     *
     * @var array
     */
    private $conditions;

    /**
     * @OA\Property(
     *     title="End Other Rules",
     *     description="End other rules for this rule",
     *     example=1,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $end_other_rules;

    /**
     * @OA\Property(
     *     title="Action Type",
     *     description="Action type i.e. `by_fixed` & `by_percent`",
     *     example="by_percent",
     *     enum={"by_fixed", "by_percent"}
     * )
     *
     * @var string
     */
    private $action_type;

    /**
     * @OA\Property(
     *     title="Discount Amount",
     *     description="Cart rule discount amount",
     *     example=10.50
     * )
     *
     * @var float
     */
    private $discount_amount;

    /**
     * @OA\Property(
     *     title="Discount Quantity",
     *     description="Discount will apply on how many quantity (Maximum Quantity Allowed to be Discounted)",
     *     example=2
     * )
     *
     * @var integer
     */
    private $discount_quantity;

    /**
     * @OA\Property(
     *     title="Discount Step",
     *     description="Buy X Quantity",
     *     example=1
     * )
     *
     * @var integer
     */
    private $discount_step;

    /**
     * @OA\Property(
     *     title="Apply To Shipping",
     *     description="Discount will apply on shipping or not. i.e. `0` is for `No` & `1` is for `Yes`",
     *     example=0,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $apply_to_shipping;

    /**
     * @OA\Property(
     *     title="Free Shipping",
     *     description="Free Shipping",
     *     example=0,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $free_shipping;
    
    /**
     * @OA\Property(
     *     title="Sort Order",
     *     description="Priority for this rule",
     *     example=1
     * )
     *
     * @var integer
     */
    private $sort_order;
    
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