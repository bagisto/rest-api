<?php

namespace Webkul\RestApi\Docs\Shop\Models\Customer;

/**
 * @OA\Schema(
 *     title="CartItem",
 *     description="CartItem model",
 * )
 */
class CartItem
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     *     title="Item Quantity",
     *     description="Cart Item quantity",
     *     format="int64",
     *     example=2
     * )
     *
     * @var int
     */
    private $quantity;

    /**
     * @OA\Property(
     *     title="Product SKU",
     *     description="Product SKU",
     *     example="wooden-chair"
     * )
     *
     * @var string
     */
    private $sku;

    /**
     * @OA\Property(
     *     title="Product Type",
     *     description="Cart product type",
     *     example="configurable"
     * )
     *
     * @var string
     */
    private $type;

    /**
     * @OA\Property(
     *     title="Product Name",
     *     description="Cart product name",
     *     example="Wooden Chair"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Product Weight",
     *     description="Cart item weight per unit",
     *     example="1.50"
     * )
     *
     * @var float
     */
    private $weight;

    /**
     * @OA\Property(
     *     title="Total Cart's Item Weight",
     *     description="Total cart's item weight",
     *     example="3.00"
     * )
     *
     * @var float
     */
    private $total_weight;

    /**
     * @OA\Property(
     *      title="Product Price",
     *      description="Cart item price",
     *      example="9.13"
     * )
     *
     * @var float
     */
    private $price;

    /**
     * @OA\Property(
     *      title="Formatted Price",
     *      description="Formatted price of cart's item",
     *      example="€9.13"
     * )
     *
     * @var float
     */
    private $formatted_price;

    /**
     * @OA\Property(
     *      title="Product Base Price",
     *      description="Cart's item base price",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $base_price;

    /**
     * @OA\Property(
     *      title="Formatted Base Price",
     *      description="Formatted Base Price of the Cart item",
     *      example="$10.00"
     * )
     *
     * @var string
     */
    private $formatted_based_price;

    /**
     * @OA\Property(
     *      title="Item Total",
     *      description="Cart item total",
     *      example="18.26"
     * )
     *
     * @var float
     */
    private $total;

    /**
     * @OA\Property(
     *      title="Formatted Total",
     *      description="Formatted total of cart's item",
     *      example="€18.26"
     * )
     *
     * @var float
     */
    private $formatted_total;

    /**
     * @OA\Property(
     *      title="Product Base Total",
     *      description="Cart's item base total",
     *      example="20.00"
     * )
     *
     * @var float
     */
    private $base_total;

    /**
     * @OA\Property(
     *      title="Formatted Base Total",
     *      description="Formatted base total of the Cart item",
     *      example="$20.00"
     * )
     *
     * @var string
     */
    private $formatted_based_total;

    /**
     * @OA\Property(
     *      title="Tax Percentage",
     *      description="Tax percentage that applied to the cart item",
     *      example="2"
     * )
     *
     * @var float
     */
    private $tax_percent;

    /**
     * @OA\Property(
     *      title="Tax Amount",
     *      description="Tax Amount calculated at cart item price",
     *      example="0.37"
     * )
     *
     * @var float
     */
    private $tax_amount;

    /**
     * @OA\Property(
     *      title="Formatted Tax Amount",
     *      description="Formatted tax amount calculated at cart item price",
     *      example="€0.37"
     * )
     *
     * @var string
     */
    private $formatted_tax_amount;

    /**
     * @OA\Property(
     *      title="Base Tax Amount",
     *      description="Base tax amount calculated at cart item price",
     *      example="0.41"
     * )
     *
     * @var float
     */
    private $base_tax_amount;

    /**
     * @OA\Property(
     *      title="Formatted Base Tax Amount",
     *      description="Formatted base tax amount calculated at cart item price",
     *      example="$0.41"
     * )
     *
     * @var string
     */
    private $formatted_based_tax_amount;

    /**
     * @OA\Property(
     *     title="Additional Info About Cart Item",
     *     description="selected_configurable_option, super_attribute, and attributes fields will use in case of configurable type product.",
     *     type="array",
     *     example={
     *          "selected_configurable_option": 2,
     *          "quantity": 1,
     *          "product_id": 1,
     *          "parent_id": null,
     *          "super_attribute": {
     *              "5",
     *              "8"
     *          },
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
     *          }
     *     },
     *
     *     @OA\Items(
     *
     *          @OA\Property(
     *              property="additional",
     *              type="array",
     *
     *              @OA\Items(
     *
     *                  @OA\Property(property="selected_configurable_option", type="integer"),
     *                  @OA\Property(property="quantity", type="integer"),
     *                  @OA\Property(property="product_id", type="integer"),
     *                  @OA\Property(property="parent_id", type="integer"),
     *                  @OA\Property(
     *                      property="super_attribute",
     *                      type="array",
     *
     *                      @OA\Items(
     *
     *                          @OA\Property(type="integer")
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="attributes",
     *                      type="array",
     *
     *                      @OA\Items(
     *
     *                          @OA\Property(
     *                              property="size",
     *                              type="array",
     *
     *                              @OA\Items(
     *
     *                                  @OA\Property(property="option_id", type="integer"),
     *                                  @OA\Property(property="option_label", type="string"),
     *                                  @OA\Property(property="attribute_name", type="string")
     *                              )
     *                          ),
     *                          @OA\Property(
     *                              property="color",
     *                              type="array",
     *
     *                              @OA\Items(
     *
     *                                  @OA\Property(property="option_id", type="integer"),
     *                                  @OA\Property(property="option_label", type="string"),
     *                                  @OA\Property(property="attribute_name", type="string")
     *                              )
     *                          )
     *                      )
     *                  )
     *              )
     *          )
     *     )
     * )
     */
    private $additional;

    /**
     * @OA\Property(
     *     title="Cart Item's Child",
     *     description="Cart Item's Child"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Customer\CartItem
     */
    private $child;

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
