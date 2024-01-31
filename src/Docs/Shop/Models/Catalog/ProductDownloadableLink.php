<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog;

/**
 * @OA\Schema(
 *     title="ProductDownloadableLink",
 *     description="ProductDownloadableLink model, Only use with downloadable type product",
 * )
 */
class ProductDownloadableLink
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
     *     description="Link title",
     *     example="Link One"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *     title="Downloadable Link Translations",
     *     description="Translations for the downloadable link"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductDownloadableLinkTranslation
     */
    public $translations;

    /**
     * @OA\Property(
     *     title="Type",
     *     description="Link type",
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
     *     title="Price",
     *     description="Link's additional formatted price",
     *     example="$5.00"
     * )
     *
     * @var string
     */
    public $price;

    /**
     * @OA\Property(
     *     title="Sample Type",
     *     description="Sample type",
     *     example="file",
     *     enum={"file", "url"}
     * )
     *
     * @var string
     */
    public $sample_type;

    /**
     * @OA\Property(
     *     title="Sample URL",
     *     description="Sample link's URL, only use if sample_type is url",
     *     example="https://cdn.pixabay.com/photo/2018/04/26/16/31/marine-3352341_960_720.jpg"
     * )
     *
     * @var string
     */
    public $sample_url;

    /**
     * @OA\Property(
     *     title="Sample File",
     *     description="Sample file's path, only use if sample_type is file",
     *     example="product_downloadable_links/{product_id}/{sample_file_name}.jpg"
     * )
     *
     * @var string
     */
    public $sample_file;

    /**
     * @OA\Property(
     *     title="Sample File Name",
     *     description="Sample file name, only use if sample_type is file",
     *     example="{sample_file_name}.jpg"
     * )
     *
     * @var string
     */
    public $sample_file_name;

    /**
     * @OA\Property(
     *     title="Sample File URL",
     *     description="Sample file's URL, only use if sample_type is file",
     *     example="http://localhost/public/storage/product_downloadable_links/{product_id}/{file_name}.jpg"
     * )
     *
     * @var string
     */
    public $sample_file_url;

    /**
     * @OA\Property(
     *     title="Sample Download URL",
     *     description="Sample file download URL, only use if sample_type is file",
     *     example="http://localhost/public/downloadable/download-sample/link/{download_link_id}"
     * )
     *
     * @var string
     */
    public $sample_download_url;

    /**
     * @OA\Property(
     *     title="Downloads",
     *     description="Link file download count for customer",
     *     format="int64",
     *     example=10
     * )
     *
     * @var int
     */
    public $downloads;

    /**
     * @OA\Property(
     *     title="Sort Order",
     *     description="Link sort order",
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
