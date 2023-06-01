<?php

namespace Webkul\RestApi\Docs\Admin\Models\Marketing;

/**
 * @OA\Schema(
 *     title="EmailTemplate",
 *     description="EmailTemplate model",
 * )
 */
class EmailTemplate
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
     *     description="Email template name",
     *     example="Birthday Theme"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="Email template status",
     *     example=1,
     *     enum={0,1}
     * )
     *
     * @var integer
     */
    private $status;

    /**
     * @OA\Property(
     *     title="Content",
     *     description="Email template content",
     *     example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
     * )
     *
     * @var string
     */
    private $content;

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