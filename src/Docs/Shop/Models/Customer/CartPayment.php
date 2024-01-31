<?php

namespace Webkul\RestApi\Docs\Shop\Models\Customer;

/**
 * @OA\Schema(
 *     title="Cart's Payment",
 *     description="Cart's payment model",
 * )
 */
class CartPayment
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
     *     title="Payment Method Code",
     *     description="Payment method code",
     *     example="cashondelivery",
     * )
     *
     * @var string
     */
    private $method;

    /**
     * @OA\Property(
     *     title="Payment Method Title",
     *     description="Payment Method title",
     *     example="Cash On Delivery",
     * )
     *
     * @var string
     */
    private $method_title;

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
