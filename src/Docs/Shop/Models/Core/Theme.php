<?php

namespace Webkul\RestApi\Docs\Shop\Models\Core;

/**
 * @OA\Schema(
 *     title="Themes",
 *     description="Theme model",
 * )
 */
class Theme
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
    public $id;

    /**
     * @OA\Property(
     *     title="channel_id",
     *     description="channel_id",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    public $channel_id;

    /**
     * @OA\Property(
     *     title="type",
     *     description="type",
     *     example="image_carousel",
     *     type="string"
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *     title="name",
     *     description="name",
     *     type="string",
     *     example="image_carousel"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="status",
     *     description="status",
     *     type="integer",
     *     example=1
     * )
     *
     * @var int
     */
    public $status;

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

    /**
     * @OA\Property(
     *     title="sort_order",
     *     description="sort_order",
     *     type="integer",
     *     example=1
     * )
     *
     * @var int
     */
    public $sort_order;
}
