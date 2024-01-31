<?php

namespace Webkul\RestApi\Docs\Shop\Models\Core;

/**
 * @OA\Schema(
 *     title="Channel",
 *     description="Channel model",
 * )
 */
class Channel
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
     *     title="Code",
     *     description="Channel code",
     *     example="default"
     * )
     *
     * @var string
     */
    public $code;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Channel name",
     *     example="Default"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="Description",
     *     description="Channel description",
     *     example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     title="Timezone",
     *     description="Channel timezone",
     *     example="GMT+5:30"
     * )
     *
     * @var string
     */
    public $timezone;

    /**
     * @OA\Property(
     *     title="Theme",
     *     description="Channel theme code",
     *     example="velocity"
     * )
     *
     * @var string
     */
    public $theme;

    /**
     * @OA\Property(
     *     title="Home Page Content",
     *     description="Channel home page content",
     *     example="<p>@include('shop::home.slider') @include('shop::home.featured-products') @include('shop::home.new-products')</p>"
     * )
     *
     * @var string
     */
    public $home_page_content;

    /**
     * @OA\Property(
     *     title="Footer Content",
     *     description="Channel footer content",
     *     example="<div class='list-container'><span class='list-heading'>Quick Links</span></div>"
     * )
     *
     * @var string
     */
    public $footer_content;

    /**
     * @OA\Property(
     *     title="Hostname",
     *     description="Channel host name, website URL",
     *     example="https://demo.bagisto.com/"
     * )
     *
     * @var string
     */
    public $hostname;

    /**
     * @OA\Property(
     *     title="Logo",
     *     description="Channel logo, website's logo",
     *     example="channel/{channel_id}/{logo_name.jpg}"
     * )
     *
     * @var string
     */
    public $logo;

    /**
     * @OA\Property(
     *     title="Logo URL",
     *     description="Channel logo URL, website's logo URL",
     *     example="http://localhost/public/storage/channel/{channel_id}/{logo_name.jpg}"
     * )
     *
     * @var string
     */
    public $logo_url;

    /**
     * @OA\Property(
     *     title="Favicon",
     *     description="Channel favicon, website's favicon",
     *     example="channel/{channel_id}/{favicon_name.jpg}"
     * )
     *
     * @var string
     */
    public $favicon;

    /**
     * @OA\Property(
     *     title="Favicon URL",
     *     description="Channel favicon URL, website's favicon URL",
     *     example="http://localhost/public/storage/channel/{channel_id}/{favicon_name.jpg}"
     * )
     *
     * @var string
     */
    public $favicon_url;

    /**
     * @OA\Property(
     *     title="Default Locale",
     *     description="Channel default locale"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Core\Locale
     */
    public $default_locale;

    /**
     * @OA\Property(
     *     title="Root Category Id",
     *     description="Channel's default root category ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    public $root_category_id;

    /**
     * @OA\Property(
     *     title="Root Category",
     *     description="Channel's default root category"
     * )
     *
     * @var \Webkul\RestApi\Docs\Shop\Models\Catalog\Category
     */
    public $root_category;

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
    public $created_at;

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
    public $updated_at;
}
