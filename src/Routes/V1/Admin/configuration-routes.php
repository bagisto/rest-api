<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Configuration\ConfigurationController;

Route::group(['middleware' => ['auth:sanctum', 'sanctum.admin']], function () {
    /**
     * Configuration routes.
     */
    Route::controller(ConfigurationController::class)->prefix('configuration')->group(function () {
        Route::get('', 'index');

        Route::post('', 'store');
    });
});
