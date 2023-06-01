<?php

namespace Webkul\RestApi\Docs\Admin\Models\Setting;

/**
 * @OA\Schema(
 *     title="Currency",
 *     description="Currency model",
 * )
 */
class Currency
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
    public $id;

    /**
     * @OA\Property(
     *     title="Code",
     *     description="Currency code",
     *     example="EUR"
     * )
     *
     * @var string
     */
    public $code;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Currency name",
     *     example="Euro"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="Symbol",
     *     description="Currency symbol",
     *     example="€"
     * )
     *
     * @var string
     */
    public $symbol;

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