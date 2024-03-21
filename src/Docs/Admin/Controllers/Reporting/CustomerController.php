<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Reporting;

class CustomerController
{
    /**
     * @OA\Get(
     *     path="/api/v1/admin/reporting/customers/stats",
     *     operationId="getCustomersStats",
     *     tags={"CustomersReporting"},
     *     summary="Get statistics for customers",
     *     description="Retrieve statistics based on the specified type.",
     *     security={ {"sanctum_admin": {} }},
     * 
     *     @OA\Parameter(
     *         name="type",
     *         in="query",
     *         description="The type of statistics to retrieve. Options: total-customers, customers-traffic, customers-with-most-sales, customers-with-most-orders, customers-with-most-reviews, top-customer-groups",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             enum={"customers-with-most-sales", "total-customers", "customers-traffic", "customers-with-most-orders", "customers-with-most-reviews", "top-customer-groups"}
     *         )
     *     ),
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
     *                  @OA\Items(ref="#/components/schemas/CustomerReporting")
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