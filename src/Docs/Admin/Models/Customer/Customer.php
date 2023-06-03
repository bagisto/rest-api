<?php

namespace Webkul\RestApi\Docs\Admin\Models\Customer;

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
     * @var integer
     */
    private $id;

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
     *     title="Name",
     *     description="Customer's full name",
     *     example="John Doe",
     * )
     *
     * @var string
     */
    private $name;

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
     *     title="Gender",
     *     description="Customer's Gender",
     *     example="Male",
     *     enum={"Male", "Female", "Other"}
     * )
     *
     * @var string
     */
    private $gender;

    /**
     * @OA\Property(
     *     title="Date of Birth",
     *     description="Customer's date of birth",
     *     example="1991-05-15",
     * )
     *
     * @var string
     */
    private $date_of_birth;

    /**
     * @OA\Property(
     *     title="Phone",
     *     description="Customer's phone number",
     *     example="1234567890",
     * )
     *
     * @var string
     */
    private $phone;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="Customer's status",
     *     example=1,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $status;

    /**
     * @OA\Property(
     *     title="Notes",
     *     description="Customer's notes",
     *     example="This is a first note for this customer"
     * )
     *
     * @var string
     */
    private $notes;

    /**
     * @OA\Property(
     *     title="Group",
     *     description="Customer Group"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Customer\Group
     */
    private $group;

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