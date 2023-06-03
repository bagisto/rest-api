<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Setting;

class CurrencyController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/settings/currencies",
	 *      operationId="getSettingCurrencies",
	 *      tags={"Currencies"},
	 *      summary="Get admin currency list",
     *      description="Returns currency list, if you want to retrieve all currencies at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
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
	 *      path="/api/v1/admin/settings/currencies/{id}",
	 *      operationId="getSalesCurrency",
	 *      tags={"Currencies"},
	 *      summary="Get admin currency detail",
     *      description="Returns currency detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Currency ID",
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
     *      )
	 * )
	 */
	public function get()
	{
	}

    /**
     * @OA\Post(
     *      path="/api/v1/admin/settings/currencies",
     *      operationId="storeSettingCurrency",
     *      tags={"Currencies"},
     *      summary="Store the currency",
     *      description="Store the currency",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="code",
     *                      type="string",
     *                      description="Currency code",
     *                      example="INR",
     *                      minLength=3,
     *                      maxLength=3
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      example="Rupee"
     *                  ),
     *                  @OA\Property(
     *                      property="symbol",
     *                      type="string",
     *                      example="₹"
     *                  ),
     *                  required={"code", "name"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Currency created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/Currency")
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
     *              @OA\Examples(example="result", value={"message":"The code may not be greater than 3 characters."}, summary="An result object."),
     *          )
     *      )
     * )
     */
    public function store()
    {
    }

    /**
     * @OA\Put(
     *      path="/api/v1/admin/settings/currencies/{id}",
     *      operationId="updateSettingCurrency",
     *      tags={"Currencies"},
     *      summary="Update currency",
     *      description="Update currency",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Currency ID",
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
     *                      property="code",
     *                      type="string",
     *                      example="INR"
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      example="Rupee"
     *                  ),
     *                  @OA\Property(
     *                      property="symbol",
     *                      type="string",
     *                      example="₹"
     *                  ),
     *                  required={"code", "name", "symbol"}
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
     *                  example="Currency updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Currency"
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
     *      path="/api/v1/admin/settings/currencies/{id}",
     *      operationId="deleteCurrency",
     *      tags={"Currencies"},
     *      summary="Delete currency by id",
     *      description="Delete currency by id",
     *      security={ {"sanctum_admin": {} }},
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
     *                  property="message",
     *                  type="string",
     *                  example="Currency Deleted Successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }
}
