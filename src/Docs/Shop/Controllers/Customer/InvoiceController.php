<?php

namespace Webkul\RestApi\Docs\Shop\Controllers\Customer;

class InvoiceController
{
    /**
     * @OA\Get(
     *      path="/api/v1/customer/invoices",
     *      operationId="getCustomerInvoices",
     *      tags={"Invoices"},
     *      summary="Get Order's invoices of logged in customer",
     *      description="Returns order's invoices list, if you want to retrieve all order's invoices at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Parameter(
     *          name="sort",
     *          description="Sort column",
     *          example="id",
     *          required=false,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *
     *      @OA\Parameter(
     *          name="order",
     *          description="Sort order",
     *          required=false,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="string",
     *              enum={"desc", "asc"}
     *          )
     *      ),
     *
     *      @OA\Parameter(
     *          name="page",
     *          description="Page number",
     *          required=false,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Parameter(
     *          name="limit",
     *          description="Limit",
     *          in="query",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *
     *                  @OA\Items(ref="#/components/schemas/Invoice")
     *              ),
     *
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
     *      path="/api/v1/customer/invoices/{id}",
     *      operationId="getCustomerInvoiceDetail",
     *      tags={"Invoices"},
     *      summary="Get Order's invoice detail by id for logged in customer",
     *      description="Returns order's invoice detail by id for logged in customer",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Invoice id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Invoice"
     *              )
     *          )
     *      ),
     *
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
