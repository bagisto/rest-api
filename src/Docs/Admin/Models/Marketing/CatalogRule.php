<?php

namespace Webkul\RestApi\Docs\Admin\Models\Marketing;

/**
 * @OA\Schema(
 *     title="CatalogRule",
 *     description="CatalogRule model",
 * )
 */
class CatalogRule
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
     *     description="Catalog rule name",
     *     example="Off 10%"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Description",
     *     description="Catalog rule description",
     *     example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
     * )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     *     title="Starts From",
     *     description="Catalog rule will valid from this date",
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
     *     description="Catalog rule will valid till this date",
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
     *     description="Catalog rule status",
     *     example=1,
     *     enum={0,1}
     * )
     *
     * @var integer
     */
    private $status;

    /**
     * @OA\Property(
     *     title="Condition Type",
     *     description="Catalog rule condition type, i.e. `1` is used for `All Conditions are True` and `2` is for `Any Condition is True`",
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
     *     description="Catalog rule conditions",
     *     example={{
     *         "value": "1",
     *         "operator": "<=",
     *         "attribute": "product|price",
     *         "attribute_type": "price"
     *     }},
     *     @OA\Items(
     *          @OA\Property(property="value", type="string", example="1"),
     *          @OA\Property(property="operator", type="string", example="<="),
     *          @OA\Property(property="attribute", type="string", example="product|price"),
     *          @OA\Property(property="attribute_type", type="string", example="price")
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
     *     description="Catalog rule discount amount",
     *     example=10.50
     * )
     *
     * @var float
     */
    private $discount_amount;

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