<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog\ProductBookingType;

/**
 * @OA\Schema(
 *     title="ProductBooking",
 *     description="ProductBooking model",
 * )
 */
class ProductBooking
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
     *     title="Type",
     *     description="Booking type",
     *     example="default",
     *     enum={"default", "appointment", "event", "rental", "table"}
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *     title="Qty",
     *     description="Available quantity for booking",
     *     example=100
     * )
     *
     * @var integer
     */
    public $qty;

    /**
     * @OA\Property(
     *     title="Location",
     *     description="Booking location",
     *     example="Delhi, India"
     * )
     *
     * @var string
     */
    public $location;

    /**
     * @OA\Property(
     *     title="Show Location",
     *     description="Show location status",
     *     example=0,
     *     enum={"0", "1"}
     * )
     *
     * @var integer
     */
    public $show_location;

    /**
     * @OA\Property(
     *     title="Available Every Week",
     *     description="Available every week, i.e same slots for all days or different slots for each days.",
     *     example=null,
     *     enum={"null", "0"}
     * )
     *
     * @var integer
     */
    public $available_every_week;
    
    /**
     * @OA\Property(
     *     title="Available From",
     *     description="Booking start date time",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    protected $available_from;

    /**
     * @OA\Property(
     *     title="Available To",
     *     description="Booking end date time",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    protected $available_to;
    
    /**
     * @OA\Property(
     *     title="Product ID",
     *     description="Product ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public $product_id;
    
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
    protected $created_at;

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
    protected $updated_at;

    /**
     * @OA\Property(
     *     title="Default Slot",
     *     description="Default booking slot information, This property will use with default type booking product only."
     * )
     * 
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductBookingType\ProductBookingDefault
     */
    public $default_slot;

    /**
     * @OA\Property(
     *     title="Appointment Slot",
     *     description="Appointment booking slot information, This property will use with appointment type booking product only."
     * )
     * 
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductBookingType\ProductBookingAppointment
     */
    public $appointment_slot;

    /**
     * @OA\Property(
     *     title="Event Tickets",
     *     description="Event booking slot information, This property will use with event type booking product only."
     * )
     * 
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductBookingType\ProductBookingEvent
     */
    public $event_tickets;

    /**
     * @OA\Property(
     *     title="Rental Slot",
     *     description="Rental slot information, This property will use with rental booking product only."
     * )
     * 
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductBookingType\ProductBookingRental
     */
    public $rental_slot;

    /**
     * @OA\Property(
     *     title="Table Slot",
     *     description="Table booking slot information, This property will use with table type booking product only."
     * )
     * 
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\ProductBookingType\ProductBookingTable
     */
    public $table_slot;
}