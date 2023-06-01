<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog;

/**
 * @OA\Schema(
 *     title="ProductCustomerGroupPrice",
 *     description="ProductCustomerGroupPrice model",
 * )
 */
class ProductCustomerGroupPrice
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
    public $id;

    /**
     * @OA\Property(
     *     title="Qty",
     *     description="Product quantity",
     *     format="int64",
     *     example=150
     * )
     *
     * @var integer
     */
    public $qty;

    /**
     * @OA\Property(
     *     title="Value Type",
     *     description="Discount type unit",
     *     enum={"fixed", "discount"}
     * )
     *
     * @var string
     */
    public $value_type;

    /**
     * @OA\Property(
     *     title="value",
     *     description="Discount amount",
     *     format="int64",
     *     example=5.20
     * )
     *
     * @var float
     */
    public $value;
    
    /**
     * @OA\Property(
     *     title="Product ID",
     *     description="Product's ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public $product_id;
    
    /**
     * @OA\Property(
     *     title="Customer Group ID",
     *     description="Entry belongs to which customer group ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public $customer_group_id;
    
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
    public $created_at;

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
    public $updated_at;
}