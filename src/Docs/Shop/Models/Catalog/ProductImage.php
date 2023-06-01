<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog;

/**
 * @OA\Schema(
 *     title="ProductImage",
 *     description="ProductImage model",
 * )
 */
class ProductImage
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
     *     title="Type",
     *     description="Image type",
     *     enum={"images"}
     * )
     *
     * @var string
     */
    protected $type;

    /**
     * @OA\Property(
     *     title="Path",
     *     description="Image path",
     *     example="product/{product_id}/{image_name.jpg}"
     * )
     *
     * @var string
     */
    protected $path;

    /**
     * @OA\Property(
     *     title="URL",
     *     description="Image URL",
     *     example="http://localhost/public/storage/product/{product_id}/{image_name.jpg}"
     * )
     *
     * @var string
     */
    protected $url;

    /**
     * @OA\Property(
     *     title="original_image_url",
     *     description="Original image URL",
     *     example="http://localhost/public/storage/product/{product_id}/{image_name.jpg}"
     * )
     *
     * @var string
     */
    protected $original_image_url;

    /**
     * @OA\Property(
     *     title="small_image_url",
     *     description="Small image URL",
     *     example="http://localhost/public/cache/small/product/{product_id}/{image_name.jpg}"
     * )
     *
     * @var string
     */
    protected $small_image_url;

    /**
     * @OA\Property(
     *     title="medium_image_url",
     *     description="Medium image URL",
     *     example="http://localhost/public/cache/medium/product/{product_id}/{image_name.jpg}"
     * )
     *
     * @var string
     */
    protected $medium_image_url;

    /**
     * @OA\Property(
     *     title="large_image_url",
     *     description="Original image URL",
     *     example="http://localhost/public/cache/large/product/{product_id}/{image_name.jpg}"
     * )
     *
     * @var string
     */
    protected $large_image_url;

    /**
     * @OA\Property(
     *     title="Product ID",
     *     description="Product ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public $product_id;

    /**
     * @OA\Property(
     *     title="Position",
     *     description="Image position",
     *     format="int64",
     *     example=0
     * )
     *
     * @var integer
     */
    public $position;
}