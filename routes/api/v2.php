<?php

use App\Http\Controllers\api\v2\AssetController;
use App\Http\Controllers\API\v2\Auth\LoginController;
use App\Http\Controllers\api\v2\Auth\LogoutController;
use App\Http\Controllers\API\v2\Auth\RegisterController;
use App\Http\Controllers\api\v2\BalanceSheetController;
use App\Http\Controllers\api\v2\BankAccountController;
use App\Http\Controllers\api\v2\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->as('auth.')->group(function() {
    Route::post('login', [LoginController::class, 'index'])->name('login');
    Route::post('register', [RegisterController::class, 'index'])->name('register');
});

Route::group(
    [
        'middleware' => [
            'auth:api', 
            'plan',
            'verified'
        ]
    ], 
    function() {

        Route::delete('auth/logout', [LogoutController::class, 'index'])->name('auth.logout');

        Route::prefix('asset')->as('asset.')->group(function() {
            Route::get('/', [AssetController::class, 'get'])->name('get');
            Route::post('create', [AssetController::class, 'create'])->name('create');
            Route::put('{id}/update', [AssetController::class, 'update'])->name('update');
            Route::delete('{id}/delete', [AssetController::class, 'destroy'])->name('delete');
        });

        Route::prefix('bank-account')->as('bank-account.')->group(function() {
            Route::get('/', [BankAccountController::class, 'get'])->name('get');
            Route::post('create', [BankAccountController::class, 'create'])->name('create');
            Route::put('{id}/update', [BankAccountController::class, 'update'])->name('update');
            Route::delete('{id}/delete', [BankAccountController::class, 'destroy'])->name('delete');
        });

        Route::prefix('category/{type}')->as('category.')->group(function() {
            Route::get('/', [CategoryController::class, 'get'])->name('get');
            Route::post('create', [CategoryController::class, 'create'])->name('create');
            Route::put('{id}/update', [CategoryController::class, 'update'])->name('update');
            Route::delete('{id}/delete', [CategoryController::class, 'destroy'])->name('delete');
        });

        Route::prefix('report')->as('report.')->group(function() {
            Route::get('balance-sheet', [BalanceSheetController::class, 'get'])->name('balance-sheet');
        });
    }
);