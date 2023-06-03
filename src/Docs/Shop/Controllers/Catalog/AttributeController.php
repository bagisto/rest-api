<?php

namespace Webkul\RestApi\Docs\Shop\Controllers\Catalog;

class AttributeController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/attributes",
	 *      operationId="getShopAttributes",
	 *      tags={"Attributes"},
	 *      summary="Get attribute list for the shop",
     *      description="Returns attribute list, if you want to retrieve all attributes at once pass pagination=0 otherwise ignore this parameter",
     *      @OA\Parameter(
     *          name="id",
     *          description="Attribute ID",
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
     *                  @OA\Items(ref="#/components/schemas/Attribute")
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
	 *      path="/api/v1/attributes/{id}",
	 *      operationId="getShopAttribute",
     *      tags={"Attributes"},
     *      summary="Get shop attribute by id",
     *      description="Returns shop attribute by id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Attribute id",
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
     *                  ref="#/components/schemas/Attribute"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function get()
    {
    }
}