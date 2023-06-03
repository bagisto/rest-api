<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog;

/**
 * @OA\Schema(
 *     title="AttributeGroup",
 *     description="AttributeGroup model",
 * )
 */
class AttributeGroup
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
     *     description="Attribute group's code",
     *     example=null
     * )
     *
     * @var string
     */
    public $code;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Attribute group's name",
     *     example="General"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="Swatch Type",
     *     description="Attribute group's swatch type",
     *     example=null
     * )
     *
     * @var integer
     */
    public $swatch_type;

    /**
     * @OA\Property(
     *     title="Attributes",
     *     description="Attributes"
     * )
     * 
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\Attribute
     */
    public $attributes;
    
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