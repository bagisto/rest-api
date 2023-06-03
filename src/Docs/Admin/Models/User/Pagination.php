<?php

namespace Webkul\RestApi\Docs\Admin\Models\User;

/**
 * @OA\Schema(
 *     title="Pagination",
 *     description="Pagination model",
 * )
 */
class Pagination
{
    /**
     * @OA\Property(
     *     title="Current Page",
     *     description="Current Page",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $current_page;

    /**
     * @OA\Property(
     *     title="From",
     *     description="From",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $from;

    /**
     * @OA\Property(
     *     title="Last Page",
     *     description="Last Page",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $last_page;

    /**
     * @OA\Property(
     *     title="Per Page",
     *     description="Per Page",
     *     format="int64",
     *     example=10
     * )
     *
     * @var integer
     */
    private $per_page;

    /**
     * @OA\Property(
     *     title="Links",
     *     description="Links",
     *     type="array",
     *     example={{
     *       "url": null,
     *       "label": "Previous",
     *       "active": false,
     *     }, {
     *       "url": "http://localhost/public/api/v1/examples?sort=id&order=desc&page=1",
     *       "label": "1",
     *       "active": true,
     *     }, {
     *       "url": null,
     *       "label": "Next",
     *       "active": false,
     *     }},
     *     @OA\Items(
     *          @OA\Property(
     *              property="url",
     *              type="string",
     *              example=null
     *          ),
     *          @OA\Property(
     *              property="label",
     *              type="string",
     *              example="Previous"
     *          ),
     *          @OA\Property(
     *              property="active",
     *              type="bool",
     *              example=false
     *          ),
     *     ),
     *     @OA\Items(
     *          @OA\Property(
     *              property="url",
     *              type="string",
     *              example="http://localhost/public/api/v1/examples?sort=id&order=desc&page=1"
     *          ),
     *          @OA\Property(
     *              property="label",
     *              type="string",
     *              example="1"
     *          ),
     *          @OA\Property(
     *              property="active",
     *              type="bool",
     *              example=true
     *          ),
     *     ),
     *     @OA\Items(
     *          @OA\Property(
     *              property="url",
     *              type="string",
     *              example=null
     *          ),
     *          @OA\Property(
     *              property="label",
     *              type="string",
     *              example="Next"
     *          ),
     *          @OA\Property(
     *              property="active",
     *              type="bool",
     *              example=false
     *          ),
     *     )
     * )
     */
    private $links;

    /**
     * @OA\Property(
     *     title="Path",
     *     description="Path",
     *     example="http://localhost/public/api/v1/examples"
     * )
     *
     * @var integer
     */
    private $path;

    /**
     * @OA\Property(
     *     title="To",
     *     description="To",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $to;

    /**
     * @OA\Property(
     *     title="Total",
     *     description="Total",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $total;
}