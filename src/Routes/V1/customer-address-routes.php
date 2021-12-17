<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Shop\CustomerAddressController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('customer/addresses', [CustomerAddressController::class, 'index']);

    Route::post('customer/addresses', [CustomerAddressController::class, 'store']);

    Route::get('customer/addresses/{id}', [CustomerAddressController::class, 'show']);

    Route::put('customer/addresses/{id}', [CustomerAddressController::class, 'update']);

    Route::delete('customer/addresses/{id}', [CustomerAddressController::class, 'destroy']);
});
