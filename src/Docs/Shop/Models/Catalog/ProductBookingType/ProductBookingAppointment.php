<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog\ProductBookingType;

/**
 * @OA\Schema(
 *     title="ProductBookingAppointment",
 *     description="ProductBookingAppointment model",
 * )
 */
class ProductBookingAppointment
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
     *          "0": {
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
     *          "1": {
     *                  {
     *                      "from": "09:00",
     *                      "to": "12:00"
     *                  },  {
     *                      "from": "18:00",
     *                      "to": "22:00"
     *                  }
     *              },
     *          "5": {
     *                  {
     *                      "from": "09:00",
     *                      "to": "12:00"
     *                  }
     *              }
     *     },
     *     @OA\Items(
     *          @OA\Property(
     *              property="0",
     *              type="array",
     *              @OA\Items(
     *                  @OA\Property(property="from", type="string"),
     *                  @OA\Property(property="to", type="string")
     *              )
     *          ),
     *          @OA\Property(
     *              property="1",
     *              type="array",
     *              @OA\Items(
     *                  @OA\Property(property="from", type="string"),
     *                  @OA\Property(property="to", type="string")
     *              )
     *          ),
     *          @OA\Property(
     *              property="2",
     *              type="array",
     *              @OA\Items(
     *                  @OA\Property(property="from", type="string"),
     *                  @OA\Property(property="to", type="string")
     *              )
     *          ),
     *          @OA\Property(
     *              property="3",
     *              type="array",
     *              @OA\Items(
     *                  @OA\Property(property="from", type="string"),
     *                  @OA\Property(property="to", type="string")
     *              )
     *          ),
     *          @OA\Property(
     *              property="4",
     *              type="array",
     *              @OA\Items(
     *                  @OA\Property(property="from", type="string"),
     *                  @OA\Property(property="to", type="string")
     *              )
     *          ),
     *          @OA\Property(
     *              property="5",
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