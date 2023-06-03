<?php

namespace Webkul\RestApi\Docs\Admin\Models\Sale;

/**
 * @OA\Schema(
 *     title="InvoiceItem",
 *     description="InvoiceItem model",
 * )
 */
class InvoiceItem
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
     *     description="Invoiced qty",
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
     *      description="Invoice item price",
     *      example=9.13
     * )
     *
     * @var float
     */
    private $price;

    /**
     * @OA\Property(
     *      title="Formatted Price",
     *      description="Formatted price of invoice's item",
     *      example="€9.13"
     * )
     *
     * @var string
     */
    private $formatted_price;

    /**
     * @OA\Property(
     *      title="Base Price",
     *      description="Invoice's item base price",
     *      example=10.00
     * )
     *
     * @var float
     */
    private $base_price;

    /**
     * @OA\Property(
     *      title="Formatted Base Price",
     *      description="Formatted Base Price of the invoice item",
     *      example="$10.00"
     * )
     *
     * @var string
     */
    private $formatted_based_price;

    /**
     * @OA\Property(
     *      title="Item Total",
     *      description="Invoice item total",
     *      example=18.26
     * )
     *
     * @var float
     */
    private $total;

    /**
     * @OA\Property(
     *      title="Formatted Total",
     *      description="Formatted total of invoice's item",
     *      example="€18.26"
     * )
     *
     * @var float
     */
    private $formatted_total;

    /**
     * @OA\Property(
     *      title="Base Total",
     *      description="Invoice's item base total",
     *      example=20.00
     * )
     *
     * @var float
     */
    private $base_total;

    /**
     * @OA\Property(
     *      title="Formatted Base Total",
     *      description="Formatted base total of invoice item",
     *      example="$20.00"
     * )
     *
     * @var string
     */
    private $formatted_based_total;

    /**
     * @OA\Property(
     *      title="Tax Amount",
     *      description="Tax Amount calculated at invoice item price",
     *      example=0.37
     * )
     *
     * @var float
     */
    private $tax_amount;

    /**
     * @OA\Property(
     *      title="Formatted Tax Amount",
     *      description="Formatted tax amount calculated at invoice item price",
     *      example="€0.37"
     * )
     *
     * @var string
     */
    private $formatted_tax_amount;

    /**
     * @OA\Property(
     *      title="Base Tax Amount",
     *      description="Base tax amount calculated at invoice item price",
     *      example=0.41
     * )
     *
     * @var float
     */
    private $base_tax_amount;

    /**
     * @OA\Property(
     *      title="Formatted Base Tax Amount",
     *      description="Formatted base tax amount calculated at invoice item price",
     *      example="$0.41"
     * )
     *
     * @var string
     */
    private $formatted_based_tax_amount;

    /**
     * @OA\Property(
     *      title="Grand Total",
     *      description="Grand total",
     *      example=0.37
     * )
     *
     * @var float
     */
    private $grand_total;

    /**
     * @OA\Property(
     *      title="Formatted Grand Total",
     *      description="Formatted grand total",
     *      example="€0.37"
     * )
     *
     * @var string
     */
    private $formatted_grand_total;

    /**
     * @OA\Property(
     *      title="Base Grand Total",
     *      description="Base grand total",
     *      example=0.41
     * )
     *
     * @var float
     */
    private $base_grand_total;

    /**
     * @OA\Property(
     *      title="Formatted Base Grand Total",
     *      description="Formatted base grand total",
     *      example="$0.41"
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
     *     description="Child of invoice's item"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Sale\InvoiceItem
     */
    private $child;

    /**
     * @OA\Property(
     *     title="Children",
     *     description="Children of invoice's item"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Sale\InvoiceItem
     */
    private $children;
}