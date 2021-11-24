<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Shop\SessionController;

Route::group(['prefix' => 'v1'], function () {
    Route::post('customer/login', [SessionController::class, 'create']);

    Route::get('customer/logout', [SessionController::class, 'destroy']);

    Route::get('customer/get', [SessionController::class, 'get']);

    Route::put('customer/profile', [SessionController::class, 'update']);
});
