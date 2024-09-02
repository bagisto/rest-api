<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\Sales\InvoiceController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Sales\OrderController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Sales\ReOrderController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Sales\RefundController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Sales\ShipmentController;
use Webkul\RestApi\Http\Controllers\V1\Admin\Sales\TransactionController;

Route::group([
    'middleware' => ['auth:sanctum', 'sanctum.admin'],
    'prefix'     => 'sales',
], function () {
    /**
     * Order routes.
     */
    Route::controller(OrderController::class)->prefix('orders')->group(function () {
        Route::get('', 'allResources');

        Route::get('{id}', 'getResource');

        Route::post('{id}/cancel', 'cancel');

        Route::post('{id}/comments', 'comment');
    });

    Route::controller(ReOrderController::class)->prefix('re-orders')->group(function () {
        Route::post('{id}', 'store');

        Route::post('{id}/save-address', 'saveAddress');

        Route::post('{id}/save-shipping', 'saveShipping');

        Route::post('{id}/save-payment', 'savePayment');

        Route::post('{id}/save-order', 'saveOrder');
    });

    /**
     * Shipment routes.
     */
    Route::controller(ShipmentController::class)->prefix('shipments')->group(function () {
        Route::get('', 'allResources');

        Route::get('{id}', 'getResource');

        Route::post('{order_id}', 'store');
    });

    /**
     * Invoice routes.
     */
    Route::controller(InvoiceController::class)->prefix('invoices')->group(function () {
        Route::get('', 'allResources');

        Route::get('{id}', 'getResource');

        Route::post('{order_id}', 'store');
    });

    /**
     * Refund routes.
     */
    Route::controller(RefundController::class)->prefix('refunds')->group(function () {
        Route::get('', 'allResources');

        Route::get('{id}', 'getResource');

        Route::post('{order_id}', 'store');
    });

    /**
     * Transaction routes.
     */
    Route::controller(TransactionController::class)->prefix('transactions')->group(function () {
        Route::get('', 'allResources');

        Route::get('{id}', 'getResource');

        Route::post('', 'store');
    });
});
