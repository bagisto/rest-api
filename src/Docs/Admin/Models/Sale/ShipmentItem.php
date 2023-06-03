<?php

namespace Webkul\RestApi\Docs\Admin\Models\Sale;

/**
 * @OA\Schema(
 *     title="ShipmentItem",
 *     description="ShipmentItem model",
 * )
 */
class ShipmentItem
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
     *     title="Weight",
     *     description="Shipped product weight",
     *     format="int64",
     *     example=2.00
     * )
     *
     * @var float
     */
    private $weight;

    /**
     * @OA\Property(
     *      title="Price",
     *      description="Shipment item price",
     *      example=9.13
     * )
     *
     * @var float
     */
    private $price;

    /**
     * @OA\Property(
     *      title="Formatted Price",
     *      description="Formatted price of shipment's item",
     *      example="€9.13"
     * )
     *
     * @var string
     */
    private $formatted_price;

    /**
     * @OA\Property(
     *      title="Base Price",
     *      description="Shipment's item base price",
     *      example=10.00
     * )
     *
     * @var float
     */
    private $base_price;

    /**
     * @OA\Property(
     *      title="Formatted Base Price",
     *      description="Formatted Base Price of the shipment item",
     *      example="$10.00"
     * )
     *
     * @var string
     */
    private $formatted_based_price;

    /**
     * @OA\Property(
     *      title="Item Total",
     *      description="Shipment item total",
     *      example=18.26
     * )
     *
     * @var float
     */
    private $total;

    /**
     * @OA\Property(
     *      title="Formatted Total",
     *      description="Formatted total of shipment's item",
     *      example="€18.26"
     * )
     *
     * @var float
     */
    private $formatted_total;

    /**
     * @OA\Property(
     *      title="Base Total",
     *      description="Shipment's item base total",
     *      example=20.00
     * )
     *
     * @var float
     */
    private $base_total;

    /**
     * @OA\Property(
     *      title="Formatted Base Total",
     *      description="Formatted base total of shipment item",
     *      example="$20.00"
     * )
     *
     * @var string
     */
    private $formatted_based_total;

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
}