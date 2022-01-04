<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\CampaignController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\CartRuleController;
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
    Route::get('catalog-rules', [CatalogRuleController::class, 'index']);

    Route::post('catalog-rules', [CatalogRuleController::class, 'store']);

    Route::get('catalog-rules/{id}', [CatalogRuleController::class, 'show']);

    Route::put('catalog-rules/{id}', [CatalogRuleController::class, 'update']);

    Route::delete('catalog-rules/{id}', [CatalogRuleController::class, 'destroy']);

    /**
     * Cart rules routes.
     */
    Route::get('cart-rules', [CartRuleController::class, 'index']);

    Route::post('cart-rules', [CartRuleController::class, 'store']);

    Route::get('cart-rules/{id}', [CartRuleController::class, 'show']);

    Route::put('cart-rules/{id}', [CartRuleController::class, 'update']);

    Route::delete('cart-rules/{id}', [CartRuleController::class, 'destroy']);

    Route::post('cart-rules/{id?}/generate-coupons', [CartRuleController::class, 'generateCoupons']);

    Route::post('cart-rules/{id?}/mass-delete', [CartRuleController::class, 'massDestroy']);

    /**
     * Emails templates routes.
     */
    Route::get('email-templates', [TemplateController::class, 'index']);

    Route::post('email-templates', [TemplateController::class, 'store']);

    Route::get('email-templates/{id}', [TemplateController::class, 'show']);

    Route::put('email-templates/{id}', [TemplateController::class, 'update']);

    Route::delete('email-templates/{id}', [TemplateController::class, 'destroy']);

    /**
     * Events routes.
     */
    Route::get('events', [EventController::class, 'index']);

    Route::post('events', [EventController::class, 'store']);

    Route::get('events/{id}', [EventController::class, 'show']);

    Route::put('events/{id}', [EventController::class, 'update']);

    Route::delete('events/{id}', [EventController::class, 'destroy']);

    /**
     * Campaigns routes.
     */
    Route::get('campaigns', [CampaignController::class, 'index']);

    Route::post('campaigns', [CampaignController::class, 'store']);

    Route::get('campaigns/{id}', [CampaignController::class, 'show']);

    Route::put('campaigns/{id}', [CampaignController::class, 'update']);

    Route::delete('campaigns/{id}', [CampaignController::class, 'destroy']);
});
