<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\ChannelController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\CoreController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\CountryController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\CountryStateController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\CurrencyController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\LocaleController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\ThemeController;

/**
 * Core configs.
 */
Route::controller(CoreController::class)->prefix('core-configs')->group(function () {
    Route::get('', 'getCoreConfigs');
});

Route::controller(CoreController::class)->prefix('core-config-fields')->group(function () {
    Route::get('', 'allResources');

    Route::get('{id}', 'getResource');
});

/**
 * Locale routes.
 */
Route::controller(LocaleController::class)->prefix('locales')->group(function () {
    Route::get('', 'allResources');

    Route::get('{id}', 'getResource');
});

/**
 * Currency routes.
 */
Route::controller(CurrencyController::class)->prefix('currencies')->group(function () {
    Route::get('', 'allResources');

    Route::get('{id}', 'getResource');
});

/**
 * Channel routes.
 */
Route::controller(ChannelController::class)->prefix('channels')->group(function () {
    Route::get('', 'allResources');

    Route::get('{id}', 'getResource');
});

/**
 * Country routes.
 */
Route::controller(CountryController::class)->prefix('countries')->group(function () {
    Route::get('', 'allResources');

    Route::get('{id}', 'getResource');

    Route::get('states/groups', 'getCountryStateGroups');

});

Route::controller(CountryStateController::class)->prefix('countries-states')->group(function () {
    Route::get('', 'allResources');
});

/**
 * Theme routes.
 */
Route::controller(ThemeController::class)->prefix('theme/customizations')->group(function () {
    Route::get('', 'getThemeCustomizations');

    Route::get('{id}', 'getResource');
});
