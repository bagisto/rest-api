<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Setting;

class InventorySourceController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/settings/inventory-sources",
	 *      operationId="getSettingInventorySources",
	 *      tags={"Inventory-Sources"},
	 *      summary="Get admin inventory source list",
     *      description="Returns inventory source list, if you want to retrieve all inventory sources at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Inventory Source ID",
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
     *                  @OA\Items(ref="#/components/schemas/InventorySource")
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
	 *      path="/api/v1/admin/settings/inventory-sources/{id}",
	 *      operationId="getSalesInventorySource",
	 *      tags={"Inventory-Sources"},
	 *      summary="Get admin inventory source detail",
     *      description="Returns inventory source detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Inventory Source ID",
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
     *                  ref="#/components/schemas/InventorySource"
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
     *      path="/api/v1/admin/settings/inventory-sources",
     *      operationId="storeSettingInventorySource",
     *      tags={"Inventory-Sources"},
     *      summary="Store the inventory source",
     *      description="Store the inventory source",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="code",
     *                      type="string",
     *                      example="ncr"
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      example="NCR Region"
     *                  ),
     *                  @OA\Property(
     *                      property="latitude",
     *                      type="float",
     *                      example=0.85612540
     *                  ),
     *                  @OA\Property(
     *                      property="longitude",
     *                      type="float",
     *                      example=0.78655432
     *                  ),
     *                  @OA\Property(
     *                      property="priority",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="contact_name",
     *                      type="string",
     *                      example="John Doe"
     *                  ),
     *                  @OA\Property(
     *                      property="contact_email",
     *                      type="email",
     *                      example="john@example.com"
     *                  ),
     *                  @OA\Property(
     *                      property="contact_number",
     *                      type="integer",
     *                      example=1325469780
     *                  ),
     *                  @OA\Property(
     *                      property="street",
     *                      type="string",
     *                      example="4305 Torrance Blvd"
     *                  ),
     *                  @OA\Property(
     *                      property="country",
     *                      type="string",
     *                      example="US"
     *                  ),
     *                  @OA\Property(
     *                      property="state",
     *                      type="string",
     *                      example="CA"
     *                  ),
     *                  @OA\Property(
     *                      property="city",
     *                      type="string",
     *                      example="Torrance"
     *                  ),
     *                  @OA\Property(
     *                      property="postcode",
     *                      type="string",
     *                      example="90503"
     *                  ),
     *                  required={"code", "name", "contact_name", "contact_email", "contact_number", "street", "country", "state", "city", "postcode"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Inventory source created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/InventorySource")
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
     *      path="/api/v1/admin/settings/inventory-sources/{id}",
     *      operationId="updateSettingInventorySource",
     *      tags={"Inventory-Sources"},
     *      summary="Update inventory source",
     *      description="Update inventory source",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Inventory Source ID",
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
     *                      example="ncr"
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      example="NCR Region"
     *                  ),
     *                  @OA\Property(
     *                      property="latitude",
     *                      type="float",
     *                      example=0.85612540
     *                  ),
     *                  @OA\Property(
     *                      property="longitude",
     *                      type="float",
     *                      example=0.78655432
     *                  ),
     *                  @OA\Property(
     *                      property="priority",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="contact_name",
     *                      type="string",
     *                      example="John Doe"
     *                  ),
     *                  @OA\Property(
     *                      property="contact_email",
     *                      type="email",
     *                      example="john@example.com"
     *                  ),
     *                  @OA\Property(
     *                      property="contact_number",
     *                      type="integer",
     *                      example=1325469780
     *                  ),
     *                  @OA\Property(
     *                      property="street",
     *                      type="string",
     *                      example="4305 Torrance Blvd"
     *                  ),
     *                  @OA\Property(
     *                      property="country",
     *                      type="string",
     *                      example="US"
     *                  ),
     *                  @OA\Property(
     *                      property="state",
     *                      type="string",
     *                      example="CA"
     *                  ),
     *                  @OA\Property(
     *                      property="city",
     *                      type="string",
     *                      example="Torrance"
     *                  ),
     *                  @OA\Property(
     *                      property="postcode",
     *                      type="string",
     *                      example="90503"
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0, 1}
     *                  ),
     *                  required={"code", "name", "contact_name", "contact_email", "contact_number", "street", "country", "state", "city", "postcode"}
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
     *                  example="Inventory source updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/InventorySource"
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
     *      path="/api/v1/admin/settings/inventory-sources/{id}",
     *      operationId="deleteInventorySource",
     *      tags={"Inventory-Sources"},
     *      summary="Delete inventory source by id",
     *      description="Delete inventory source by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Inventory source id",
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
     *                  example="Inventory source deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }
}
