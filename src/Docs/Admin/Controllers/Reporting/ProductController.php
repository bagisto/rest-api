<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Reporting;

class ProductController
{
    /**
     * @OA\Get(
     *     path="/api/v1/admin/reporting/products/stats",
     *     operationId="getProductsStats",
     *     tags={"ProductsReporting"},
     *     summary="Get statistics for products",
     *     description="Retrieve statistics based on the specified type.",
     *     security={ {"sanctum_admin": {} }},
     * 
     *     @OA\Parameter(
     *         name="type",
     *         in="query",
     *         description="The type of statistics to retrieve. Options: total-sold-quantities, total-products-added-to-wishlist, top-selling-products-by-revenue, top-selling-products-by-quantity, products-with-most-reviews, products-with-most-visits, last-search-terms, top-search-terms",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             enum={"total-sold-quantities", "total-products-added-to-wishlist", "top-selling-products-by-revenue", "top-selling-products-by-quantity", "products-with-most-reviews", "products-with-most-visits", "last-search-terms", "top-search-terms"}
     *         )
     *     ),
     *     
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  description="Product statistics data",
     *                  @OA\Items(ref="#/components/schemas/ProductReporting")
     *              ),
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