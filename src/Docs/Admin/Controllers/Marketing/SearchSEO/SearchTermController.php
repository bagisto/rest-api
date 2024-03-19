<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Marketing\SearchSEO;

class SearchTermController
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/marketing/search-seo/search-terms",
     *      operationId="getSearchTerms",
     *      tags={"SearchTerms"},
     *      summary="Get admin SearchTerms list",
     *      description="Returns SearchTerms list, if you want to retrieve all events at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="SearchTerms Id",
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
     *                  @OA\Items(ref="#/components/schemas/SearchTerm")
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
     *      path="/api/v1/admin/marketing/search-seo/search-terms/{id}",
     *      operationId="getSearchTerm",
     *      tags={"SearchTerms"},
     *      summary="Get admin SearchTerm detail",
     *      description="Returns SearchTerm detail",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="SearchTerm ID",
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
     *                  ref="#/components/schemas/SearchTerm"
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
     *      path="/api/v1/admin/marketing/search-seo/search-terms",
     *      operationId="storeSearchTerms",
     *      tags={"SearchTerms"},
     *      summary="Store the SearchTerms",
     *      description="Store the SearchTerms",
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
     *                      property="term",
     *                      type="string",
     *                      description="SearchTerm's Term",
     *                      example="Adorable"
     *                  ),
     *                  @OA\Property(
     *                      property="redirect_url",
     *                      type="string",
     *                      description="SearchTerm Redirect URL",
     *                      example="http://localhost/bagisto_2.x/public"
     *                  ),
     *                  @OA\Property(
     *                      property="channel_id",
     *                      type="integer",
     *                      description="SearchTerm Channel ID",
     *                      example="1"
     *                  ),
     *                  @OA\Property(
     *                      property="locale",
     *                      type="string",
     *                      description="SearchTerm Locale",
     *                      example="ar"
     *                  ),
     *                  required={"term", "redirect_url", "channel_id", "locale"}
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
     *              @OA\Property(property="message", type="string", example="SearchTerms created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/SearchTerm")
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
     *      path="/api/v1/admin/marketing/search-seo/search-terms/{id}",
     *      operationId="updateSearchTerms",
     *      tags={"SearchTerms"},
     *      summary="Update SearchTerms",
     *      description="Update SearchTerms",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="SearchTerms ID",
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
     *                      property="term",
     *                      type="string",
     *                      description="SearchTerm's Term",
     *                      example="Adorable"
     *                  ),
     *                  @OA\Property(
     *                      property="redirect_url",
     *                      type="string",
     *                      description="SearchTerm Redirect URL",
     *                      example="http://localhost/bagisto_2.x/public"
     *                  ),
     *                  @OA\Property(
     *                      property="channel_id",
     *                      type="integer",
     *                      description="SearchTerm Channel ID",
     *                      example="1"
     *                  ),
     *                  @OA\Property(
     *                      property="locale",
     *                      type="string",
     *                      description="SearchTerm Locale",
     *                      example="ar"
     *                  ),
     *                  required={"term", "redirect_url", "channel_id", "locale"}
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
     *                  example="SearchTerm updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/SearchTerm"
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
     *      path="/api/v1/admin/marketing/search-seo/search-terms/{id}",
     *      operationId="deleteSearchTerm",
     *      tags={"SearchTerms"},
     *      summary="Delete SearchTerm by id",
     *      description="Delete SearchTerms by id",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="SearchTerms ID",
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
     *                  example="SearchTerm deleted successfully."),
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
     *      path="/api/v1/admin/marketing/search-seo/search-terms/mass-destroy",
     *      operationId="massDeleteSearchTerms",
     *      tags={"SearchTerms"},
     *      summary="Mass delete SearchTerms",
     *      description="Mass delete SearchTerms",
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
     *                      description="SearchTerm's Ids `CommaSeparated`",
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
     *                  example="Selected SearchTerms successfully deleted."),
     *              )
     *          )
     *      )
     * )
     */
    public function massDestroy()
    {
    }
}
