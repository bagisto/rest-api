<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Velocity;

class MetaDataController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/velocity/meta-data",
	 *      operationId="getVelocityMetaData",
	 *      tags={"Velocity"},
	 *      summary="Get admin velocity meta data",
     *      description="Returns velocity meta data",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/MetaData"
     *              )
     *          )
     *      )
	 * )
	 */
	public function renderMetaData()
	{
	}

    /**
     * @OA\Post(
     *      path="/api/v1/admin/velocity/meta-data/{id}",
     *      operationId="storeVelocityMetaData",
     *      tags={"Velocity"},
     *      summary="Store the velocity's meta data",
     *      description="Store the velocity's meta data",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Meta Data ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="locale",
     *                      type="string",
     *                      description="Meta data locale code",
     *                      example="en"
     *                  ),
     *                  @OA\Property(
     *                      property="channel",
     *                      type="string",
     *                      description="Meta data channel code",
     *                      example="default"
     *                  ),
     *                  @OA\Property(
     *                      property="slides",
     *                      type="integer",
     *                      description="Enable slider for velocity theme, i.e. `on` is used to `active` or `null` is use to `inactive`",
     *                      example="on",
     *                      enum={"on"}
     *                  ),
     *                  @OA\Property(
     *                      property="sidebar_category_count",
     *                      type="integer",
     *                      description="Provide side bar category count for front",
     *                      example=10
     *                  ),
     *                  @OA\Property(
     *                      property="header_content_count",
     *                      type="integer",
     *                      description="Provide side bar category count for front",
     *                      example=0
     *                  ),
     *                  @OA\Property(
     *                      property="featured_product_count",
     *                      type="integer",
     *                      description="Provide featured product count for front",
     *                      example=10
     *                  ),
     *                  @OA\Property(
     *                      property="new_products_count",
     *                      type="integer",
     *                      description="Provide new product count for front",
     *                      example=10
     *                  ),
     *                  @OA\Property(
     *                      property="home_page_content",
     *                      type="string",
     *                      description="Provide home page content for front",
     *                      example="<p>@include('shop::home.advertisements.advertisement-four')@include('shop::home.featured-products') @include('shop::home.product-policy') @include('shop::home.advertisements.advertisement-three') @include('shop::home.new-products') @include('shop::home.advertisements.advertisement-two')</p>"
     *                  ),
     *                  @OA\Property(
     *                      property="footer_left_content",
     *                      type="string",
     *                      description="Provide footer left content for front",
     *                      example="<p>We love to craft softwares and solve the real world problems with the binaries. We are highly committed to our goals.</p>"
     *                  ),
     *                  @OA\Property(
     *                      property="footer_middle_content",
     *                      type="string",
     *                      description="Provide footer left content for front",
     *                      example="<div class='col-lg-6 col-md-12 col-sm-12 no-padding'><ul type='none'><li><a href='{!! url('page/cutomer-service') !!}'>Customer Service</a></li><li><a href='{!! url('page/contact-us') !!}'>Contact Us </a></li></ul></div>"
     *                  ),
     *                  @OA\Property(
     *                      property="product_policy",
     *                      type="string",
     *                      description="Provide product policy for front",
     *                      example="Product Replace &amp; Return Available"
     *                  ),
     *                  @OA\Property(
     *                      property="subscription_bar_content",
     *                      type="string",
     *                      description="Provide subscription bar content for front",
     *                      example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
     *                  ),
     *                  @OA\Property(
     *                      property="images",
     *                      description="Provide images in `4`, `3`, and `2` combinations.",
     *                      type="object",
     *                      @OA\Property(
     *                          property="4",
     *                          type="object",
     *                          @OA\Property(property="image_1", type="string", example="https://cdn.pixabay.com/photo/2014/06/21/08/43/rabbit-373691_1280.jpg"),
     *                          @OA\Property(property="image_2", type="string", example="https://cdn.pixabay.com/photo/2019/03/31/19/47/rabbit-4093851_1280.jpg"),
     *                          @OA\Property(property="image_3", type="string", example="https://cdn.pixabay.com/photo/2022/11/16/13/39/cuddly-toys-7596017_1280.jpg"),
     *                          @OA\Property(property="image_4", type="string", example="https://cdn.pixabay.com/photo/2017/07/13/16/10/cute-2500929_1280.jpg")
     *                      ),
     *                      @OA\Property(
     *                          property="3",
     *                          type="object",
     *                          @OA\Property(property="image_1", type="string", example="https://cdn.pixabay.com/photo/2017/06/07/10/47/elephant-2380009_1280.jpg"),
     *                          @OA\Property(property="image_2", type="string", example="https://cdn.pixabay.com/photo/2016/11/14/04/45/elephant-1822636_1280.jpg"),
     *                          @OA\Property(property="image_3", type="string", example="https://cdn.pixabay.com/photo/2013/05/17/07/12/elephant-111695_1280.jpg")
     *                      ),
     *                      @OA\Property(
     *                          property="2",
     *                          type="object",
     *                          @OA\Property(property="image_1", type="string", example="https://cdn.pixabay.com/photo/2016/03/28/12/35/cat-1285634_1280.png"),
     *                          @OA\Property(property="image_2", type="string", example="https://cdn.pixabay.com/photo/2015/06/07/19/42/animal-800760_1280.jpg")
     *                      )
     *                  ),
     *                  required={"locale", "channel", "slides", "sidebar_category_count", "home_page_content", "footer_left_content", "footer_middle_content"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Velocity meta data updated successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/MetaData")
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     */
    public function storeMetaData()
    {
    }
}
