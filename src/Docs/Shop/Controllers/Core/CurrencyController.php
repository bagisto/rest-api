<?php

namespace Webkul\RestApi\Docs\Shop\Controllers\Core;

class CurrencyController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/currencies",
	 *      operationId="getShopCurrencies",
	 *      tags={"Currencies"},
	 *      summary="Get currency list for the shop",
     *      description="Returns currency list, if you want to retrieve all currencies at once pass pagination=0 otherwise ignore this parameter",
     *      @OA\Parameter(
     *          name="id",
     *          description="Currency id",
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
     *                  @OA\Items(ref="#/components/schemas/Currency")
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
	 *      path="/api/v1/currencies/{id}",
	 *      operationId="getShopCurrency",
     *      tags={"Currencies"},
     *      summary="Get shop currency by id",
     *      description="Returns shop currency by id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Currency id",
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
     *                  ref="#/components/schemas/Currency"
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