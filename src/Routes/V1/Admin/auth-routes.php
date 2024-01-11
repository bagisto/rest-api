<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\User\AccountController;
use Webkul\RestApi\Http\Controllers\V1\Admin\User\AuthController;

/*
 *Unauthorized admin routes
 */
Route::controller(AuthController::class)->group(function () { 
    Route::post('login', 'login')->name('admin.login');

    Route::post('forgot-password', 'forgotPassword')->name('admin.forgot-password');
});

/*
 *Authorized admin routes
 */
Route::group(['middleware' => ['auth:sanctum', 'sanctum.admin']], function () {
    Route::controller(AuthController::class)->group(function () {  
        Route::delete('logout', 'logout')->name('admin.logout');
    });

    Route::controller(AccountController::class)->group(function () {  
        Route::get('get', 'get')->name('admin.get');
    
        Route::put('update', 'update')->name('admin.update');
    });
});
