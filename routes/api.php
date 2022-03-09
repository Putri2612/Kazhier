<?php

use App\Http\Controllers\api\Auth\AuthController;
use App\Http\Controllers\api\BankAccountController;
use App\Http\Controllers\api\CustomerCategoryController;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\ExpenseController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\ProductServiceCategoryController;
use App\Http\Controllers\api\ProductServiceController;
use App\Http\Controllers\api\ProductServiceUnitController;
use App\Http\Controllers\api\SupplierController;
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

        Route::group(['middleware' => ['auth:api', 'plan']], function() {
            Route::post('logout', [AuthController::class, 'logout'])->name('logout');
            Route::get('role-and-permission', [AuthController::class, 'RolePermission'])->name('role-and-permission');

            Route::get('bank-account', [BankAccountController::class, 'get'])->name('bank-account.get');
            Route::post('bank-account/create', [BankAccountController::class, 'create'])->name('bank-account.create');
            Route::delete('bank-account/{account_id}/delete', [BankAccountController::class, 'destroy'])->name('bank-account.destroy');
            
            Route::post('category/create', [ProductServiceCategoryController::class, 'create'])->name('category.create');
            Route::get('category/{type}', [ProductServiceCategoryController::class, 'get'])->name('category.get');
            Route::delete('category/{id}/delete', [ProductServiceCategoryController::class, 'destroy'])->name('category.destroy');

            Route::get('customer', [CustomerController::class, 'get'])->name('customer.get');
            Route::post('customer/create', [CustomerController::class, 'create'])->name('customer.create');
            Route::delete('customer/{id}/delete', [CustomerController::class, 'destroy'])->name('customer.destroy');
            
            Route::post('customer-category/create', [CustomerCategoryController::class, 'create'])->name('customer-category.create');
            Route::get('customer-category/{category_id}', [CustomerCategoryController::class, 'get'])->name('customer-category.get');
            Route::delete('customer-category/{category_id}/delete', [CustomerCategoryController::class, 'destroy'])->name('customer-category.destroy');

            Route::get('expense', [ExpenseController::class, 'get'])->name('expense.get');
            Route::post('expense/create', [ExpenseController::class, 'create'])->name('expense.create');
            Route::delete('expense/{expense_id}/delete', [ExpenseController::class, 'destroy'])->name('expense.destroy');

            Route::get('order', [OrderController::class, 'index'])->name('order.index');
            Route::post('order/create', [OrderController::class, 'create'])->name('order.create');
            Route::delete('order/{order_id}/delete', [OrderController::class, 'destroy'])->name('order.destroy');

            Route::post('product-service/create', [ProductServiceController::class, 'create'])->name('product-service.create');
            Route::get('product-service/{product_id}', [ProductServiceController::class, 'get'])->name('product-service.get');
            Route::delete('product-service/{product_id}/delete', [ProductServiceController::class, 'destroy'])->name('product-service.destroy');
            
            Route::post('unit/create', [ProductServiceUnitController::class, 'create'])->name('unit.create');
            Route::get('unit/{id}', [ProductServiceUnitController::class, 'get'])->name('unit.get');
            Route::delete('unit/{id}/delete', [ProductServiceUnitController::class, 'destroy'])->name('unit.destroy');
            
            Route::post('tax/create', [TaxController::class, 'create'])->name('tax.create');
            Route::get('tax/{id}', [TaxController::class, 'get'])->name('tax.get');
            Route::delete('tax/{id}/delete', [TaxController::class, 'destroy'])->name('tax.destroy');

            Route::post('supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
            Route::get('supplier/{id}', [SupplierController::class, 'get'])->name('supplier.get');
            Route::delete('supplier/{id}/delete', [SupplierController::class, 'destroy'])->name('supplier.destroy');
        });
    }
);
