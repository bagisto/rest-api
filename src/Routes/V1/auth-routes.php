<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Shop\AuthController;

Route::post('customer/login', [AuthController::class, 'login']);

Route::post('customer/register', [AuthController::class, 'register']);

Route::post('customer/forgot-password', [AuthController::class, 'forgotPassword']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('customer/get', [AuthController::class, 'get']);

    Route::put('customer/profile', [AuthController::class, 'update']);

    Route::post('customer/logout', [AuthController::class, 'logout']);
});
