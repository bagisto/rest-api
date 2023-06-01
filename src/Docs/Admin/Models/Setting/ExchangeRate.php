<?php

namespace Webkul\RestApi\Docs\Admin\Models\Setting;

/**
 * @OA\Schema(
 *     title="Currency",
 *     description="Currency model",
 * )
 */
class ExchangeRate
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
     *     title="Rate",
     *     description="Conversion rate",
     *     example=0.91
     * )
     *
     * @var float
     */
    public $rate;

    /**
     * @OA\Property(
     *     title="Target Currency ID",
     *     description="Target currency ID",
     *     example=1
     * )
     *
     * @var string
     */
    public $target_currency_id;

    /**
     * @OA\Property(
     *     title="Target Currency",
     *     description="Target currency"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Setting\Currency
     */
    public $target_currency;

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

    /**
     * @OA\Property(
     *     title="Symbol",
     *     description="Currency symbol",
     *     example="$"
     * )
     *
     * @var string
     */
    public $symbol;
}