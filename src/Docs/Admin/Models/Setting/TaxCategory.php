<?php

namespace Webkul\RestApi\Docs\Admin\Models\Setting;

/**
 * @OA\Schema(
 *     title="TaxCategory",
 *     description="TaxCategory model",
 * )
 */
class TaxCategory
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
     *     title="Code",
     *     description="Tax Category's code",
     *     example="in-service-tax"
     * )
     *
     * @var string
     */
    private $code;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Tax Category's name",
     *     example="IN Service Tax"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Description",
     *     description="Tax Category's description",
     *     example="Service tax applied to all state of India"
     * )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     *     title="Rates",
     *     description="Tax rates belongs to Tax category",
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/TaxRate")
     * )
     *
     * @var array
     */
    private $rates;
    
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