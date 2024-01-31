<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\User\AccountController;
use Webkul\RestApi\Http\Controllers\V1\Admin\User\AuthController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');

    Route::post('forgot-password', 'forgotPassword');
});

Route::group(['middleware' => ['auth:sanctum', 'sanctum.admin']], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::delete('logout', 'logout');
    });

    Route::controller(AccountController::class)->group(function () {
        Route::get('get', 'get');

        Route::put('update', 'update');
    });
});
