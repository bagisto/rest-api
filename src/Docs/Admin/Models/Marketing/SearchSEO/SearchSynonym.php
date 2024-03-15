<?php

namespace Webkul\RestApi\Docs\Admin\Models\Marketing\SearchSEO;

/**
 * @OA\Schema(
 *     title="SearchSynonym",
 *     description="SearchSynonym model",
 * )
 */
class SearchSynonym
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
     *     description="SearchSynonym's name",
     *     example="Shoes"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Terms",
     *     description="SearchSynonym's terms",
     *     example="Shoes, Boots"
     * )
     *
     * @var string
     */
    private $terms;
}
