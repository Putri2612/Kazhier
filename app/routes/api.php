<?php

use App\Http\Controllers\api\Auth\AuthController;
use App\Http\Controllers\api\BankAccountController;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\ProductServiceCategoryController;
use App\Http\Controllers\api\ProductServiceController;
use App\Http\Controllers\api\ProductServiceUnitController;
use App\Http\Controllers\api\TaxController;
use App\Models\ProductServiceCategory;
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

            Route::get('bank-account', [BankAccountController::class, 'get'])->name('bank-account.get');
            Route::post('bank-account/create', [BankAccountController::class, 'create'])->name('bank-account.create');
            Route::delete('bank-account/{account_id}/delete', [BankAccountController::class, 'destroy'])->name('bank-account.destroy');
            
            Route::post('category/create', [ProductServiceCategoryController::class, 'create'])->name('category.create');
            Route::get('category/{type}', [ProductServiceCategoryController::class, 'get'])->name('category.get');
            Route::delete('category/{id}/delete', [ProductServiceCategory::class, 'destroy'])->name('category.destroy');

            Route::get('customer', [CustomerController::class, 'get'])->name('customer.get');
            Route::post('customer/create', [CustomerController::class, 'create'])->name('customer.create');
            Route::delete('customer/{id}/delete', [CustomerController::class, 'destroy'])->name('customer.destroy');

            Route::get('order', [OrderController::class, 'index'])->name('order.index');
            Route::post('order/create', [OrderController::class, 'create'])->name('order.create');
            Route::delete('order/{order_id}/delete', [OrderController::class, 'destroy'])->name('order.destroy');

            Route::get('product-service', [ProductServiceController::class, 'get'])->name('product-service.get');
            

            Route::get('unit/{id}', [ProductServiceUnitController::class, 'get'])->name('unit.get');

            Route::get('tax/all', [TaxController::class, 'all'])->name('tax.all');
            Route::get('tax/{id}', [TaxController::class, 'get'])->name('tax.get');
        });
    }
);

