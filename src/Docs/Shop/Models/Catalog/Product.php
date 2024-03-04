<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog;

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
     * @var int
     */
    public $id;

    /**
     * @OA\Property(
     *     title="SKU",
     *     description="Product SKU",
     *     example="men-t-shirt"
     * )
     *
     * @var string
     */
    public $sku;

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
     *     title="Name",
     *     description="Product name",
     *     example="Men T-Shirt"
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
     *     title="Price",
     *     description="Product price",
     *     example=12.20
     * )
     *
     * @var float
     */
    public $price;

    /**
     * @OA\Property(
     *     title="Formatted Price",
     *     description="Product's formatted price",
     *     example="$12.20"
     * )
     *
     * @var string
     */
    public $formatted_price;

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
     *     title="Images",
     *     description="Product's images"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductImage
     */
    public $images;

    /**
     * @OA\Property(
     *     title="Videos",
     *     description="Product's videos"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductVideo
     */
    public $videos;

    /**
     * @OA\Property(
     *     title="Base Image",
     *     description="Product's base image",
     *     type="array",
     *     example={
     *          "small_image_url": "http://localhost/public/vendor/webkul/ui/assets/images/product/small-product-placeholder.webp",
     *          "medium_image_url": "http://localhost/public/vendor/webkul/ui/assets/images/product/meduim-product-placeholder.webp",
     *          "large_image_url": "http://localhost/public/vendor/webkul/ui/assets/images/product/large-product-placeholder.webp",
     *          "original_image_url": "http://localhost/public/vendor/webkul/ui/assets/images/product/original-product-placeholder.webp",
     *     },
     *
     *     @OA\Items(
     *
     *          @OA\Property(property="small_image_url", type="string"),
     *          @OA\Property(property="medium_image_url", type="string"),
     *          @OA\Property(property="large_image_url", type="string"),
     *          @OA\Property(property="original_image_url", type="string")
     *     )
     * )
     *
     * @var string
     */
    public $base_image;

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
     *     title="Reviews",
     *     description="Product's reviews",
     *     type="array",
     *     example={
     *          "total": 4,
     *          "total_rating": "14",
     *          "average_rating": "3.5",
     *          "percentage": {"5":0,"4":50,"3":50,"2":0,"1":0},
     *     },
     *
     *     @OA\Items(
     *
     *          @OA\Property(property="total", type="integer"),
     *          @OA\Property(property="total_rating", type="string"),
     *          @OA\Property(property="average_rating", type="string"),
     *          @OA\Property(
     *              property="percentage",
     *              type="array",
     *
     *              @OA\Items(
     *
     *                  @OA\Property(property="5", type="float"),
     *                  @OA\Property(property="4", type="float"),
     *                  @OA\Property(property="3", type="float"),
     *                  @OA\Property(property="2", type="float"),
     *                  @OA\Property(property="1", type="float")
     *              )
     *          )
     *     )
     * )
     */
    public $reviews;

    /**
     * @OA\Property(
     *     title="In Stock",
     *     description="Product's in stock status",
     *     example=true
     * )
     *
     * @var bool
     */
    public $in_stock;

    /**
     * @OA\Property(
     *     title="In Saved",
     *     description="Product's in saved status",
     *     example=false
     * )
     *
     * @var bool
     */
    public $is_saved;

    /**
     * @OA\Property(
     *     title="In Item In Cart",
     *     description="Product's is in cart or not status",
     *     example=false
     * )
     *
     * @var bool
     */
    public $is_item_in_cart;

    /**
     * @OA\Property(
     *     title="Show Quantity Changer",
     *     description="Show quantity changer status for front end",
     *     example=true
     * )
     *
     * @var bool
     */
    public $show_quantity_changer;

    /**
     * @OA\Property(
     *     title="Currency Options",
     *     description="Currency options",
     *     type="array",
     *     example={
     *         "symbol": "$",
     *         "decimal": ".",
     *         "format": "%s%v"
     *     },
     *
     *     @OA\Items(
     *
     *          @OA\Property(property="symbol", type="string"),
     *          @OA\Property(property="decimal", type="string"),
     *          @OA\Property(property="format", type="string")
     *     )
     * )
     *
     * @var array
     */
    public $currency_options;

    /**
     * @OA\Property(
     *     title="Special Price",
     *     description="Product's special price, Only use if special_price is applied to product",
     *     example=8.00
     * )
     *
     * @var float
     */
    public $special_price;

    /**
     * @OA\Property(
     *     title="Formatted Special Price",
     *     description="Product's formatted special price, Only use if special_price is applied to product",
     *     example="$8.00"
     * )
     *
     * @var string
     */
    public $formatted_special_price;

    /**
     * @OA\Property(
     *     title="Regular Price",
     *     description="Product's regular price",
     *     example=12.20
     * )
     *
     * @var float
     */
    public $regular_price;

    /**
     * @OA\Property(
     *     title="Formatted Regular Price",
     *     description="Product's formatted regular price",
     *     example="$12.20"
     * )
     *
     * @var string
     */
    public $formatted_regular_price;

    /**
     * @OA\Property(
     *     title="Variants",
     *     description="Product's variants, Info: this property will use with configurable type product only."
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductFlat
     */
    public $variants;

    /**
     * @OA\Property(
     *     title="Super Attributes",
     *     description="Product's super attributes, Info: this property will use with configurable type product only."
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\Attribute
     */
    public $super_attributes;

    /**
     * @OA\Property(
     *     title="Grouped Products",
     *     description="Info: this property will only use with grouped type product."
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductFlat
     */
    public $grouped_products;

    /**
     * @OA\Property(
     *     title="Downloadable Links",
     *     description="Info: this property will only use with downloadable type product."
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductDownloadableLink
     */
    public $downloadable_links;

    /**
     * @OA\Property(
     *     title="Downloadable Samples",
     *     description="Info: this property will only use with downloadable type product."
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductDownloadableSample
     */
    public $downloadable_samples;

    /**
     * @OA\Property(
     *     title="Bundle Options",
     *     description="Info: this property will only use with bundle type product.",
     *     type="array",
     *     example={
     *         "options": {
     *              "id": 1,
     *              "label": "Select One",
     *              "type": "select",
     *              "is_required": 1,
     *              "sort_order": 1,
     *              "products": {
     *                  "id": 1,
     *                  "qty": 2,
     *                  "name": "Digital Camera",
     *                  "product_id": 1,
     *                  "is_default": 0,
     *                  "sort_order": 1,
     *                  "in_stock": true,
     *                  "inventory": 1200,
     *                  "price": {
     *                      "regular_price": {
     *                          "price": 17,
     *                          "formated_price": "$17.00"
     *                      },
     *                      "final_price": {
     *                          "price": 17,
     *                          "formated_price": "$17.00"
     *                      }
     *                  }
     *              }
     *          }
     *     },
     *
     *     @OA\Items(
     *
     *          @OA\Property(
     *              property="options",
     *              type="array",
     *
     *              @OA\Items(
     *
     *                  @OA\Property(property="id", type="integer"),
     *                  @OA\Property(property="label", type="string"),
     *                  @OA\Property(property="type", type="string", enum={"select", "checkbox", "multiselect", "radio"}),
     *                  @OA\Property(property="is_required", type="integer", enum={"0", "1"}),
     *                  @OA\Property(property="sort_order", type="integer"),
     *                  @OA\Property(
     *                      property="products",
     *                      type="array",
     *
     *                      @OA\Items(
     *
     *                          @OA\Property(property="id", type="integer"),
     *                          @OA\Property(property="qty", type="integer"),
     *                          @OA\Property(property="name", type="string"),
     *                          @OA\Property(property="product_id", type="integer"),
     *                          @OA\Property(property="is_default", type="integer", enum={"0", "1"}),
     *                          @OA\Property(property="in_stock", type="boolean", enum={"true", "false"}),
     *                          @OA\Property(property="inventory", type="integer"),
     *                          @OA\Property(
     *                              property="price",
     *                              type="array",
     *
     *                              @OA\Items(
     *
     *                                  @OA\Property(
     *                                      property="regular_price",
     *                                      type="array",
     *
     *                                      @OA\Items(
     *
     *                                          @OA\Property(property="price", type="integer"),
     *                                          @OA\Property(property="formated_price", type="string")
     *                                      )
     *                                  ),
     *                                  @OA\Property(
     *                                      property="final_price",
     *                                      type="array",
     *
     *                                      @OA\Items(
     *
     *                                          @OA\Property(property="price", type="integer"),
     *                                          @OA\Property(property="formated_price", type="string")
     *                                      )
     *                                  )
     *                              )
     *                          )
     *                      )
     *                  )
     *              )
     *          )
     *     )
     * )
     *
     * @var array
     */
    public $bundle_options;
}
