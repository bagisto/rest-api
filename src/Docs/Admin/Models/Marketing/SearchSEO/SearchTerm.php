<?php

namespace Webkul\RestApi\Docs\Admin\Models\Marketing\SearchSEO;

/**
 * @OA\Schema(
 *     title="SearchTerm",
 *     description="SearchTerm model",
 * )
 */
class SearchTerm
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
     *     title="Term",
     *     description="SearchTerm's Term",
     *     type="string",
     *     example="Adorable"
     * 
     * )
     *
     * @var string
     */
    private $term;

    /**
     * @OA\Property(
     *     title="Redirect URL",
     *     description="SearchTerm Redirect URL",
     *     type="string",
     *     example="http://localhost/bagisto_2.x/public"
     * 
     * )
     *
     * @var string
     */

    private $redirect_url;

        /**
     * @OA\Property(
     *     title="Channel ID",
     *     description="SearchTerm Channel ID",
     *     type="integer",
     *     example="1"
     * )
     *
     * @var int
     */
    private $channel_id;

    /**
     * @OA\Property(
     *     title="Locale",
     *     description="SearchTerm Locale",
     *     type="string",
     *     example="ar",
     * )
     *
     * @var string
     */
    private $locale;
}
