<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth:sanctum',
    'prefix'     => 'velocity',
], function () {
    /**
     * Meta data.
     */
    Route::get('meta-data', [ConfigurationController::class, 'renderMetaData']);

    Route::post('meta-data/{id}', [ConfigurationController::class, 'storeMetaData']);

    /**
     * Header content.
     */
    Route::get('content', [ContentController::class, 'index']);

    Route::post('content', [ContentController::class, 'store']);

    Route::get('content/{id}', [ContentController::class, 'show']);

    Route::put('content/{id}', [ContentController::class, 'update']);

    Route::delete('content/{id}', [ContentController::class, 'destroy']);

    Route::post('content/mass-delete', [ContentController::class, 'massDestroy']);

    Route::post('content/mass-update', [ContentController::class, 'massUpdate']);
});
