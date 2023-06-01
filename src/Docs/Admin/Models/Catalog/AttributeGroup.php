<?php

namespace Webkul\RestApi\Docs\Admin\Models\Catalog;

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
    private $id;

    /**
     * @OA\Property(
     *     title="Code",
     *     description="Attribute group's code",
     *     example=null
     * )
     *
     * @var string
     */
    private $code;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Attribute group's name",
     *     example="General"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Swatch Type",
     *     description="Attribute group's swatch type",
     *     example=null
     * )
     *
     * @var integer
     */
    private $swatch_type;

    /**
     * @OA\Property(
     *     title="Attributes",
     *     description="Attributes",
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/Attribute")
     * )
     * 
     * @var array
     */
    private $attributes;
    
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