<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Marketing\SearchSEO;

class SearchSynonymController
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/marketing/search-seo/search-synonyms",
     *      operationId="getSearchSynonyms",
     *      tags={"Search Synonym"},
     *      summary="Get search synonyms",
     *      description="Returns search synonyms, if you want to retrieve all search synonyms at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="SearchSynonym Id",
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
     *                  @OA\Items(ref="#/components/schemas/SearchSynonym")
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
    public function list() {}

    /**
     * @OA\Get(
     *      path="/api/v1/admin/marketing/search-seo/search-synonyms/{id}",
     *      operationId="getSearchSynonym",
     *      tags={"Search Synonym"},
     *      summary="Get search synonym detail",
     *      description="Returns SearchSynonym detail",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="SearchSynonym ID",
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
     *                  ref="#/components/schemas/SearchSynonym"
     *              )
     *          )
     *      )
     * )
     */
    public function get() {}

    /**
     * @OA\Post(
     *      path="/api/v1/admin/marketing/search-seo/search-synonyms",
     *      operationId="storeSearchSynonym",
     *      tags={"Search Synonym"},
     *      summary="Store the search synonym",
     *      description="Store the search synonym",
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
     *                      property="name",
     *                      type="string",
     *                      description="SearchSynonym name",
     *                      example="Shoes"
     *                  ),
     *                  @OA\Property(
     *                      property="terms",
     *                      type="string",
     *                      description="SearchSynonym Terms",
     *                      example="Shoes, Boot, SportShoes"
     *                  ),
     *                  required={"name", "terms"}
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
     *              @OA\Property(property="message", type="string", example="SearchSynonym created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/SearchSynonym")
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     */
    public function store() {}

    /**
     * @OA\Put(
     *      path="/api/v1/admin/marketing/search-seo/search-synonyms/{id}",
     *      operationId="updateSearchSynonym",
     *      tags={"Search Synonym"},
     *      summary="Update search synonym",
     *      description="Update search synonym",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="SearchSynonym ID",
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
     *                      property="name",
     *                      type="string",
     *                      description="SearchSynonym name",
     *                      example="Shoes"
     *                  ),
     *                  @OA\Property(
     *                      property="terms",
     *                      type="string",
     *                      description="SearchSynonym Terms",
     *                      example="Shoes, Boot, SportShoes"
     *                  ),
     *                  required={"name", "terms"}
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
     *                  example="SearchSynonym updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/SearchSynonym"
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
    public function update() {}

    /**
     * @OA\Delete(
     *      path="/api/v1/admin/marketing/search-seo/search-synonyms/{id}",
     *      operationId="deleteSearchSynonym",
     *      tags={"Search Synonym"},
     *      summary="Delete search synonym by id",
     *      description="Delete search synonym by id",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="SearchSynonym ID",
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
     *                  example="SearchSynonym deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy() {}

    /**
     * @OA\Post(
     *      path="/api/v1/admin/marketing/search-seo/search-synonyms/mass-destroy",
     *      operationId="massDeleteSearchSynonym",
     *      tags={"Search Synonym"},
     *      summary="Mass delete search synonym",
     *      description="Mass delete search synonym",
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
     *                      description="SearchSynonym's Ids `CommaSeparated`",
     *                      type="string",
     *                      example={1,2}
     *                  ),
     *                  @OA\Property(
     *                      property="value",
     *                      description="SearchSynonym's status value",
     *                      type="integer",
     *                      example=null,
     *                      enum={null}
     *                  ),
     *                  required={"indices", "update_value"}
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
     *                  example="Selected SearchSynonyms successfully deleted."),
     *              )
     *          )
     *      )
     * )
     */
    public function massDestroy() {}
}
