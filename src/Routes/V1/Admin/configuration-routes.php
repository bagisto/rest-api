<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Configuration\ConfigurationController;

Route::group(['middleware' => ['auth:sanctum', 'sanctum.admin']], function () {
    Route::get('configuration', [ConfigurationController::class, 'index']);

    Route::post('configuration', [ConfigurationController::class, 'store']);
});
