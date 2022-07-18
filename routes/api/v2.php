<?php

use App\Http\Controllers\api\v2\AssetController;
use App\Http\Controllers\api\v2\BalanceSheetController;
use App\Http\Controllers\api\v2\BankAccountController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:api', 'plan']], function() {

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

    Route::prefix('report')->as('report.')->group(function() {
        Route::get('balance-sheet', [BalanceSheetController::class, 'get'])->name('balance-sheet');
    });


});