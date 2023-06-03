<?php

namespace Webkul\RestApi\Docs\Admin\Models\Catalog;

/**
 * @OA\Schema(
 *     title="ProductFlat",
 *     description="ProductFlat model",
 * )
 */
class ProductFlat
{
    /**
     * @OA\Property(
     *     title="Short Description",
     *     description="Product's short description",
     *     example="What is Lorem Ipsum?"
     * )
     *
     * @var string
     */
    private $short_description;

    /**
     * @OA\Property(
     *     title="Description",
     *     description="Product's description",
     *     example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
     * )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Product name",
     *     example="Men T-Shirt"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="URL Key",
     *     description="Product URL key",
     *     example="men-t-shirt"
     * )
     *
     * @var string
     */
    private $url_key;
    
    /**
     * @OA\Property(
     *     title="Tax Category ID",
     *     description="Product's tax category ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $tax_category_id;

    /**
     * @OA\Property(
     *     title="New",
     *     description="Product's new status",
     *     example=1,
     *     enum={0,1}
     * )
     *
     * @var integer
     */
    private $new;

    /**
     * @OA\Property(
     *     title="Featured",
     *     description="Product's featured status",
     *     example=1,
     *     enum={0,1}
     * )
     *
     * @var integer
     */
    private $featured;

    /**
     * @OA\Property(
     *     title="Visible Individually",
     *     description="Product will show individually at store or not status",
     *     example=1,
     *     enum={0,1}
     * )
     *
     * @var integer
     */
    private $visible_individually;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="Product's status",
     *     example=1,
     *     enum={0,1}
     * )
     *
     * @var integer
     */
    private $status;

    /**
     * @OA\Property(
     *     title="Color",
     *     description="Color i.e. product's attribute(s) code",
     *     format="int64",
     *     example=4
     * )
     *
     * @var integer
     */
    private $color;

    /**
     * @OA\Property(
     *     title="Size",
     *     description="Size i.e. product's attribute(s) code",
     *     format="int64",
     *     example=8
     * )
     *
     * @var integer
     */
    private $size;

    /**
     * @OA\Property(
     *     title="Brand",
     *     description="Brand i.e. product's attribute(s) code",
     *     format="int64",
     *     example=null
     * )
     *
     * @var integer
     */
    private $brand;

    /**
     * @OA\Property(
     *     title="Guest Checkout",
     *     description="Guest can checkout with this product or not status",
     *     example=1,
     *     enum={0,1}
     * )
     *
     * @var integer
     */
    private $guest_checkout;

    /**
     * @OA\Property(
     *     title="Product Number",
     *     description="Product number",
     *     example="wfv-48"
     * )
     *
     * @var string
     */
    private $product_number;

    /**
     * @OA\Property(
     *     title="Meta Title",
     *     description="Product's meta title",
     *     example="Lorem Ipsum"
     * )
     *
     * @var string
     */
    private $meta_title;

    /**
     * @OA\Property(
     *     title="Meta Keywords",
     *     description="Product's meta keyword which helps in SEO",
     *     example="Lorem Ipsum"
     * )
     *
     * @var string
     */
    private $meta_keywords;

    /**
     * @OA\Property(
     *     title="Meta Description",
     *     description="Product's meta description",
     *     example="Lorem Ipsum is simply dummy"
     * )
     *
     * @var string
     */
    private $meta_description;

    /**
     * @OA\Property(
     *     title="Price",
     *     description="Product's price",
     *     example=12.20
     * )
     *
     * @var float
     */
    private $price;

    /**
     * @OA\Property(
     *     title="Cost",
     *     description="Product's cost price",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $cost;

    /**
     * @OA\Property(
     *     title="Special Price",
     *     description="Product's special price",
     *     example=10.00
     * )
     *
     * @var float
     */
    private $special_price;
    
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
    private $special_price_from;
    
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
    private $special_price_to;

    /**
     * @OA\Property(
     *     title="Length",
     *     description="Product's length",
     *     example=2.00
     * )
     *
     * @var float
     */
    private $length;

    /**
     * @OA\Property(
     *     title="Width",
     *     description="Product's width",
     *     example=5.25
     * )
     *
     * @var float
     */
    private $width;

    /**
     * @OA\Property(
     *     title="Height",
     *     description="Product's height",
     *     example=1.20
     * )
     *
     * @var float
     */
    private $height;

    /**
     * @OA\Property(
     *     title="Weight",
     *     description="Product's weight to calculate shipping charges",
     *     example=3.00
     * )
     *
     * @var float
     */
    private $weight;
}