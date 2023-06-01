<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog;

/**
 * @OA\Schema(
 *     title="ProductConfigurableConfig",
 *     description="ProductConfigurableConfig model, Use with configurable type product only.",
 * )
 */
class ProductConfigurableConfig
{
    /**
     * @OA\Property(
     *     title="Choose Text",
     *     description="Text of the dropdown that will display at product view page",
     *     example="Choose an option"
     * )
     *
     * @var string
     */
    public $chooseText;

    /**
     * @OA\Property(
     *     title="Attributes",
     *     description="List of configurable attributes with available options",
     *     type="array",
     *     example={{
     *          "id": 23,
     *          "code": "color",
     *          "label": "Color",
     *          "swatch_type": null,
     *          "options": {{
     *              "id": 4,
     *              "label": "Black",
     *              "swatch_value": null,
     *              "products": {
     *                  4,
     *                  6
     *              }
     *          },  {
     *              "id": 5,
     *              "label": "White",
     *              "swatch_value": null,
     *              "products": {
     *                  5,
     *                  7
     *              }
     *          }}
     *     },   {
     *          "id": 24,
     *          "code": "size",
     *          "label": "Size",
     *          "swatch_type": null,
     *          "options": {{
     *              "id": 8,
     *              "label": "L",
     *              "swatch_value": null,
     *              "products": {
     *                  4,
     *                  5
     *              }
     *          },  {
     *              "id": 9,
     *              "label": "XL",
     *              "swatch_value": null,
     *              "products": {
     *                  6,
     *                  7
     *              }
     *          }}
     *      }},
     *      @OA\Items(
     *          @OA\Property(property="id", type="integer"),
     *          @OA\Property(property="code", type="string"),
     *          @OA\Property(property="label", type="string"),
     *          @OA\Property(property="swatch_type", type="string"),
     *          @OA\Property(
     *              property="options",
     *              type="array",
     *              @OA\Items(
     *                  @OA\Property(property="id", type="integer"),
     *                  @OA\Property(property="label", type="string"),
     *                  @OA\Property(property="swatch_type", type="string"),
     *                  @OA\Property(
     *                      property="products",
     *                      type="array",
     *                      @OA\Items(
     *                          @OA\Property(type="integer")
     *                      )
     *                  )
     *              )
     *          )
     *      )
     * )
     *
     * @var array
     */
    public $attributes;

    /**
     * @OA\Property(
     *     title="Index",
     *     description="Mapped list of configurable attributes with their options",
     *     type="object",
     *     example={
     *          "4": {
     *              "23": 4,
     *              "24": 8
     *          },
     *          "5": {
     *              "23": 5,
     *              "24": 8
     *          },
     *          "6": {
     *              "23": 4,
     *              "24": 9
     *          },
     *          "7": {
     *              "23": 5,
     *              "24": 9
     *          }
     *      },
     *      @OA\Property(
     *          property="variant_product_id",
     *          type="object",
     *          example="Use the {variant_product_id} as index",
     *          @OA\Property(
     *              property="attribute_id",
     *              type="integer",
     *              example="Use the key:value, where {attribute_id} will be key and {attribute_option_id} will be value, both type will be integer"
     *          )
     *      )
     * )
     *
     * @var array
     */
    public $index;

    /**
     * @OA\Property(
     *     title="Variant Prices",
     *     description="Variant prices",
     *     type="object",
     *     example={
     *          "4": {
     *              "regular_price": {
     *                  "price": 40,
     *                  "formated_price": "$40.00"
     *              },
     *              "final_price": {
     *                  "price": 38.5,
     *                  "formated_price": "$38.50"
     *              }
     *          },
     *          "5": {
     *              "regular_price": {
     *                  "price": 30,
     *                  "formated_price": "$30.00"
     *              },
     *              "final_price": {
     *                  "price": 30,
     *                  "formated_price": "$30.00"
     *              }
     *          },
     *          "6": {
     *              "regular_price": {
     *                  "price": 45,
     *                  "formated_price": "$45.00"
     *              },
     *              "final_price": {
     *                  "price": 45,
     *                  "formated_price": "$45.00"
     *              }
     *          },
     *          "7": {
     *              "regular_price": {
     *                  "price": 60,
     *                  "formated_price": "$60.00"
     *              },
     *              "final_price": {
     *                  "price": 60,
     *                  "formated_price": "$60.00"
     *              }
     *          }
     *      },
     *      @OA\Property(
     *          property="variant_product_id",
     *          type="object",
     *          example="Use the {variant_product_id} as index",
     *          @OA\Property(
     *              property="regular_price",
     *              type="object",
     *              @OA\Property(property="price", type="integer", example=60.00),
     *              @OA\Property(property="formated_price", type="string", example="$60.00")
     *          ),
     *          @OA\Property(
     *              property="final_price",
     *              type="object",
     *              @OA\Property(property="price", type="integer", example=60.00),
     *              @OA\Property(property="formated_price", type="string", example="$60.00")
     *          )
     *      )
     * )
     *
     * @var object
     */
    public $variant_prices;

    /**
     * @OA\Property(
     *     title="Variant Images",
     *     description="Variant images",
     *     type="object",
     *     example={
     *          "4": {{
     *              "small_image_url": "http://localhost/public/cache/small/product/4/{image_name.jpg}",
     *              "medium_image_url": "http://localhost/public/cache/medium/product/4/{image_name.jpg}",
     *              "large_image_url": "http://localhost/public/cache/large/product/4/{image_name.jpg}",
     *              "original_image_url": "http://localhost/public/cache/original/product/4/{image_name.jpg}"
     *          }},
     *          "5": {{
     *              "small_image_url": "http://localhost/public/cache/small/product/5/{image_name.jpg}",
     *              "medium_image_url": "http://localhost/public/cache/medium/product/5/{image_name.jpg}",
     *              "large_image_url": "http://localhost/public/cache/large/product/5/{image_name.jpg}",
     *              "original_image_url": "http://localhost/public/cache/original/product/5/{image_name.jpg}"
     *          }},
     *          "6": {{
     *              "small_image_url": "http://localhost/public/cache/small/product/6/{image_name.jpg}",
     *              "medium_image_url": "http://localhost/public/cache/medium/product/6/{image_name.jpg}",
     *              "large_image_url": "http://localhost/public/cache/large/product/6/{image_name.jpg}",
     *              "original_image_url": "http://localhost/public/cache/original/product/6/{image_name.jpg}"
     *          }},
     *          "7": {{
     *              "small_image_url": "http://localhost/public/cache/small/product/7/{image_name.jpg}",
     *              "medium_image_url": "http://localhost/public/cache/medium/product/7/{image_name.jpg}",
     *              "large_image_url": "http://localhost/public/cache/large/product/7/{image_name.jpg}",
     *              "original_image_url": "http://localhost/public/cache/original/product/7/{image_name.jpg}"
     *          }}
     *      },
     *      @OA\Property(
     *          property="variant_product_id",
     *          type="array",
     *          example="Use the {variant_product_id} as index",
     *          @OA\Items(
     *              @OA\Property(property="small_image_url", type="string", example="http://localhost/public/cache/small/product/{product_id}/{image_name.jpg}"),
     *              @OA\Property(property="medium_image_url", type="string", example="http://localhost/public/cache/small/product/{product_id}/{image_name.jpg}"),
     *              @OA\Property(property="large_image_url", type="string", example="http://localhost/public/cache/small/product/{product_id}/{image_name.jpg}"),
     *              @OA\Property(property="original_image_url", type="string", example="http://localhost/public/cache/small/product/{product_id}/{image_name.jpg}")
     *          )
     *      )
     * )
     *
     * @var object
     */
    public $variant_images;

    /**
     * @OA\Property(
     *     title="Variant Videos",
     *     description="Variant videos",
     *     type="object",
     *     example={
     *          "4": {},
     *          "5": {},
     *          "6": {},
     *          "7": {}
     *      },
     *      @OA\Property(
     *          property="variant_product_id",
     *          type="array",
     *          example="Use the {variant_product_id} as index",
     *          @OA\Items(
     *              @OA\Property(property="path", type="string", example="http://localhost/public/cache/small/product/{product_id}/{video_name.mp4}")
     *          )
     *      )
     * )
     *
     * @var object
     */
    public $variant_videos;

    /**
     * @OA\Property(
     *     title="Regular Price",
     *     description="Regular price",
     *     type="object",
     *     example={
     *          "formated_price": "$30.00",
     *          "price": 30
     *      },
     *      @OA\Property(property="formated_price", type="string", example="$30.00"),
     *      @OA\Property(property="price", type="float", example=30.00)
     * )
     *
     * @var object
     */
    public $regular_price;
    
}