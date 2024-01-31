<?php

namespace Webkul\RestApi\Docs\Shop\Models\Core;

/**
 * @OA\Schema(
 *     title="CountryStateTranslation",
 *     description="CountryStateTranslation model",
 * )
 */
class CountryStateTranslation
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
    public $locale;

    /**
     * @OA\Property(
     *     title="Default Name",
     *     description="State default name",
     *     example="Uttar Pradesh"
     * )
     *
     * @var string
     */
    public $default_name;

    /**
     * @OA\Property(
     *     title="Country's State ID",
     *     description="Country's state ID",
     *     format="int64",
     *     example=106
     * )
     *
     * @var int
     */
    public $country_state_id;
}
