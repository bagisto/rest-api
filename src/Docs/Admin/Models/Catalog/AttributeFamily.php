<?php

namespace Webkul\RestApi\Docs\Admin\Models\Catalog;

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
    private $id;

    /**
     * @OA\Property(
     *     title="Code",
     *     description="Attribute family's code",
     *     example="default"
     * )
     *
     * @var string
     */
    private $code;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Attribute family's name",
     *     example="Default"
     * )
     *
     * @var string
     */
    private $name;

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
    private $status;

    /**
     * @OA\Property(
     *     title="Groups",
     *     description="Attribute's groups",
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/AttributeGroup")
     * )
     * 
     * @var array
     */
    private $groups;
    
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