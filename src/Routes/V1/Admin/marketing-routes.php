<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\SearchSEO\SitemapController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Promotions\CartRuleController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Communications\EventController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\SearchSEO\URLRewriteController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Promotions\CatalogRuleController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Communications\CampaignController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Communications\TemplateController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\SearchSEO\SearchSynonymController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\SearchSEO\SearchTermController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Promotions\CartRuleCouponController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Communications\SubscriptionController;

/*
|----------------------------------------------------------------
| Routes According to Old formate need to improve it.
|----------------------------------------------------------------
*/

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

/*
|-----------------------------------------------
| Routes According to New formate 
|-----------------------------------------------
*/

/**
 * Marketing routes.
 */
Route::group([
    'middleware' => ['auth:sanctum', 'sanctum.admin'],
    'prefix'     => 'marketing',
], function () {
    /**
     * Communications routes.
     */
    Route::prefix('communications')->group(function () {
        /**
         * Subscribers routes.
         */
        Route::controller(SubscriptionController::class)->prefix('subscribers')->group(function () {
            Route::get('', 'allResources');

            Route::get('{id}', 'getResource');

            Route::put('{id}', 'update');

            Route::delete('{id}', 'destroy');
        });
    });

    /**
     * SearchSEO Routes.
     */
    Route::prefix('search-seo')->group(function () {
        /**
         * Search Synonyms Routes.
         */
        Route::controller(SearchSynonymController::class)->prefix('search-synonyms')->group(function () {
            Route::get('', 'allResources');

            Route::post('', 'store');

            Route::get('{id}', 'getResource');

            Route::put('{id}', 'update');

            Route::delete('{id}', 'destroy');

            Route::post('mass-destroy', 'massDestroy');
        });

        /**
         * Sitemaps Routes.
         */
        Route::controller(SitemapController::class)->prefix('sitemaps')->group(function () {
            Route::get('', 'allResources');

            Route::post('', 'store');

            Route::get('{id}', 'getResource');

            Route::put('{id}', 'update');

            Route::delete('{id}', 'destroy');

            Route::post('mass-destroy', 'massDestroy');
        });

        /**
         * URL Rewrites Routes.
         */
        Route::controller(URLRewriteController::class)->prefix('url-rewrites')->group(function () {
            Route::get('', 'allResources');

            Route::post('', 'store');

            Route::get('{id}', 'getResource');

            Route::put('{id}', 'update');

            Route::delete('{id}', 'destroy');

            Route::post('mass-destroy', 'massDestroy');
        });

        /**
         * Search Terms Routes.
         */
        Route::controller(SearchTermController::class)->prefix('search-terms')->group(function () {
            Route::get('', 'allResources');

            Route::post('', 'store');

            Route::get('{id}', 'getResource');

            Route::put('{id}', 'update');

            Route::delete('{id}', 'destroy');

            Route::post('mass-destroy', 'massDestroy');
        });
    });
});
