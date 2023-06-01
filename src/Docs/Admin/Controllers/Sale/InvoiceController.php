<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Sale;

class InvoiceController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/sales/invoices",
	 *      operationId="getOrderInvoices",
	 *      tags={"Invoices"},
	 *      summary="Get admin order's invoices list",
     *      description="Returns order's invoices list, if you want to retrieve all invoices at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Invoice id",
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
     *                  @OA\Items(ref="#/components/schemas/Invoice")
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
	 *      path="/api/v1/admin/sales/invoices/{id}",
	 *      operationId="getOrderInvoiceDetail",
	 *      tags={"Invoices"},
	 *      summary="Get admin order's invoice detail",
     *      description="Returns order's invoice detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Invoice id",
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
     *                  ref="#/components/schemas/Invoice"
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
     *      path="/api/v1/admin/sales/invoices/{order_id}",
     *      operationId="storeOrderInvoice",
     *      tags={"Invoices"},
     *      summary="Create invoice for an order",
     *      description="Create invoice for an order",
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
     *                      property="invoice",
     *                      type="object",
     *                      @OA\Property(
     *                          property="items",
     *                          type="object",
     *                          description="Provide the Order item id as key and quantity to invoice as value (Key:value i.e. order_item_id:quantity_to_invoice)",
     *                          @OA\Property(property=1, type="integer", example=1)
     *                      )
     *                  ),
     *                  required={"invoice"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Invoice created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/Invoice")
     *          )
     *      ),
	 *      @OA\Response(
	 *          response=400,
	 *          description="Bad Request",
	 *          @OA\JsonContent(
	 *              @OA\Property(
	 * 					property="message",
	 * 					type="string",
	 * 					example="Order invoice creation is not allowed."
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
     *                  value={"message":"The invoice.items.0 must be a number."},
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
