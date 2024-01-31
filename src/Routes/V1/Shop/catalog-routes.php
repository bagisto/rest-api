<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Shop\Catalog\AttributeController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Catalog\AttributeFamilyController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Catalog\CategoryController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Catalog\ProductController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Catalog\ProductReviewController;

/**
 * Product routes.
 */
Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('', 'allResources');

    Route::get('/{id}', 'getResource');

    Route::get('{id}/additional-information', 'additionalInformation');

    Route::get('{id}/configurable-config', 'configurableConfig');
});

Route::group(['middleware' => ['auth:sanctum', 'sanctum.customer']], function () {
    /**
     * Review routes.
     */
    Route::controller(ProductReviewController::class)->prefix('products')->group(function () {
        Route::post('{product_id}/reviews', 'store');
    });
});

/**
 * Category routes.
 */
Route::controller(CategoryController::class)->prefix('categories')->group(function () {
    Route::get('', 'allResources');

    Route::get('{id}', 'getResource');

});

/**
 * descendant category routes.
 */
Route::controller(CategoryController::class)->prefix('descendant-categories')->group(function () {
    Route::get('', 'descendantCategories');
});

/**
 * Attribute routes.
 */
Route::controller(AttributeController::class)->prefix('attributes')->group(function () {
    Route::get('', 'allResources');

    Route::get('{id}', 'getResource');
});

/**
 * Attribute family routes.
 */
Route::controller(AttributeFamilyController::class)->prefix('attribute-families')->group(function () {
    Route::get('', 'allResources');

    Route::get('{id}', 'getResource');
});
