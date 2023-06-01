<?php

namespace Webkul\RestApi\Docs\Shop\Models\Core;

/**
 * @OA\Schema(
 *     title="Slider",
 *     description="Slider model",
 * )
 */
class Slider
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
     *     title="Title",
     *     description="Slide's title",
     *     example="New Collection for Woman"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *     title="Image URL",
     *     description="Slide's image url",
     *     example="http://localhost/public/storage/slider_images/Default/{image_name.jpg}"
     * )
     *
     * @var string
     */
    public $image_url;

    /**
     * @OA\Property(
     *     title="Content",
     *     description="Slide's content",
     *     example="What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry"
     * )
     *
     * @var string
     */
    public $content;
}