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
    Route::get('', 'allResources')->name('shop.products.all-resources');

    Route::get('/{id}', 'getResource')->name('shop.products.get-resources');

    Route::get('{id}/additional-information', 'additionalInformation')->name('shop.products.additional-information');

    Route::get('{id}/configurable-config', 'configurableConfig')->name('shop.products.configurable-config');
});

/**
 * Product authenticated routes.
 */
 Route::group(['middleware' => ['auth:sanctum', 'sanctum.customer']], function () {
    /**
    * Wishlist routes.
    */
   Route::controller(ProductController::class)->prefix('products')->group(function () { 
       Route::get('{product_id}/is-wishlisted', 'isWishlisted')->name('shop.products.is-whislisted');
   });
});

Route::group(['middleware' => ['auth:sanctum', 'sanctum.customer']], function () {
    /**
     * Review routes.
     */
    Route::controller(ProductReviewController::class)->prefix('products')->group(function () {
        Route::post('{product_id}/reviews', 'store')->name('shop.products.review.store');
    });
});

/**
 * Category routes.
 */
Route::controller(CategoryController::class)->prefix('categories')->group(function () {
    Route::get('', 'allResources')->name('shop.products.categories.all-resources');

    Route::get('{id}', 'getResource')->name('shop.products.categories.get-resource');

});

/**
 * descendant category routes.
 */
Route::controller(CategoryController::class)->prefix('descendant-categories')->group(function () {
    Route::get('',  'descendantCategories')->name('shop.products.categories.descendant-categories');
});

/**
 * Attribute routes.
 */
Route::controller(AttributeController::class)->prefix('attributes')->group(function () {
    Route::get('', 'allResources')->name('shop.products.attributes.all-resources');

    Route::get('{id}', 'getResource')->name('shop.products.attributes.get-resource');
});

/**
 * Attribute family routes.
 */
Route::controller(AttributeFamilyController::class)->prefix('attribute-families')->group(function () {
    Route::get('', 'allResources')->name('shop.products.attribute-families.get-resource');

    Route::get('{id}', 'getResource')->name('shop.products.attribute-families.get-resource');
});
