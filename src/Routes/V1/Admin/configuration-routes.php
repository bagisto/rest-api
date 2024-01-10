<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Configuration\ConfigurationController;

Route::group(['middleware' => ['auth:sanctum', 'sanctum.admin']], function () {
    Route::controller(ConfigurationController::class)->prefix('configuration')->group(function () { 
        Route::get('', 'index')->name('admin.dashboard.configuration.index');

        Route::post('', 'store')->name('admin.dashboard.configuration.store');
    });
});
