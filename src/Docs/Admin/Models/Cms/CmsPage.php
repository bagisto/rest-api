<?php

namespace Webkul\RestApi\Docs\Admin\Models\Cms;

/**
 * @OA\Schema(
 *     title="CmsPage",
 *     description="CmsPage model",
 * )
 */
class CmsPage
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
     *     title="Layout",
     *     description="Cms Page's layout",
     *     type="string",
     *     example=null
     * )
     *
     * @var string
     */
    private $layout;
    
    /**
     * @OA\Property(
     *     title="Content",
     *     description="Cms Page's content",
     *     type="string",
     *     example=null
     * )
     *
     * @var string
     */
    private $content;
    
    /**
     * @OA\Property(
     *     title="Url Key",
     *     description="Cms Page's unique url key",
     *     type="string",
     *     example="about-us"
     * )
     *
     * @var string
     */
    private $url_key;
    
    /**
     * @OA\Property(
     *     title="Page Title",
     *     description="Cms Page's title",
     *     type="string",
     *     example="about-us"
     * )
     *
     * @var string
     */
    private $page_title;
    
    /**
     * @OA\Property(
     *     title="Html Content",
     *     description="Cms Page's main html content",
     *     type="string",
     *     example="<div class=\'static-container\'>\r\n<div class=\'mb-5\'>\r\n<h2 style=\'margin: 0px 0px 10px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\'>What is Lorem Ipsum?</h2>\r\n<p style=\'margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: 'Open Sans', Arial, sans-serif;\'><strong style=\'margin: 0px; padding: 0px;\'>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style=\'margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: 'Open Sans', Arial, sans-serif;\'></p>\r\n<h2 style=\'margin: 0px 0px 10px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\'>Why do we use it?</h2>\r\n<p style=\'margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: 'Open Sans', Arial, sans-serif;\'>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n</div>"
     * )
     *
     * @var string
     */
    private $html_content;
    
    /**
     * @OA\Property(
     *     title="Meta Title",
     *     description="Cms Page's meta title",
     *     type="string",
     *     example="about-us"
     * )
     *
     * @var string
     */
    private $meta_title;
    
    /**
     * @OA\Property(
     *     title="Meta Description",
     *     description="Cms Page's meta description",
     *     type="string",
     *     example="about-us"
     * )
     *
     * @var string
     */
    private $meta_description;
    
    /**
     * @OA\Property(
     *     title="Meta Keywords",
     *     description="Cms Page's meta keywords",
     *     type="string",
     *     example="about-us"
     * )
     *
     * @var string
     */
    private $meta_keywords;
    
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