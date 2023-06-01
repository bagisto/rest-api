<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Marketing;

class CatalogRuleController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/promotions/catalog-rules",
	 *      operationId="getCatalogRules",
	 *      tags={"CatalogRules"},
	 *      summary="Get admin catalog rule list",
     *      description="Returns catalog rule list, if you want to retrieve all catalog rules at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Catalog Rule Id",
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
     *                  @OA\Items(ref="#/components/schemas/CatalogRule")
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
	 *      path="/api/v1/admin/promotions/catalog-rules/{id}",
	 *      operationId="getCatalogRule",
	 *      tags={"CatalogRules"},
	 *      summary="Get admin catalog rule detail",
     *      description="Returns catalog rule detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Catalog Rule ID",
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
     *                  ref="#/components/schemas/CatalogRule"
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
     *      path="/api/v1/admin/promotions/catalog-rules",
     *      operationId="storeCatalogRule",
     *      tags={"CatalogRules"},
     *      summary="Store the catalog-rule",
     *      description="Store the catalog-rule",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="Catalog rule name",
     *                      example="Offer 10%"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="string",
     *                      description="Catalog rule description",
     *                      example="Buy 2 time & get 10% off"
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      type="ingerer",
     *                      description="Catalog rule status",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="channels",
     *                      description="Catalog rule will applicable on which channels?",
     *                      type="array",
     *                      example={1, 2},
     *                      @OA\Items(type="integer")
     *                  ),
     *                  @OA\Property(
     *                      property="customer_groups",
     *                      description="Catalog rule will applicable on which customer's groups?",
     *                      type="array",
     *                      example={1, 2},
     *                      @OA\Items(type="integer")
     *                  ),
     *                  @OA\Property(
     *                      property="starts_from",
     *                      description="Catalog rule will applicable from date",
     *                      format="date",
     *                      type="string",
     *                      example="2023-05-25"
     *                  ),
     *                  @OA\Property(
     *                      property="ends_till",
     *                      description="Catalog rule will applicable till date",
     *                      format="date",
     *                      type="string",
     *                      example="2023-05-31"
     *                  ),
     *                  @OA\Property(
     *                      property="sort_order",
     *                      description="Catalog rule priority",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="condition_type",
     *                      description="Catalog rule condition type, i.e. `1` is used for `All Conditions are True` and `2` is for `Any Condition is True`",
     *                      type="integer",
     *                      example=1,
     *                      enum={1, 2}
     *                  ),
     *                  @OA\Property(
     *                      property="conditions",
     *                      description="Catalog rule conditions",
     *                      type="array",
     *                      example={{
     *                          "value": "1",
     *                          "operator": "<=",
     *                          "attribute": "product|price",
     *                          "attribute_type": "price"
     *                      }},
     *                      @OA\Items(
     *                          @OA\Property(property="value", type="string", example="1"),
     *                          @OA\Property(property="operator", type="string", example="<="),
     *                          @OA\Property(property="attribute", type="string", example="product|price"),
     *                          @OA\Property(property="attribute_type", type="string", example="price")
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="action_type",
     *                      description="Action type i.e. `by_fixed` & `by_percent`",
     *                      type="string",
     *                      example="by_percent",
     *                      enum={"by_fixed", "by_percent"}
     *                  ),
     *                  @OA\Property(
     *                      property="discount_amount",
     *                      description="Provide discount amount",
     *                      type="float",
     *                      example=10.50
     *                  ),
     *                  @OA\Property(
     *                      property="end_other_rules",
     *                      description="End other rules status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0, 1}
     *                  ),
     *                  required={"name", "channels", "customer_groups", "action_type", "discount_amount"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Catalog rule created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/CatalogRule")
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
     *      path="/api/v1/admin/promotions/catalog-rules/{id}",
     *      operationId="updateCatalogRule",
     *      tags={"CatalogRules"},
     *      summary="Update catalog rule",
     *      description="Update catalog rule",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Catalog Rule ID",
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
     *                      property="name",
     *                      type="string",
     *                      description="Catalog rule name",
     *                      example="Offer 10%"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="string",
     *                      description="Catalog rule description",
     *                      example="Buy 2 time & get 10% off"
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      type="ingerer",
     *                      description="Catalog rule status",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="channels",
     *                      description="Catalog rule will applicable on which channels?",
     *                      type="array",
     *                      example={1, 2},
     *                      @OA\Items(type="integer")
     *                  ),
     *                  @OA\Property(
     *                      property="customer_groups",
     *                      description="Catalog rule will applicable on which customer's groups?",
     *                      type="array",
     *                      example={1, 2},
     *                      @OA\Items(type="integer")
     *                  ),
     *                  @OA\Property(
     *                      property="starts_from",
     *                      description="Catalog rule will applicable from date",
     *                      format="date",
     *                      type="string",
     *                      example="2023-05-25"
     *                  ),
     *                  @OA\Property(
     *                      property="ends_till",
     *                      description="Catalog rule will applicable till date",
     *                      format="date",
     *                      type="string",
     *                      example="2023-05-31"
     *                  ),
     *                  @OA\Property(
     *                      property="sort_order",
     *                      description="Catalog rule priority",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="condition_type",
     *                      description="Catalog rule condition type, i.e. `1` is used for `All Conditions are True` and `2` is for `Any Condition is True`",
     *                      type="integer",
     *                      example=1,
     *                      enum={1, 2}
     *                  ),
     *                  @OA\Property(
     *                      property="conditions",
     *                      description="Catalog rule conditions",
     *                      type="array",
     *                      example={{
     *                          "value": "1",
     *                          "operator": "<=",
     *                          "attribute": "product|price",
     *                          "attribute_type": "price"
     *                      }},
     *                      @OA\Items(
     *                          @OA\Property(property="value", type="string", example="1"),
     *                          @OA\Property(property="operator", type="string", example="<="),
     *                          @OA\Property(property="attribute", type="string", example="product|price"),
     *                          @OA\Property(property="attribute_type", type="string", example="price")
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="action_type",
     *                      description="Action type i.e. `by_fixed` & `by_percent`",
     *                      type="string",
     *                      example="by_percent",
     *                      enum={"by_fixed", "by_percent"}
     *                  ),
     *                  @OA\Property(
     *                      property="discount_amount",
     *                      description="Provide discount amount",
     *                      type="float",
     *                      example=10.50
     *                  ),
     *                  @OA\Property(
     *                      property="end_other_rules",
     *                      description="End other rules status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0, 1}
     *                  ),
     *                  required={"name", "channels", "customer_groups", "action_type", "discount_amount"}
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
     *                  example="Catalog rule updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/CatalogRule"
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
     *      path="/api/v1/admin/promotions/catalog-rules/{id}",
     *      operationId="deleteCatalogRule",
     *      tags={"CatalogRules"},
     *      summary="Delete catalog rule by id",
     *      description="Delete catalog rule by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Catalog Rule ID",
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
     *                  example="Catalog rule deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }
}
