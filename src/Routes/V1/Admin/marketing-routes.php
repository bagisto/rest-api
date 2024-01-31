<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Communications\CampaignController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Communications\EventController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Communications\TemplateController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Promotions\CartRuleController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Promotions\CartRuleCouponController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Promotions\CatalogRuleController;

Route::group([
    'middleware' => ['auth:sanctum', 'sanctum.admin'],
    'prefix'     => 'promotions',
], function () {
    /**
     * Catalog rule routes.
     */
    Route::controller(CatalogRuleController::class)->prefix('catalog-rules')->group(function () {
        Route::get('', 'allResources');

        Route::post('', 'store');

        Route::get('{id}', 'getResource');

        Route::put('{id}', 'update');

        Route::delete('{id}', 'destroy');
    });

    /**
     * Cart rule routes.
     */
    Route::controller(CartRuleController::class)->prefix('cart-rules')->group(function () {
        Route::get('', 'allResources');

        Route::post('', 'store');

        Route::get('{id}', 'getResource');

        Route::put('{id}', 'update');

        Route::delete('{id}', 'destroy');
    });

    /**
     * Cart rule coupon routes.
     */
    Route::controller(CartRuleCouponController::class)->prefix('cart-rules/{cart_rule_id}/coupons')->group(function () {
        Route::get('', 'index');

        Route::post('', 'store');

        Route::get('{id}', 'show');

        Route::delete('{id}', 'destroy');

        Route::post('mass-destroy', 'massDestroy');
    });

    /**
     * Email template routes.
     */
    Route::controller(TemplateController::class)->prefix('email-templates')->group(function () {
        Route::get('', 'allResources');

        Route::post('', 'store');

        Route::get('{id}', 'getResource');

        Route::put('{id}', 'update');

        Route::delete('{id}', 'destroy');
    });

    /**
     * Event routes.
     */
    Route::controller(EventController::class)->prefix('events')->group(function () {
        Route::get('', 'allResources');

        Route::post('', 'store');

        Route::get('{id}', 'getResource');

        Route::put('{id}', 'update');

        Route::delete('{id}', 'destroy');
    });

    /**
     * Campaign routes.
     */
    Route::controller(CampaignController::class)->prefix('campaigns')->group(function () {
        Route::get('', 'allResources');

        Route::post('', 'store');

        Route::get('{id}', 'getResource');

        Route::put('{id}', 'update');

        Route::delete('{id}', 'destroy');
    });
});
