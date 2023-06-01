<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog\ProductBookingType;

/**
 * @OA\Schema(
 *     title="ProductBookingDefault",
 *     description="ProductBookingDefault model",
 * )
 */
class ProductBookingDefault
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
     *     title="Booking Type",
     *     description="Default booking type",
     *     example="one",
     *     enum={"one", "many"}
     * )
     *
     * @var string
     */
    public $booking_type;

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
     *          "from": "10:00",
     *          "to": "12:00",
     *          "from_day": "0",
     *          "to_day": "0"
     *     },
     *     @OA\Items(
     *          @OA\Property(property="from", type="string"),
     *          @OA\Property(property="to", type="string"),
     *          @OA\Property(property="from_day", type="string", description="Day's number, Only use with one booking_type", example="0", enum={"0", "1", "2", "3", "4", "5", "6"}),
     *          @OA\Property(property="to_day", type="string", description="Day's number, Only use with one booking_type", example="0", enum={"0", "1", "2", "3", "4", "5", "6"}),
     *          @OA\Property(property="status", type="string", description="Only use with many booking_type", example="1", enum={"0", "1"})
     *     )
     * )
     *
     * @var array
     */
    public $slots;
}