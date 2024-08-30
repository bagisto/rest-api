<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Reporting;

class ProductController extends ReportingController
{
    /**
     * Request param functions.
     *
     * @var array
     */
    protected $typeFunctions = [
        'total-sold-quantities'            => 'getTotalSoldQuantitiesStats',
        'total-products-added-to-wishlist' => 'getTotalProductsAddedToWishlistStats',
        'top-selling-products-by-revenue'  => 'getTopSellingProductsByRevenue',
        'top-selling-products-by-quantity' => 'getTopSellingProductsByQuantity',
        'products-with-most-reviews'       => 'getProductsWithMostReviews',
        'products-with-most-visits'        => 'getProductsWithMostVisits',
        'last-search-terms'                => 'getLastSearchTerms',
        'top-search-terms'                 => 'getTopSearchTerms',
    ];
}
