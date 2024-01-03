<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Customer\CustomerAddressController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Customer\CustomerController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Customer\CustomerGroupController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Customer\CustomerReviewController;

Route::group(['middleware' => ['auth:sanctum', 'sanctum.admin']], function () {
    /**
     * Customer's group routes.
     */
    Route::get('customers/groups', [CustomerGroupController::class, 'allResources']);

    Route::post('customers/groups', [CustomerGroupController::class, 'store']);

    Route::get('customers/groups/{id}', [CustomerGroupController::class, 'getResource']);

    Route::put('customers/groups/{id}', [CustomerGroupController::class, 'update']);

    Route::delete('customers/groups/{id}', [CustomerGroupController::class, 'destroy']);

    /**
     * Customer's review routes.
     */
    Route::get('customers/reviews', [CustomerReviewController::class, 'allResources']);

    Route::get('customers/reviews/{id}', [CustomerReviewController::class, 'getResource']);

    Route::put('customers/reviews/{id}', [CustomerReviewController::class, 'update']);

    Route::delete('customers/reviews/{id}', [CustomerReviewController::class, 'destroy']);

    Route::post('customers/reviews/mass-destroy', [CustomerReviewController::class, 'massDestroyResources']);

    Route::post('customers/reviews/mass-update', [CustomerReviewController::class, 'massUpdate']);

    /**
     * Customer routes.
     *
     * Note: Main customer routes should be placed after all these routes i.e. `customers/<static-slug>`.
     */
    Route::get('customers', [CustomerController::class, 'allResources']);

    Route::post('customers', [CustomerController::class, 'store']);

    Route::get('customers/{id}', [CustomerController::class, 'getResource']);

    Route::put('customers/{id}', [CustomerController::class, 'update']);

    Route::delete('customers/{id}', [CustomerController::class, 'destroy']);

    Route::post('customers/mass-destroy', [CustomerController::class, 'massDestroy']);

    Route::post('customers/mass-update', [CustomerController::class, 'massUpdate']);

    /**
     * Customer's order routes.
     */
    Route::get('customers/{id}/orders', [CustomerController::class, 'orders']);

    Route::get('customers/{id}/invoices', [CustomerController::class, 'invoices']);

    /**
     * Customer's note routes.
     */
    Route::post('customers/{id}/notes', [CustomerController::class, 'storeNote']);

    /**
     * Customer's address routes.
     */
    Route::get('customers/{customer_id}/addresses', [CustomerAddressController::class, 'index']);

    Route::post('customers/{customer_id}/addresses', [CustomerAddressController::class, 'store']);

    Route::get('customers/{customer_id}/addresses/{id}', [CustomerAddressController::class, 'show']);

    Route::put('customers/{customer_id}/addresses/{id}', [CustomerAddressController::class, 'update']);

    Route::delete('customers/{customer_id}/addresses/{id}', [CustomerAddressController::class, 'destroy']);

    Route::post('customers/{customer_id}/addresses/mass-destroy', [CustomerAddressController::class, 'massDestroy']);
});
