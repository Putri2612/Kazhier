<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\api\CustomerCategoryController as ApiCustomerCategoryController;
use App\Http\Controllers\api\CustomerController as ApiCustomerController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PostRegisterController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\BalanceSheetController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CreditNoteController;
use App\Http\Controllers\CustomerCategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomFieldController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebitNoteController;
use App\Http\Controllers\DefaultValueController;
use App\Http\Controllers\DialogController;
use App\Http\Controllers\EquityController;
use App\Http\Controllers\EULAController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FrontEndErrorController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\ImportSampleController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoicePaymentController;
use App\Http\Controllers\InvoiceStatusController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LedgerController;
use App\Http\Controllers\LiabilityController;
use App\Http\Controllers\MidtransPaymentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProductServiceCategoryController;
use App\Http\Controllers\ProductServiceController;
use App\Http\Controllers\ProductServiceStockController;
use App\Http\Controllers\ProductServiceUnitController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserAgreementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('landing-page.index');} );

Route::prefix('app')->group(
    function() {
        Route::prefix('customer')->as('customer.')->group(
            function (){
                Route::group(
                    [
                        'middleware' => ['xss']
                    ], function () {
                        Route::get('login/{lang?}', [LoginController::class, 'showCustomerLoginLang'])->name('login.lang');
                        Route::post('login', [LoginController::class, 'customerLogin'])->name('login');
                    }
                );
        
                Route::group(
                    [
                        'middleware' => ['auth:customer', 'xss']
                    ], function() {
                        Route::get('dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
                        Route::get('invoice', [InvoiceController::class, 'customerInvoice'])->name('invoice');
                        Route::get('proposal', [ProposalController::class, 'customerProposal'])->name('proposal');
                        Route::get('proposal/{id}/show', [ProposalController::class, 'customerProposalShow'])->name('proposal.show');
                        Route::get('invoice/{id}/send', [InvoiceController::class, 'customerInvoiceSend'])->name('invoice.send');
                        Route::post('invoice/{id}/send/mail', [InvoiceController::class, 'customerInvoiceSendMail'])->name('invoice.send.mail');
                        Route::get('invoice/{id}/show', [InvoiceController::class, 'customerInvoiceShow'])->name('invoice.show');
                        Route::get('payment', [CustomerController::class, 'payment'])->name('payment');
                        Route::get('transaction', [CustomerController::class, 'transaction'])->name('transaction');
                        Route::post('logout', [CustomerController::class, 'customerLogout'])->name('logout');
                        Route::get('profile', [CustomerController::class, 'profile'])->name('profile');
                        Route::put('update-profile', [CustomerController::class, 'editprofile'])->name('update.profile');
                        Route::put('billing-info', [CustomerController::class, 'editBilling'])->name('update.billing.info');
                        Route::put('shipping-info', [CustomerController::class, 'editShipping'])->name('update.shipping.info');
                        Route::put('change.password', [CustomerController::class, 'updatePassword'])->name('update.password');
                        Route::get('change-language/{lang}', [CustomerController::class, 'changeLanquage'])->name('change.language');
                    }
                );
            }
        );
        
        Route::prefix('vender')->as('vender.')->group(
            function (){
                Route::group(
                    [
                        'middleware' => [
                            'xss'
                        ]
                    ], function () {
                        Route::get('login/{lang?}', [LoginController::class, 'showVenderLoginLang'])->name('login.lang');
                        Route::post('login', [LoginController::class, 'VenderLogin'])->name('login');
                    }
                );
        
                Route::group(
                    [
                        'middleware' => [ 'auth:vender', 'xss' ]
                    ], function () {
                        Route::get('dashboard', [VenderController::class, 'dashboard'])->name('dashboard');
        
                        Route::get('bill', [BillController::class, 'VenderBill'])->name('bill');
                        Route::prefix('bill')->as('bill.')->group(
                            function() {
                                Route::get('{id}/show', [BillController::class, 'venderBillShow'])->name('show');
                                Route::get('{id}/send', [BillController::class, 'venderBillSend'])->name('send');
                                Route::post('{id}/send/mail', [BillController::class, 'venderBillSendMail'])->name('send.mail');
                            }
                        );
                        
                        Route::get('payment', [VenderController::class, 'payment'])->name('payment');
                        Route::get('transaction', [VenderController::class, 'transaction'])->name('transaction');
                        Route::post('logout', [VenderController::class, 'venderLogout'])->name('logout');
                        Route::get('profile', [VenderController::class, 'profile'])->name('profile');
                        Route::put('update-profile', [VenderController::class, 'editprofile'])->name('update.profile');
                        Route::put('billing-info', [VenderController::class, 'editBilling'])->name('update.billing.info');
                        Route::put('shipping-info', [VenderController::class, 'editShipping'])->name('update.shipping.info');
                        Route::put('change.password', [VenderController::class, 'updatePassword'])->name('update.password');
                        Route::get('change-language/{lang}', [VenderController::class, 'changeLanquage'])->name('change.language');
                    }
                );
            }
        );
        
        Route::group(
            [
                'middleware' => [
                    'auth',
                    'xss',
                    'verified',
                    'plan'
                ]
            ], function () {
                Route::get('agreement/{type}/edit', [UserAgreementController::class, 'edit'])->name('agreement.edit');
                Route::put('agreement/{type}/update', [UserAgreementController::class, 'update'])->name('agreement.update');
        
                Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
                Route::prefix('dashboard/charts')->as('dashboard-chart.')->group(function() {
                    Route::get('cash-flow/{month}/{year}', [DashboardController::class, 'GetCashFlow'])->name('cashflow');
                    Route::get('income-expense/{year}', [DashboardController::class, 'GetIncomeExpense'])->name('income-expense');
                    Route::get('doughnut/{type}/{year}', [DashboardController::class, 'GetCategoryData'])->name('category');
                });
        
                Route::get('user/{id}/plan', [UserController::class, 'upgradePlan'])->name('plan.upgrade');
        
                Route::get('user/{id}/plan/{pid}', [UserController::class, 'activePlan'])->name('plan.active');
        
                Route::get('profile', [UserController::class, 'profile'])->name('profile');
                Route::put('edit-profile', [UserController::class, 'editprofile'])->name('update.account');
                Route::resource('users', UserController::class, ['except' => 'show']);
                Route::get('users/search/{query}/{page}', [UserController::class, 'search'])->name('users.page-with-search');
                Route::get('users/search/{query}', [UserController::class, 'search'])->name('users.search');
                Route::get('users/{page}', [UserController::class, 'index'])->name('users.page');
                Route::match(['get', 'put'], 'users/{userID}/activity', [UserController::class, 'activity'])->name('user.activity');
        
                Route::prefix('redeem-referral')->as('referral.')->group(
                    function(){
                        Route::get('/', [ReferralController::class, 'redeem'])->name('redeem');
                        Route::get('plan/{code}', [ReferralController::class, 'RedeemPlan'])->name('redeem.plan');
                        Route::post('plan/checkout', [ReferralController::class, 'CheckoutPlan'])->name('checkout.plan');
                        Route::get('withdraw', [ReferralController::class, 'WithdrawRequest'])->name('withdraw');
                        Route::post('withdraw/request', [ReferralController::class, 'RequestWithdraw'])->name('withdraw.request');
                        Route::put('withdraw/{id}/process', [ReferralController::class, 'ProcessWithdrawRequest'])->name('withdraw.process');
                        Route::delete('withdraw/{id}/cancel', [ReferralController::class, 'CancelWithdrawRequest'])->name('withdraw.cancel');
                        Route::get('withdraw/history', [ReferralController::class, 'history'])->name('history');
                    }
                );
        
                Route::resource('roles', RoleController::class);
                Route::resource('permissions', PermissionController::class);
        
                Route::get('change-language/{lang}', [LanguageController::class, 'changeLanquage'])->name('change.language');
                Route::get('manage-language/{lang}', [LanguageController::class, 'manageLanguage'])->name('manage.language');
                Route::post('store-language-data/{lang}', [LanguageController::class, 'storeLanguageData'])->name('store.language.data');
                Route::get('create-language', [LanguageController::class, 'createLanguage'])->name('create.language');
                Route::post('store-language', [LanguageController::class, 'storeLanguage'])->name('store.language');
        
                Route::resource('systems', SystemController::class);
                Route::put('referral-settings', [SystemController::class, 'saveReferralSettings'])->name('referral.settings');
                Route::put('asset-version-settings', [SystemController::class, 'saveAssetVersion'])->name('asset-version.settings');
                Route::post('email-settings', [SystemController::class, 'saveEmailSettings'])->name('email.settings');
                Route::post('company-settings', [SystemController::class, 'saveCompanySettings'])->name('company.settings');
                Route::post('stripe-settings', [SystemController::class, 'saveStripeSettings'])->name('stripe.settings');
                Route::post('midtrans-settings', [SystemController::class, 'saveMidtransSettings'])->name('midtrans.settings');
                Route::post('system-settings', [SystemController::class, 'saveSystemSettings'])->name('system.settings');
                Route::get('company-setting', [SystemController::class, 'companyIndex'])->name('company.setting');
                Route::post('business-setting', [SystemController::class, 'saveBusinessSettings'])->name('business.setting');
        
                Route::post('productservice/get', [ProductServiceController::class, 'get'])->name('productservice.get');
                Route::get('productservice/export', [ProductServiceController::class, 'export'])->name('productservice.export');
                Route::get('productservice/import', [ProductServiceController::class, 'import'])->name('productservice.import');
                Route::put('productservice/import/', [ProductServiceController::class, 'storeImport'])->name('productservice.import.store');
                Route::post('productservice/import/header', [ProductServiceController::class, 'getImportHeadings'])->name('productservice.import.headings');
                Route::resource('productservice', ProductServiceController::class);

                Route::get('product-stock', [ProductServiceStockController::class, 'index'])->name('product-stock.index');
                Route::post('product-stock/get', [ProductServiceStockController::class, 'get'])->name('product-stock.get');
                Route::get('product-stock/{id}/stock', [ProductServiceStockController::class, 'show'])->name('product-stock.show');
                Route::post('product-stock/{id}/history', [ProductServiceStockController::class, 'history'])->name('product-stock.history');
                
                Route::get('customer/ajax/{name}', [ApiCustomerController::class, 'name'])->name('customer.name.ajax');
                
                Route::post('customer/get', [CustomerController::class, 'get'])->name('customer.get');
                Route::resource('customer', CustomerController::class);

                Route::get('customer-category/ajax/{category_id}', [ApiCustomerCategoryController::class, 'get'])->name('customer.category.ajax');

                Route::post('customer-category/get', [CustomerCategoryController::class, 'get'])->name('customer-category.get');
                Route::resource('customer-category', CustomerCategoryController::class);

                Route::post('vender/get', [VenderController::class, 'get'])->name('vender.get');
                Route::resource('vender', VenderController::class);
        
                Route::resource('bank-account', BankAccountController::class);
        
                Route::resource('transfer', TransferController::class);
        
                Route::get('transaction', [TransactionController::class, 'index'])->name('transaction.index');
                Route::post('transaction/get', [TransactionController::class, 'get'])->name('transaction.get');
        
                Route::resource('defaults', DefaultValueController::class);
        
                Route::prefix('initial-setup')->as('initial-setup.')->group(
                    function () {
                        Route::get('', [PostRegisterController::class, 'index'])->name('index');
                        Route::match(['get', 'post'], 'revenue', [PostRegisterController::class, 'revenue'])->name('revenue');
                        Route::match(['get', 'post'], 'expense', [PostRegisterController::class, 'expense'])->name('expense');
                        Route::match(['get', 'post'], 'product-category', [PostRegisterController::class, 'product_category'])->name('product-category');
                        Route::match(['get', 'post'], 'unit', [PostRegisterController::class, 'unit'])->name('unit');
                        Route::match(['get', 'post'], 'tax', [PostRegisterController::class, 'tax'])->name('tax');
                        Route::match(['get', 'post'], 'payment-method', [PostRegisterController::class, 'paymentMethod'])->name('method');
                        Route::get('complete', [PostRegisterController::class, 'complete'])->name('complete');
                        Route::get('skip', [PostRegisterController::class, 'skip'])->name('skip');
                    }
                );
        
                // Tax, category, unit, method
                Route::resource('taxes', TaxController::class);
                Route::get('product-category/suggestion', [ProductServiceCategoryController::class, 'createSuggestions'])->name('product-category.suggestion');
                Route::post('{type}/category/get', [ProductServiceCategoryController::class, 'get'])->name('category.get');
                Route::resource('{type}/category', ProductServiceCategoryController::class);
        
                Route::post('product-unit/get', [ProductServiceUnitController::class, 'get'])->name('product-unit.get');
                Route::resource('product-unit', ProductServiceUnitController::class);

                Route::post('payment-method/get', [PaymentMethodController::class, 'get'])->name('payment-method.get');
                Route::resource('payment-method', PaymentMethodController::class);
        
                // Income

                // Route::get('cashier-mode', [CashierController::class, 'index'])->name('cashier-mode');
                Route::post('order/create', [OrderController::class, 'create'])->name('order.create.ajax');
        
                Route::prefix('invoice')->as('invoice.')->group(
                    function () {
                        Route::post('get', [InvoiceController::class, 'get'])->name('get');

                        Route::get('{id}/credit-note', [CreditNoteController::class, 'create'])->name('credit.note');
                        Route::post('{id}/credit-note', [CreditNoteController::class, 'store'])->name('credit.note.store');
                        Route::get('{id}/credit-note/edit/{cn_id}', [CreditNoteController::class, 'edit'])->name('edit.credit.note');
                        Route::put('{id}/credit-note/edit/{cn_id}', [CreditNoteController::class, 'update'])->name('update.credit.note');
                        Route::delete('{id}/credit-note/delete/{cn_id}', [CreditNoteController::class, 'destroy'])->name('destroy.credit.note');
        
                        Route::get('{id}/duplicate', [InvoiceController::class, 'duplicate'])->name('duplicate');
                        Route::get('{id}/shipping/print', [InvoiceController::class, 'shippingDisplay'])->name('shipping.print');
                        Route::get('{id}/sent', [InvoiceController::class, 'sent'])->name('sent');
                        
                        Route::get('{id}/payment', [InvoicePaymentController::class, 'create'])->name('payment');
                        Route::post('{id}/payment', [InvoicePaymentController::class, 'store'])->name('payment.create');
                        Route::delete('{id}/payment/{pid}/destroy', [InvoicePaymentController::class, 'destroy'])->name('payment.destroy');
                        Route::get('{id}/payment/reminder', [InvoicePaymentController::class, 'reminder'])->name('payment.reminder');
        
                        Route::post('customer', [InvoiceController::class, 'customer'])->name('customer');
                        Route::get('export', [InvoiceController::class, 'export'])->name('export');
                        Route::get('import', [InvoiceController::class, 'import'])->name('import');
                        Route::post('import/headings', [InvoiceController::class, 'getImportHeadings'])->name('import.headings');
                        Route::put('import/store', [InvoiceController::class, 'storeImport'])->name('import.store');
                        Route::post('product/destroy', [InvoiceController::class, 'productDestroy'])->name('product.destroy');
                        Route::post('product/SKU', [InvoiceController::class, 'productBySKU'])->name('product.sku');
                        Route::post('product', [InvoiceController::class, 'product'])->name('product');
        
                        Route::put('{id}/picked-up', [InvoiceStatusController::class, 'PickedUp'])->name('picked-up');
                        Route::put('{id}/prepared', [InvoiceStatusController::class, 'Prepared'])->name('prepared');
                        Route::put('{id}/delivering', [InvoiceStatusController::class, 'Delivering'])->name('delivering');
                        Route::put('{id}/delivered', [InvoiceStatusController::class, 'Delivered'])->name('delivered');
                    }
                );
        
                Route::resource('invoice', InvoiceController::class);
                Route::post('invoices/template/setting', [InvoiceController::class, 'saveTemplateSettings'])->name('template.setting');
        
                Route::get('credit-note', [CreditNoteController::class, 'index'])->name('credit.note');
                Route::post('credit-note/get', [CreditNoteController::class, 'get'])->name('credit.note.get');
                Route::get('custom-credit-note', [CreditNoteController::class, 'customCreate'])->name('invoice.custom.credit.note');
                Route::post('custom-credit-note', [CreditNoteController::class, 'customStore'])->name('invoice.custom.credit.note.store');
                Route::get('credit-note/invoice', [CreditNoteController::class, 'getinvoice'])->name('get.invoice.credit.note');
        
                Route::get('revenue/export', [RevenueController::class, 'export'])->name('revenue.export');
                Route::get('revenue/import', [RevenueController::class, 'import'])->name('revenue.import');
                Route::post('revenue/import/heading', [RevenueController::class, 'getImportHeadings'])->name('revenue.import.headings');
                Route::put('revenue/import/store', [RevenueController::class, 'storeImport'])->name('revenue.import.store');
                Route::post('revenue/get', [RevenueController::class, 'get'])->name('revenue.get');
                Route::resource('revenue', RevenueController::class);
                // Expense
        
                Route::prefix('bill')->as('bill.')->group(
                    function() {
                        Route::post('get', [BillController::class, 'get'])->name('get');

                        Route::get('{id}/debit-note', [DebitNoteController::class, 'create'])->name('debit.note');
                        Route::post('{id}/debit-note', [DebitNoteController::class, 'store'])->name('debit.note.store');
                        Route::get('{id}/debit-note/edit/{cn_id}', [DebitNoteController::class, 'edit'])->name('edit.debit.note');
                        Route::put('{id}/debit-note/edit/{cn_id}', [DebitNoteController::class, 'update'])->name('update.debit.note');
                        Route::delete('{id}/debit-note/delete/{cn_id}', [DebitNoteController::class, 'destroy'])->name('delete.debit.note');
        
                        Route::get('{id}/duplicate', [BillController::class, 'duplicate'])->name('duplicate');
                        Route::get('{id}/shipping/print', [BillController::class, 'shippingDisplay'])->name('shipping.print');
                        Route::get('{id}/sent', [BillController::class, 'sent'])->name('sent');
                        Route::get('{id}/payment', [BillController::class, 'payment'])->name('payment');
                        Route::post('{id}/payment', [BillController::class, 'createPayment'])->name('payment.create');
                        Route::delete('{id}/payment/{pid}/destroy', [BillController::class, 'paymentDestroy'])->name('payment.destroy');
        
                        Route::get('export', [BillController::class, 'export'])->name('export');
                        Route::get('import', [BillController::class, 'import'])->name('import');
                        Route::post('import/headings', [BillController::class, 'getImportHeadings'])->name('import.headings');
                        Route::put('import/store', [BillController::class, 'storeImport'])->name('import.store');
                        Route::post('product/destroy', [BillController::class, 'productDestroy'])->name('product.destroy');
                        Route::post('product', [BillController::class, 'product'])->name('product');
                        Route::post('vender', [BillController::class, 'vender'])->name('vender');
                    }
                );
        
                Route::resource('bill', BillController::class);
                Route::post('bill/template/setting', [BillController::class, 'saveBillTemplateSettings'])->name('bill.template.setting');
        
                Route::get('debit-note', [DebitNoteController::class, 'index'])->name('debit.note');
                Route::post('debit-note/get', [DebitNoteController::class, 'get'])->name('debit.note.get');
                Route::get('custom-debit-note', [DebitNoteController::class, 'customCreate'])->name('bill.custom.debit.note');
                Route::post('custom-debit-note', [DebitNoteController::class, 'customStore'])->name('bill.custom.debit.note.store');
                Route::get('debit-note/bill', [DebitNoteController::class, 'getbill'])->name('bill.get.debit.note');
        
                Route::get('payment/export', [PaymentController::class, 'export'])->name('payment.export');
                Route::get('payment/import', [PaymentController::class, 'import'])->name('payment.import');
                Route::post('payment/import/heading', [PaymentController::class, 'getImportHeadings'])->name('payment.import.headings');
                Route::put('payment/import/store', [PaymentController::class, 'storeImport'])->name('payment.import.store');
                Route::post('payment/get', [PaymentController::class, 'get'])->name('payment.get');
                Route::resource('payment', PaymentController::class);
        
                Route::resource('expenses', ExpenseController::class);
        
                // Plan & order
        
                Route::get('plans/expired', [PlanController::class, 'expired'])->name('plan.expired');
                Route::resource('plans', PlanController::class);
        
                Route::get('/orders', [MidtransPaymentController::class, 'index'])->name('order.index');
                Route::get('/purchase/{code}', [MidtransPaymentController::class, 'showOrder'])->name('purchase');
                Route::post('/midtrans', [MidtransPaymentController::class, 'payPlan'])->name('order.pay');
        
                Route::resource('coupons', CouponController::class);
        
                // Report
        
                Route::prefix('report')->as('report.')->group(
                    function() {
                        Route::get('income-summary', [ReportController::class, 'incomeSummary'])->name('income.summary');
                        Route::get('expense-summary', [ReportController::class, 'expenseSummary'])->name('expense.summary');
                        Route::get('income-vs-expense-summary', [ReportController::class, 'incomeVsExpenseSummary'])->name('income.vs.expense.summary');
                        Route::get('tax-summary', [ReportController::class, 'taxSummary'])->name('tax.summary');
                        Route::get('profit-loss-summary', [ReportController::class, 'profitLossSummary'])->name('profit.loss.summary');
        
                        Route::get('invoice-summary', [ReportController::class, 'invoiceSummary'])->name('invoice.summary');
                        Route::get('bill-summary', [ReportController::class, 'billSummary'])->name('bill.summary');
        
                        Route::get('invoice-report', [ReportController::class, 'invoiceReport'])->name('invoice');
                        Route::get('account-statement-report', [ReportController::class, 'accountStatement'])->name('account.statement');
                        Route::get('export/{name}', [ReportController::class, 'export'])->name('export');
                    }
                );
                Route::get('journal', [JournalController::class, 'index'])->name('journal.index');
                Route::get('ledger', [LedgerController::class, 'index'])->name('ledger.index');
                Route::get('balance-sheet/index', [BalanceSheetController::class, 'index'])->name('balance-sheet.index');
        
                // Proposal
        
                Route::prefix('proposal')->as('proposal.')->group(
                    function() {
                        Route::get('{id}/status/change', [ProposalController::class, 'statusChange'])->name('status.change');
                        Route::get('{id}/convert', [ProposalController::class, 'convert'])->name('convert');
                        Route::get('{id}/duplicate', [ProposalController::class, 'duplicate'])->name('duplicate');
                        Route::post('product/destroy', [ProposalController::class, 'productDestroy'])->name('product.destroy');
                        Route::post('customer', [ProposalController::class, 'customer'])->name('customer');
                        Route::post('product', [ProposalController::class, 'product'])->name('product');
                        Route::get('{id}/sent', [ProposalController::class, 'sent'])->name('sent');
                    }
                );
        
                Route::resource('proposal', ProposalController::class);
        
                Route::resource('goal', GoalController::class);
        
                Route::resource('account-assets', AssetController::class);
                Route::resource('account-equities', EquityController::class);
                Route::resource('account-liabilities', LiabilityController::class);
                Route::resource('custom-field', CustomFieldController::class);
                Route::get('syncAllData', [UserController::class, 'syncData'])->name('syncData');
                
                Route::get('/dialog-empty-input', [DialogController::class, 'EmptyInput']);
                Route::get('/dialog-status-update', [DialogController::class, 'StatusUpdate']);
                Route::get('/dialog-confirm-delete', [DialogController::class, 'ConfirmDelete']);
        
                Route::prefix('samples')->as('samples.')->group(
                    function() {
                        Route::get('import/{name}', [ImportSampleController::class, 'get'])->name('import');
                    }
                );
            }
        );
        
        Route::group(
            [
                'middleware' => [
                    'xss'
                ]
            ], function () {
                Route::get('invoice/thermal/{id}', [InvoiceController::class, 'thermal'])->name('invoice.thermal');
                Route::get('invoice/pdf/{id}', [InvoiceController::class, 'invoice'])->name('invoice.pdf');
                Route::get('bill/thermal/{id}', [BillController::class, 'thermal'])->name('bill.thermal');
                Route::get('bill/pdf/{id}', [BillController::class, 'bill'])->name('bill.pdf');
                Route::get('proposal/pdf/{id}', [ProposalController::class, 'proposal'])->name('proposal.pdf');
                
                Route::get('agreement/{type}', [UserAgreementController::class, 'show'])->name('agreement.show');
            }
        );
        
        Route::get('/', function () { return redirect()->route('user.login');} );
        
        Auth::routes(['verify' => true]);
        
        Route::get('/register/{lang?}', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
        Route::post('register', [RegisterController::class, 'register'])->name('user.register');
        Route::get('/login/{lang?}', [LoginController::class, 'showLoginForm'])->name('user.login');
        
        Route::get('/plan/listAsync', [PlanController::class, 'getPlanAsync'])->name('plans.list');
        
        Route::get('/password/reset/{lang?}', [LoginController::class, 'showLinkRequestForm'])->name('change.langPass');
        Route::put('change-password', [UserController::class, 'updatePassword'])->name('update.password');
        
        Route::post('error/frontend', [FrontEndErrorController::class, 'storeError']);
        
        Route::get('/invoices/preview/{template}/{color}', [InvoiceController::class, 'previewInvoice'])->name('invoice.preview');                        
        
        Route::get('/bill/preview/{template}/{color}', [BillController::class, 'previewBill'])->name('bill.preview');

        
        Route::post('/midtrans/callback', [MidtransPaymentController::class, 'handlePaymentNotification']);
        
        Route::get('/proposal/preview/{template}/{color}', [ProposalController::class, 'previewProposal'])->name('proposal.preview');
        Route::post('/proposal/template/setting', [ProposalController::class, 'saveProposalTemplateSettings'])->name('proposal.template.setting');
        
        // Route::group(
        //     [
        //         'middleware' => [
        //             'auth',
        //             'xss',
        //         ],
        //     ], function (){
        
        //     Route::resource('income-summary', IncomeSummaryController::class);
        
        // }
        // );
    }
);