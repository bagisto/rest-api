<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Reporting\SaleController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Reporting\CustomerController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Reporting\ProductController;

Route::group([
    'middleware' => ['auth:sanctum', 'sanctum.admin'],
    'prefix'     => 'reporting',
], function () {
    /**
     * Get Sales Reporting Resources.
     */
    Route::controller(SaleController::class)->prefix('sales')->group(function () {
        Route::get('total-sales', 'totalSales');

        Route::get('product-funnel', 'productFunnel');

        Route::get('abandoned-carts', 'abondonedCarts');

        Route::get('total-orders', 'totalOrders');

        Route::get('average-order-value', 'averageOrderValue');

        Route::get('tax-collected', 'taxCollected');

        Route::get('shipping-collected', 'shippingCollected');

        Route::get('top-tax-categories', 'topTaxCategories');

        Route::get('top-shipping-methods', 'toShippingNethods');

        Route::get('refunds', 'refunds');

        Route::get('top-payment-methods', 'topPaymentMethods');
    });

    /**
     * Get Sales Product Resources.
     */
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('total-customers', 'totalCustomers');

        Route::get('customer-with-most-sales', 'customerWithMostSales');

        Route::get('customer-with-most-orders', 'customerWithMostOrders');

        Route::get('customer-traffic', 'customerTraffic');

        Route::get('top-customer-groups', 'topCustomerGroups');

        Route::get('customer-with-most-reviews', 'customerWithMostReviews');
    });

    /**
     * Get Customers Reporting Resources.
     */
    Route::controller(CustomerController::class)->prefix('customers')->group(function () {
        Route::get('sold-product-quantity', 'soldProductQuantity');

        Route::get('product-added-to-wishlist', 'productAddedToWishlist');

        Route::get('top-selling-product-by-revenue', 'topSellingProductByRevenue');

        Route::get('top-selling-product-by-quantity', 'topSellingProductByQuantity');

        Route::get('products-with-most-reviews', 'productWithMostReviews');

        Route::get('product-with-most-visits', 'productWithMostVisits');

        Route::get('last-search-terms', 'lastSearchTerms');

        Route::get('top-search-terms', 'topSearchTerms');
    });
});