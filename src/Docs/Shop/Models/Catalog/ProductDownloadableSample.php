<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog;

/**
 * @OA\Schema(
 *     title="ProductDownloadableSample",
 *     description="ProductDownloadableSample model, Only use with downloadable type product",
 * )
 */
class ProductDownloadableSample
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
     *     title="Title",
     *     description="Sample title",
     *     example="Sample One"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *     title="Downloadable Sample Translations",
     *     description="Translations for the downloadable sample"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductDownloadableSampleTranslation
     */
    public $translations;

    /**
     * @OA\Property(
     *     title="Type",
     *     description="Sample type",
     *     example="file",
     *     enum={"file", "url"}
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *     title="URL",
     *     description="Image URL, only use with type `url`",
     *     example="https://cdn.pixabay.com/photo/2018/04/26/16/31/marine-3352341_960_720.jpg"
     * )
     *
     * @var string
     */
    public $url;

    /**
     * @OA\Property(
     *     title="File",
     *     description="File's stored path, only use with type `file`",
     *     example="product_downloadable_links/{product_id}/{file_name.jpg}"
     * )
     *
     * @var string
     */
    public $file;

    /**
     * @OA\Property(
     *     title="File Name",
     *     description="Stored File's name, only use with type `file`",
     *     example="{file_name.jpg}"
     * )
     *
     * @var string
     */
    public $file_name;

    /**
     * @OA\Property(
     *     title="File URL",
     *     description="Stored file's URL, only use with type `file`",
     *     example="http://localhost/public/storage/product_downloadable_links/{product_id}/{file_name}.jpg"
     * )
     *
     * @var string
     */
    public $file_url;

    /**
     * @OA\Property(
     *     title="Download URL",
     *     description="Sample file download URL, only use if type is file",
     *     example="http://localhost/public/downloadable/download-sample/sample/{download_sample_id}"
     * )
     *
     * @var string
     */
    public $download_url;

    /**
     * @OA\Property(
     *     title="Sort Order",
     *     description="Sample sort order",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    public $sort_order;

    /**
     * @OA\Property(
     *     title="Product ID",
     *     description="Product ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    public $product_id;

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
