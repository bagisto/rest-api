<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\ChannelController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\CoreController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\CountryController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\CountryStateController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\CurrencyController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\LocaleController;

/**
 * Core configs.
 */
Route::controller(CoreController::class)->prefix('core-configs')->group(function () {
    Route::post('', 'getCoreConfigs')->name('shop.core.get-core-configs');
});

Route::controller(CoreController::class)->prefix('core-config-fields')->group(function () {
    Route::get('', 'allResources')->name('shop.core.all-resources');

    Route::get('{id}', 'getResource')->name('shop.core.get-resources');
});

/**
 * Locale routes.
 */
Route::controller(LocaleController::class)->prefix('locales')->group(function () {
    Route::get('', 'allResources')->name('shop.locales.all-resources');

    Route::get('{id}', 'getResource')->name('shop.locales.get-resources');
});

/**
 * Currency routes.
 */
Route::controller(CurrencyController::class)->prefix('currencies')->group(function () {
    Route::get('', 'allResources')->name('shop.currencies.all-resources');

    Route::get('{id}', 'getResource')->name('shop.currencies.get-resources');
});

/**
 * Channel routes.
 */
 Route::controller(ChannelController::class)->prefix('channels')->group(function () {
    Route::get('', 'allResources')->name('shop.channels.all-resources');

    Route::get('{id}', 'getResource')->name('shop.channels.get-resources');
 });
/**
 * Country routes.
 */
Route::controller(CountryController::class)->prefix('countries')->group(function () {
    Route::get('', 'allResources')->name('shop.countries.all-resources');

    Route::get('{id}', 'getResource')->name('shop.countries.get-resources');

    Route::get('states/groups', 'getCountryStateGroups')->name('shop.countries.get-country-state-groups');

});

Route::controller(CountryStateController::class)->prefix('countries-states')->group(function () {
    Route::get('', 'allResources')>name('shop.countries-states.all-resources');
});