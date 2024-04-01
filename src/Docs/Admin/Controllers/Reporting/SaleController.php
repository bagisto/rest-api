<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Reporting;

class SaleController
{
     /**
     * @OA\Get(
     *     path="/api/v1/admin/reporting/sales/stats",
     *     operationId="getSalesStats",
     *     tags={"SalesReporting"},
     *     summary="Get statistics for sales",
     *     description="Retrieve statistics based on the specified type.",
     *     security={ {"sanctum_admin": {} }},
     * 
     *     @OA\Parameter(
     *         name="type",
     *         in="query",
     *         description="The type of statistics to retrieve. Options: total-sales, average-sales, total-orders, purchase-funnel, abandoned-carts, refunds, tax-collected, shipping-collected, top-payment-methods",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             enum={"total-sales", "average-sales", "total-orders", "purchase-funnel", "abandoned-carts", "refunds", "tax-collected", "shipping-collected", "top-payment-methods"}
     *         )
     *     ),
     *     
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *
     *                  @OA\Items(ref="#/components/schemas/SaleReporting")
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
    public function stats()
    {
    }
}