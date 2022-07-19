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
use Illuminate\Support\Facades\Route;

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
        require __DIR__."/api/v1.php";

        Route::prefix('v2')->as('v2.')->middleware([
            'xss'
        ])->group(
            function () {
                require __DIR__.'/api/v2.php';
            }
        );
    }
);

