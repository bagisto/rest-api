<?php

namespace Webkul\RestApi\Docs\Admin\Models\Catalog;

/**
 * @OA\Schema(
 *     title="ProductAttributeValue",
 *     description="ProductAttributeValue model",
 * )
 */
class ProductAttributeValue
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
    public $id;

    /**
     * @OA\Property(
     *     title="Locale",
     *     description="Locale code",
     *     example="en"
     * )
     *
     * @var string
     */
    protected $locale;

    /**
     * @OA\Property(
     *     title="Channel",
     *     description="Channel code",
     *     example="default"
     * )
     *
     * @var string
     */
    protected $channel;

    /**
     * @OA\Property(
     *     title="Text Value",
     *     description="Text type attribute value i.e. Name",
     *     example="Black-L"
     * )
     *
     * @var string
     */
    protected $text_value;

    /**
     * @OA\Property(
     *     title="Boolean Value",
     *     description="Boolean type attribute value i.e. Guest Checkout",
     *     example=false
     * )
     *
     * @var boolean
     */
    protected $boolean_value;

    /**
     * @OA\Property(
     *     title="Integer Value",
     *     description="Integer type attribute value i.e. Custom attribute Age",
     *     example=30
     * )
     *
     * @var integer
     */
    protected $integer_value;

    /**
     * @OA\Property(
     *     title="Float Value",
     *     description="Float type attribute value i.e. Price",
     *     example=30.20
     * )
     *
     * @var integer
     */
    protected $float_value;

    /**
     * @OA\Property(
     *     title="Datetime Value",
     *     description="Datetime type attribute value",
     *     example="2023-11-24 10:20:00"
     * )
     *
     * @var \DateTime
     */
    protected $datetime_value;

    /**
     * @OA\Property(
     *     title="Date Value",
     *     description="Date type attribute value i.e. Special Price From",
     *     example="2023-11-16"
     * )
     *
     * @var \Date
     */
    protected $date_value;

    /**
     * @OA\Property(
     *     title="Json Value",
     *     description="Json type attribute value i.e. Additional Info",
     *     example={"key": "value"}
     * )
     *
     * @var object
     */
    protected $json_value;

    /**
     * @OA\Property(
     *     title="Product ID",
     *     description="Inventry belongs to which product ID",
     *     format="int64",
     *     example=4
     * )
     *
     * @var integer
     */
    public $product_id;

    /**
     * @OA\Property(
     *     title="Attribute ID",
     *     description="Attribute ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public $attribute_id;
}