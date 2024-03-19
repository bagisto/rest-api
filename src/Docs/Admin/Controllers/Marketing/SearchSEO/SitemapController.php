<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Marketing\SearchSEO;

class SitemapController
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/marketing/search-seo/sitemaps",
     *      operationId="getSitemaps",
     *      tags={"Sitemaps"},
     *      summary="Get admin Sitemaps list",
     *      description="Returns SearchSynonym list, if you want to retrieve all events at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Sitemaps Id",
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
     *                  @OA\Items(ref="#/components/schemas/Sitemaps")
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
     *      path="/api/v1/admin/marketing/search-seo/sitemaps/{id}",
     *      operationId="getSitemap",
     *      tags={"Sitemaps"},
     *      summary="Get admin Sitemaps detail",
     *      description="Returns Sitemaps detail",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Sitemaps ID",
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
     *                  ref="#/components/schemas/Sitemaps"
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
     *      path="/api/v1/admin/marketing/search-seo/sitemaps",
     *      operationId="storeSitemaps",
     *      tags={"Sitemaps"},
     *      summary="Store the Sitemaps",
     *      description="Store the Sitemaps",
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
     *                      property="file_name",
     *                      type="string",
     *                      description="Sitemaps File Name",
     *                      example="site.xml"
     *                  ),
     *                  @OA\Property(
     *                      property="path",
     *                      type="string",
     *                      description="Sitemaps Path",
     *                      example="/sitemap/"
     *                  ),
     *                  required={"file_name", "path"}
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
     *              @OA\Property(property="message", type="string", example="Sitemaps created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/Sitemaps")
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
     *      path="/api/v1/admin/marketing/search-seo/sitemaps/{id}",
     *      operationId="updateSitemaps",
     *      tags={"Sitemaps"},
     *      summary="Update Sitemaps",
     *      description="Update Sitemaps",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Sitemaps ID",
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
     *                      property="file_name",
     *                      type="string",
     *                      description="Sitemaps File Name",
     *                      example="site.xml"
     *                  ),
     *                  @OA\Property(
     *                      property="path",
     *                      type="string",
     *                      description="Sitemaps Path",
     *                      example="/sitemap/"
     *                  ),
     *                  required={"file_name", "path"}
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
     *                  example="Sitemaps updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Sitemaps"
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
     *      path="/api/v1/admin/marketing/search-seo/sitemaps/{id}",
     *      operationId="deleteSitemaps",
     *      tags={"Sitemaps"},
     *      summary="Delete Sitemaps by id",
     *      description="Delete Sitemaps by id",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Sitemaps ID",
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
     *                  example="Sitemaps deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }
}
