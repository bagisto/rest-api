<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Setting\ChannelController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Setting\CurrencyController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Setting\ExchangeRateController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Setting\InventorySourceController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Setting\LocaleController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Setting\RoleController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Setting\SliderController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Setting\TaxCategoryController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Setting\TaxRateController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Setting\UserController;

/**
 * Settings routes.
 */
Route::group([
    'middleware' => ['auth:sanctum', 'sanctum.admin'],
    'prefix'     => 'settings',
], function () {
    /**
     * Locale routes.
     */
    Route::controller(LocaleController::class)->prefix('locales')->group(function () {
        Route::get('', 'allResources')->name('admin.settings.locales.all-resources');

        Route::post('', 'store')->name('admin.settings.locales.store');
    
        Route::get('{id}', 'getResource')->name('admin.settings.locales.get-resources');
    
        Route::put('{id}', 'update')->name('admin.settings.locales.update');
    
        Route::delete('{id}', 'destroy')->name('admin.settings.locales.destroy');
    });

    /**
     * Currency routes.
     */
    Route::controller(CurrencyController::class)->prefix('currencies')->group(function () {
        Route::get('', 'allResources')->name('admin.settings.currencies.all-resources');

        Route::post('', 'store')->name('admin.settings.currencies.store');
    
        Route::get('{id}', 'getResource')->name('admin.settings.currencies.get-resources');
    
        Route::put('{id}', 'update')->name('admin.settings.currencies.update');
    
        Route::delete('{id}', 'destroy')->name('admin.settings.currencies.destroy');
    
        Route::post('mass-destroy', 'massDestroy')->name('admin.settings.currencies.mass-destroy');
    
    });

    /**
     * Exchange rate routes.
     */
    Route::controller(ExchangeRateController::class)->prefix('currencies')->group(function () {
        Route::get('', 'allResources')->name('admin.settings.exchange-rates.all-resources');

        Route::post('', 'store')->name('admin.settings.exchange-rates.store');
    
        Route::get('{id}', 'getResource')->name('admin.settings.exchange-rates.get-resource');
    
        Route::put('{id}', 'update')->name('admin.settings.exchange-rates.update');
    
        Route::delete('{id}', 'destroy')->name('admin.settings.exchange-rates.destroy');
    
        Route::post('update-rates', 'updateRates')->name('admin.settings.exchange-rates.update-rates');
    });

    /**
     * Inventory source routes.
     */
    Route::controller(InventorySourceController::class)->prefix('inventory-sources')->group(function () {
        Route::get('', 'allResources')->name('admin.settings.inventory-sources.all-resources');

        Route::post('', 'store')->name('admin.settings.inventory-sources.store');
    
        Route::get('{id}', 'getResource')->name('admin.settings.inventory-sources.get-resources');
    
        Route::put('{id}', 'update')->name('admin.settings.inventory-sources.update');
    
        Route::delete('{id}', 'destroy')->name('admin.settings.inventory-sources.destroy');
    });

    /**
     * Channel routes.
     */
    Route::controller(ChannelController::class)->prefix('channels')->group(function () {
        Route::get('', 'allResources')->name('admin.settings.channels.all-resources');

        Route::post('', 'store')->name('admin.settings.channels.store');
    
        Route::get('{id}', 'getResource')->name('admin.settings.channels.get-resources');
    
        Route::put('{id}', 'update')->name('admin.settings.channels.update');
    
        Route::delete('{id}', 'destroy')->name('admin.settings.channels.destroy');
    });
  
    /**
     * User routes.
     */
    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('', 'allResources')->name('admin.settings.users.all-resources');

        Route::post('', 'store')->name('admin.settings.users.store');
    
        Route::get('{id}', 'getResource')->name('admin.settings.users.get-resources');
    
        Route::put('{id}', 'update')->name('admin.settings.users.update');
    
        Route::delete('{id}', 'destroy')->name('admin.settings.users.destroy');
    });

    /**
     * Role routes.
     */
    Route::controller(RoleController::class)->prefix('roles')->group(function () {
        Route::get('', 'allResources')->name('admin.settings.roles.all-resources');

        Route::post('', 'store')->name('admin.settings.roles.store');

        Route::get('{id}', 'getResource')->name('admin.settings.roles.get-resources');
    
        Route::put('{id}', 'update')->name('admin.settings.roles.update');
    
        Route::delete('{id}', 'destroy')->name('admin.settings.roles.destroy');
    });

    /**
     * Tax category routes.
     */
    Route::controller(TaxCategoryController::class)->prefix('tax-categories')->group(function () {});
    Route::get('', 'allResources')->name('admin.settings.tax-categories.all-resources');

    Route::post('', 'store')->name('admin.settings.tax-categories.store');

    Route::get('{id}', 'getResource')->name('admin.settings.tax-categories.get-resources');

    Route::put('{id}', 'update')->name('admin.settings.tax-categories.update');

    Route::delete('{id}', 'destroy')->name('admin.settings.tax-categories.destroy');

    /**
     * Tax rate routes.
     */
    Route::controller(TaxRateController::class)->prefix('tax-rates')->group(function () {
        Route::get('', 'allResources')->name('admin.settings.tax-rates.all-resources');

        Route::post('', 'store')->name('admin.settings.tax-rates.store');
    
        Route::get('{id}', 'getResource')->name('admin.settings.tax-rates.get-resources');
    
        Route::put('{id}', 'update')->name('admin.settings.tax-rates.update');
    
        Route::delete('{id}', 'destroy')->name('admin.settings.tax-rates.destroy');
    }); 
});
