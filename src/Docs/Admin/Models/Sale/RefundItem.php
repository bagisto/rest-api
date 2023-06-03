<?php

namespace Webkul\RestApi\Docs\Admin\Models\Sale;

/**
 * @OA\Schema(
 *     title="RefundItem",
 *     description="RefundItem model",
 * )
 */
class RefundItem
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
     *     description="Product name for ordered item",
     *     example="Wooden Chair"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Description",
     *     description="Product description",
     *     example=null
     * )
     *
     * @var string
     */
    private $description;
    
    /**
     * @OA\Property(
     *     title="SKU",
     *     description="Product SKU",
     *     example="wooden-chair"
     * )
     *
     * @var string
     */
    private $sku;

    /**
     * @OA\Property(
     *     title="Qty",
     *     description="Shipment qty",
     *     format="int64",
     *     example=2
     * )
     *
     * @var integer
     */
    private $qty;

    /**
     * @OA\Property(
     *      title="Price",
     *      description="Refund item price",
     *      example=9.13
     * )
     *
     * @var float
     */
    private $price;

    /**
     * @OA\Property(
     *      title="Formatted Price",
     *      description="Formatted price of refund's item",
     *      example="€9.13"
     * )
     *
     * @var string
     */
    private $formatted_price;

    /**
     * @OA\Property(
     *      title="Base Price",
     *      description="Refund's item base price",
     *      example=10.00
     * )
     *
     * @var float
     */
    private $base_price;

    /**
     * @OA\Property(
     *      title="Formatted Base Price",
     *      description="Formatted Base Price of the refund item",
     *      example="$10.00"
     * )
     *
     * @var string
     */
    private $formatted_based_price;

    /**
     * @OA\Property(
     *      title="Item Total",
     *      description="Refund item total",
     *      example=18.26
     * )
     *
     * @var float
     */
    private $total;

    /**
     * @OA\Property(
     *      title="Formatted Total",
     *      description="Formatted total of refund's item",
     *      example="€18.26"
     * )
     *
     * @var float
     */
    private $formatted_total;

    /**
     * @OA\Property(
     *      title="Base Total",
     *      description="Refund's item base total",
     *      example=20.00
     * )
     *
     * @var float
     */
    private $base_total;

    /**
     * @OA\Property(
     *      title="Formatted Base Total",
     *      description="Formatted base total of refund item",
     *      example="$20.00"
     * )
     *
     * @var string
     */
    private $formatted_based_total;

    /**
     * @OA\Property(
     *      title="Tax Amount",
     *      description="Tax Amount calculated at refund item price",
     *      example=0.00
     * )
     *
     * @var float
     */
    private $tax_amount;

    /**
     * @OA\Property(
     *      title="Formatted Tax Amount",
     *      description="Formatted tax amount calculated at refund item price",
     *      example="€0.00"
     * )
     *
     * @var string
     */
    private $formatted_tax_amount;

    /**
     * @OA\Property(
     *      title="Base Tax Amount",
     *      description="Base tax amount calculated at refund item price",
     *      example=0.00
     * )
     *
     * @var float
     */
    private $base_tax_amount;

    /**
     * @OA\Property(
     *      title="Formatted Base Tax Amount",
     *      description="Formatted base tax amount calculated at refund item price",
     *      example="$0.41"
     * )
     *
     * @var string
     */
    private $formatted_based_tax_amount;

    /**
     * @OA\Property(
     *     title="Discount Percent",
     *     description="Refunded discount percentage",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $discount_percent;

    /**
     * @OA\Property(
     *     title="Discount Amount",
     *     description="Refunded discount amount",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $discount_amount;

    /**
     * @OA\Property(
     *     title="Formatted Discount Amount",
     *     description="Refunded formatted discount amount",
     *     example="€0.00",
     * )
     *
     * @var string
     */
    private $formatted_discount_amount;

    /**
     * @OA\Property(
     *     title="Base Discount Amount",
     *     description="Refunded base discount amount",
     *     example=0.00
     * )
     *
     * @var float
     */
    private $base_discount_amount;

    /**
     * @OA\Property(
     *      title="Formatted Base Discount Amount",
     *      description="Refunded formatted base discount amount",
     *      example="$42.95"
     * )
     *
     * @var string
     */
    private $formatted_base_discount_amount;

    /**
     * @OA\Property(
     *      title="Grand Total",
     *      description="Grand total",
     *      example=0.00
     * )
     *
     * @var float
     */
    private $grand_total;

    /**
     * @OA\Property(
     *      title="Formatted Grand Total",
     *      description="Formatted grand total",
     *      example="€0.00"
     * )
     *
     * @var string
     */
    private $formatted_grand_total;

    /**
     * @OA\Property(
     *      title="Base Grand Total",
     *      description="Base grand total",
     *      example=0.00
     * )
     *
     * @var float
     */
    private $base_grand_total;

    /**
     * @OA\Property(
     *      title="Formatted Base Grand Total",
     *      description="Formatted base grand total",
     *      example="$0.00"
     * )
     *
     * @var string
     */
    private $formatted_based_grand_total;

    /**
     * @OA\Property(
     *     title="Additional",
     *     description="selected_configurable_option, super_attribute, and attributes fields will use in case of configurable type product.",
     *     type="array",
     *     example={
     *          "locale": "en",
     *          "quantity": 1,
     *          "product_id": 1,
     *          "parent_id": null,
     *          "selected_configurable_option": 2,
     *          "attributes": {
     *              "size": {
     *                  "option_id": 8,
     *                  "option_label": "L",
     *                  "attribute_name": "Size"
     *              },
     *              "color": {
     *                  "option_id": 5,
     *                  "option_label": "White",
     *                  "attribute_name": "Color"
     *              }
     *          },
     *          "super_attribute": {
     *              "5",
     *              "8"
     *          }
     *     },
     *     @OA\Items(
     *          @OA\Property(
     *              property="additional",
     *              type="array",
     *              @OA\Items(
     *                  @OA\Property(property="locale", type="string"),
     *                  @OA\Property(property="quantity", type="integer"),
     *                  @OA\Property(property="product_id", type="integer"),
     *                  @OA\Property(property="parent_id", type="integer"),
     *                  @OA\Property(property="selected_configurable_option", type="integer"),
     *                  @OA\Property(
     *                      property="attributes",
     *                      type="array",
     *                      @OA\Items(
     *                          @OA\Property(
     *                              property="size",
     *                              type="array",
     *                              @OA\Items(
     *                                  @OA\Property(property="option_id", type="integer"),
     *                                  @OA\Property(property="option_label", type="string"),
     *                                  @OA\Property(property="attribute_name", type="string")
     *                              )
     *                          ),
     *                          @OA\Property(
     *                              property="color",
     *                              type="array",
     *                              @OA\Items(
     *                                  @OA\Property(property="option_id", type="integer"),
     *                                  @OA\Property(property="option_label", type="string"),
     *                                  @OA\Property(property="attribute_name", type="string")
     *                              )
     *                          )
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="super_attribute",
     *                      type="array",
     *                      @OA\Items(type="integer")
     *                  )
     *              )
     *          )
     *     )
     * )
     *
     */
    private $additional;

    /**
     * @OA\Property(
     *     title="Child",
     *     description="Child of refund's item"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Sale\RefundItem
     */
    private $child;

    /**
     * @OA\Property(
     *     title="Children",
     *     description="Children of refund's item"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Sale\RefundItem
     */
    private $children;
}