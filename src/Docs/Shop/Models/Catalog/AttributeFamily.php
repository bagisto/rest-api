<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog;

/**
 * @OA\Schema(
 *     title="AttributeFamily",
 *     description="AttributeFamily model",
 * )
 */
class AttributeFamily
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
     *     description="Attribute family's code",
     *     example="default"
     * )
     *
     * @var string
     */
    public $code;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Attribute family's name",
     *     example="Default"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="Attribute family's status",
     *     example=0,
     *     enum={"0", "1"}
     * )
     *
     * @var integer
     */
    public $status;

    /**
     * @OA\Property(
     *     title="Groups",
     *     description="Attribute's groups"
     * )
     * 
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\AttributeGroup
     */
    public $groups;
    
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