<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Setting;

class ExchangeRateController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/settings/exchange-rates",
	 *      operationId="getSettingExchangeRates",
	 *      tags={"Exchange-Rates"},
	 *      summary="Get admin exchange rate list",
     *      description="Returns exchange rate list, if you want to retrieve all exchange rates at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Exchange Rate id",
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
     *                  @OA\Items(ref="#/components/schemas/ExchangeRate")
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
	 *      path="/api/v1/admin/settings/exchange-rates/{id}",
	 *      operationId="getSalesExchangeRates",
	 *      tags={"Exchange-Rates"},
	 *      summary="Get admin exchange rate detail",
     *      description="Returns exchange rate detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Exchange Rate ID",
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
     *                  ref="#/components/schemas/ExchangeRate"
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
     *      path="/api/v1/admin/settings/exchange-rates",
     *      operationId="storeSettingExchangeRate",
     *      tags={"Exchange-Rates"},
     *      summary="Store the exchange rate",
     *      description="Store the exchange rate",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="target_currency",
     *                      type="integer",
     *                      description="Target Currency ID",
     *                      example=3
     *                  ),
     *                  @OA\Property(
     *                      property="rate",
     *                      type="float",
     *                      example=0.856
     *                  ),
     *                  required={"target_currency", "rate"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Exchange rate created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/ExchangeRate")
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Error: Unprocessable Content",
     *          @OA\JsonContent(
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
     *      path="/api/v1/admin/settings/exchange-rates/{id}",
     *      operationId="updateSettingExchangeRate",
     *      tags={"Exchange-Rates"},
     *      summary="Update exchange rate",
     *      description="Update exchange rate",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Exchange Rate ID",
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
     *                      property="target_currency",
     *                      type="integer",
     *                      example=3
     *                  ),
     *                  @OA\Property(
     *                      property="rate",
     *                      type="float",
     *                      example=0.80
     *                  ),
     *                  required={"target_currency", "rate"}
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
     *                  example="Exchange rate updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/ExchangeRate"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Error: Unprocessable Content",
     *          @OA\JsonContent(
     *              @OA\Examples(example="result", value={"message":"The target currency has already been taken."}, summary="An result object."),
     *          )
     *      )
     * )
     */
    public function update()
    {
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/admin/settings/exchange-rates/{id}",
     *      operationId="deleteExchangeRate",
     *      tags={"Exchange-Rates"},
     *      summary="Delete exchange rate by id",
     *      description="Delete exchange rate by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Exchange Rate id",
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
     *                  example="Exchange rate deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }
}
