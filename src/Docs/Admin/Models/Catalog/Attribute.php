<?php

namespace Webkul\RestApi\Docs\Admin\Models\Catalog;

/**
 * @OA\Schema(
 *     title="Attribute",
 *     description="Attribute model",
 * )
 */
class Attribute
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
     *     title="Name",
     *     description="Attribute name, based on locale",
     *     example="Color"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Admin Name",
     *     description="Attribute default admin name",
     *     example="Color"
     * )
     *
     * @var string
     */
    private $admin_name;

    /**
     * @OA\Property(
     *     title="Code",
     *     description="Attribute unique code",
     *     example="color"
     * )
     *
     * @var string
     */
    private $code;

    /**
     * @OA\Property(
     *     title="Type",
     *     description="Attribute type",
     *     example="select",
     *     enum={"text", "textarea", "price", "boolean", "select", "multiselect", "datetime", "date", "image", "file", "checkbox"}
     * )
     *
     * @var string
     */
    private $type;

    /**
     * @OA\Property(
     *     title="Swatch Type",
     *     description="Attribute swatch type, only use with select type attribute",
     *     example="dropdown",
     *     enum={"dropdown", "color", "image", "text"}
     * )
     *
     * @var string
     */
    private $swatch_type;

    /**
     * @OA\Property(
     *     title="Options",
     *     description="Attribute's options",
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/AttributeOption")
     * )
     * 
     * @var array
     */
    private $options;

    /**
     * @OA\Property(
     *     title="Validation",
     *     description="Attribute validation, only use with text type attribute",
     *     example="email",
     *     enum={"numeric", "email", "decimal", "url"}
     * )
     *
     * @var string
     */
    private $validation;

    /**
     * @OA\Property(
     *     title="Position",
     *     description="Attribute's position",
     *     example=1
     * )
     *
     * @var integer
     */
    private $position;

    /**
     * @OA\Property(
     *     title="Is Comparable",
     *     description="Can use this attribute as comparable or not",
     *     example=1,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $is_comparable;

    /**
     * @OA\Property(
     *     title="Is Configurable",
     *     description="Can use this attribute as configurable or not",
     *     example=1,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $is_configurable;

    /**
     * @OA\Property(
     *     title="Is Required",
     *     description="This attribute will be use as required or not",
     *     example=0,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $is_required;

    /**
     * @OA\Property(
     *     title="Is Unique",
     *     description="This attribute will be use as unique or not",
     *     example=0,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $is_unique;

    /**
     * @OA\Property(
     *     title="Is Filterable",
     *     description="This attribute will be use in category's filter or not",
     *     example=0,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $is_filterable;

    /**
     * @OA\Property(
     *     title="Is User Define",
     *     description="This attribute is user define or system define",
     *     example=0,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $is_user_defined;

    /**
     * @OA\Property(
     *     title="Is Visible On Front",
     *     description="This attribute will visible on product view page or not",
     *     example=1,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $is_visible_on_front;

    /**
     * @OA\Property(
     *     title="Use In Flat",
     *     description="Entry of this attribute will record in Flat table or not",
     *     example=0,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $use_in_flat;

    /**
     * @OA\Property(
     *     title="Value Per Locale",
     *     description="This attribute will use with multi-locale or not",
     *     example=0,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $value_per_locale;

    /**
     * @OA\Property(
     *     title="Value Per Channel",
     *     description="This attribute will use with multi-channel or not",
     *     example=0,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $value_per_channel;
    
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