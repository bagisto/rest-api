<?php

namespace Webkul\RestApi\Docs\Admin\Models\Settings;

/**
 * @OA\Schema(
 *     title="Theme",
 *     description="Theme model",
 * )
 */
class Theme
{
    /**
     * @OA\Property(
     *     property="locale",
     *     type="string",
     *     description="Locale code",
     *     example="en"
     * )
     *
     * @var string
     */
    public $locale;

    /**
     * @OA\Property(
     *     property="en",
     *     description="English locale options",
     *     @OA\Property(
     *         property="options",
     *         description="Theme options",
     *         @OA\Property(
     *             property="images",
     *             type="array",
     *             description="Image carousel images",
     *
     *             @OA\Items(
     *
     *                 @OA\Property(
     *                     property="link",
     *                     type="string",
     *                     description="Image link",
     *                     example="test1"
     *                 ),
     *                 @OA\Property(
     *                     property="image",
     *                     type="string",
     *                     description="Image path",
     *                     example="storage/theme/1/1.webp"
     *                 )
     *             )
     *         )
     *     )
     * )
     *
     * @var array
     */
    public $en;

    /**
     * @OA\Property(
     *     property="type",
     *     type="string",
     *     description="Type of the theme",
     *     example="image_carousel"
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *     property="name",
     *     type="string",
     *     description="Name of the theme",
     *     example="Image Carousel"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     property="sort_order",
     *     type="integer",
     *     description="Sort order of the theme",
     *     example=12
     * )
     *
     * @var int
     */
    public $sort_order;

    /**
     * @OA\Property(
     *     property="channel_id",
     *     type="string",
     *     description="Channel ID",
     *     example="1"
     * )
     *
     * @var string
     */
    public $channel_id;

    /**
     * @OA\Property(
     *     property="status",
     *     type="string",
     *     description="Status of the theme",
     *     example="on"
     * )
     *
     * @var string
     */
    public $status;
}
