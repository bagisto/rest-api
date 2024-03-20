<?php

namespace Webkul\RestApi\Docs\Admin\Models\Catalog;

/**
 * @OA\Schema(
 *     title="Category",
 *     description="Category model",
 * )
 */
class Category
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
    private $id;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Category's name",
     *     example="Women Apparel"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Slug",
     *     description="Category's slug",
     *     example="women-apparel"
     * )
     *
     * @var string
     */
    private $slug;

    /**
     * @OA\Property(
     *     title="Display Mode",
     *     description="Category's content display mode",
     *     example="products_and_description",
     *     enum={"products_and_description", "products_only", "description_only"}
     * )
     *
     * @var string
     */
    private $display_mode;

    /**
     * @OA\Property(
     *     title="Description",
     *     description="Category's description",
     *     example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
     * )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     *     title="Meta Title",
     *     description="Category's meta title",
     *     example="Women Apparel"
     * )
     *
     * @var string
     */
    private $meta_title;

    /**
     * @OA\Property(
     *     title="Meta Description",
     *     description="Category's meta description",
     *     example="Women Apparel"
     * )
     *
     * @var string
     */
    private $meta_description;

    /**
     * @OA\Property(
     *     title="Meta Keywords",
     *     description="Category's meta keywords",
     *     example="Women Apparel"
     * )
     *
     * @var string
     */
    private $meta_keywords;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="Category's status",
     *     example=1,
     *     enum={0, 1}
     * )
     *
     * @var int
     */
    private $status;

    /**
     * @OA\Property(
     *     title="Banner URL",
     *     description="Category's Banner URL",
     *     example="http://localhost/private/storage/category/{category_id}/{image_name}.jpg"
     * )
     *
     * @var string
     */
    private $banner_path;

    /**
     * @OA\Property(
     *     title="Category Logo Path",
     *     description="Category's Logo path",
     *     example="http://localhost/private/storage/velocity/logo_path/{category_id}/{image_name}.png"
     * )
     *
     * @var string
     */
    private $logo_path;

    /**
     * @OA\Property(
     *     title="Additional",
     *     description="Category's additional information",
     *     example=null
     * )
     *
     * @var object
     */
    private $additional;

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
