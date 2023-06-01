<?php

namespace Webkul\RestApi\Docs\Admin\Models\Setting;

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
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *     title="Code",
     *     description="Channel code",
     *     example="default"
     * )
     *
     * @var string
     */
    private $code;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Channel name",
     *     example="Default"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Description",
     *     description="Channel description",
     *     example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
     * )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     *     title="Timezone",
     *     description="Channel timezone",
     *     example="GMT+5:30"
     * )
     *
     * @var string
     */
    private $timezone;

    /**
     * @OA\Property(
     *     title="Theme",
     *     description="Channel theme code",
     *     example="velocity"
     * )
     *
     * @var string
     */
    private $theme;

    /**
     * @OA\Property(
     *     title="Home Page Content",
     *     description="Channel home page content",
     *     example="<p>@include('shop::home.slider') @include('shop::home.featured-products') @include('shop::home.new-products')</p>"
     * )
     *
     * @var string
     */
    private $home_page_content;

    /**
     * @OA\Property(
     *     title="Footer Content",
     *     description="Channel footer content",
     *     example="<div class='list-container'><span class='list-heading'>Quick Links</span></div>"
     * )
     *
     * @var string
     */
    private $footer_content;

    /**
     * @OA\Property(
     *     title="Hostname",
     *     description="Channel host name, website URL",
     *     example="https://demo.bagisto.com/"
     * )
     *
     * @var string
     */
    private $hostname;

    /**
     * @OA\Property(
     *     title="Logo",
     *     description="Channel logo, website's logo",
     *     example="channel/{channel_id}/{logo_name.jpg}"
     * )
     *
     * @var string
     */
    private $logo;

    /**
     * @OA\Property(
     *     title="Logo URL",
     *     description="Channel logo URL, website's logo URL",
     *     example="http://localhost/private/storage/channel/{channel_id}/{logo_name.jpg}"
     * )
     *
     * @var string
     */
    private $logo_url;

    /**
     * @OA\Property(
     *     title="Favicon",
     *     description="Channel favicon, website's favicon",
     *     example="channel/{channel_id}/{favicon_name.jpg}"
     * )
     *
     * @var string
     */
    private $favicon;

    /**
     * @OA\Property(
     *     title="Favicon URL",
     *     description="Channel favicon URL, website's favicon URL",
     *     example="http://localhost/private/storage/channel/{channel_id}/{favicon_name.jpg}"
     * )
     *
     * @var string
     */
    private $favicon_url;

    /**
     * @OA\Property(
     *     title="Default Locale",
     *     description="Channel default locale"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Setting\Locale
     */
    private $default_locale;

    /**
     * @OA\Property(
     *     title="Root Category Id",
     *     description="Channel's default root category ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $root_category_id;

    /**
     * @OA\Property(
     *     title="Root Category",
     *     description="Channel's default root category"
     * )
     *
     * @var \Webkul\RestApi\Docs\Admin\Models\Catalog\Category
     */
    private $root_category;
    
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