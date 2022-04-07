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
Route::get('products', [ProductController::class, 'allResources']);

Route::get('products/{id}', [ProductController::class, 'getResource']);

Route::get('products/{id}/additional-information', [ProductController::class, 'additionalInformation']);

Route::get('products/{id}/configurable-config', [ProductController::class, 'configurableConfig']);

/**
 * Product authenticated routes.
 */
Route::group(['middleware' => ['auth:sanctum', 'sanctum.customer']], function () {
    /**
     * Wishlist routes.
     */
    Route::get('products/{product_id}/is-wishlisted', [ProductController::class, 'isWishlisted']);

    /**
     * Review routes.
     */
    Route::post('products/{product_id}/reviews', [ProductReviewController::class, 'store']);
});

/**
 * Category routes.
 */
Route::get('categories', [CategoryController::class, 'allResources']);

Route::get('categories/{id}', [CategoryController::class, 'getResource']);

Route::get('descendant-categories', [CategoryController::class, 'descendantCategories']);

/**
 * Attribute routes.
 */
Route::get('attributes', [AttributeController::class, 'allResources']);

Route::get('attributes/{id}', [AttributeController::class, 'getResource']);

/**
 * Attribute family routes.
 */
Route::get('attribute-families', [AttributeFamilyController::class, 'allResources']);

Route::get('attribute-families/{id}', [AttributeFamilyController::class, 'getResource']);
