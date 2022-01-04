<?php

use App\Http\Controllers\api\Auth\AuthController;
use App\Http\Controllers\api\BankAccountController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\ProductServiceController;
use App\Http\Controllers\api\ProductServiceUnitController;
use App\Http\Controllers\api\TaxController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::as('api.')->group(
    function () {
        Route::post('login', [AuthController::class, 'login'])->name('login');
        // Route::post('register', [AuthController::class, 'register'])->name('register');

        Route::group(['middleware' => 'auth:api'], function() {

            Route::post('order/create', [OrderController::class, 'create'])->name('order.create');

            Route::get('product-service', [ProductServiceController::class, 'get'])->name('product-service.get');
            
            Route::get('category/{type}', [CategoryController::class, 'get'])->name('category.get');

            Route::get('product-service-unit/{id}', [ProductServiceUnitController::class, 'get'])->name('unit.get');

            Route::get('bank-account', [BankAccountController::class, 'get'])->name('bank-account.get');

            Route::get('tax/all', [TaxController::class, 'all'])->name('tax.all');
            Route::get('tax/{id}', [TaxController::class, 'get'])->name('tax.get');
        });
    }
);

