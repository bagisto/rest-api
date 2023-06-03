<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Setting;

class TaxCategoryController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/settings/tax-categories",
	 *      operationId="getTaxCategories",
	 *      tags={"Tax-Categories"},
	 *      summary="Get admin tax category list",
     *      description="Returns tax category list, if you want to retrieve all tax categories at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Tax Category id",
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
     *                  @OA\Items(ref="#/components/schemas/TaxCategory")
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
	 *      path="/api/v1/admin/settings/tax-categories/{id}",
	 *      operationId="getTaxCategory",
	 *      tags={"Tax-Categories"},
	 *      summary="Get admin tax category detail",
     *      description="Returns tax category detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Tax Category id",
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
     *                  ref="#/components/schemas/TaxCategory"
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
     *      path="/api/v1/admin/settings/tax-categories",
     *      operationId="storeTaxCategory",
     *      tags={"Tax-Categories"},
     *      summary="Store the tax category",
     *      description="Store the tax category",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="code",
     *                      type="string",
     *                      description="Tax category's code",
     *                      example="service-tax"
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="Tax category's name",
     *                      example="Service Tax"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="string",
     *                      description="Tax category's description",
     *                      example="This tax category will apply to all states of a country."
     *                  ),
     *                  @OA\Property(
     *                      property="taxrates",
     *                      description="Tax category's rates",
     *                      type="array",
     *                      @OA\Items(type="integer", example=1)
     *                  ),
     *                  required={"code", "name", "description", "taxrates"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Tax Category created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/TaxCategory")
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
     *      path="/api/v1/admin/settings/tax-categories/{id}",
     *      operationId="updateTaxCategory",
     *      tags={"Tax-Categories"},
     *      summary="Update tax category",
     *      description="Update tax category",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Tax Category id",
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
     *                      description="Tax category's code",
     *                      example="service-tax"
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="Tax category's name",
     *                      example="Service Tax"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="string",
     *                      description="Tax category's description",
     *                      example="This tax category will apply to all states of a country."
     *                  ),
     *                  @OA\Property(
     *                      property="taxrates",
     *                      description="Tax category's rates",
     *                      type="array",
     *                      @OA\Items(type="integer", example=1)
     *                  ),
     *                  required={"code", "name", "description", "taxrates"}
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
     *                  example="Tax Category updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/TaxCategory"
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
     *      path="/api/v1/admin/settings/tax-categories/{id}",
     *      operationId="deleteTaxCategory",
     *      tags={"Tax-Categories"},
     *      summary="Delete tax category by id",
     *      description="Delete tax category by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Tax Category id",
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
     *                  example="Tax Category deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }
}
