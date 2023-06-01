<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog;

/**
 * @OA\Schema(
 *     title="ProductOrderedInventory",
 *     description="ProductOrderedInventory model",
 * )
 */
class ProductOrderedInventory
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
     *     title="Channel ID",
     *     description="Channel id from which channel order placed.",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public $channel_id;
}