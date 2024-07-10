<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Sales;

class ReOrderController
{
     /**
     * @OA\Post(
     *      path="/api/v1/admin/sales/re-orders/{id}",
     *      operationId="createProductReOrder",
     *      tags={"ReOrders"},
     *      summary="Create admin re-order",
     *      description="Create product re-order from admin admin section.",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="product id",
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
     *                  type="array",
     *
     *                  @OA\Items(ref="#/components/schemas/Order")
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
    public function store()
    {
    }
}