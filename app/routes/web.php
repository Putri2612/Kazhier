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

use App\Http\Controllers\AssetController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BalanceSheetController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CreditNoteController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomFieldController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebitNoteController;
use App\Http\Controllers\DialogController;
use App\Http\Controllers\EquityController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\InvoiceController;
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
use App\Http\Controllers\ProductServiceUnitController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/password/reset/{lang?}', [LoginController::class, 'showLinkRequestForm'])->name('change.langPass');

Auth::routes();

Route::get('/register/{lang?}', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::get('/login/{lang?}', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/plan/listAsync', [PlanController::class, 'getPlanAsync']);

Route::get('/dialog-empty-input', [DialogController::class, 'EmptyInput']);


Route::prefix('customer')->as('customer.')->group(
    function (){
        Route::get('login/{lang}', [LoginController::class, 'showCustomerLoginLang'])->name('login.lang')->middleware(['xss']);
        Route::get('login', [LoginController::class, 'showCustomerLoginForm'])->name('login')->middleware(['xss']);
        Route::post('login', [LoginController::class, 'customerLogin'])->name('login')->middleware(['xss']);
        Route::get('dashboard', [CustomerController::class, 'dashboard'])->name('dashboard')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );

        Route::get('invoice', [InvoiceController::class, 'customerInvoice'])->name('invoice')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::get('proposal', [ProposalController::class, 'customerProposal'])->name('proposal')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );

        Route::get('proposal/{id}/show', [ProposalController::class, 'customerProposalShow'])->name('proposal.show')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );

        Route::get('invoice/{id}/send', [InvoiceController::class, 'customerInvoiceSend'])->name('invoice.send')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::post('invoice/{id}/send/mail', [InvoiceController::class, 'customerInvoiceSendMail'])->name('invoice.send.mail')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );

        Route::get('invoice/{id}/show', [InvoiceController::class, 'customerInvoiceShow'])->name('invoice.show')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::get('payment', [CustomerController::class, 'payment'])->name('payment')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::get('transaction', [CustomerController::class, 'transaction'])->name('transaction')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::post('logout', [CustomerController::class, 'customerLogout'])->name('logout')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::get('profile', [CustomerController::class, 'profile'])->name('profile')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );

        Route::put('update-profile', [CustomerController::class, 'editprofile'])->name('update.profile')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::put('billing-info', [CustomerController::class, 'editBilling'])->name('update.billing.info')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::put('shipping-info', [CustomerController::class, 'editShipping'])->name('update.shipping.info')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::put('change.password', [CustomerController::class, 'updatePassword'])->name('update.password')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::get('change-language/{lang}', [CustomerController::class, 'changeLanquage'])->name('change.language')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
    }
);

Route::prefix('vender')->as('vender.')->group(
    function (){
        Route::get('login/{lang}', [LoginController::class, 'showVenderLoginLang'])->name('login.lang')->middleware(['xss']);
        Route::get('login', [LoginController::class, 'showVenderLoginForm'])->name('login')->middleware(['xss']);
        Route::post('login', [LoginController::class, 'VenderLogin'])->name('login')->middleware(['xss']);
        Route::get('dashboard', [VenderController::class, 'dashboard'])->name('dashboard')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::get('bill', [BillController::class, 'VenderBill'])->name('bill')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::get('bill/{id}/show', [BillController::class, 'venderBillShow'])->name('bill.show')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );


        Route::get('bill/{id}/send', [BillController::class, 'venderBillSend'])->name('bill.send')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::post('bill/{id}/send/mail', [BillController::class, 'venderBillSendMail'])->name('bill.send.mail')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );


        Route::get('payment', [VenderController::class, 'payment'])->name('payment')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::get('transaction', [VenderController::class, 'transaction'])->name('transaction')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::post('logout', [VenderController::class, 'venderLogout'])->name('logout')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );

        Route::get('profile', [VenderController::class, 'profile'])->name('profile')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );

        Route::put('update-profile', [VenderController::class, 'editprofile'])->name('update.profile')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::put('billing-info', [VenderController::class, 'editBilling'])->name('update.billing.info')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::put('shipping-info', [VenderController::class, 'editShipping'])->name('update.shipping.info')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::put('change.password', [VenderController::class, 'updatePassword'])->name('update.password')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::get('change-language/{lang}', [VenderController::class, 'changeLanquage'])->name('change.language')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );

    }
);


Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::get('user/{id}/plan', [UserController::class, 'upgradePlan'])->name('plan.upgrade')->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::get('user/{id}/plan/{pid}', [UserController::class, 'activePlan'])->name('plan.active')->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::get('profile', [UserController::class, 'profile'])->name('profile')->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::put('edit-profile', [UserController::class, 'editprofile'])->name('update.account')->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::resource('users', UserController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::put('change-password', [UserController::class, 'updatePassword'])->name('update.password');


Route::resource('roles', RoleController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::resource('permissions', PermissionController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){
    Route::get('change-language/{lang}', [LanguageController::class, 'changeLanquage'])->name('change.language');
    Route::get('manage-language/{lang}', [LanguageController::class, 'manageLanguage'])->name('manage.language');
    Route::post('store-language-data/{lang}', [LanguageController::class, 'storeLanguageData'])->name('store.language.data');
    Route::get('create-language', [LanguageController::class, 'createLanguage'])->name('create.language');
    Route::post('store-language', [LanguageController::class, 'storeLanguage'])->name('store.language');
}
);

Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::resource('systems', SystemController::class);
    Route::post('email-settings', [SystemController::class, 'saveEmailSettings'])->name('email.settings');
    Route::post('company-settings', [SystemController::class, 'saveCompanySettings'])->name('company.settings');
    Route::post('stripe-settings', [SystemController::class, 'saveStripeSettings'])->name('stripe.settings');
    Route::post('midtrans-settings', [SystemController::class, 'saveMidtransSettings'])->name('midtrans.settings');
    Route::post('system-settings', [SystemController::class, 'saveSystemSettings'])->name('system.settings');
    Route::get('company-setting', [SystemController::class, 'companyIndex'])->name('company.setting');
    Route::post('business-setting', [SystemController::class, 'saveBusinessSettings'])->name('business.setting');
}
);


Route::get('productservice/index', [ProductServiceController::class, 'index'])->name('productservice.index');
Route::resource('productservice', ProductServiceController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);


Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::get('customer/{id}/show', [CustomerController::class, 'show'])->name('customer.show');
    Route::resource('customer', CustomerController::class);

}
);
Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::get('vender/{id}/show', [VenderController::class, 'show'])->name('vender.show');
    Route::resource('vender', VenderController::class);

}
);

Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::resource('bank-account', BankAccountController::class);

}
);
Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::get('transfer/index', [TransferController::class, 'index'])->name('transfer.index');
    Route::resource('transfer', TransferController::class);

}
);
Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::get('transaction/index', [TransactionController::class, 'index'])->name('transaction.index');
    Route::resource('transaction', TransactionController::class);

}
);


Route::resource('taxes', TaxController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::resource('product-category', ProductServiceCategoryController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::resource('product-unit', ProductServiceUnitController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::resource('payment-method', PaymentMethodController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::get('invoice/pdf/{id}', [InvoiceController::class, 'invoice'])->name('invoice.pdf')->middleware(
    [
        'xss',
    ]
);
Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){


    Route::get('invoice/{id}/duplicate', [InvoiceController::class, 'duplicate'])->name('invoice.duplicate');
    Route::get('invoice/{id}/shipping/print', [InvoiceController::class, 'shippingDisplay'])->name('invoice.shipping.print');
    Route::get('invoice/{id}/payment/reminder', [InvoiceController::class, 'paymentReminder'])->name('invoice.payment.reminder');
    Route::get('invoice/index', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::post('invoice/product/destroy', [InvoiceController::class, 'productDestroy'])->name('invoice.product.destroy');
    Route::post('invoice/product', [InvoiceController::class, 'product'])->name('invoice.product');
    Route::post('invoice/customer', [InvoiceController::class, 'customer'])->name('invoice.customer');
    Route::get('invoice/{id}/sent', [InvoiceController::class, 'sent'])->name('invoice.sent');
    Route::get('invoice/{id}/payment', [InvoiceController::class, 'payment'])->name('invoice.payment');
    Route::post('invoice/{id}/payment', [InvoiceController::class, 'createPayment'])->name('invoice.payment');
    Route::post('invoice/{id}/payment/{pid}/destroy', [InvoiceController::class, 'paymentDestroy'])->name('invoice.payment.destroy');
    Route::resource('invoice', InvoiceController::class);

}
);

Route::get(
    '/invoices/preview/{template}/{color}', [
                                              'as' => 'invoice.preview',
                                              'uses' => [InvoiceController::class, 'previewInvoice'],
                                          ]
);
Route::post(
    '/invoices/template/setting', [
                                    'as' => 'template.setting',
                                    'uses' => [InvoiceController::class, 'saveTemplateSettings'],
                                ]
);

Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){


    Route::get('credit-note', [CreditNoteController::class, 'index'])->name('credit.note');
    Route::get('custom-credit-note', [CreditNoteController::class, 'customCreate'])->name('invoice.custom.credit.note');
    Route::post('custom-credit-note', [CreditNoteController::class, 'customStore'])->name('invoice.custom.credit.note');
    Route::get('credit-note/invoice', [CreditNoteController::class, 'getinvoice'])->name('invoice.get');
    Route::get('invoice/{id}/credit-note', [CreditNoteController::class, 'create'])->name('invoice.credit.note');
    Route::post('invoice/{id}/credit-note', [CreditNoteController::class, 'store'])->name('invoice.credit.note');
    Route::get('invoice/{id}/credit-note/edit/{cn_id}', [CreditNoteController::class, 'edit'])->name('invoice.edit.credit.note');
    Route::put('invoice/{id}/credit-note/edit/{cn_id}', [CreditNoteController::class, 'update'])->name('invoice.edit.credit.note');
    Route::delete('invoice/{id}/credit-note/delete/{cn_id}', [CreditNoteController::class, 'destroy'])->name('invoice.delete.credit.note');

}
);

Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){


    Route::get('debit-note', [DebitNoteController::class, 'index'])->name('debit.note');
    Route::get('custom-debit-note', [DebitNoteController::class, 'customCreate'])->name('bill.custom.debit.note');
    Route::post('custom-debit-note', [DebitNoteController::class, 'customStore'])->name('bill.custom.debit.note');
    Route::get('debit-note/bill', [DebitNoteController::class, 'getbill'])->name('bill.get');
    Route::get('bill/{id}/debit-note', [DebitNoteController::class, 'create'])->name('bill.debit.note');
    Route::post('bill/{id}/debit-note', [DebitNoteController::class, 'store'])->name('bill.debit.note');
    Route::get('bill/{id}/debit-note/edit/{cn_id}', [DebitNoteController::class, 'edit'])->name('bill.edit.debit.note');
    Route::put('bill/{id}/debit-note/edit/{cn_id}', [DebitNoteController::class, 'update'])->name('bill.edit.debit.note');
    Route::delete('bill/{id}/debit-note/delete/{cn_id}', [DebitNoteController::class, 'destroy'])->name('bill.delete.debit.note');

}
);


Route::get(
    '/bill/preview/{template}/{color}', [
                                          'as' => 'bill.preview',
                                          'uses' => [BillController::class, 'previewBill'],
                                      ]
);
Route::post(
    '/bill/template/setting', [
                                'as' => 'bill.template.setting',
                                'uses' => [BillController::class, 'saveBillTemplateSettings'],
                            ]
);

Route::resource('taxes', TaxController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::get('revenue/index', [RevenueController::class, 'index'])->name('revenue.index')->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::resource('revenue', RevenueController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::get('bill/pdf/{id}', [BillController::class, 'bill'])->name('bill.pdf')->middleware(
    [
        'xss',
    ]
);
Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::get('bill/{id}/duplicate', [BillController::class, 'duplicate'])->name('bill.duplicate');
    Route::get('bill/{id}/shipping/print', [BillController::class, 'shippingDisplay'])->name('bill.shipping.print');
    Route::get('bill/index', [BillController::class, 'index'])->name('bill.index');
    Route::post('bill/product/destroy', [BillController::class, 'productDestroy'])->name('bill.product.destroy');
    Route::post('bill/product', [BillController::class, 'product'])->name('bill.product');
    Route::post('bill/vender', [BillController::class, 'vender'])->name('bill.vender');
    Route::get('bill/{id}/sent', [BillController::class, 'sent'])->name('bill.sent');
    Route::get('bill/{id}/payment', [BillController::class, 'payment'])->name('bill.payment');
    Route::post('bill/{id}/payment', [BillController::class, 'createPayment'])->name('bill.payment');
    Route::post('bill/{id}/payment/{pid}/destroy', [BillController::class, 'paymentDestroy'])->name('bill.payment.destroy');

    Route::resource('bill', BillController::class);

}
);


Route::get('payment/index', [PaymentController::class, 'index'])->name('payment.index')->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::resource('payment', PaymentController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);

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

Route::resource('plans', PlanController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);


Route::resource('expenses', ExpenseController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);


Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::get('/orders', [MidtransPaymentController::class, 'index'])->name('order.index');
    Route::get('/purchase/{code}', [MidtransPaymentController::class, 'showOrder'])->name('purchase');
    Route::post('/midtrans', [MidtransPaymentController::class, 'payPlan'])->name('order.pay');
    

    Route::get('/stripe/{code}', [StripePaymentController::class, 'stripe'])->name('stripe');
    Route::post('/stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

}
);

Route::post('/midtrans/callback', [MidtransPaymentController::class, 'handlePaymentNotification']);

Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::get('report/income-summary', [ReportController::class, 'incomeSummary'])->name('report.income.summary');
    Route::get('report/expense-summary', [ReportController::class, 'expenseSummary'])->name('report.expense.summary');
    Route::get('report/income-vs-expense-summary', [ReportController::class, 'incomeVsExpenseSummary'])->name('report.income.vs.expense.summary');
    Route::get('report/tax-summary', [ReportController::class, 'taxSummary'])->name('report.tax.summary');
    Route::get('report/profit-loss-summary', [ReportController::class, 'profitLossSummary'])->name('report.profit.loss.summary');

    Route::get('report/invoice-summary', [ReportController::class, 'invoiceSummary'])->name('report.invoice.summary');
    Route::get('report/bill-summary', [ReportController::class, 'billSummary'])->name('report.bill.summary');

    Route::get('report/invoice-report', [ReportController::class, 'invoiceReport'])->name('report.invoice');
    Route::get('report/account-statement-report', [ReportController::class, 'accountStatement'])->name('report.account.statement');
}
);

Route::resource('coupons', CouponController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::get('proposal/pdf/{id}', [ProposalController::class, 'proposal'])->name('proposal.pdf')->middleware(
    [
        'xss',
    ]
);
Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::get('proposal/{id}/status/change', [ProposalController::class, 'statusChange'])->name('proposal.status.change');
    Route::get('proposal/{id}/convert', [ProposalController::class, 'convert'])->name('proposal.convert');
    Route::get('proposal/{id}/duplicate', [ProposalController::class, 'duplicate'])->name('proposal.duplicate');
    Route::post('proposal/product/destroy', [ProposalController::class, 'productDestroy'])->name('proposal.product.destroy');
    Route::post('proposal/customer', [ProposalController::class, 'customer'])->name('proposal.customer');
    Route::post('proposal/product', [ProposalController::class, 'product'])->name('proposal.product');
    Route::get('proposal/{id}/sent', [ProposalController::class, 'sent'])->name('proposal.sent');
    Route::resource('proposal', ProposalController::class);

}
);

Route::get(
    '/proposal/preview/{template}/{color}', [
                                              'as' => 'proposal.preview',
                                              'uses' => [ProposalController::class, 'previewProposal'],
                                          ]
);
Route::post(
    '/proposal/template/setting', [
                                    'as' => 'proposal.template.setting',
                                    'uses' => [ProposalController::class, 'saveProposalTemplateSettings'],
                                ]
);

Route::resource('goal', GoalController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::resource('account-assets', AssetController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::resource('account-equities', EquityController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::resource('account-liabilities', LiabilityController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::resource('custom-field', CustomFieldController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::get('syncAllData', [UserController::class, 'syncData'])->name('syncData')->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::get('journal/index', [JournalController::class, 'index'])->name('journal.index')->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::resource('journal', JournalController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::get('ledger/index', [LedgerController::class, 'index'])->name('ledger.index')->middleware(
    [
        'auth',
        'xss',
    ]
);


Route::resource('ledger', LedgerController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::get('balance-sheet/index', [BalanceSheetController::class, 'index'])->name('balance-sheet.index')->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::resource('balance-sheet', BalanceSheetController::class)->middleware(
    [
        'auth',
        'xss',
    ]
);