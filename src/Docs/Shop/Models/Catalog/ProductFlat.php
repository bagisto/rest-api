<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog;

/**
 * @OA\Schema(
 *     title="ProductFlat",
 *     description="ProductFlat model, Use in case of variants, grouped_products.",
 * )
 */
class ProductFlat
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=2
     * )
     *
     * @var int
     */
    public $id;

    /**
     * @OA\Property(
     *     title="Type",
     *     description="Product type",
     *     enum={"simple", "configurable", "virtual", "grouped", "downloadable", "bundle"}
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *     title="Attribute Family ID",
     *     description="Product's attribute family ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    public $attribute_family_id;

    /**
     * @OA\Property(
     *     title="SKU",
     *     description="Product SKU",
     *     example="wooden-furniture-variant-4-8"
     * )
     *
     * @var string
     */
    public $sku;

    /**
     * @OA\Property(
     *     title="Product Number",
     *     description="Product number",
     *     example="wfv-48"
     * )
     *
     * @var string
     */
    public $product_number;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Product name",
     *     example="Black-L"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="URL Key",
     *     description="Product URL key",
     *     example="men-t-shirt"
     * )
     *
     * @var string
     */
    public $url_key;

    /**
     * @OA\Property(
     *     title="Tax Category ID",
     *     description="Product's tax category ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    public $tax_category_id;

    /**
     * @OA\Property(
     *     title="New",
     *     description="Product's new status",
     *     example=true
     * )
     *
     * @var bool
     */
    public $new;

    /**
     * @OA\Property(
     *     title="Featured",
     *     description="Product's featured status",
     *     example=false
     * )
     *
     * @var bool
     */
    public $featured;

    /**
     * @OA\Property(
     *     title="Visible Individually",
     *     description="Product will show individually at store or not status",
     *     example=true
     * )
     *
     * @var bool
     */
    public $visible_individually;

    /**
     * @OA\Property(
     *     title="Guest Checkout",
     *     description="Guest can checkout with this product or not status",
     *     example=true
     * )
     *
     * @var bool
     */
    public $guest_checkout;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="Product's status",
     *     example=true
     * )
     *
     * @var bool
     */
    public $status;

    /**
     * @OA\Property(
     *     title="Color",
     *     description="Color i.e. product's attribute(s) code",
     *     format="int64",
     *     example=4
     * )
     *
     * @var int
     */
    public $color;

    /**
     * @OA\Property(
     *     title="Size",
     *     description="Size i.e. product's attribute(s) code",
     *     format="int64",
     *     example=8
     * )
     *
     * @var int
     */
    public $size;

    /**
     * @OA\Property(
     *     title="Brand",
     *     description="Brand i.e. product's attribute(s) code",
     *     format="int64",
     *     example=null
     * )
     *
     * @var int
     */
    public $brand;

    /**
     * @OA\Property(
     *     title="Short Description",
     *     description="Product's short description",
     *     example="What is Lorem Ipsum?"
     * )
     *
     * @var string
     */
    public $short_description;

    /**
     * @OA\Property(
     *     title="Description",
     *     description="Product's description",
     *     example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     title="Meta Title",
     *     description="Product's meta title",
     *     example="Lorem Ipsum"
     * )
     *
     * @var string
     */
    public $meta_title;

    /**
     * @OA\Property(
     *     title="Meta Keywords",
     *     description="Product's meta keyword which helps in SEO",
     *     example="Lorem Ipsum"
     * )
     *
     * @var string
     */
    public $meta_keywords;

    /**
     * @OA\Property(
     *     title="Meta Description",
     *     description="Product's meta description",
     *     example="Lorem Ipsum is simply dummy"
     * )
     *
     * @var string
     */
    public $meta_description;

    /**
     * @OA\Property(
     *     title="Price",
     *     description="Product's price",
     *     example=12.20
     * )
     *
     * @var float
     */
    public $price;

    /**
     * @OA\Property(
     *     title="Cost",
     *     description="Product's cost price",
     *     example=0.00
     * )
     *
     * @var float
     */
    public $cost;

    /**
     * @OA\Property(
     *     title="Special Price",
     *     description="Product's special price",
     *     example=10.00
     * )
     *
     * @var float
     */
    public $special_price;

    /**
     * @OA\Property(
     *     title="Special Price From",
     *     description="Special price will start from which date",
     *     example="2023-05-16",
     *     format="date",
     *     type="string"
     * )
     *
     * @var \Date
     */
    public $special_price_from;

    /**
     * @OA\Property(
     *     title="Special Price To",
     *     description="Special price will end on which date",
     *     example="2023-11-24",
     *     format="date",
     *     type="string"
     * )
     *
     * @var \Date
     */
    public $special_price_to;

    /**
     * @OA\Property(
     *     title="Length",
     *     description="Product's length",
     *     example=2.00
     * )
     *
     * @var float
     */
    public $length;

    /**
     * @OA\Property(
     *     title="Width",
     *     description="Product's width",
     *     example=5.25
     * )
     *
     * @var float
     */
    public $width;

    /**
     * @OA\Property(
     *     title="Height",
     *     description="Product's height",
     *     example=1.20
     * )
     *
     * @var float
     */
    public $height;

    /**
     * @OA\Property(
     *     title="Weight",
     *     description="Product's weight to calculate shipping charges",
     *     example=3.00
     * )
     *
     * @var float
     */
    public $weight;

    /**
     * @OA\Property(
     *     title="Inventories",
     *     description="Product's inventories"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductInventory
     */
    public $inventories;

    /**
     * @OA\Property(
     *     title="Ordered Inventories",
     *     description="Product's ordered inventories"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductOrderedInventory
     */
    public $ordered_inventories;

    /**
     * @OA\Property(
     *     title="Customer Group Prices",
     *     description="Customer group price discount"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductCustomerGroupPrice
     */
    public $customer_group_prices;

    /**
     * @OA\Property(
     *     title="Attribute Values",
     *     description="Product's attribute values"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductAttributeValue
     */
    public $attribute_values;

    /**
     * @OA\Property(
     *     title="Additional",
     *     description="Product's additional information",
     *     example={}
     * )
     *
     * @var object
     */
    public $additional;

    /**
     * @OA\Property(
     *     title="Parent ID",
     *     description="Product's parent ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    public $parent_id;

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
     *     title="Qty",
     *     description="Grouped's product quantity, Only use with grouped type product.",
     *     example=1
     * )
     *
     * @var int
     */
    public $qty;

    /**
     * @OA\Property(
     *     title="Is Saleable",
     *     description="Is saleable status, Only use with grouped type product.",
     *     example=true
     * )
     *
     * @var bool
     */
    public $isSaleable;

    /**
     * @OA\Property(
     *     title="Formatted Price",
     *     description="Product's forrmated price, Only use with grouped type product.",
     *     example="$15.00"
     * )
     *
     * @var string
     */
    public $formatted_price;

    /**
     * @OA\Property(
     *     title="Show Quantity Changer",
     *     description="Use to show quantity change option at product view page, Only use with grouped type product.",
     *     example=true
     * )
     *
     * @var bool
     */
    public $show_quantity_changer;
}
