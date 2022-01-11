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
    Route::get('orders', [OrderController::class, 'allResources']);

    Route::get('orders/{id}', [OrderController::class, 'getResource']);

    Route::post('orders/{id}/cancel', [OrderController::class, 'cancel']);

    Route::post('orders/{id}/comments', [OrderController::class, 'comment']);

    /**
     * Shipment routes.
     */
    Route::get('shipments', [ShipmentController::class, 'allResources']);

    Route::get('shipments/{id}', [ShipmentController::class, 'getResource']);

    Route::post('shipments/{order_id}', [ShipmentController::class, 'store']);

    /**
     * Invoice routes.
     */
    Route::get('invoices', [InvoiceController::class, 'allResources']);

    Route::get('invoices/{id}', [InvoiceController::class, 'getResource']);

    Route::post('invoices/{order_id}', [InvoiceController::class, 'store']);

    /**
     * Refund routes.
     */
    Route::get('refunds', [RefundController::class, 'allResources']);

    Route::get('refunds/{id}', [RefundController::class, 'getResource']);

    Route::post('refunds/{order_id}', [RefundController::class, 'store']);

    /**
     * Transaction routes.
     */
    Route::get('transactions', [TransactionController::class, 'allResources']);

    Route::get('transactions/{id}', [TransactionController::class, 'getResource']);

    Route::post('transactions', [TransactionController::class, 'store']);
});
