<?php

namespace Webkul\RestApi\Docs\Shop\Models\Customer;

/**
 * @OA\Schema(
 *     title="Customer",
 *     description="Customer model",
 * )
 */
class Customer
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
     *     title="First Name",
     *     description="Customer's First Name",
     *     example="John",
     * )
     *
     * @var string
     */
    private $first_name;

    /**
     * @OA\Property(
     *     title="Last Name",
     *     description="Customer's Last Name",
     *     example="Doe",
     * )
     *
     * @var string
     */
    private $last_name;

    /**
     * @OA\Property(
     *     title="Email",
     *     description="Customer's Email",
     *     example="example@example.com",
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     *     title="Gender",
     *     description="Customer's Gender",
     *     example="Male",
     * )
     *
     * @var string
     */
    private $gender;

    /**
     * @OA\Property(
     *     title="Date of Birth",
     *     description="Customer's Date of Birth",
     *     example="1991-05-15",
     * )
     *
     * @var string
     */
    private $date_of_birth;

    /**
     * @OA\Property(
     *     title="Phone",
     *     description="Customer's Phone Number",
     *     example="1234567890",
     * )
     *
     * @var string
     */
    private $phone;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="Customer's Status",
     *     example="1",
     * )
     *
     * @var string
     */
    private $status;

    /**
     * @OA\Property(
     *     title="Newsletter Subscription",
     *     description="Customer's Newsletter Subscription",
     *     example="1",
     * )
     *
     * @var string
     */
    private $subscribed_to_news_letter;


    /**
     * @OA\Property(
     *     title="Image",
     *     description="Customer's Image",
     *     example="http://localhost/private/storage/customer/image.jpg"
     * )
     *
     * @var string
     */
    private $image;

    /**
     * @OA\Property(
     *     title="Notes",
     *     description="Customer's notes",
     * )
     *
     * @var string
     */
    private $notes;

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
