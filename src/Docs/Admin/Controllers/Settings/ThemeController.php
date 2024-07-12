<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Settings;

class ThemeController
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/settings/theme/customizations",
     *      operationId="getSettingThemes",
     *      tags={"Themes"},
     *      summary="Get admin themes list",
     *      description="Returns themes list, if you want to retrieve all themes at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Theme id",
     *          required=false,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Parameter(
     *          name="sort",
     *          description="Sort column",
     *          example="id",
     *          required=false,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *
     *      @OA\Parameter(
     *          name="order",
     *          description="Sort order",
     *          required=false,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="string",
     *              enum={"desc", "asc"}
     *          )
     *      ),
     *
     *      @OA\Parameter(
     *          name="page",
     *          description="Page number",
     *          required=false,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Parameter(
     *          name="limit",
     *          description="Limit",
     *          in="query",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *
     *                  @OA\Items(ref="#/components/schemas/Theme")
     *              ),
     *
     *              @OA\Property(
     *                  property="meta",
     *                  ref="#/components/schemas/Pagination"
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     * )
     */
    public function list()
    {
    }

    /**
     * @OA\Get(
     *      path="/api/v1/admin/settings/theme/customizations/{id}",
     *      operationId="getSettingTheme",
     *      tags={"Themes"},
     *      summary="Get admin Themes detail",
     *      description="Returns Themes detail",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Theme id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Theme"
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
     *      path="/api/v1/admin/settings/theme/customizations",
     *      operationId="storeSettingThemes",
     *      tags={"Themes"},
     *      summary="Store the theme",
     *      description="Store the theme",
     *      security={ {"sanctum_admin": {} }},
     *
     *          @OA\RequestBody(
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(
     *
     *                  @OA\Property(
     *                      property="channel_id",
     *                      type="integer",
     *                      description="Channel Id",
     *                      example="1"
     *                  ),
     *                  @OA\Property(
     *                      property="theme_code",
     *                      type="string",
     *                      description="Theme code",
     *                      example="default"
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="Theme name",
     *                      example="Image Carousel"
     *                  ),
     *                  @OA\Property(
     *                      property="sort_order",
     *                      type="integer",
     *                      description="Sort Order",
     *                      example="13"
     *                  ),
     *                  @OA\Property(
     *                      property="type",
     *                      description="Theme Type",
     *                      example="image_carousel"
     *                  ),
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(property="message", type="string", example="Theme created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/Theme")
     *          )
     *      ),
     *
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
     *      path="/api/v1/admin/settings/theme/customizations/{id}",
     *      operationId="updateSettingsTheme",
     *      tags={"Themes"},
     *      summary="Update Theme",
     *      description="Update Theme",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Theme ID",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(
     *
     *                  @OA\Property(
     *                      property="locale",
     *                      type="string",
     *                      description="Locale code",
     *                      example="en"
     *                  ),
     *                  @OA\Property(
     *                      property="en",
     *                      type="object",
     *                      description="English locale options",
     *                      @OA\Property(
     *                          property="options",
     *                          type="object",
     *                          description="Theme options",
     *                          @OA\Property(
     *                              property="images",
     *                              type="object",
     *                              description="Image carousel images",
     *
     *
     *                              @OA\Property(
     *                                  property="link",
     *                                  type="string",
     *                                  description="Image link",
     *                                  example="test1"
     *                              ),
     *                              @OA\Property(
     *                                  property="image",
     *                                  type="string",
     *                                  description="Image path",
     *                                  example="storage/theme/1/1.webp"
     *                              )
     *                          )
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="type",
     *                      type="string",
     *                      description="Theme type",
     *                      example="image_carousel"
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="Theme name",
     *                      example="Image Carousel"
     *                  ),
     *                  @OA\Property(
     *                      property="sort_order",
     *                      type="integer",
     *                      description="Sort order",
     *                      example="12"
     *                  ),
     *                  @OA\Property(
     *                      property="channel_id",
     *                      type="string",
     *                      description="Channel ID",
     *                      example="1"
     *                  ),
     *                  @OA\Property(
     *                      property="theme_code",
     *                      type="string",
     *                      description="Theme code",
     *                      example="default"
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      type="string",
     *                      description="Status",
     *                      example="on"
     *                  ),
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Theme updated successfully"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Theme"
     *              )
     *          )
     *      ),
     *
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
     *      path="/api/v1/admin/settings/theme/customizations/{id}",
     *      operationId="deleteTheme",
     *      tags={"Themes"},
     *      summary="Delete Theme options by id",
     *      description="Delete Theme options by id",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Theme option id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Theme deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }
}
