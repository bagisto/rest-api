<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Marketing\SearchSEO;

class URLRewriteController
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/marketing/search-seo/url-rewrites",
     *      operationId="getURLRewrites",
     *      tags={"URLRewrite"},
     *      summary="Get admin URLRewrites list",
     *      description="Returns URLRewrites list, if you want to retrieve all events at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="URLRewrites Id",
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
     *                  @OA\Items(ref="#/components/schemas/URLRewrite")
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
     *      path="/api/v1/admin/marketing/search-seo/url-rewrites/{id}",
     *      operationId="getURLRewrite",
     *      tags={"URLRewrite"},
     *      summary="Get admin URLRewrite detail",
     *      description="Returns URLRewrite detail",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="URLRewrite ID",
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
     *                  ref="#/components/schemas/URLRewrite"
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
     *      path="/api/v1/admin/marketing/search-seo/url-rewrites",
     *      operationId="storeURLRewrite",
     *      tags={"URLRewrite"},
     *      summary="Store the URLRewrites",
     *      description="Store the URLRewrites",
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
     *                      property="entity_type",
     *                      type="string",
     *                      description="URLRewrite For",
     *                      example="category"
     *                  ),
     *                  @OA\Property(
     *                      property="request_path",
     *                      type="string",
     *                      description="URLRewrite Requested Path",
     *                      example="new-requested-path"
     *                  ),
     *                  @OA\Property(
     *                      property="target_path",
     *                      type="string",
     *                      description="URLRewrite Target Path",
     *                      example="target-path"
     *                  ),
     *                  @OA\Property(
     *                      property="redirect_type",
     *                      type="integer",
     *                      description="URLRewrite Redirect Type",
     *                      example="302",
     *                      enum={302, 301}
     *                  ),
     *                  @OA\Property(
     *                      property="locale",
     *                      type="string",
     *                      description="URLRewrite Locale",
     *                      example="ar",
     *                  ),
     *                  required={"entity_type", "request_path", "target_path", "redirect_type", "locale"}
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
     *              @OA\Property(property="message", type="string", example="URLRewrite created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/URLRewrite")
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
     *      path="/api/v1/admin/marketing/search-seo/url-rewrites/{id}",
     *      operationId="updateURLRewrite",
     *      tags={"URLRewrite"},
     *      summary="Update URLRewrite",
     *      description="Update URLRewrite",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="URLRewrite ID",
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
     *                      property="entity_type",
     *                      type="string",
     *                      description="URLRewrite For",
     *                      example="category"
     *                  ),
     *                  @OA\Property(
     *                      property="request_path",
     *                      type="string",
     *                      description="URLRewrite Requested Path",
     *                      example="new-requested-path"
     *                  ),
     *                  @OA\Property(
     *                      property="target_path",
     *                      type="string",
     *                      description="URLRewrite Target Path",
     *                      example="target-path"
     *                  ),
     *                  @OA\Property(
     *                      property="redirect_type",
     *                      type="integer",
     *                      description="URLRewrite Redirect Type",
     *                      example="302",
     *                      enum={302, 301}
     *                  ),
     *                  @OA\Property(
     *                      property="locale",
     *                      type="string",
     *                      description="URLRewrite Locale",
     *                      example="ar",
     *                  ),
     *                  required={"entity_type", "request_path", "target_path", "redirect_type", "locale"}
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
     *                  example="URLRewrite updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/URLRewrite"
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
     *      path="/api/v1/admin/marketing/search-seo/url-rewrites/{id}",
     *      operationId="deleteURLRewrite",
     *      tags={"URLRewrite"},
     *      summary="Delete URLRewrite by id",
     *      description="Delete URLRewrite by id",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="URLRewrite ID",
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
     *                  example="URLRewrite deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/admin/marketing/search-seo/url-rewrites/mass-destroy",
     *      operationId="massDeleteURLRewrites",
     *      tags={"URLRewrite"},
     *      summary="Mass delete URLRewrites",
     *      description="Mass delete URLRewrites",
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
     *                      property="indices",
     *                      description="URLRewrite's Ids `CommaSeparated`",
     *                      type="string",
     *                      example={1,2}
     *                  ),
     *                  required={"indices"}
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
     *                  example="Selected URLRewrite successfully deleted."),
     *              )
     *          )
     *      )
     * )
     */
    public function massDestroy()
    {
    }
}
