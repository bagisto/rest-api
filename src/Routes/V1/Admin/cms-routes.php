<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\CMS\PageController;

Route::group(['middleware' => ['auth:sanctum', 'sanctum.admin']], function () {
    Route::controller(PageController::class)->prefix('cms')->group(function () {
        Route::get('', 'allResources')->name('admin.cms.all-resources');

        Route::post('', 'store')->name('admin.cms.store');

        Route::get('{id}', 'getResource')->name('admin.cms.getResource');

        Route::put('{id}', 'update')->name('admin.cms.update');

        Route::delete('{id}', 'destroy')->name('admin.cms.destroy');

        Route::post('mass-destroy', 'massDestroy')->name('admin.cms.mass-destroy');
    });

});
