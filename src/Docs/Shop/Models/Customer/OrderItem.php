<?php

namespace Webkul\RestApi\Docs\Shop\Models\Customer;

/**
 * @OA\Schema(
 *     title="OrderItem",
 *     description="OrderItem model",
 * )
 */
class OrderItem
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
     *     description="SKU",
     *     example="men-round-neck-t-shirt"
     * )
     *
     * @var string
     */
    private $sku;
    
    /**
     * @OA\Property(
     *     title="Type",
     *     description="Product's type",
     *     example="simple"
     * )
     *
     * @var string
     */
    private $type;
    
    /**
     * @OA\Property(
     *     title="Name",
     *     description="Product name of ordered item",
     *     example="Men Round Neck T-Shirt"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Coupon Code",
     *     description="Cart coupon code",
     *     example="FLAT10%",
     * )
     *
     * @var string
     */
    private $coupon_code;

    /**
     * @OA\Property(
     *     title="Item's Weight",
     *     description="Product's weight of ordered item",
     *     example="10.20",
     * )
     *
     * @var float
     */
    private $weight;

    /**
     * @OA\Property(
     *     title="Ordered Quantity",
     *     description="Product ordered quantity",
     *     format="int64",
     *     example=6,
     * )
     *
     * @var integer
     */
    private $qty_ordered;

    /**
     * @OA\Property(
     *     title="Shipped Quantity",
     *     description="Total shipped quantity of ordered product",
     *     format="int64",
     *     example=2,
     * )
     *
     * @var integer
     */
    private $qty_shipped;

    /**
     * @OA\Property(
     *     title="Invoiced Quantity",
     *     description="Total invoiced quantity of ordered product",
     *     format="int64",
     *     example=4,
     * )
     *
     * @var integer
     */
    private $qty_invoiced;

    /**
     * @OA\Property(
     *     title="Canceled Quantity",
     *     description="Total canceled quantity of ordered product",
     *     format="int64",
     *     example=2,
     * )
     *
     * @var integer
     */
    private $qty_canceled;

    /**
     * @OA\Property(
     *     title="Refunded Quantity",
     *     description="Total refunded quantity of ordered product",
     *     format="int64",
     *     example=0,
     * )
     *
     * @var integer
     */
    private $qty_refunded;

    /**
     * @OA\Property(
     *     title="Ordered Item Price",
     *     description="Price of ordered item",
     *     example="18.63",
     * )
     *
     * @var float
     */
    private $price;

    /**
     * @OA\Property(
     *      title="Formatted Price",
     *      description="Formatted Price of the Order Item",
     *      example="€18.63"
     * )
     *
     * @var string
     */
    private $formatted_price;

    /**
     * @OA\Property(
     *      title="Base Price",
     *      description="Base price of the Order Item",
     *      example="20.45"
     * )
     *
     * @var float
     */
    private $base_price;

    /**
     * @OA\Property(
     *      title="Formatted Base Price",
     *      description="Formatted Base price of the Order Item",
     *      example="$20.45"
     * )
     *
     * @var string
     */
    private $formatted_base_price;

    /**
     * @OA\Property(
     *     title="Ordered Item Total",
     *     description="Total of ordered item",
     *     example="37.26",
     * )
     *
     * @var float
     */
    private $total;

    /**
     * @OA\Property(
     *     title="Formatted Ordered Item Total",
     *     description="Formatted total of ordered item",
     *     example="€37.26",
     * )
     *
     * @var string
     */
    private $formatted_total;

    /**
     * @OA\Property(
     *      title="Base Total",
     *      description="Base total of the Order Item",
     *      example="42.95"
     * )
     *
     * @var float
     */
    private $base_total;

    /**
     * @OA\Property(
     *      title="Formatted Base Total",
     *      description="Formatted base total of the Order Item",
     *      example="$42.95"
     * )
     *
     * @var string
     */
    private $formatted_base_total;

    /**
     * @OA\Property(
     *     title="Total Invoiced of Ordered Item",
     *     description="Total invoiced amount of ordered item",
     *     example="20.45",
     * )
     *
     * @var float
     */
    private $total_invoiced;

    /**
     * @OA\Property(
     *     title="Total Base Invoiced of Ordered Item",
     *     description="Total base invoiced amount of ordered item",
     *     example="$20.45",
     * )
     *
     * @var string
     */
    private $base_total_invoiced;

    /**
     * @OA\Property(
     *     title="Total Refunded Amount of Ordered Item",
     *     description="Total refunded amount of ordered item",
     *     example="20.45",
     * )
     *
     * @var float
     */
    private $amount_refunded;

    /**
     * @OA\Property(
     *     title="Total Base Refunded Amount of Ordered Item",
     *     description="Total base refunded amount of ordered item",
     *     example="$20.45",
     * )
     *
     * @var string
     */
    private $base_amount_refunded;

    /**
     * @OA\Property(
     *     title="Tax Percentage Applied On Ordered Item",
     *     description="Tax percentage that applied on order item",
     *     example="10%",
     * )
     *
     * @var float
     */
    private $tax_percent;

    /**
     * @OA\Property(
     *     title="Tax Amount of Ordered Item",
     *     description="Tax amount of ordered item",
     *     example="2.045",
     * )
     *
     * @var float
     */
    private $tax_amount;

    /**
     * @OA\Property(
     *     title="Base Tax Amount Of Ordered Item",
     *     description="Base tax amount of ordered item",
     *     example="$2.045",
     * )
     *
     * @var string
     */
    private $base_tax_amount;

    /**
     * @OA\Property(
     *     title="Product ID",
     *     description="Product ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $product_id;

    /**
     * @OA\Property(
     *     title="Product Type of Ordered Item",
     *     description="Product type of ordered item",
     *     example="simple",
     * )
     *
     * @var string
     */
    private $product_type;

    /**
     * @OA\Property(
     *     title="Order ID",
     *     description="Order ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $order_id;

    /**
     * @OA\Property(
     *     title="Parent ID of Product",
     *     description="Parent ID of Product",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $parent_id;

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