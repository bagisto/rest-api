<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog;

/**
 * @OA\Schema(
 *     title="ProductInventory",
 *     description="ProductInventory model",
 * )
 */
class ProductInventory
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
    protected $qty;

    /**
     * @OA\Property(
     *     title="Product ID",
     *     description="Inventry belongs to which product ID",
     *     format="int64",
     *     example=4
     * )
     *
     * @var integer
     */
    public $product_id;

    /**
     * @OA\Property(
     *     title="Inventory Source ID",
     *     description="Product inventry belongs to which inventory source",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public $inventory_source_id;

    /**
     * @OA\Property(
     *     title="Vendor ID",
     *     description="Product inventry belongs to which vendor ID",
     *     format="int64",
     *     example=0
     * )
     *
     * @var integer
     */
    public $vendor_id;
}