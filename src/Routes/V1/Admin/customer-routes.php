<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Customer\CustomerAddressController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Customer\CustomerController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Customer\CustomerGroupController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Customer\CustomerReviewController;

Route::group(['middleware' => ['auth:sanctum', 'sanctum.admin']], function () {
    /**
     * Customer's group routes.
     */
    Route::controller(CustomerGroupController::class)->prefix('customers/groups')->group(function () { 
        Route::get('', 'allResources')->name('admin.customer.groups.all-resources');

        Route::post('', 'store')->name('admin.customer.groups.store');
    
        Route::get('{id}', 'getResource')->name('admin.customer.groups.get-resource');
    
        Route::put('{id}', 'update')->name('admin.customer.groups.update');
    
        Route::delete('{id}', 'destroy')->name('admin.customer.groups.destroy');    
    });

    /**
     * Customer's review routes.
     */
    Route::controller(CustomerReviewController::class)->prefix('customers/reviews')->group(function () {
        Route::get('', 'allResources')->name('admin.customer.reviews.all-resources');

        Route::get('{id}', 'getResource')->name('admin.customer.reviews.get-resource');
    
        Route::put('{id}', 'update')->name('admin.customer.reviews.update');
    
        Route::delete('{id}', 'destroy')->name('admin.customer.reviews.destroy');
    
        Route::post('mass-destroy', 'massDestroy')->name('admin.customer.reviews.mass-destroy');
    
        Route::post('mass-update', 'massUpdate')->name('admin.customer.reviews.mass-update');
     });

    /**
     * Customer routes.
     *
     * Note: Main customer routes should be placed after all these routes i.e. `customers/<static-slug>`.
     */
    Route::controller(CustomerController::class)->prefix('customers')->group(function () {
        Route::get('', 'allResources')->name('admin.customer.all-resources');

        Route::post('',  'store')->name('admin.customer..store');

        Route::get('{id}', 'getResource')->name('admin.customer.get-resource');

        Route::put('{id}', 'update')->name('admin.customer.update');

        Route::delete('{id}',  'destroy')->name('admin.customer.destroy');

        Route::post('mass-destroy', 'massDestroy')->name('admin.customer.mass-destroy');

        Route::post('mass-update', 'massUpdate')->name('admin.customer.mass-update');

        /**
         * Customer's order routes.
         */
        Route::get('{id}/orders', 'orders')->name('admin.customer.orders');

        Route::get('{id}/invoices', 'invoices')->name('admin.customer.invoice');

        /**
         * Customer's note routes.
         */
        Route::post('{id}/notes', 'storeNote')->name('admin.customer.store-note');

    });

    /**
     * Customer's address routes.
     */
    Route::controller(CustomerAddressController::class)->prefix('customers/{customer_id}/addresses')->group(function () {
        Route::get('', 'index')->name('admin.customer.addresses.index');

        Route::post('', 'store')->name('admin.customer.addresses.store');

        Route::get('{id}', 'show')->name('admin.customer.addresses.show');

        Route::put('{id}', 'update')->name('admin.customer.addresses.update');

        Route::delete('{id}', 'destroy')->name('admin.customer.addresses.destroy');

        Route::post('mass-destroy', 'massDestroy')->name('admin.customer.addresses.mass-destroy');
    });
});
