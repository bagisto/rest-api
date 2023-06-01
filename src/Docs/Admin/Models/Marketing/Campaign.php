<?php

namespace Webkul\RestApi\Docs\Admin\Models\Marketing;

/**
 * @OA\Schema(
 *     title="Campaign",
 *     description="Campaign model",
 * )
 */
class Campaign
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
     *     title="Name",
     *     description="Campaign's name",
     *     example="News Campaign"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Subject",
     *     description="Campaign's subject",
     *     example="Event Offer"
     * )
     *
     * @var string
     */
    private $subject;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="Campaign's status",
     *     example=1,
     *     enum={0,1}
     * )
     *
     * @var integer
     */
    private $status;

    /**
     * @OA\Property(
     *     title="Type",
     *     description="Campaign's type",
     *     example=""
     * )
     *
     * @var string
     */
    private $type;

    /**
     * @OA\Property(
     *     title="Mail To",
     *     description="Mail To",
     *     example=""
     * )
     *
     * @var string
     */
    private $mail_to;

    /**
     * @OA\Property(
     *     title="Spooling",
     *     description="Spooling",
     *     example=null
     * )
     *
     * @var string
     */
    private $spooling;

    /**
     * @OA\Property(
     *     title="Channel ID",
     *     description="Channel ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $channel_id;

    /**
     * @OA\Property(
     *     title="Customer Group",
     *     description="Campaign's customer group",
     *     type="object",
     *     ref="#/components/schemas/Group"
     * )
     *
     * @var object
     */
    private $customer_group;

    /**
     * @OA\Property(
     *     title="Template",
     *     description="Campaign's template",
     *     type="object",
     *     ref="#/components/schemas/EmailTemplate"
     * )
     *
     * @var object
     */
    private $template;

    /**
     * @OA\Property(
     *     title="Event",
     *     description="Campaign's event",
     *     type="object",
     *     ref="#/components/schemas/Event"
     * )
     *
     * @var object
     */
    private $event;
    
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