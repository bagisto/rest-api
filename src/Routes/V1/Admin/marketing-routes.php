<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\CampaignController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\CartRuleController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\CartRuleCouponController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\CatalogRuleController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\EventController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\TemplateController;

Route::group([
    'middleware' => ['auth:sanctum', 'sanctum.admin'],
    'prefix'     => 'promotions',
], function () {
    /**
     * Catalog rule routes.
     */
    Route::controller(CatalogRuleController::class)->prefix('catalog-rules')->group(function () {
        Route::get('', 'allResources')->name('admin.promotions.catalog-rules.all-resources');

        Route::post('', 'store')->name('admin.promotions.catalog-rules.store');
    
        Route::get('{id}', 'getResource')->name('admin.promotions.catalog-rules.get-resource');
    
        Route::put('{id}', 'update')->name('admin.promotions.catalog-rules.update');
    
        Route::delete('{id}', 'destroy')->name('admin.promotions.catalog-rules.destroy');
    });

    /**
     * Cart rule routes.
     */
    Route::controller(CartRuleController::class)->prefix('cart-rules')->group(function () { 
        Route::get('', 'allResources')->name('admin.promotions.cart-rules.all-resources');

        Route::post('', 'store')->name('admin.promotions.cart-rules');
    
        Route::get('{id}', 'getResource')->name('admin.promotions.cart-rules.get-resource');
    
        Route::put('{id}', 'update')->name('admin.promotions.cart-rules.update');
    
        Route::delete('{id}', 'destroy')->name('admin.promotions.cart-rules.destroy');
    });

    /**
     * Cart rule coupon routes.
     */
    Route::controller(CartRuleCouponController::class)->prefix('cart-rules/{cart_rule_id}/coupons')->group(function () { 
        Route::get('', 'index')->name('admin.promotions.cart-rules.coupons.index');

        Route::post('', 'store')->name('admin.promotions.cart-rules.coupons.store');
    
        Route::get('{id}', 'show')->name('admin.promotions.cart-rules.coupons.show');
    
        Route::delete('{id}', 'destroy')->name('admin.promotions.cart-rules.coupons.destroy');
    
        Route::post('mass-destroy', 'massDestroy')->name('admin.promotions.cart-rules.coupons.mass-destroy');
    });

    /**
     * Email template routes.
     */
    Route::controller(TemplateController::class)->prefix('email-templates')->group(function () { 
        Route::get('', 'allResources')->name('admin.promotions.email-templates.all-resources');

        Route::post('', 'store')->name('admin.promotions.email-templates.store');
    
        Route::get('{id}', 'getResource')->name('admin.promotions.email-templates.get-resource');
    
        Route::put('{id}', 'update')->name('admin.promotions.email-templates.update');
    
        Route::delete('{id}', 'destroy')->name('admin.promotions.email-templates.mass-destroy');
    });

    /**
     * Event routes.
     */
    Route::controller(EventController::class)->prefix('events')->group(function () {
        Route::get('', 'allResources')->name('admin.promotions.events.all-resources');

        Route::post('', 'store')->name('admin.promotions.events.store');

        Route::get('{id}', 'getResource')->name('admin.promotions.events.get-resource');

        Route::put('{id}', 'update')->name('admin.promotions.events.update');

        Route::delete('{id}', 'destroy')->name('admin.promotions.events.destroy');
     });

    /**
     * Campaign routes.
     */
    Route::controller(CampaignController::class)->prefix('campaigns')->group(function () {
        Route::get('', 'allResources')->name('admin.promotions.campaigns.all-resources');

        Route::post('', 'store')->name('admin.promotions.campaigns.store');

        Route::get('{id}', 'getResource')->name('admin.promotions.campaigns.get-resource');

        Route::put('{id}', 'update')->name('admin.promotions.campaigns.update');

        Route::delete('{id}', 'destroy')->name('admin.promotions.campaigns.destroy');
    });
});
