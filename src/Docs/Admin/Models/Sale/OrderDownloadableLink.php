<?php

namespace Webkul\RestApi\Docs\Admin\Models\Sale;

/**
 * @OA\Schema(
 *     title="OrderDownloadableLink",
 *     description="OrderDownloadableLink model, Only use with downloadable type product",
 * )
 */
class OrderDownloadableLink
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
     *     title="Product Name",
     *     description="Product name",
     *     example="Downloadable Product"
     * )
     *
     * @var string
     */
    private $product_name;
    
    /**
     * @OA\Property(
     *     title="Name",
     *     description="Link name",
     *     example="Link One"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="URL",
     *     description="Image URL, only use with type `url`",
     *     example="https://cdn.pixabay.com/photo/2018/04/26/16/31/marine-3352341_960_720.jpg"
     * )
     *
     * @var string
     */
    private $url;

    /**
     * @OA\Property(
     *     title="File",
     *     description="File's stored path, only use with type `file`",
     *     example="product_downloadable_links/{product_id}/{file_name.jpg}"
     * )
     *
     * @var string
     */
    private $file;

    /**
     * @OA\Property(
     *     title="File Name",
     *     description="Stored File's name, only use with type `file`",
     *     example="{file_name.jpg}"
     * )
     *
     * @var string
     */
    private $file_name;

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
    private $type;

    /**
     * @OA\Property(
     *     title="Download Bought",
     *     description="Allowed total number of link downloads",
     *     format="int64",
     *     example=10
     * )
     *
     * @var integer
     */
    private $download_bought;

    /**
     * @OA\Property(
     *     title="Download Used",
     *     description="Link downloaded count by customer",
     *     format="int64",
     *     example=2
     * )
     *
     * @var integer
     */
    private $download_used;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="Order download status",
     *     example="pending"
     * )
     *
     * @var string
     */
    private $status;

    /**
     * @OA\Property(
     *     title="Customer ID",
     *     description="Customer ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $customer_id;
    
    /**
     * @OA\Property(
     *     title="Order ID",
     *     description="Order ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $order_id;

    /**
     * @OA\Property(
     *     title="Order Item ID",
     *     description="Order item ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $order_item_id;
    
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

    /**
     * @OA\Property(
     *     title="Download Canceled",
     *     description="Download canceled count",
     *     format="int64",
     *     example=2
     * )
     *
     * @var integer
     */
    private $download_canceled;
}