<?php

namespace Webkul\RestApi\Docs\Admin\Models\Sale;

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
     *     example=18.63,
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
     *      example=20.45
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
     *     example=37.26
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
     *      example=42.95
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
     *     example=20.45
     * )
     *
     * @var float
     */
    private $total_invoiced;

    /**
     * @OA\Property(
     *     title="Formatted Total Invoiced",
     *     description="Formatted total invoiced of ordered item",
     *     example="€20.45",
     * )
     *
     * @var string
     */
    private $formatted_total_invoiced;

    /**
     * @OA\Property(
     *     title="Total Base Invoiced",
     *     description="Total base invoiced amount of ordered item",
     *     example=42.95
     * )
     *
     * @var float
     */
    private $base_total_invoiced;

    /**
     * @OA\Property(
     *      title="Formatted Base Total Invoiced",
     *      description="Formatted base total invoiced of the Order Item",
     *      example="$42.95"
     * )
     *
     * @var string
     */
    private $formatted_base_total_invoiced;

    /**
     * @OA\Property(
     *     title="Amount Refunded",
     *     description="Total refunded amount of ordered item",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $amount_refunded;

    /**
     * @OA\Property(
     *     title="Formatted Amount Refunded",
     *     description="Formatted amount refunded of ordered item",
     *     example="€0.00",
     * )
     *
     * @var string
     */
    private $formatted_amount_refunded;

    /**
     * @OA\Property(
     *     title="Base Amount Refunded",
     *     description="Base amount refunded of ordered item",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $base_amount_refunded;

    /**
     * @OA\Property(
     *      title="Formatted Base Amount Refunded",
     *      description="Formatted base amount refunded of the Order Item",
     *      example="$42.95"
     * )
     *
     * @var string
     */
    private $formatted_base_amount_refunded;

    /**
     * @OA\Property(
     *     title="Discount Percent",
     *     description="Discount percentage that applied on order item",
     *     example=10.20
     * )
     *
     * @var float
     */
    private $discount_percent;

    /**
     * @OA\Property(
     *     title="Discount Amount",
     *     description="Discount amount of ordered item",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $discount_amount;

    /**
     * @OA\Property(
     *     title="Formatted Discount Amount",
     *     description="Formatted discount amount of ordered item",
     *     example="€0.00",
     * )
     *
     * @var string
     */
    private $formatted_discount_amount;

    /**
     * @OA\Property(
     *     title="Base Discount Amount",
     *     description="Base discount amount of ordered item",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $base_discount_amount;

    /**
     * @OA\Property(
     *      title="Formatted Base Discount Amount",
     *      description="Formatted base discount amount of the Order Item",
     *      example="$42.95"
     * )
     *
     * @var string
     */
    private $formatted_base_discount_amount;

    /**
     * @OA\Property(
     *     title="Discount Invoiced",
     *     description="Discount invoiced of ordered item",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $discount_invoiced;

    /**
     * @OA\Property(
     *     title="Formatted Discount Invoiced",
     *     description="Formatted discount invoiced of ordered item",
     *     example="€0.00",
     * )
     *
     * @var string
     */
    private $formatted_discount_invoiced;

    /**
     * @OA\Property(
     *     title="Base Discount Invoiced",
     *     description="Base discount invoiced of ordered item",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $base_discount_invoiced;

    /**
     * @OA\Property(
     *      title="Formatted Base Discount Invoiced",
     *      description="Formatted base discount invoiced of the Order Item",
     *      example="$42.95"
     * )
     *
     * @var string
     */
    private $formatted_base_discount_invoiced;

    /**
     * @OA\Property(
     *     title="Discount Refunded",
     *     description="Discount refunded of ordered item",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $discount_refunded;

    /**
     * @OA\Property(
     *     title="Formatted Discount refunded",
     *     description="Formatted discount refunded of ordered item",
     *     example="€0.00",
     * )
     *
     * @var string
     */
    private $formatted_discount_refunded;

    /**
     * @OA\Property(
     *     title="Base Discount Refunded",
     *     description="Base discount refunded of ordered item",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $base_discount_refunded;

    /**
     * @OA\Property(
     *      title="Formatted Base Discount Refunded",
     *      description="Formatted base discount refunded of the Order Item",
     *      example="$42.95"
     * )
     *
     * @var string
     */
    private $formatted_base_discount_refunded;

    /**
     * @OA\Property(
     *     title="Tax Percent",
     *     description="Tax percentage that applied on order item",
     *     example=10.20
     * )
     *
     * @var float
     */
    private $tax_percent;

    /**
     * @OA\Property(
     *     title="Tax Amount",
     *     description="Tax amount of ordered item",
     *     example=2.45
     * )
     *
     * @var float
     */
    private $tax_amount;

    /**
     * @OA\Property(
     *     title="Formatted Tax Amount",
     *     description="Formatted tax amount of ordered item",
     *     example="€0.00",
     * )
     *
     * @var string
     */
    private $formatted_tax_amount;

    /**
     * @OA\Property(
     *     title="Base Tax Amount",
     *     description="Base tax amount of ordered item",
     *     example=2.45
     * )
     *
     * @var float
     */
    private $base_tax_amount;

    /**
     * @OA\Property(
     *      title="Formatted Base Tax Amount",
     *      description="Formatted base tax amount of the Order Item",
     *      example="$42.95"
     * )
     *
     * @var string
     */
    private $formatted_base_tax_amount;

    /**
     * @OA\Property(
     *     title="Tax Amount Invoiced",
     *     description="Tax amount invoiced of ordered item",
     *     example=2.45
     * )
     *
     * @var float
     */
    private $tax_amount_invoiced;

    /**
     * @OA\Property(
     *     title="Formatted Tax Amount Invoiced",
     *     description="Formatted tax amount invoiced of ordered item",
     *     example="€0.00",
     * )
     *
     * @var string
     */
    private $formatted_tax_amount_invoiced;

    /**
     * @OA\Property(
     *     title="Base Tax Amount Invoiced",
     *     description="Base tax amount invoiced of ordered item",
     *     example=2.45
     * )
     *
     * @var float
     */
    private $base_tax_amount_invoiced;

    /**
     * @OA\Property(
     *      title="Formatted Base Tax Amount Invoiced",
     *      description="Formatted base tax amount invoiced of the Order Item",
     *      example="$42.95"
     * )
     *
     * @var string
     */
    private $formatted_base_tax_amount_invoiced;

    /**
     * @OA\Property(
     *     title="Tax Amount Refunded",
     *     description="Tax amount refunded of ordered item",
     *     example=2.45
     * )
     *
     * @var float
     */
    private $tax_amount_refunded;

    /**
     * @OA\Property(
     *     title="Formatted Tax Amount Refunded",
     *     description="Formatted tax amount refunded of ordered item",
     *     example="€0.00",
     * )
     *
     * @var string
     */
    private $formatted_tax_amount_refunded;

    /**
     * @OA\Property(
     *     title="Base Tax Amount Refunded",
     *     description="Base tax amount refunded of ordered item",
     *     example=2.45
     * )
     *
     * @var float
     */
    private $base_tax_amount_refunded;

    /**
     * @OA\Property(
     *      title="Formatted Base Tax Amount Refunded",
     *      description="Formatted base tax amount refunded of the Order Item",
     *      example="$42.95"
     * )
     *
     * @var string
     */
    private $formatted_base_tax_amount_refunded;

    /**
     * @OA\Property(
     *     title="Grand Total",
     *     description="Grand total of ordered item",
     *     example=2.45
     * )
     *
     * @var float
     */
    private $grant_total;

    /**
     * @OA\Property(
     *     title="Formatted Grand Total",
     *     description="Formatted grand total of ordered item",
     *     example="€0.00",
     * )
     *
     * @var string
     */
    private $formatted_grant_total;

    /**
     * @OA\Property(
     *     title="Base Grand Total",
     *     description="Base grand total of ordered item",
     *     example=2.45
     * )
     *
     * @var float
     */
    private $base_grant_total;

    /**
     * @OA\Property(
     *      title="Formatted Base Grand Total",
     *      description="Formatted base grand total of the Order Item",
     *      example="$42.95"
     * )
     *
     * @var string
     */
    private $formatted_base_grant_total;

    /**
     * @OA\Property(
     *      title="Additional",
     *      description="Additional information",
     *      type="object",
     *      example={
     *          "is_buy_now": "0",
     *          "product_id": "3",
     *          "quantity": 1,
     *          "locale": "en",
     *          "selected_configurable_option": "4",
     *          "attributes": {
     *              "size": {
     *                  "option_id": 8,
     *                  "option_label": "L",
     *                  "attribute_name": "Size"
     *              },
     *              "color": {
     *                  "option_id": 4,
     *                  "option_label": "Black",
     *                  "attribute_name": "Color"
     *              },
     *              {
     *                  "option_id": 0,
     *                  "option_label": "Link1, Link3",
     *                  "attribute_name": "Downloads"
     *              }
     *          },
     *          "super_attribute": {
     *              "4",
     *              "8"
     *          },
     *          "bundle_options": {
     *              {1},
     *              {3},
     *              {5},
     *              {7, 8}
     *          },
     *          "bundle_option_qty": {"2", "1", 1, 1}
     *      },
     *      @OA\Property(property="is_buy_now", type="integer", example=0, enum={0, 1}),
     *      @OA\Property(property="product_id", type="integer", example=1),
     *      @OA\Property(property="quantity", type="integer", example=5),
     *      @OA\Property(property="locale", type="string", example="en"),
     *      @OA\Property(property="selected_configurable_option", description="Only use with configurable type product", type="integer", example=4),
     *      @OA\Property(
     *          property="attributes",
     *          description="Only use with configurable type product",
     *          type="object",
     *          @OA\Property(
     *              property="size",
     *              type="object",
     *              example="Only use with configurable type product",
     *              @OA\Property(property="option_id", type="integer", example="8"),
     *              @OA\Property(property="option_label", type="string", example="L"),
     *              @OA\Property(property="attribute_name", type="string", example="Size")
     *          ),
     *          @OA\Property(
     *              property="color",
     *              type="object",
     *              example="Only use with configurable type product",
     *              @OA\Property(property="option_id", type="integer", example="4"),
     *              @OA\Property(property="option_label", type="string", example="Black"),
     *              @OA\Property(property="attribute_name", type="string", example="Color")
     *          )
     *      ),
     *      @OA\Property(
     *          property="super_attribute",
     *          type="array",
     *          @OA\Items(type="integer")
     *      ),
     *      @OA\Property(
     *          property="bundle_options",
     *          type="array",
     *          @OA\Items(
     *              type="array",
     *              @OA\Items(type="integer")
     *          )
     *      ),
     *      @OA\Property(
     *          property="bundle_option_qty",
     *          type="array",
     *          @OA\Items(type="integer")
     *      )
     * )
     *
     * @var object
     */
    private $additional;
    
    
    /**
     * @OA\Property(
     *     title="Child",
     *     description="Variant item",
     *     type="object",
     *     @OA\Property(ref="#/components/schemas/OrderItem")
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Sale\OrderItem
     */
    private $child;
    
    /**
     * @OA\Property(
     *     title="Children",
     *     description="Variant item",
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/OrderItem")
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Sale\OrderItem
     */
    private $children;
    
    /**
     * @OA\Property(
     *     title="Downloadable Links",
     *     description="Downloadable links related to ordered item i.e. only use with downloadable type product"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Sale\OrderDownloadableLink
     */
    private $downloadable_links;
    
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