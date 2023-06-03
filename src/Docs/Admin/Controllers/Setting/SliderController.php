<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Setting;

class SliderController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/settings/sliders",
	 *      operationId="getSliders",
	 *      tags={"Sliders"},
	 *      summary="Get admin slider list",
     *      description="Returns slider list, if you want to retrieve all sliders at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Slider id",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="sort",
     *          description="Sort column",
     *          example="id",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="order",
     *          description="Sort order",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string",
     *              enum={"desc", "asc"}
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="page",
     *          description="Page number",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="limit",
     *          description="Limit",
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/Slider")
     *              ),
     *              @OA\Property(
     *                  property="meta",
     *                  ref="#/components/schemas/Pagination"
     *              )
     *          )
     *      )
	 * )
	 */
	public function list()
	{
	}

	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/settings/sliders/{id}",
	 *      operationId="getSlider",
	 *      tags={"Sliders"},
	 *      summary="Get admin slider detail",
     *      description="Returns slider detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Slider id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Slider"
     *              )
     *          )
     *      )
	 * )
	 */
	public function get()
	{
	}

    /**
     * @OA\Post(
     *      path="/api/v1/admin/settings/sliders",
     *      operationId="storeSlider",
     *      tags={"Sliders"},
     *      summary="Store the slider",
     *      description="Store the slider",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="title",
     *                      type="string",
     *                      description="Slider title",
     *                      example="Slider One"
     *                  ),
     *                  @OA\Property(
     *                      property="locale",
     *                      description="Locale's for slider",
     *                      type="array",
     *                      @OA\Items(type="string", example="en")
     *                  ),
     *                  @OA\Property(
     *                      property="channel_id",
     *                      description="Slider's channel",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="content",
     *                      description="Slider's content",
     *                      type="string",
     *                      example="<h2 style='margin: 0px 0px 10px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px;'>What is Lorem Ipsum?</h2><p style='margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: 'Open Sans', Arial, sans-serif;'><strong style='margin: 0px; padding: 0px;'>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>"
     *                  ),
     *                  @OA\Property(
     *                      property="slider_path",
     *                      description="Slider's redirection slug",
     *                      type="string",
     *                      example="men/jacket"
     *                  ),
     *                  @OA\Property(
     *                      property="sort_order",
     *                      description="Slider's sort order",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="expired_at",
     *                      description="Slider's expiry date",
     *                      type="date",
     *                      example="2024-01-27"
     *                  ),
     *                  @OA\Property(
     *                      property="image",
     *                      description="Slider's banner image",
     *                      type="file"
     *                  ),
     *                  required={"title", "locale"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Slider created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/Slider")
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     */
    public function store()
    {
    }

    /**
     * @OA\Put(
     *      path="/api/v1/admin/settings/sliders/{id}",
     *      operationId="updateSlider",
     *      tags={"Sliders"},
     *      summary="Update slider",
     *      description="Update slider",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Slider id",
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
     *                      property="title",
     *                      type="string",
     *                      description="Slider title",
     *                      example="Men's Collection"
     *                  ),
     *                  @OA\Property(
     *                      property="locale",
     *                      description="Locale's for slider",
     *                      type="array",
     *                      @OA\Items(type="string", example="tr")
     *                  ),
     *                  @OA\Property(
     *                      property="channel_id",
     *                      description="Slider's channel",
     *                      type="integer",
     *                      example=3
     *                  ),
     *                  @OA\Property(
     *                      property="content",
     *                      description="Slider's content",
     *                      type="string",
     *                      example="<p style='margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: 'Open Sans', Arial, sans-serif;'><strong style='margin: 0px; padding: 0px;'>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>"
     *                  ),
     *                  @OA\Property(
     *                      property="slider_path",
     *                      description="Slider's redirection slug",
     *                      type="string",
     *                      example="mens-collection"
     *                  ),
     *                  @OA\Property(
     *                      property="sort_order",
     *                      description="Slider's sort order",
     *                      type="integer",
     *                      example=3
     *                  ),
     *                  @OA\Property(
     *                      property="expired_at",
     *                      description="Slider's expiry date",
     *                      type="date",
     *                      example="2023-12-27"
     *                  ),
     *                  @OA\Property(
     *                      property="image",
     *                      description="Slider's banner image",
     *                      type="file"
     *                  ),
     *                  required={"title", "locale"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Slider updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Slider"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     */
    public function update()
    {
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/admin/settings/sliders/{id}",
     *      operationId="deleteSlider",
     *      tags={"Sliders"},
     *      summary="Delete slider by id",
     *      description="Delete slider by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Slider id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Slider deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }
}
