<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\User\AccountController;
use Webkul\RestApi\Http\Controllers\V1\Admin\User\AuthController;

Route::post('login', [AuthController::class, 'login']);

Route::post('forgot-password', [AuthController::class, 'forgotPassword']);

Route::group(['middleware' => ['auth:sanctum', 'sanctum.admin']], function () {
    Route::delete('logout', [AuthController::class, 'logout']);

    Route::get('get', [AccountController::class, 'get']);

    Route::put('update', [AccountController::class, 'update']);
});
