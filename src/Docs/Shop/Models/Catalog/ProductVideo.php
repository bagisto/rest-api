<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog;

/**
 * @OA\Schema(
 *     title="ProductVideo",
 *     description="ProductVideo model",
 * )
 */
class ProductVideo
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
     *     title="Type",
     *     description="Video type",
     *     enum={"videos"}
     * )
     *
     * @var string
     */
    protected $type;

    /**
     * @OA\Property(
     *     title="Path",
     *     description="Video path",
     *     example="product/{product_id}/{video_name.jpg}"
     * )
     *
     * @var string
     */
    protected $path;

    /**
     * @OA\Property(
     *     title="URL",
     *     description="Video URL",
     *     example="http://localhost/public/storage/product/{product_id}/{video_name.jpg}"
     * )
     *
     * @var string
     */
    protected $url;
}
