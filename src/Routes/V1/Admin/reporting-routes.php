<?php

use Illuminate\Support\Facades\Route;
use Webkul\Admin\Http\Controllers\Reporting\CustomerController;
use Webkul\Admin\Http\Controllers\Reporting\ProductController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Reporting\SaleController;

/**
 * Reporting routes.
 */
Route::group([
    'middleware' => ['auth:sanctum', 'sanctum.admin'],
    'prefix'     => 'reporting',
], function () {
    /**
     * Sale routes.
     */
    Route::controller(SaleController::class)->prefix('sales')->group(function () {
        Route::get('stats', 'stats');
    });

    /**
     * Customer routes.
     */
    Route::controller(CustomerController::class)->prefix('customers')->group(function () {
        Route::get('stats', 'stats');
    });

    /**
     * Product routes.
     */
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('stats', 'stats');
    });
});
