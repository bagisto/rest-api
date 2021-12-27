<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Catalog\CategoryController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    /**
     * Category routes.
     */
    Route::get('categories', [CategoryController::class, 'index']);

    Route::post('categories', [CategoryController::class, 'store']);

    Route::get('categories/{id}', [CategoryController::class, 'show']);

    Route::put('categories/{id}', [CategoryController::class, 'update']);

    Route::delete('categories/{id}', [CategoryController::class, 'destroy']);

    Route::post('categories/mass-destroy', [CategoryController::class, 'massDestroy']);
});
