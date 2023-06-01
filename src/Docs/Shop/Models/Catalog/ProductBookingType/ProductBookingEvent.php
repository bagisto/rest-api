<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog\ProductBookingType;

/**
 * @OA\Schema(
 *     title="ProductBookingEvent",
 *     description="ProductBookingEvent model",
 * )
 */
class ProductBookingEvent
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
     *     title="Price",
     *     description="Ticket's price",
     *     example="20.00"
     * )
     *
     * @var string
     */
    public $price;

    /**
     * @OA\Property(
     *     title="Qty",
     *     description="Available quantity for ticket booking",
     *     example=100
     * )
     *
     * @var integer
     */
    public $qty;

    /**
     * @OA\Property(
     *     title="Special Price",
     *     description="Ticket's special price, Only use if special_price is applied to ticket booking",
     *     example=18.00
     * )
     *
     * @var float
     */
    public $special_price;
    
    /**
     * @OA\Property(
     *     title="Special Price From",
     *     description="Special price will start from which date",
     *     example="2023-05-16",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    public $special_price_from;
    
    /**
     * @OA\Property(
     *     title="Special Price To",
     *     description="Special price will end on which date",
     *     example="2023-11-24",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    public $special_price_to;

    /**
     * @OA\Property(
     *     title="Booking Product ID",
     *     description="Booking product ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public $booking_product_id;

    /**
     * @OA\Property(
     *     title="Original Converted Price",
     *     description="Original converted price, base price",
     *     example="20.00"
     * )
     *
     * @var float
     */
    public $original_converted_price;

    /**
     * @OA\Property(
     *     title="Original Formatted Price",
     *     description="Original formatted price, base formatted price",
     *     example="$20.00"
     * )
     *
     * @var string
     */
    public $original_formated_price;

    /**
     * @OA\Property(
     *     title="Converted Price",
     *     description="Converted price",
     *     example="18.00"
     * )
     *
     * @var float
     */
    public $converted_price;

    /**
     * @OA\Property(
     *     title="Formated Price",
     *     description="Formatted price, converted formatted price",
     *     example="$18.00"
     * )
     *
     * @var string
     */
    public $formated_price;

    /**
     * @OA\Property(
     *     title="Formated Price Text",
     *     description="Formatted price text",
     *     example="$18.00 Per Ticket"
     * )
     *
     * @var string
     */
    public $formated_price_text;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Event name",
     *     example="Morning Show"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="Description",
     *     description="Event description",
     *     example="Morning Show"
     * )
     *
     * @var string
     */
    public $description;
    
    /**
     * @OA\Property(
     *     title="Translations",
     *     description="Ticket booking translations based on locale",
     *     type="array",
     *     example={{
     *          "id": 1,
     *          "locale": "en",
     *          "name": "Morning Show",
     *          "description": "Morning Show Morning Show",
     *          "booking_product_event_ticket_id": 1
     *     }},
     *     @OA\Items(
     *          @OA\Property(property="id", type="integer"),
     *          @OA\Property(property="locale", type="string"),
     *          @OA\Property(property="name", type="string"),
     *          @OA\Property(property="description", type="string"),
     *          @OA\Property(property="booking_product_event_ticket_id", type="integer")
     *     )
     * )
     *
     * @var array
     */
    public $translations;
}