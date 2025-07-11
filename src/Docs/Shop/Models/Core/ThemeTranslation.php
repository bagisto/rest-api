<?php

declare(strict_types=1);

namespace Webkul\RestApi\Docs\Shop\Models\Core;

/**
 * @OA\Schema(
 *     title="ThemeTranslation",
 *     description="Theme translation model"
 * )
 */
final class ThemeTranslation
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=2
     * )
     *
     * @var int
     */
    public $id;

    /**
     * @OA\Property(
     *     title="Theme Customization ID",
     *     description="ID of the related theme customization",
     *     format="int64",
     *     example=2
     * )
     *
     * @var int
     */
    public $theme_customization_id;

    /**
     * @OA\Property(
     *     title="Locale",
     *     description="Locale code",
     *     type="string",
     *     example="en"
     * )
     *
     * @var string
     */
    public $locale;

    /**
     * @OA\Property(
     *     title="Options",
     *     description="Variable structure depending on theme type",
     *     additionalProperties=true,
     *     type="object",
     *     oneOf={
     *         @OA\Schema(
     *             title="Image Carousel Options",
     *             @OA\Property(
     *                 property="images",
     *                 type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="link", type="string"),
     *                     @OA\Property(property="image", type="string"),
     *                     @OA\Property(property="title", type="string")
     *                 )
     *             )
     *         ),
     *         @OA\Schema(
     *             title="Static Content Options",
     *             @OA\Property(property="css", type="string"),
     *             @OA\Property(property="html", type="string")
     *         ),
     *         @OA\Schema(
     *             title="Category Carousel Options",
     *             @OA\Property(
     *                 property="filters",
     *                 type="object",
     *                 @OA\Property(property="sort", type="string"),
     *                 @OA\Property(property="limit", type="integer"),
     *                 @OA\Property(property="parent_id", type="integer")
     *             )
     *         ),
     *         @OA\Schema(
     *             title="Product Carousel Options",
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(
     *                 property="filters",
     *                 type="object",
     *                 @OA\Property(property="new", type="integer"),
     *                 @OA\Property(property="sort", type="string"),
     *                 @OA\Property(property="limit", type="integer")
     *             )
     *         ),
     *         @OA\Schema(
     *             title="Footer Links Options",
     *             @OA\Property(
     *                 property="column_1",
     *                 type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="url", type="string"),
     *                     @OA\Property(property="title", type="string"),
     *                     @OA\Property(property="sort_order", type="integer")
     *                 )
     *             ),
     *             @OA\Property(
     *                 property="column_2",
     *                 type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="url", type="string"),
     *                     @OA\Property(property="title", type="string"),
     *                     @OA\Property(property="sort_order", type="integer")
     *                 )
     *             )
     *         ),
     *         @OA\Schema(
     *             title="Services Content Options",
     *             @OA\Property(
     *                 property="services",
     *                 type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="title", type="string"),
     *                     @OA\Property(property="description", type="string"),
     *                     @OA\Property(property="service_icon", type="string")
     *                 )
     *             )
     *         )
     *     }
     * )
     *
     * @var array
     */
    public $options;
}