<?php

namespace Webkul\RestApi\Docs\Admin\Models\Setting;

/**
 * @OA\Schema(
 *     title="TaxRate",
 *     description="TaxRate model",
 * )
 */
class TaxRate
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
     *     title="Identifier",
     *     description="Tax rate's identifier",
     *     example="State Service Tax"
     * )
     *
     * @var string
     */
    private $identifier;

    /**
     * @OA\Property(
     *     title="Is Zip",
     *     description="Is zip range or fixed, i.e 0 = fixed, 1 = zip range",
     *     example=0,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $is_zip;

    /**
     * @OA\Property(
     *     title="Zip Code",
     *     description="Zip code only use if `is_zip` set to `0`",
     *     example="23454"
     * )
     *
     * @var string
     */
    private $zip_code;

    /**
     * @OA\Property(
     *     title="Zip From",
     *     description="Zip from",
     *     example="201100"
     * )
     *
     * @var string
     */
    private $zip_from;

    /**
     * @OA\Property(
     *     title="Zip To",
     *     description="Zip to",
     *     example="201900"
     * )
     *
     * @var string
     */
    private $zip_to;

    /**
     * @OA\Property(
     *     title="State",
     *     description="State code i.e. if want to apply on all state left it blank",
     *     example="UP"
     * )
     *
     * @var string
     */
    private $state;

    /**
     * @OA\Property(
     *     title="Country",
     *     description="Country code",
     *     example="IN"
     * )
     *
     * @var string
     */
    private $country;

    /**
     * @OA\Property(
     *     title="Tax Rate",
     *     description="Tax Rate",
     *     format="int64",
     *     example=1.2
     * )
     *
     * @var float
     */
    private $tax_rate;
    
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
}