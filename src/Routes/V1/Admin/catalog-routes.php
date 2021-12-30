<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Catalog\AttributeController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Catalog\AttributeFamilyController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Catalog\CategoryController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Catalog\ProductController;

Route::group([
    'middleware' => 'auth:sanctum',
    'prefix'     => 'catalog',
], function () {
    /**
     * Product routes.
     */
    Route::get('products', [ProductController::class, 'index']);

    Route::post('products', [ProductController::class, 'store']);

    Route::get('products/{id}', [ProductController::class, 'show']);

    Route::put('products/{id}', [ProductController::class, 'update']);

    Route::post('products/{id}/inventories', [ProductController::class, 'updateInventories']);

    Route::delete('products/{id}', [ProductController::class, 'destroy']);

    Route::post('products/mass-update', [ProductController::class, 'massUpdate']);

    Route::post('products/mass-delete', [ProductController::class, 'massDestroy']);

    /**
     * Category routes.
     */
    Route::get('categories', [CategoryController::class, 'index']);

    Route::post('categories', [CategoryController::class, 'store']);

    Route::get('categories/{id}', [CategoryController::class, 'show']);

    Route::put('categories/{id}', [CategoryController::class, 'update']);

    Route::delete('categories/{id}', [CategoryController::class, 'destroy']);

    Route::post('categories/mass-destroy', [CategoryController::class, 'massDestroy']);

    /**
     * Attributes routes.
     */
    Route::get('attributes', [AttributeController::class, 'index']);

    Route::get('attributes/{id}/options', [AttributeController::class, 'getAttributeOptions']);

    Route::post('attributes', [AttributeController::class, 'store']);

    Route::get('attributes/{id}', [AttributeController::class, 'show']);

    Route::put('attributes/{id}', [AttributeController::class, 'update']);

    Route::delete('attributes/{id}', [AttributeController::class, 'destroy']);

    Route::post('attributes/mass-delete', [AttributeController::class, 'massDestroy']);

    /**
     * Attribute families routes.
     */
    Route::get('attribute-families', [AttributeFamilyController::class, 'index']);

    Route::post('attribute-families', [AttributeFamilyController::class, 'store']);

    Route::get('attribute-families/{id}', [AttributeFamilyController::class, 'show']);

    Route::put('attribute-families/{id}', [AttributeFamilyController::class, 'update']);

    Route::delete('attribute-families/{id}', [AttributeFamilyController::class, 'destroy']);
});
