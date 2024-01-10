<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Catalog\AttributeController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Catalog\AttributeFamilyController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Catalog\CategoryController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Catalog\ProductController;

Route::group([
    'middleware' => ['auth:sanctum', 'sanctum.admin'],
    'prefix'     => 'catalog',
], function () {
    /**
     * Product routes.
     * Route name: only for navigation
     */
    Route::controller(ProductController::class)->prefix('products')->group(function () {
       Route::get('', 'allResources')->name('admin.catalog.product.index.allresources');

       Route::post('', 'store')->name('admin.catalog.product.store');

       Route::get('{id}', 'getResource')->name('admin.catalog.product.get-resource');

       Route::put('{id}', 'update')->name('admin.catalog.product.update');

       Route::post('{id}/inventories', 'updateInventories')->name('admin.catalog.product.update-inventories');

       Route::delete('{id}', 'destroy')->name('admin.catalog.product.destroy');

       Route::post('mass-update', 'massUpdate')->name('admin.catalog.product.mass-update');

       Route::post('mass-destroy', 'massDestroy')->name('admin.catalog.product.mass-destroy');
    });


    /**
     * Category routes.
     * Route name: only for navigation
     */
    Route::controller(CategoryController::class)->prefix('categories')->group(function () {
        Route::get('', 'allResources');

        Route::post('', 'store')->name('admin.catalog.categories.store');
    
        Route::get('{id}', 'getResource')->name('admin.catalog.categories.get-resource');
    
        Route::put('{id}', 'update')->name('admin.catalog.categories.update');
    
        Route::delete('{id}', 'destroy')->name('admin.catalog.categories.destroy');
    
        Route::post('mass-destroy', 'massDestroy')->name('admin.catalog.categories.mass-destroy');    
    });

    /**
     * Attribute routes.
     * Route name: only for navigation
     */
    Route::controller(AttributeController::class)->prefix('attributes')->group(function () {
        Route::get('', 'allResources')->name('admin.catalog.attributes.all-resources');

        Route::post('', 'store')->name('admin.catalog.attributes.store');
    
        Route::get('{id}', 'getResource')->name('admin.catalog.attributes.get-resource');
    
        Route::put('{id}', 'update')->name('admin.catalog.attributes.update');
    
        Route::delete('{id}', 'destroy')->name('admin.catalog.attributes.destroy');
    
        Route::post('mass-destroy', 'massDestroy')->name('admin.catalog.attributes.mass-destroy');
    });
   
    /**
     * Attribute family routes.
     * Route name: only for navigation
     */
    Route::controller(AttributeFamilyController::class)->prefix('attribute-families')->group(function () { 
       Route::get('', 'allResources')->name('admin.catalog.attribute-families.all-resources');

       Route::post('', 'store')->name('admin.catalog.attribute-families.store');

       Route::get('{id}', 'getResource')->name('admin.catalog.attribute-families.get-resource');

       Route::put('{id}', 'update')->name('admin.catalog.attribute-families.update');

       Route::delete('{id}', 'destroy')->name('admin.catalog.attribute-families.destroy');
    });

});
