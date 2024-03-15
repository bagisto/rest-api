<?php

namespace Webkul\RestApi\Docs\Admin\Models\Marketing\SearchSEO;

/**
 * @OA\Schema(
 *     title="SearchSynonym",
 *     description="SearchSynonym model",
 * )
 */
class Sitemaps
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
     *     title="FileName",
     *     description="Sitemaps's File Name",
     *     example="site.xml"
     * )
     *
     * @var string
     */
    private $file_name;

    /**
     * @OA\Property(
     *     title="Path",
     *     description="Sitemaps Path",
     *     example="/sitemap/"
     * )
     *
     * @var string
     */
    private $path;
}
