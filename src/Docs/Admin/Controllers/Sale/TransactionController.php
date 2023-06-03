<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Sale;

class TransactionController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/sales/transactions",
	 *      operationId="getOrderTransactions",
	 *      tags={"Transactions"},
	 *      summary="Get admin order's transactions list",
     *      description="Returns order's transactions list, if you want to retrieve all transactions at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Transaction id",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="transaction_id",
     *          description="Payment Transaction id",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
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
     *                  @OA\Items(ref="#/components/schemas/Transaction")
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
	 *      path="/api/v1/admin/sales/transactions/{id}",
	 *      operationId="getOrderTransactionDetail",
	 *      tags={"Transactions"},
	 *      summary="Get admin order's transaction detail",
     *      description="Returns order's transaction detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Transaction id",
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
     *                  ref="#/components/schemas/Transaction"
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
     *      path="/api/v1/admin/sales/transactions",
     *      operationId="storeOrderTransaction",
     *      tags={"Transactions"},
     *      summary="Create transaction for an order",
     *      description="Create transaction for an order",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
	 *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="invoice_id",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="payment_method",
     *                      type="string",
     *                      example="moneytransfer",
     *                      enum={"cashondelivery", "moneytransfer"}
     *                  ),
     *                  @OA\Property(
     *                      property="amount",
     *                      type="integer",
     *                      example=14.00
     *                  ),
     *                  required={"invoice_id", "payment_method", "amount"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The transaction has been saved."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/Transaction")
     *          )
     *      ),
	 *      @OA\Response(
	 *          response=400,
	 *          description="Bad Request",
	 *          @OA\JsonContent(
	 *              @OA\Property(
	 * 					property="message",
	 * 					type="string",
	 * 					example="The specified amount of this transaction exceeds the total amount of the invoice."
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
     *                  value={"message":"The invoice_id field is required."},
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
