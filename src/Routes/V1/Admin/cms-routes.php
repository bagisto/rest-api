<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\CMS\PageController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('cms', [PageController::class, 'allResources']);

    Route::post('cms', [PageController::class, 'store']);

    Route::get('cms/{id}', [PageController::class, 'getResource']);

    Route::put('cms/{id}', [PageController::class, 'update']);

    Route::delete('cms/{id}', [PageController::class, 'destroyResource']);

    Route::post('cms/mass-delete', [PageController::class, 'massDestroy']);
});
