<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog;

/**
 * @OA\Schema(
 *     title="ProductDownloadableLinkTranslation",
 *     description="ProductDownloadableLinkTranslation model",
 * )
 */
class ProductDownloadableLinkTranslation
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
     *     title="Locale",
     *     description="Locale code",
     *     example="en"
     * )
     *
     * @var string
     */
    protected $locale;

    /**
     * @OA\Property(
     *     title="Title",
     *     description="Link title based on the locale",
     *     example="Link One"
     * )
     *
     * @var string
     */
    protected $title;

    /**
     * @OA\Property(
     *     title="Product Downloadable Link ID",
     *     description="Downloadable product's link ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    public $product_downloadable_link_id;
}
