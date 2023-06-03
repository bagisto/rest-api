<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Sale;

class RefundController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/sales/refunds",
	 *      operationId="getOrderRefunds",
	 *      tags={"Refunds"},
	 *      summary="Get admin order's refunds list",
     *      description="Returns order's refunds list, if you want to retrieve all refunds at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Refund id",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="order_id",
     *          description="Order id",
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
     *                  @OA\Items(ref="#/components/schemas/Refund")
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
	 *      path="/api/v1/admin/sales/refunds/{id}",
	 *      operationId="getOrderRefundDetail",
	 *      tags={"Refunds"},
	 *      summary="Get admin order's refund detail",
     *      description="Returns order's refund detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Refund id",
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
     *                  ref="#/components/schemas/Refund"
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
     *      path="/api/v1/admin/sales/refunds/{order_id}",
     *      operationId="storeOrderRefund",
     *      tags={"Refunds"},
     *      summary="Create refund for an order",
     *      description="Create refund for an order",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="order_id",
     *          description="Order id",
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
     *                      property="refund",
     *                      type="object",
     *                      @OA\Property(
     *                          property="items",
     *                          type="object",
     *                          description="Provide the Order item id as key and quantity to invoice as value (Key:value i.e. order_item_id:quantity_to_refund)",
     *                          @OA\Property(property=1, type="integer", example=1)
     *                      ),
     *                      @OA\Property(
     *                          property="shipping",
     *                          type="integer",
     *                          description="Provide the shipping change, If you want to refund the shipping charges.",
     *                          example=5
     *                      ),
     *                      @OA\Property(
     *                          property="adjustment_refund",
     *                          type="integer",
     *                          description="Provide the adjustment refund amount, If any.",
     *                          example=3
     *                      ),
     *                      @OA\Property(
     *                          property="adjustment_fee",
     *                          type="integer",
     *                          description="Provide the adjustment fee amount, If any.",
     *                          example=2
     *                      )
     *                  ),
     *                  required={"refund"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Refund created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/Refund")
     *          )
     *      ),
	 *      @OA\Response(
	 *          response=400,
	 *          description="Bad Request",
	 *          @OA\JsonContent(
	 *              @OA\Property(
	 * 					property="message",
	 * 					type="string",
	 * 					example="Order refund creation is not allowed."
	 * 				)
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
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message":"The refund.items.0 must be a number."},
     *                  summary="An result object."
     *              )
     *          )
     *      )
     * )
     */
    public function store()
    {
    }
}
