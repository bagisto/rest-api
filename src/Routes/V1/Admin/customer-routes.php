<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Customer\CustomerAddressController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Customer\CustomerController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Customer\CustomerGroupController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Customer\CustomerReviewController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    /**
     * Customer routes.
     */
    Route::get('customers', [CustomerController::class, 'index']);

    Route::post('customers', [CustomerController::class, 'store']);

    Route::get('customers/{id}', [CustomerController::class, 'show']);

    Route::put('customers/{id}', [CustomerController::class, 'update']);

    Route::delete('customers/{id}', [CustomerController::class, 'destroy']);

    Route::post('customers/mass-destroy', [CustomerController::class, 'massDestroy']);

    Route::post('customers/mass-update', [CustomerController::class, 'massUpdate']);

    /**
     * Customer's orders routes.
     */
    Route::get('customers/{id}/orders', [CustomerController::class, 'orders']);

    Route::get('customers/{id}/invoices', [CustomerController::class, 'invoices']);

    /**
     * Customer's notes routes.
     */
    Route::post('customers/{id}/note', [CustomerController::class, 'storeNote']);

    /**
     * Customer's addresses routes.
     */
    Route::get('customers/{customer_id}/addresses', [CustomerAddressController::class, 'index']);

    Route::post('customers/{customer_id}/addresses', [CustomerAddressController::class, 'store']);

    Route::get('customers/{customer_id}/addresses/{id}', [CustomerAddressController::class, 'show']);

    Route::put('customers/{customer_id}/addresses/{id}', [CustomerAddressController::class, 'update']);

    Route::delete('customers/{customer_id}/addresses/{id}', [CustomerAddressController::class, 'destroy']);

    Route::post('customers/{customer_id}/addresses/mass-destroy', [CustomerAddressController::class, 'massDestroy']);

    /**
     * Customer's reviews routes.
     */
    Route::get('customers/reviews', [CustomerReviewController::class, 'index']);

    Route::get('customers/reviews/{id}', [CustomerReviewController::class, 'show']);

    Route::put('customers/reviews/{id}', [CustomerReviewController::class, 'update']);

    Route::delete('customers/reviews/{id}', [CustomerReviewController::class, 'destroy']);

    Route::post('customers/reviews/mass-destroy', [CustomerReviewController::class, 'massDestroy']);

    Route::post('customers/reviews/mass-update', [CustomerReviewController::class, 'massUpdate']);

    /**
     * Customer's groups routes.
     */
    Route::get('customers/groups', [CustomerGroupController::class, 'index']);

    Route::post('customers/groups', [CustomerGroupController::class, 'store']);

    Route::get('customers/groups/{id}', [CustomerGroupController::class, 'show']);

    Route::put('customers/groups/{id}', [CustomerGroupController::class, 'update']);

    Route::delete('customers/groups/{id}', [CustomerGroupController::class, 'destroy']);
});
