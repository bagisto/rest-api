<?php

namespace Webkul\RestApi\Docs\Admin\Models\Customer;

/**
 * @OA\Schema(
 *     title="GDPR",
 *     description="GDPR Data Request Model",
 * )
 */
class GDPR
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="Unique identifier of the GDPR request",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     *     title="Customer ID",
     *     description="ID of the customer who created the request",
     *     format="int64",
     *     example=42
     * )
     *
     * @var int
     */
    private $customer_id;

    /**
     * @OA\Property(
     *     title="Email",
     *     description="Email address of the customer",
     *     example="john@example.com"
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     *     title="Message",
     *     description="Optional message or note from the customer",
     *     example="Please delete all my personal data."
     * )
     *
     * @var string
     */
    private $message;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="Current status of the GDPR request (e.g., pending, approved, rejected, revoked)",
     *     example="pending"
     * )
     *
     * @var string
     */
    private $status;

    /**
     * @OA\Property(
     *     title="Revoked At",
     *     description="Datetime when the request was revoked (if applicable)",
     *     example="2025-04-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $revoked_at;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Datetime when the GDPR request was created",
     *     example="2025-04-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated At",
     *     description="Datetime when the GDPR request was last updated",
     *     example="2025-04-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;
}
