<?php

namespace Webkul\RestApi\Docs\Admin\Models\Velocity;

/**
 * @OA\Schema(
 *     title="VelocityContent",
 *     description="VelocityContent model",
 * )
 */
class VelocityContent
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
     *     title="Title",
     *     description="Content's title",
     *     example="Summer Collection"
     * )
     *
     * @var string
     */
    private $title;

    /**
     * @OA\Property(
     *     title="Position",
     *     description="Content's position",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $position;

    /**
     * @OA\Property(
     *     title="Page Link",
     *     description="Content's page link i.e. `slug`",
     *     example="summer-collection"
     * )
     *
     * @var string
     */
    private $page_link;

    /**
     * @OA\Property(
     *     title="Link Target",
     *     description="Content's link target i.e. `0` for `Self` & `1` for `New Tab`",
     *     example=1,
     *     enum={0,1}
     * )
     *
     * @var integer
     */
    private $link_target;

    /**
     * @OA\Property(
     *     title="Content Type",
     *     description="Content's type i.e. `category`",
     *     example="category",
     *     enum={"category", "link", "product", "static"}
     * )
     *
     * @var string
     */
    private $content_type;

    /**
     * @OA\Property(
     *     title="Custom Title",
     *     description="Custom title for content page",
     *     example=null
     * )
     *
     * @var string
     */
    private $custom_title;

    /**
     * @OA\Property(
     *     title="Custom Heading",
     *     description="Custom heading for content page",
     *     example=null
     * )
     *
     * @var string
     */
    private $custom_heading;

    /**
     * @OA\Property(
     *     title="Catalog Type",
     *     description="Catalog Type for content page",
     *     example=null
     * )
     *
     * @var string
     */
    private $catalog_type;

    /**
     * @OA\Property(
     *     title="Products",
     *     description="Products for content page",
     *     example=null
     * )
     *
     * @var string
     */
    private $products;

    /**
     * @OA\Property(
     *     title="Description",
     *     description="Description for content page",
     *     example=null
     * )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="Content's status",
     *     example=1,
     *     enum={0,1}
     * )
     *
     * @var integer
     */
    private $status;

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
}