<?php

namespace Webkul\RestApi\Docs\Shop\Models\Core;

/**
 * @OA\Schema(
 *     title="Config",
 *     description="Config model",
 * )
 */
class Config
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
     *     title="Code",
     *     description="Core field code",
     *     format="string",
     *     example="general.general.locale_options.weight_unit"
     * )
     *
     * @var string
     */
    public $code;

    /**
     * @OA\Property(
     *     title="Value",
     *     description="Core field value",
     *     format="string",
     *     example="lbs"
     * )
     *
     * @var string
     */
    public $value;

    /**
     * @OA\Property(
     *     title="Channel Code",
     *     description="Channel code",
     *     format="string",
     *     example="default"
     * )
     *
     * @var string
     */
    public $channel_code;

    /**
     * @OA\Property(
     *     title="Locale Code",
     *     description="Locale code",
     *     format="string",
     *     example="en"
     * )
     *
     * @var string
     */
    public $locale_code;

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
