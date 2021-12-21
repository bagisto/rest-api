<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\ChannelController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\CoreController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\CountryController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\CurrencyController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\LocaleController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Core\SliderController;

/**
 * Core configs.
 */
Route::get('core-configs', [CoreController::class, 'getCoreConfigs']);

/**
 * Locale routes.
 */
Route::get('locales', [LocaleController::class, 'allResources']);

Route::get('locales/{id}', [LocaleController::class, 'getResource']);

/**
 * Currency routes.
 */
Route::get('currencies', [CurrencyController::class, 'allResources']);

Route::get('currencies/{id}', [CurrencyController::class, 'getResource']);

/**
 * Channel routes.
 */
Route::get('channels', [ChannelController::class, 'allResources']);

Route::get('channels/{id}', [ChannelController::class, 'getResource']);

/**
 * Slider routes.
 */
Route::get('sliders', [SliderController::class, 'allResources']);

Route::get('sliders/{id}', [SliderController::class, 'getResource']);

/**
 * Country routes.
 */
Route::get('countries', [CountryController::class, 'allResources']);

Route::get('countries/{id}', [CountryController::class, 'getResource']);

Route::get('countries/states/groups', [CountryController::class, 'getCountryStateGroups']);
