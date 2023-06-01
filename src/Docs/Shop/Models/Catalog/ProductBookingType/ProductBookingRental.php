<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog\ProductBookingType;

/**
 * @OA\Schema(
 *     title="ProductBookingRental",
 *     description="ProductBookingRental model",
 * )
 */
class ProductBookingRental
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
     *     title="Renting Type",
     *     description="Renting type",
     *     example="daily",
     *     enum={"daily", "hourly", "daily_hourly"}
     * )
     *
     * @var string
     */
    public $renting_type;

    /**
     * @OA\Property(
     *     title="Daily Price",
     *     description="Price on daily basis",
     *     example=24.00
     * )
     *
     * @var float
     */
    public $daily_price;

    /**
     * @OA\Property(
     *     title="Hourly Price",
     *     description="Price on hourly basis",
     *     example=1.00
     * )
     *
     * @var float
     */
    public $hourly_price;

    /**
     * @OA\Property(
     *     title="Same Slot All Days",
     *     description="Same slot all days(null => yes & 0 => no), i.e same slots for all days or different slots for each days.",
     *     example=0,
     *     enum={"null", "0"}
     * )
     *
     * @var integer
     */
    public $same_slot_all_days;

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
     *     title="Slots",
     *     description="Booking slots",
     *     type="array",
     *     example={
     *              {
     *                  {
     *                      "from": "09:00",
     *                      "to": "11:00"
     *                  },  {
     *                      "from": "12:00",
     *                      "to": "01:00"
     *                  },  {
     *                      "from": "18:00",
     *                      "to": "20:00"
     *                  }
     *              },
     *              {},
     *              {},
     *              {},
     *              {
     *                  {
     *                      "from": "09:00",
     *                      "to": "12:00"
     *                  },  {
     *                      "from": "18:00",
     *                      "to": "22:00"
     *                  }
     *              },
     *              {},
     *              {
     *                  {
     *                      "from": "09:00",
     *                      "to": "12:00"
     *                  }
     *              }
     *     },
     *     @OA\Items(
     *          @OA\Property(
     *              type="array",
     *              @OA\Items(
     *                  @OA\Property(property="from", type="string"),
     *                  @OA\Property(property="to", type="string")
     *              )
     *          )
     *     )
     * )
     *
     * @var array
     */
    public $slots;
}