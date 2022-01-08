<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\CampaignController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\CartRuleController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\CartRuleCouponController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\CatalogRuleController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\EventController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\TemplateController;

Route::group([
    'middleware' => 'auth:sanctum',
    'prefix'     => 'promotions',
], function () {
    /**
     * Catalog rules routes.
     */
    Route::get('catalog-rules', [CatalogRuleController::class, 'allResources']);

    Route::post('catalog-rules', [CatalogRuleController::class, 'store']);

    Route::get('catalog-rules/{id}', [CatalogRuleController::class, 'getResource']);

    Route::put('catalog-rules/{id}', [CatalogRuleController::class, 'update']);

    Route::delete('catalog-rules/{id}', [CatalogRuleController::class, 'destroy']);

    /**
     * Cart rules routes.
     */
    Route::get('cart-rules', [CartRuleController::class, 'allResources']);

    Route::post('cart-rules', [CartRuleController::class, 'store']);

    Route::get('cart-rules/{id}', [CartRuleController::class, 'getResource']);

    Route::put('cart-rules/{id}', [CartRuleController::class, 'update']);

    Route::delete('cart-rules/{id}', [CartRuleController::class, 'destroy']);

    /**
     * Cart rule coupons routes.
     */
    Route::get('cart-rules/{cart_rule_id}/coupons', [CartRuleCouponController::class, 'index']);

    Route::post('cart-rules/{cart_rule_id}/coupons', [CartRuleCouponController::class, 'store']);

    Route::get('cart-rules/{cart_rule_id}/coupons/{id}', [CartRuleCouponController::class, 'show']);

    Route::delete('cart-rules/{cart_rule_id}/coupons/{id}', [CartRuleCouponController::class, 'destroy']);

    Route::post('cart-rules/{cart_rule_id}/coupons/mass-delete', [CartRuleCouponController::class, 'massDestroy']);

    /**
     * Emails templates routes.
     */
    Route::get('email-templates', [TemplateController::class, 'allResources']);

    Route::post('email-templates', [TemplateController::class, 'store']);

    Route::get('email-templates/{id}', [TemplateController::class, 'getResource']);

    Route::put('email-templates/{id}', [TemplateController::class, 'update']);

    Route::delete('email-templates/{id}', [TemplateController::class, 'destroy']);

    /**
     * Events routes.
     */
    Route::get('events', [EventController::class, 'allResources']);

    Route::post('events', [EventController::class, 'store']);

    Route::get('events/{id}', [EventController::class, 'getResource']);

    Route::put('events/{id}', [EventController::class, 'update']);

    Route::delete('events/{id}', [EventController::class, 'destroy']);

    /**
     * Campaigns routes.
     */
    Route::get('campaigns', [CampaignController::class, 'allResources']);

    Route::post('campaigns', [CampaignController::class, 'store']);

    Route::get('campaigns/{id}', [CampaignController::class, 'getResource']);

    Route::put('campaigns/{id}', [CampaignController::class, 'update']);

    Route::delete('campaigns/{id}', [CampaignController::class, 'destroy']);
});
