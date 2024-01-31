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
     * @var int
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
     * @var int
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
     * @var int
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
     * @var int
     */
    public $channel_id;
}
