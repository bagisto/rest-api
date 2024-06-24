<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Settings;

class ChannelController
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/settings/channels",
     *      operationId="getChannels",
     *      tags={"Channels"},
     *      summary="Get admin channel list",
     *      description="Returns channel list, if you want to retrieve all channels at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Channel ID",
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
     *                  @OA\Items(ref="#/components/schemas/Channel")
     *              ),
     *
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
     *      path="/api/v1/admin/settings/channels/{id}",
     *      operationId="getChannel",
     *      tags={"Channels"},
     *      summary="Get admin channel detail",
     *      description="Returns channel detail",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Channel ID",
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
     *                  ref="#/components/schemas/Channel"
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
     *      path="/api/v1/admin/settings/channels",
     *      operationId="storeChannel",
     *      tags={"Channels"},
     *      summary="Store the channel",
     *      description="Store the channel",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\RequestBody(
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(
     *
     *                  @OA\Property(
     *                      property="code",
     *                      type="string",
     *                      example="ncr"
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      example="NCR Region"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="string",
     *                      example=null
     *                  ),
     *                  @OA\Property(
     *                      property="inventory_sources",
     *                      type="array",
     *
     *                      @OA\Items(type="integer", example=1)
     *                  ),
     *
     *                  @OA\Property(
     *                      property="root_category_id",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="hostname",
     *                      type="string",
     *                      example="example.com"
     *                  ),
     *                  @OA\Property(
     *                      property="locales",
     *                      type="array",
     *
     *                      @OA\Items(type="integer", example=1)
     *                  ),
     *
     *                  @OA\Property(
     *                      property="default_locale_id",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="currencies",
     *                      type="array",
     *
     *                      @OA\Items(type="integer", example=1)
     *                  ),
     *
     *                  @OA\Property(
     *                      property="base_currency_id",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="theme",
     *                      type="string",
     *                      example="default",
     *                      enum={"default", "bliss"}
     *                  ),
     *                  @OA\Property(
     *                      property="is_maintenance_on",
     *                      type="integer",
     *                      example=0,
     *                      enum={0, 1}
     *                  ),
     *                  @OA\Property(
     *                      property="maintenance_mode_text",
     *                      type="string",
     *                      example="This site is under maintenance mode now, visit again after some time."
     *                  ),
     *                  @OA\Property(
     *                      property="allowed_ips",
     *                      type="string",
     *                      example="144.127.233.247,206.176.12.230,165.173.215.218"
     *                  ),
     *                  @OA\Property(
     *                      property="logo",
     *                      format="byte",
     *                      type="file",
     *                  ),
     *                  @OA\Property(
     *                      property="favicon",
     *                      format="byte",
     *                      type="file"
     *                  ),
     *                  @OA\Property(
     *                      property="seo_title",
     *                      type="string",
     *                      example="NCR Region Store"
     *                  ),
     *                  @OA\Property(
     *                      property="seo_description",
     *                      type="string",
     *                      example="NCR Region Description"
     *                  ),
     *                  @OA\Property(
     *                      property="seo_keywords",
     *                      type="string",
     *                      example="NCR Region Keywords"
     *                  ),
     *                  required={"code", "name", "inventory_sources", "root_category_id", "locales", "default_locale_id", "currencies", "base_currency_id"}
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
     *              @OA\Property(property="message", type="string", example="Channel created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/Channel")
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Error: Unprocessable Content",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Examples(example="result", value={"message":"The target currency has already been taken."}, summary="An result object."),
     *          )
     *      )
     * )
     */
    public function store()
    {
    }

    /**
     * @OA\Put(
     *      path="/api/v1/admin/settings/channels/{id}",
     *      operationId="updateChannel",
     *      tags={"Channels"},
     *      summary="Update channel",
     *      description="Update channel",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Channel ID",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\RequestBody(
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(
     *
     *                  @OA\Property(
     *                      property="code",
     *                      type="string",
     *                      example="ncr"
     *                  ),
     *                  @OA\Property(
     *                      property="en",
     *                      type="object",
     *                          @OA\Property(property="name", type="string", example="NCR Region"),
     *                          @OA\Property(property="maintenance_mode_text", type="string", example="This site is under maintenance mode now, visit again after some time."),
     *                          @OA\Property(property="seo_title", type="string", example="NCR Region Store"),
     *                          @OA\Property(property="seo_description", type="string", example="NCR Region Description"),
     *                          @OA\Property(property="seo_keywords", type="string", example="NCR Region Keywords"),
     *                          @OA\Property(property="description", type="string", example="NCR Region NCR Region NCR Region"),
     *                  ),
     *                  @OA\Property(
     *                      property="inventory_sources",
     *                      type="array",
     *
     *                      @OA\Items(type="integer", example=1)
     *                  ),
     *
     *                  @OA\Property(
     *                      property="root_category_id",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="hostname",
     *                      type="string",
     *                      example="example.com"
     *                  ),
     *                  @OA\Property(
     *                      property="locales",
     *                      type="array",
     *
     *                      @OA\Items(type="integer", example=1)
     *                  ),
     *
     *                  @OA\Property(
     *                      property="default_locale_id",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="currencies",
     *                      type="array",
     *
     *                      @OA\Items(type="integer", example=1)
     *                  ),
     *
     *                  @OA\Property(
     *                      property="base_currency_id",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="theme",
     *                      type="string",
     *                      example="default",
     *                      enum={"default", "bliss"}
     *                  ),
     *                  @OA\Property(
     *                      property="is_maintenance_on",
     *                      type="integer",
     *                      example=0,
     *                      enum={0, 1}
     *                  ),
     *                  @OA\Property(
     *                      property="allowed_ips",
     *                      type="string",
     *                      example="144.127.233.247,206.176.12.230,165.173.215.218"
     *                  ),
     *                  @OA\Property(
     *                      property="logo[]",
     *                      type="file"
     *                  ),
     *                  @OA\Property(
     *                      property="favicon[]",
     *                      type="file"
     *                  ),
     *                  @OA\Property(
     *                      property="locale",
     *                      type="string",
     *                      example="en"
     *                  ),
     *                  required={"code", "inventory_sources", "root_category_id", "locales", "default_locale_id", "currencies", "base_currency_id"}
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
     *                  example="Channel updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Channel"
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Error: Unprocessable Content",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Examples(example="result", value={"message":"The code has already been taken."}, summary="An result object."),
     *          )
     *      )
     * )
     */
    public function update()
    {
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/admin/settings/channels/{id}",
     *      operationId="deleteChannel",
     *      tags={"Channels"},
     *      summary="Delete channel by id",
     *      description="Delete channel by id",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Channel id",
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
     *                  example="Channel deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }
}
