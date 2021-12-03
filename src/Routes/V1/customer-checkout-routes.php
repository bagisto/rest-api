<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Shop\CustomerCheckoutController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('customer/checkout/save-address', [CustomerCheckoutController::class, 'saveAddress']);

    Route::post('customer/checkout/save-shipping', [CustomerCheckoutController::class, 'saveShipping']);

    Route::post('customer/checkout/save-payment', [CustomerCheckoutController::class, 'savePayment']);

    Route::post('customer/checkout/check-minimum-order', [CustomerCheckoutController::class, 'checkMinimumOrder']);

    Route::post('customer/checkout/save-order', [CustomerCheckoutController::class, 'saveOrder']);
});
