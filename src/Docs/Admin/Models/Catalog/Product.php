<?php

namespace Webkul\RestApi\Docs\Admin\Models\Catalog;

/**
 * @OA\Schema(
 *     title="Product",
 *     description="Product model",
 * )
 */
class Product
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
     *     title="SKU",
     *     description="Product SKU",
     *     example="men-t-shirt"
     * )
     *
     * @var string
     */
    private $sku;

    /**
     * @OA\Property(
     *     title="Type",
     *     description="Product type",
     *     enum={"simple", "configurable", "virtual", "grouped", "downloadable", "bundle", "booking"}
     * )
     *
     * @var string
     */
    private $type;
    
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

    /**
     * @OA\Property(
     *     title="Parent ID",
     *     description="Parent ID, Use in case of child product",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $parent_id;

    /**
     * @OA\Property(
     *     title="Attribute Family ID",
     *     description="Attribute family ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $attribute_family_id;

    /**
     * @OA\Property(
     *     title="Additional",
     *     description="Additional",
     *     example=null
     * )
     *
     * @var string
     */
    private $additional;

    /**
     * @OA\Property(
     *     title="Attribute Values",
     *     description="Product's attribute values",
     *     type="object",
     *     ref="#/components/schemas/AttributeFamily"
     * )
     * 
     * @var object
     */
    private $attribute_family;

    /**
     * @OA\Property(
     *     title="Attribute Values",
     *     description="Product's attribute values",
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/ProductAttributeValue")
     * )
     * 
     * @var array
     */
    private $attribute_values;

    /**
     * @OA\Property(
     *     title="Customer Group Prices",
     *     description="Customer group price discount",
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/ProductCustomerGroupPrice")
     * )
     * 
     * @var array
     */
    private $customer_group_prices;

    /**
     * @OA\Property(
     *     title="Images",
     *     description="Product's images",
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/ProductImage")
     * )
     *
     * @var array
     */
    private $images;

    /**
     * @OA\Property(
     *     title="Videos",
     *     description="Product's videos",
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/ProductVideo")
     * )
     *
     * @var array
     */
    private $videos;
}