<?php

namespace Webkul\RestApi\Docs\Admin\Models\Setting;

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
    private $id;

    /**
     * @OA\Property(
     *     title="Title",
     *     description="Slide's title",
     *     example="New Collection for Woman"
     * )
     *
     * @var string
     */
    private $title;

    /**
     * @OA\Property(
     *     title="Path",
     *     description="Slide's image path",
     *     example="slider_images/Default/{image_name.jpg}"
     * )
     *
     * @var string
     */
    private $path;

    /**
     * @OA\Property(
     *     title="Image URL",
     *     description="Slide's image url",
     *     example="http://localhost/private/storage/slider_images/Default/{image_name.jpg}"
     * )
     *
     * @var string
     */
    private $image_url;

    /**
     * @OA\Property(
     *     title="Content",
     *     description="Slide's content",
     *     example="What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry"
     * )
     *
     * @var string
     */
    private $content;

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
     *     title="Slider Path",
     *     description="Slide's redirect slug",
     *     example="women"
     * )
     *
     * @var string
     */
    private $slider_path;

    /**
     * @OA\Property(
     *     title="Locale",
     *     description="Slide's locales, comma separated",
     *     example="nl,en,es,fr,tr"
     * )
     *
     * @var string
     */
    private $locale;

    /**
     * @OA\Property(
     *     title="Sort Order",
     *     description="Sort Order",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $sort_order;

    /**
     * @OA\Property(
     *     title="Expired At",
     *     description="Slider's expiry date",
     *     example="2024-01-27",
     *     format="date",
     *     type="string"
     * )
     *
     * @var \Date
     */
    private $expired_at;
    
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