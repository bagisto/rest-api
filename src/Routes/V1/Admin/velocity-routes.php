<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Velocity\ConfigurationController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Velocity\ContentController;

Route::group([
    'middleware' => ['auth:sanctum', 'sanctum.admin'],
    'prefix'     => 'velocity',
], function () {
    /**
     * Meta data.
     */
    Route::get('meta-data', [ConfigurationController::class, 'renderMetaData']);

    Route::post('meta-data/{id}', [ConfigurationController::class, 'storeMetaData']);

    /**
     * Header content routes.
     */
    Route::get('contents', [ContentController::class, 'allResources']);

    Route::post('contents', [ContentController::class, 'store']);

    Route::get('contents/{id}', [ContentController::class, 'getResource']);

    Route::put('contents/{id}', [ContentController::class, 'update']);

    Route::delete('contents/{id}', [ContentController::class, 'destroy']);

    Route::post('contents/mass-destroy', [ContentController::class, 'massDestroyResources']);

    Route::post('contents/mass-update', [ContentController::class, 'massUpdate']);
});
