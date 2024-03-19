<?php

namespace Webkul\RestApi\Docs\Admin\Models\Marketing\SearchSEO;

/**
 * @OA\Schema(
 *     title="URLRewrite",
 *     description="URLRewrite model",
 * )
 */
class URLRewrite
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
     *     title="For",
     *     description="URLRewrite's For",
     *     example="category",
     *     type="string"
     * )
     *
     * @var string
     */
    private $entity_type;

    /**
     * @OA\Property(
     *     title="Requested Path",
     *     description="URLRewrite Requested Path",
     *     example="new-requested-path",
     *     type="string"
     * )
     *
     * @var string
     */
    private $request_path;

    /**
     * @OA\Property(
     *     title="Target Path",
     *     description="URLRewrite Target Path",
     *     example="target-path",
     *     type="string"
     * )
     *
     * @var string
     */
    private $target_path;

    /**
     * @OA\Property(
     *     title="Redirect Type",
     *     description="URLRewrite Redirect Type",
     *     example="302",
     *     type="integer",
     *     enum={302, 301}
     * )
     *
     * @var int
     */
    private $redirect_type;

    /**
     * @OA\Property(
     *     title="Locale",
     *     description="URLRewrite Locale",
     *     example="ar",
     *     type="string"
     * )
     *
     * @var string
     */
    private $locale;
}
