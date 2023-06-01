<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog\ProductBookingType;

/**
 * @OA\Schema(
 *     title="ProductBookingTable",
 *     description="ProductBookingTable model",
 * )
 */
class ProductBookingTable
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
     *     title="Price Type",
     *     description="Booking price will be calculated based on table or guest",
     *     example="guest",
     *     enum={"guest", "table"}
     * )
     *
     * @var string
     */
    public $price_type;
    
    /**
     * @OA\Property(
     *     title="Guest Limit",
     *     description="Total guest limit in the venue or per table",
     *     example=4
     * )
     *
     * @var integer
     */
    public $guest_limit;

    /**
     * @OA\Property(
     *     title="Duration",
     *     description="Booking duration in minutes",
     *     example=50
     * )
     *
     * @var integer
     */
    public $duration;

    /**
     * @OA\Property(
     *     title="Break Time",
     *     description="Break time after each booking slot",
     *     example=10
     * )
     *
     * @var integer
     */
    public $break_time;

    /**
     * @OA\Property(
     *     title="Prevent Scheduling Before",
     *     description="You can prevent the booking scheduling before x mins",
     *     example=5
     * )
     *
     * @var integer
     */
    public $prevent_scheduling_before;

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