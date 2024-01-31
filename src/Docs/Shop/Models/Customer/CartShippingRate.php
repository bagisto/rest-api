<?php

namespace Webkul\RestApi\Docs\Shop\Models\Customer;

/**
 * @OA\Schema(
 *     title="Cart's Shipping Rate",
 *     description="Cart's shipping rate model",
 * )
 */
class CartShippingRate
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
     *     title="Shipping/Carrier Code",
     *     description="Shipping/Carrier code",
     *     example="flatrate",
     * )
     *
     * @var string
     */
    private $carrier;

    /**
     * @OA\Property(
     *     title="Shipping/Carrier Title",
     *     description="Shipping/Carrier title",
     *     example="Flat Rate",
     * )
     *
     * @var string
     */
    private $carrier_title;

    /**
     * @OA\Property(
     *     title="Shipping Method Code",
     *     description="Shipping method code",
     *     example="flatrate_flatrate",
     * )
     *
     * @var string
     */
    private $method;

    /**
     * @OA\Property(
     *     title="Shipping Method Title",
     *     description="Shipping Method title",
     *     example="Flat Rate",
     * )
     *
     * @var string
     */
    private $method_title;

    /**
     * @OA\Property(
     *     title="Shipping Method Description",
     *     description="Shipping Method description",
     *     example="Flat Rate Shipping",
     * )
     *
     * @var string
     */
    private $method_description;

    /**
     * @OA\Property(
     *      title="Shipping Price",
     *      description="Shipping price calculated at the checkout",
     *      example="9.15"
     * )
     *
     * @var float
     */
    private $price;

    /**
     * @OA\Property(
     *      title="Formatted Shipping Price",
     *      description="Formatted shipping price calculated at the checkout",
     *      example="€9.15"
     * )
     *
     * @var string
     */
    private $formatted_price;

    /**
     * @OA\Property(
     *      title="Base Shipping Price",
     *      description="Base shipping price",
     *      example="10.00"
     * )
     *
     * @var float
     */
    private $base_price;

    /**
     * @OA\Property(
     *      title="Formatted Base Shipping Price",
     *      description="Formatted base shipping price",
     *      example="$10.00"
     * )
     *
     * @var string
     */
    private $formatted_based_price;

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
