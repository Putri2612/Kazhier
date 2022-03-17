<?php

use App\Http\Controllers\api\Auth\AuthController;
use App\Http\Controllers\api\BankAccountController;
use App\Http\Controllers\api\CompanyController;
use App\Http\Controllers\api\CustomerCategoryController;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\ExpenseController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\PaymentMethodController;
use App\Http\Controllers\api\ProductServiceCategoryController;
use App\Http\Controllers\api\ProductServiceController;
use App\Http\Controllers\api\ProductServiceUnitController;
use App\Http\Controllers\api\ReportController;
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
            Route::get('company', [CompanyController::class, 'get'])->name('company.get');
            Route::put('company/edit', [CompanyController::class, 'update'])->name('company.update');
            
            Route::post('logout', [AuthController::class, 'logout'])->name('logout');
            Route::get('role-and-permission', [AuthController::class, 'RolePermission'])->name('role-and-permission');

            Route::get('bank-account', [BankAccountController::class, 'get'])->name('bank-account.get');
            Route::post('bank-account/create', [BankAccountController::class, 'create'])->name('bank-account.create');
            Route::put('bank-account/{account_id}/edit', [BankAccountController::class, 'edit'])->name('bank-account.edit');
            Route::delete('bank-account/{account_id}/delete', [BankAccountController::class, 'destroy'])->name('bank-account.destroy');
            
            Route::post('category/create', [ProductServiceCategoryController::class, 'create'])->name('category.create');
            Route::get('category/{type}', [ProductServiceCategoryController::class, 'get'])->name('category.get');
            Route::put('category/{category_id}/edit', [ProductServiceCategoryController::class, 'edit'])->name('category.edit');
            Route::delete('category/{category_id}/delete', [ProductServiceCategoryController::class, 'destroy'])->name('category.destroy');

            Route::get('customer', [CustomerController::class, 'get'])->name('customer.get');
            Route::get('customer/name/{name}', [CustomerController::class, 'name'])->name('customer.name');
            Route::post('customer/create', [CustomerController::class, 'create'])->name('customer.create');
            Route::put('customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
            Route::delete('customer/{id}/delete', [CustomerController::class, 'destroy'])->name('customer.destroy');
            
            Route::post('customer-category/create', [CustomerCategoryController::class, 'create'])->name('customer-category.create');
            Route::get('customer-category/{category_id}', [CustomerCategoryController::class, 'get'])->name('customer-category.get');
            Route::put('customer-category/{category_id}/edit', [CustomerCategoryController::class, 'edit'])->name('customer-category.edit');
            Route::delete('customer-category/{category_id}/delete', [CustomerCategoryController::class, 'destroy'])->name('customer-category.destroy');

            Route::get('expense', [ExpenseController::class, 'get'])->name('expense.get');
            Route::post('expense/create', [ExpenseController::class, 'create'])->name('expense.create');
            Route::put('expense/{expense_id}/edit', [ExpenseController::class, 'edit'])->name('expense.edit');
            Route::delete('expense/{expense_id}/delete', [ExpenseController::class, 'destroy'])->name('expense.destroy');

            Route::get('order', [OrderController::class, 'index'])->name('order.index');
            Route::post('order/create', [OrderController::class, 'create'])->name('order.create');
            Route::put('order/{order_id}/edit', [OrderController::class, 'edit'])->name('order.edit');
            Route::delete('order/{order_id}/delete', [OrderController::class, 'destroy'])->name('order.destroy');
            Route::get('order/{order_id}/detail', [OrderController::class, 'detail'])->name('order.detail');

            Route::post('product-service/create', [ProductServiceController::class, 'create'])->name('product-service.create');
            Route::get('product-service/{product_id}', [ProductServiceController::class, 'get'])->name('product-service.get');
            Route::put('product-service/{product_id}/edit', [ProductServiceController::class, 'edit'])->name('product-service.edit');
            Route::delete('product-service/{product_id}/delete', [ProductServiceController::class, 'destroy'])->name('product-service.destroy');
            
            Route::post('unit/create', [ProductServiceUnitController::class, 'create'])->name('unit.create');
            Route::get('unit/{unit_id}', [ProductServiceUnitController::class, 'get'])->name('unit.get');
            Route::put('unit/{unit_id}/edit', [ProductServiceUnitController::class, 'edit'])->name('unit.edit');
            Route::delete('unit/{unit_id}/delete', [ProductServiceUnitController::class, 'destroy'])->name('unit.destroy');
            
            Route::post('tax/create', [TaxController::class, 'create'])->name('tax.create');
            Route::get('tax/{id}', [TaxController::class, 'get'])->name('tax.get');
            Route::put('tax/{id}/edit', [TaxController::class, 'edit'])->name('tax.edit');
            Route::delete('tax/{id}/delete', [TaxController::class, 'destroy'])->name('tax.destroy');

            Route::post('supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
            Route::get('supplier/{id}', [SupplierController::class, 'get'])->name('supplier.get');
            Route::delete('supplier/{id}/delete', [SupplierController::class, 'destroy'])->name('supplier.destroy');

            Route::post('payment-method/create', [PaymentMethodController::class, 'create'])->name('payment-method.create');
            Route::put('payment-method/{method_id}/edit', [PaymentMethodController::class, 'edit'])->name('payment-method.edit');
            Route::delete('payment-method/{method_id}/delete', [PaymentMethodController::class, 'destroy'])->name('payment-method.destroy');
            Route::get('payment-method/{method_id}', [PaymentMethodController::class, 'get'])->name('payment-method.get');

            Route::get('report/income', [ReportController::class, 'income'])->name('report.income');
            Route::get('report/expense', [ReportController::class, 'expense'])->name('report.expense');
        });
    }
);

