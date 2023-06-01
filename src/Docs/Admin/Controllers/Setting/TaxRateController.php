<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Setting;

class TaxRateController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/settings/tax-rates",
	 *      operationId="getTaxRates",
	 *      tags={"Tax-Rates"},
	 *      summary="Get admin tax rate list",
     *      description="Returns tax rate list, if you want to retrieve all tax rates at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Tax Rate id",
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
     *                  @OA\Items(ref="#/components/schemas/TaxRate")
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
	 *      path="/api/v1/admin/settings/tax-rates/{id}",
	 *      operationId="getTaxRate",
	 *      tags={"Tax-Rates"},
	 *      summary="Get admin tax rate detail",
     *      description="Returns tax rate detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Tax Rate id",
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
     *                  ref="#/components/schemas/TaxRate"
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
     *      path="/api/v1/admin/settings/tax-rates",
     *      operationId="storeTaxRate",
     *      tags={"Tax-Rates"},
     *      summary="Store the tax rate",
     *      description="Store the tax rate",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="identifier",
     *                      type="string",
     *                      description="Tax rate's identifier",
     *                      example="gst-rate"
     *                  ),
     *                  @OA\Property(
     *                      property="country",
     *                      type="string",
     *                      description="Tax rate's country code",
     *                      example="IN"
     *                  ),
     *                  @OA\Property(
     *                      property="state",
     *                      type="string",
     *                      description="Tax rate's state, If want to use all state then left it blank, else provide state code.",
     *                      example="MP"
     *                  ),
     *                  @OA\Property(
     *                      property="is_zip",
     *                      description="Is zip uses for zip range or fix zip code i.e. `1` is for zip_range and `empty value` is for fix zip code",
     *                      type="integer",
     *                      example=1,
     *                      enum={1}
     *                  ),
     *                  @OA\Property(
     *                      property="zip_code",
     *                      description="Only use if `is_zip` set to `empty value`",
     *                      type="string",
     *                      example="200000"
     *                  ),
     *                  @OA\Property(
     *                      property="zip_from",
     *                      description="Provide zip from range, Only use if `is_zip` set to `1`",
     *                      type="string",
     *                      example="201100"
     *                  ),
     *                  @OA\Property(
     *                      property="zip_to",
     *                      description="Provide zip to range, Only use if `is_zip` set to `1`",
     *                      type="string",
     *                      example="202000"
     *                  ),
     *                  @OA\Property(
     *                      property="tax_rate",
     *                      description="Provide zip rate",
     *                      type="float",
     *                      example=2.1
     *                  ),
     *                  required={"identifier", "country", "tax_rate"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Tax Rate created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/TaxRate")
     *          )
     *      ),
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
     *      path="/api/v1/admin/settings/tax-rates/{id}",
     *      operationId="updateTaxRates",
     *      tags={"Tax-Rates"},
     *      summary="Update tax rate",
     *      description="Update tax rate",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Tax Rate id",
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
     *                      property="identifier",
     *                      type="string",
     *                      description="Tax rate's identifier",
     *                      example="gst-rate"
     *                  ),
     *                  @OA\Property(
     *                      property="country",
     *                      type="string",
     *                      description="Tax rate's country code",
     *                      example="IN"
     *                  ),
     *                  @OA\Property(
     *                      property="state",
     *                      type="string",
     *                      description="Tax rate's state, If want to use all state then left it blank, else provide state code.",
     *                      example="MP"
     *                  ),
     *                  @OA\Property(
     *                      property="is_zip",
     *                      description="Is zip uses for zip range or fix zip code i.e. `1` is for zip_range and `empty value` is for fix zip code",
     *                      type="integer",
     *                      example=1,
     *                      enum={1}
     *                  ),
     *                  @OA\Property(
     *                      property="zip_code",
     *                      description="Only use if `is_zip` set to `empty value`",
     *                      type="string",
     *                      example="200000"
     *                  ),
     *                  @OA\Property(
     *                      property="zip_from",
     *                      description="Provide zip from range, Only use if `is_zip` set to `1`",
     *                      type="string",
     *                      example="201100"
     *                  ),
     *                  @OA\Property(
     *                      property="zip_to",
     *                      description="Provide zip to range, Only use if `is_zip` set to `1`",
     *                      type="string",
     *                      example="202000"
     *                  ),
     *                  @OA\Property(
     *                      property="tax_rate",
     *                      description="Provide zip rate",
     *                      type="float",
     *                      example=2.1
     *                  ),
     *                  required={"identifier", "country", "tax_rate"}
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
     *                  example="Tax Rate updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/TaxRate"
     *              )
     *          )
     *      ),
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
     *      path="/api/v1/admin/settings/tax-rates/{id}",
     *      operationId="deleteTaxRate",
     *      tags={"Tax-Rates"},
     *      summary="Delete tax rate by id",
     *      description="Delete tax rate by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Tax Rate id",
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
     *                  example="Tax Rate deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }
}
