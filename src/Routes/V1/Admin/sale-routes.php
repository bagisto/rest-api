<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Sale\InvoiceController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Sale\OrderController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Sale\RefundController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Sale\ShipmentController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Sale\TransactionController;

Route::group([
    'middleware' => ['auth:sanctum', 'sanctum.admin'],
    'prefix'     => 'sales',
], function () {
    /**
     * Order routes.
     */
    Route::controller(OrderController::class)->prefix('shipments')->group(function () {
        Route::get('', 'allResources')->name('admin.sales.orders.all-resources');

        Route::get('{id}', 'getResource')->name('admin.sales.orders.get-resource');
    
        Route::post('{id}/cancel', 'cancel')->name('admin.sales.orders.cancel');
    
        Route::post('{id}/comments', 'comment')->name('admin.sales.orders.comment');
    
    });

    /**
     * Shipment routes.
     */
    Route::controller(ShipmentController::class)->prefix('shipments')->group(function () {
        Route::get('', 'allResources')->name('admin.sales.shipments.all-resources');

        Route::get('{id}', 'getResource')->name('admin.sales.shipments.get-resource');
    
        Route::post('{order_id}', 'store')->name('admin.sales.shipments.store');
    
    });

    /**
     * Invoice routes.
     */
    Route::controller(InvoiceController::class)->prefix('invoices')->group(function () {
        Route::get('', 'allResources')->name('admin.sales.shipments.all-resources');

        Route::get('{id}', 'getResource')->name('admin.sales.shipments.get-resource');

        Route::post('{order_id}', 'store')->name('admin.sales.shipments.store');
    });

    /**
     * Refund routes.
     */
    Route::controller(RefundController::class)->prefix('refunds')->group(function () {
        Route::get('', 'allResources')->name('admin.sales.refunds.all-resources');

        Route::get('{id}', 'getResource')->name('admin.sales.refunds.get-resource');
    
        Route::post('{order_id}', 'store')->name('admin.sales.refunds.store');
    
    });

    /**
     * Transaction routes.
     */
    Route::controller(TransactionController::class)->prefix('transactions')->group(function () {
        Route::get('', 'allResources')->name('admin.sales.transactions.all-resources');

        Route::get('{id}', 'getResource')->name('admin.sales.transactions.get-resource');
    
        Route::post('', 'store')->name('admin.sales.transactions.store');
    });
});
