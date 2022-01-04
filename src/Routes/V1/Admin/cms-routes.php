<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\CMS\PageController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('cms', [PageController::class, 'index']);

    Route::post('cms', [PageController::class, 'store']);

    Route::get('cms/{id}', [PageController::class, 'show']);

    Route::put('cms/{id}', [PageController::class, 'update']);

    Route::delete('cms/{id}', [PageController::class, 'destroy']);

    Route::post('cms/mass-delete', [PageController::class, 'massDestroy']);
});
