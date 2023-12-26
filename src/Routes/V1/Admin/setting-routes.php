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
    Route::get('locales', [LocaleController::class, 'allResources']);

    Route::post('locales', [LocaleController::class, 'store']);

    Route::get('locales/{id}', [LocaleController::class, 'getResource']);

    Route::put('locales/{id}', [LocaleController::class, 'update']);

    Route::delete('locales/{id}', [LocaleController::class, 'destroy']);

    /**
     * Currency routes.
     */
    Route::get('currencies', [CurrencyController::class, 'allResources']);

    Route::post('currencies', [CurrencyController::class, 'store']);

    Route::get('currencies/{id}', [CurrencyController::class, 'getResource']);

    Route::put('currencies/{id}', [CurrencyController::class, 'update']);

    Route::delete('currencies/{id}', [CurrencyController::class, 'destroy']);

    Route::post('currencies/mass-destroy', [CurrencyController::class, 'massDestroyResources']);

    /**
     * Exchange rate routes.
     */
    Route::get('exchange-rates', [ExchangeRateController::class, 'allResources']);

    Route::post('exchange-rates', [ExchangeRateController::class, 'store']);

    Route::get('exchange-rates/{id}', [ExchangeRateController::class, 'getResource']);

    Route::put('exchange-rates/{id}', [ExchangeRateController::class, 'update']);

    Route::delete('exchange-rates/{id}', [ExchangeRateController::class, 'destroy']);

    Route::post('exchange-rates/update-rates', [ExchangeRateController::class, 'updateRates']);

    /**
     * Inventory source routes.
     */
    Route::get('inventory-sources', [InventorySourceController::class, 'allResources']);

    Route::post('inventory-sources', [InventorySourceController::class, 'store']);

    Route::get('inventory-sources/{id}', [InventorySourceController::class, 'getResource']);

    Route::put('inventory-sources/{id}', [InventorySourceController::class, 'update']);

    Route::delete('inventory-sources/{id}', [InventorySourceController::class, 'destroy']);

    /**
     * Channel routes.
     */
    Route::get('channels', [ChannelController::class, 'allResources']);

    Route::post('channels', [ChannelController::class, 'store']);

    Route::get('channels/{id}', [ChannelController::class, 'getResource']);

    Route::put('channels/{id}', [ChannelController::class, 'update']);

    Route::delete('channels/{id}', [ChannelController::class, 'destroy']);

    /**
     * User routes.
     */
    Route::get('users', [UserController::class, 'allResources']);

    Route::post('users', [UserController::class, 'store']);

    Route::get('users/{id}', [UserController::class, 'getResource']);

    Route::put('users/{id}', [UserController::class, 'update']);

    Route::delete('users/{id}', [UserController::class, 'destroy']);

    /**
     * Role routes.
     */
    Route::get('roles', [RoleController::class, 'allResources']);

    Route::post('roles', [RoleController::class, 'store']);

    Route::get('roles/{id}', [RoleController::class, 'getResource']);

    Route::put('roles/{id}', [RoleController::class, 'update']);

    Route::delete('roles/{id}', [RoleController::class, 'destroy']);

    /**
     * Slider routes.
     */
    Route::get('sliders', [SliderController::class, 'allResources']);

    Route::post('sliders', [SliderController::class, 'store']);

    Route::get('sliders/{id}', [SliderController::class, 'getResource']);

    Route::put('sliders/{id}', [SliderController::class, 'update']);

    Route::delete('sliders/{id}', [SliderController::class, 'destroy']);

    /**
     * Tax category routes.
     */
    Route::get('tax-categories', [TaxCategoryController::class, 'allResources']);

    Route::post('tax-categories', [TaxCategoryController::class, 'store']);

    Route::get('tax-categories/{id}', [TaxCategoryController::class, 'getResource']);

    Route::put('tax-categories/{id}', [TaxCategoryController::class, 'update']);

    Route::delete('tax-categories/{id}', [TaxCategoryController::class, 'destroy']);

    /**
     * Tax rate routes.
     */
    Route::get('tax-rates', [TaxRateController::class, 'allResources']);

    Route::post('tax-rates', [TaxRateController::class, 'store']);

    Route::get('tax-rates/{id}', [TaxRateController::class, 'getResource']);

    Route::put('tax-rates/{id}', [TaxRateController::class, 'update']);

    Route::delete('tax-rates/{id}', [TaxRateController::class, 'destroy']);
});
