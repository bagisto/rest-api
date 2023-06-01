<?php

namespace Webkul\RestApi\Docs\Admin\Models\Velocity;

/**
 * @OA\Schema(
 *     title="MetaData",
 *     description="MetaData model",
 * )
 */
class MetaData
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
     *     title="Home Page Content",
     *     description="Velocity's home page content",
     *     example="<p>@include('shop::home.featured-products')</p>"
     * )
     *
     * @var string
     */
    private $home_page_content;

    /**
     * @OA\Property(
     *     title="Footer Left Content",
     *     description="Velocity's footer left side content",
     *     example="<p>We love to craft softwares and solve the real world problems with the binaries. We are highly committed to our goals. We invest our resources to create world class easy to use softwares and applications for the enterprise business with the top notch, on the edge technology expertise.</p>"
     * )
     *
     * @var string
     */
    private $footer_left_content;

    /**
     * @OA\Property(
     *     title="Footer Middle Content",
     *     description="Velocity's footer left side content",
     *     example="<div class=\'col-lg-6 col-md-12 col-sm-12 no-padding\'><ul type=\'none\'><li><a href=\'{!! url('page/about-us') !!}\'>About Us</a></li></ul></div>"
     * )
     *
     * @var string
     */
    private $footer_middle_content;

    /**
     * @OA\Property(
     *     title="Slider",
     *     description="Slider status for velocity theme",
     *     example=1,
     *     enum={0,1}
     * )
     *
     * @var integer
     */
    private $slider;

    /**
     * @OA\Property(
     *     title="Advertisement",
     *     description="Velocity theme advertisement",
     *     example={
     *         "2": {
     *                  {
     *                      "id": 1,
     *                      "type": null,
     *                      "path": "velocity/images/Nfi0eyOaSgVEHKoo3EyVfxXsRZN4t5I2OHzOcn46.jpg",
     *                      "url": "http://localhost/bag145/public/storage/velocity/images/Nfi0eyOaSgVEHKoo3EyVfxXsRZN4t5I2OHzOcn46.jpg"
     *                  }
     *          },
     *         "3": {
     *                  {
     *                      "id": 1,
     *                      "type": null,
     *                      "path": "velocity/images/tcSaP1sXaQZ4gjGfUmwiOrhtKRFhKhNA9mD8Bvc2.jpg",
     *                      "url": "http://localhost/public/storage/velocity/images/tcSaP1sXaQZ4gjGfUmwiOrhtKRFhKhNA9mD8Bvc2.jpg"
     *                  }
     *          },
     *         "4": {
     *                  {
     *                      "id": 1,
     *                      "type": null,
     *                      "path": "velocity/images/jAhQcXYkbuL9AOEXeBYAW1f4uAkZBHQEU3UwRokv.jpg",
     *                      "url": "http://localhost/public/storage/velocity/images/jAhQcXYkbuL9AOEXeBYAW1f4uAkZBHQEU3UwRokv.jpg"
     *                  }
     *          }
     *     },
     *     @OA\Property(
     *         property="2",
     *         type="array",
     *         @OA\Items(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="type", type="string", example=null),
     *             @OA\Property(property="path", type="string", example="velocity/images/{image_name.jpg}"),
     *             @OA\Property(property="url", type="string", example="http://localhost/public/storage/velocity/images/{image_name.jpg}")
     *         )
     *     ),
     *     @OA\Property(
     *         property="3",
     *         type="array",
     *         @OA\Items(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="type", type="string", example=null),
     *             @OA\Property(property="path", type="string", example="velocity/images/{image_name.jpg}"),
     *             @OA\Property(property="url", type="string", example="http://localhost/public/storage/velocity/images/{image_name.jpg}")
     *         )
     *     ),
     *     @OA\Property(
     *         property="4",
     *         type="array",
     *         @OA\Items(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="type", type="string", example=null),
     *             @OA\Property(property="path", type="string", example="velocity/images/{image_name.jpg}"),
     *             @OA\Property(property="url", type="string", example="http://localhost/public/storage/velocity/images/{image_name.jpg}")
     *         )
     *     )
     * )
     *
     * @var object
     */
    private $advertisement;

    /**
     * @OA\Property(
     *     title="Sidebar Category Count",
     *     description="Sidebar category count for Velocity theme",
     *     format="int64",
     *     example=10
     * )
     *
     * @var integer
     */
    private $sidebar_category_count;

    /**
     * @OA\Property(
     *     title="Featured Product Count",
     *     description="Featured product count for Velocity theme",
     *     format="int64",
     *     example=10
     * )
     *
     * @var integer
     */
    private $featured_product_count;

    /**
     * @OA\Property(
     *     title="New Product Count",
     *     description="New product count for Velocity theme",
     *     format="int64",
     *     example=10
     * )
     *
     * @var integer
     */
    private $new_products_count;

    /**
     * @OA\Property(
     *     title="Subscription Bar Content",
     *     description="Subscription bar content for Velocity theme",
     *     example="What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry."
     * )
     *
     * @var string
     */
    private $subscription_bar_content;
    
    /**
     * @OA\Property(
     *     title="Product View Images",
     *     description="Product View Images",
     *     example=null
     * )
     *
     * @var string
     */
    private $product_view_images;
    
    /**
     * @OA\Property(
     *     title="Product Policy",
     *     description="Product policy",
     *     example="Free Shipping on Order $20 or More"
     * )
     *
     * @var string
     */
    private $product_policy;
    
    /**
     * @OA\Property(
     *     title="Locale",
     *     description="Meta data locale code",
     *     example="en"
     * )
     *
     * @var string
     */
    private $locale;

    /**
     * @OA\Property(
     *     title="Channel",
     *     description="Meta data channel code",
     *     example="default"
     * )
     *
     * @var string
     */
    private $channel;

    /**
     * @OA\Property(
     *     title="Header Content Count",
     *     description="Header content count for Velocity theme",
     *     format="int64",
     *     example=10
     * )
     *
     * @var integer
     */
    private $header_content_count;
    
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