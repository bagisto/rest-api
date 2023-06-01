<?php

namespace Webkul\RestApi\Docs\Admin\Models\Setting;

/**
 * @OA\Schema(
 *     title="Locale",
 *     description="Locale model",
 * )
 */
class Locale
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
     *     title="Code",
     *     description="Locale code",
     *     example="en"
     * )
     *
     * @var string
     */
    private $code;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Locale name",
     *     example="English"
     * )
     *
     * @var string
     */
    private $name;

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
     *     title="Direction",
     *     description="Locale direction",
     *     enum={"ltr", "rtl"}
     * )
     *
     * @var string
     */
    private $direction;

    /**
     * @OA\Property(
     *     title="Image",
     *     description="Locale image",
     *     example="settings/locale-images/1/image_name.jpg"
     * )
     *
     * @var string
     */
    private $locale_image;
}