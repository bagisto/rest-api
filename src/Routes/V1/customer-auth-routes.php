<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Shop\CustomerAuthController;

Route::post('customer/login', [CustomerAuthController::class, 'login']);

Route::post('customer/register', [CustomerAuthController::class, 'register']);

Route::post('customer/forgot-password', [CustomerAuthController::class, 'forgotPassword']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('customer/get', [CustomerAuthController::class, 'get']);

    Route::put('customer/profile', [CustomerAuthController::class, 'update']);

    Route::post('customer/logout', [CustomerAuthController::class, 'logout']);
});
