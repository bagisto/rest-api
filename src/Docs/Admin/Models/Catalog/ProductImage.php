<?php

namespace Webkul\RestApi\Docs\Admin\Models\Catalog;

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
    private $id;

    /**
     * @OA\Property(
     *     title="Type",
     *     description="Image type",
     *     enum={"images"}
     * )
     *
     * @var string
     */
    private $type;

    /**
     * @OA\Property(
     *     title="Path",
     *     description="Image path",
     *     example="product/{product_id}/{image_name.jpg}"
     * )
     *
     * @var string
     */
    private $path;

    /**
     * @OA\Property(
     *     title="URL",
     *     description="Image URL",
     *     example="http://localhost/public/storage/product/{product_id}/{image_name.jpg}"
     * )
     *
     * @var string
     */
    private $url;

    /**
     * @OA\Property(
     *     title="original_image_url",
     *     description="Original image URL",
     *     example="http://localhost/public/storage/product/{product_id}/{image_name.jpg}"
     * )
     *
     * @var string
     */
    private $original_image_url;

    /**
     * @OA\Property(
     *     title="small_image_url",
     *     description="Small image URL",
     *     example="http://localhost/public/cache/small/product/{product_id}/{image_name.jpg}"
     * )
     *
     * @var string
     */
    private $small_image_url;

    /**
     * @OA\Property(
     *     title="medium_image_url",
     *     description="Medium image URL",
     *     example="http://localhost/public/cache/medium/product/{product_id}/{image_name.jpg}"
     * )
     *
     * @var string
     */
    private $medium_image_url;

    /**
     * @OA\Property(
     *     title="large_image_url",
     *     description="Original image URL",
     *     example="http://localhost/public/cache/large/product/{product_id}/{image_name.jpg}"
     * )
     *
     * @var string
     */
    private $large_image_url;

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
    private $product_id;

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
    private $position;
}