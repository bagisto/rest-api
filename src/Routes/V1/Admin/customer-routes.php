<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Customers\AddressController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Customers\CustomerController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Customers\GroupController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Customers\ReviewController;

Route::group([
    'middleware' => ['auth:sanctum', 'sanctum.admin'],
    'prefix'     => 'customers',
], function () {
    /**
     * Customer's group routes.
     */
    Route::controller(GroupController::class)->prefix('groups')->group(function () {
        Route::get('', 'allResources');

        Route::post('', 'store');

        Route::get('{id}', 'getResource');

        Route::put('{id}', 'update');

        Route::delete('{id}', 'destroy');
    });

    /**
     * Customer's review routes.
     */
    Route::controller(ReviewController::class)->prefix('reviews')->group(function () {
        Route::get('', 'allResources');

        Route::get('{id}', 'getResource');

        Route::put('{id}', 'update');

        Route::delete('{id}', 'destroy');

        Route::post('mass-destroy', 'massDestroy');

        Route::post('mass-update', 'massUpdate');
    });

    /**
     * Customer routes.
     *
     * Note: Main customer routes should be placed after all these routes i.e. `customers/<static-slug>`.
     */
    Route::controller(CustomerController::class)->group(function () {
        Route::get('', 'allResources');

        Route::post('', 'store');

        Route::get('{id}', 'getResource');

        Route::put('{id}', 'update');

        Route::delete('{id}', 'destroy');

        Route::post('mass-destroy', 'massDestroy');

        Route::post('mass-update', 'massUpdate');

        /**
         * Customer's order routes.
         */
        Route::get('{id}/orders', 'orders');

        Route::get('{id}/invoices', 'invoices');

        /**
         * Customer's note routes.
         */
        Route::post('{id}/notes', 'storeNote');

    });

    /**
     * Customer's address routes.
     */
    Route::controller(AddressController::class)->prefix('{customer_id}/addresses')->group(function () {
        Route::get('', 'index');

        Route::post('', 'store');

        Route::get('{id}', 'show');

        Route::put('{id}', 'update');

        Route::delete('{id}', 'destroy');

        Route::post('mass-destroy', 'massDestroy');
    });
});
