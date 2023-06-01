<?php

namespace Webkul\RestApi\Docs\Admin\Models\Catalog;

/**
 * @OA\Schema(
 *     title="AttributeOption",
 *     description="AttributeOption model",
 * )
 */
class AttributeOption
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
     *     title="Admin Name",
     *     description="Option default admin name",
     *     example="Red"
     * )
     *
     * @var string
     */
    private $admin_name;

    /**
     * @OA\Property(
     *     title="Label",
     *     description="Option label, based on locale",
     *     example="Red"
     * )
     *
     * @var string
     */
    private $label;

    /**
     * @OA\Property(
     *     title="Swatch Value",
     *     description="Option's swatch type value",
     *     example=null
     * )
     *
     * @var string
     */
    private $swatch_value;
}