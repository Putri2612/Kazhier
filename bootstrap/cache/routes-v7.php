<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/authorize' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.authorize',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.approve',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.deny',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/token' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/token/refresh' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token.refresh',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/clients' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/scopes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.scopes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/personal-access-tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.login',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/company' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.company.get',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/company/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.company.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/role-and-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.role-and-permission',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/bank-account' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.bank-account.get',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/bank-account/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.bank-account.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/category/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.category.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.customer.get',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.customer.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer-category/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.customer-category.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/expense' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.expense.get',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/expense/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.expense.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.order.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/order/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.order.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/product-service/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.product-service.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/unit/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.unit.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/tax/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.tax.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/supplier/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.supplier.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/payment-method/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.payment-method.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/report/income' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.report.income',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/report/expense' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.report.expense',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/auth/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.auth.login',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/auth/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.auth.register',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/auth/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.auth.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/asset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.asset.get',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/asset/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.asset.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/bank-account' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.bank-account.get',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/bank-account/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.bank-account.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/report/balance-sheet' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.report.balance-sheet',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZkoWPrHgeCOe1J26',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/github/webhook' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::46jbVxyVU46Q8kQU',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/test' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7UY1USP52KSMGMHz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer/invoice' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.invoice',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer/proposal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.proposal',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer/payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.payment',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer/transaction' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.transaction',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer/update-profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.update.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer/billing-info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.update.billing.info',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer/shipping-info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.update.shipping.info',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer/change.password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.update.password',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/vender/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/vender/bill' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.bill',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/vender/payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.payment',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/vender/transaction' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.transaction',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/vender/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/vender/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/vender/update-profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.update.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/vender/billing-info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.update.billing.info',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/vender/shipping-info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.update.shipping.info',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/vender/change.password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.update.password',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/edit-profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update.account',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'users.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/redeem-referral' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'referral.redeem',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/redeem-referral/withdraw' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'referral.withdraw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/redeem-referral/withdraw/request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'referral.withdraw.request',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/redeem-referral/withdraw/history' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'referral.history',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/roles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'roles.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'roles.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/roles/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'roles.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/permissions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/permissions/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/create-language' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create.language',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/store-language' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'store.language',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/systems' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'systems.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'systems.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/systems/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'systems.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/referral-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'referral.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/asset-version-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'asset-version.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/email-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/company-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/stripe-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'stripe.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/midtrans-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'midtrans.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/system-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'system.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/company-setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company.setting',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/business-setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'business.setting',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/productservice/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'productservice.get',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/productservice/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'productservice.export',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/productservice/import' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'productservice.import',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'productservice.import.store',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/productservice/import/header' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'productservice.import.headings',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/productservice' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'productservice.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'productservice.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/productservice/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'productservice.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/product-stock' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product-stock.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/product-stock/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product-stock.get',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.get',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'customer.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer-category/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer-category.get',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer-category.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'customer-category.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/customer-category/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer-category.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/vender/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.get',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/vender' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'vender.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/vender/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/bank-account' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bank-account.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'bank-account.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/bank-account/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bank-account.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/transfer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transfer.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'transfer.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/transfer/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transfer.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/transaction' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transaction.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/transaction/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transaction.get',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/defaults' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'defaults.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'defaults.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/defaults/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'defaults.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/initial-setup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'initial-setup.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/initial-setup/revenue' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'initial-setup.revenue',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/initial-setup/expense' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'initial-setup.expense',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/initial-setup/product-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'initial-setup.product-category',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/initial-setup/unit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'initial-setup.unit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/initial-setup/tax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'initial-setup.tax',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/initial-setup/payment-method' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'initial-setup.method',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/initial-setup/complete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'initial-setup.complete',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/initial-setup/skip' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'initial-setup.skip',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/taxes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'taxes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'taxes.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/taxes/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'taxes.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/product-category/suggestion' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product-category.suggestion',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/product-unit/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product-unit.get',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/product-unit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product-unit.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'product-unit.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/product-unit/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product-unit.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/payment-method/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment-method.get',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/payment-method' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment-method.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'payment-method.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/payment-method/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment-method.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/order/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'order.create.ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/invoice/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.get',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/invoice/customer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.customer',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/invoice/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.export',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/invoice/import' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.import',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/invoice/import/headings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.import.headings',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/invoice/import/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.import.store',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/invoice/product/destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.product.destroy',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/invoice/product/SKU' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.product.sku',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/invoice/product' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.product',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/invoice' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/invoice/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/invoices/template/setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'template.setting',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/credit-note' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'credit.note',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/credit-note/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'credit.note.get',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/custom-credit-note' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.custom.credit.note',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.custom.credit.note.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/credit-note/invoice' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get.invoice.credit.note',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/revenue/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'revenue.export',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/revenue/import' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'revenue.import',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/revenue/import/heading' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'revenue.import.headings',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/revenue/import/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'revenue.import.store',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/revenue/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'revenue.get',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/revenue' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'revenue.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'revenue.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/revenue/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'revenue.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/bill/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.get',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/bill/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.export',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/bill/import' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.import',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/bill/import/headings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.import.headings',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/bill/import/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.import.store',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/bill/product/destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.product.destroy',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/bill/product' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.product',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/bill/vender' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.vender',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/bill' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'bill.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/bill/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/bill/template/setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.template.setting',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/debit-note' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debit.note',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/debit-note/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debit.note.get',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/custom-debit-note' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.custom.debit.note',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'bill.custom.debit.note.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/debit-note/bill' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.get.debit.note',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/payment/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.export',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/payment/import' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.import',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/payment/import/heading' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.import.headings',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/payment/import/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.import.store',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/payment/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.get',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'payment.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/payment/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/expenses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'expenses.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'expenses.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/expenses/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'expenses.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/plans/expired' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'plan.expired',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/plans' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'plans.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'plans.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/plans/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'plans.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/orders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'order.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/midtrans' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'order.pay',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/coupons' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'coupons.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'coupons.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/coupons/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'coupons.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/report/income-summary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.income.summary',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/report/expense-summary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.expense.summary',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/report/income-vs-expense-summary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.income.vs.expense.summary',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/report/tax-summary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.tax.summary',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/report/profit-loss-summary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.profit.loss.summary',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/report/invoice-summary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.invoice.summary',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/report/bill-summary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.bill.summary',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/report/invoice-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.invoice',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/report/account-statement-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.account.statement',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/journal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'journal.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/ledger' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ledger.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/balance-sheet/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'balance-sheet.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/proposal/product/destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.product.destroy',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/proposal/customer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.customer',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/proposal/product' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.product',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/proposal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/proposal/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/goal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'goal.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'goal.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/goal/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'goal.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/account-assets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account-assets.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'account-assets.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/account-assets/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account-assets.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/account-equities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account-equities.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'account-equities.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/account-equities/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account-equities.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/account-liabilities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account-liabilities.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'account-liabilities.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/account-liabilities/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account-liabilities.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/custom-field' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'custom-field.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'custom-field.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/custom-field/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'custom-field.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/syncAllData' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'syncData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/dialog-empty-input' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NN8QWvQ9bJ85JX0j',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/dialog-status-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::O2CxH7GROwlmM1bu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/dialog-confirm-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6GMjlne6yr2xG2di',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1Un2bLoyDRsgFaab',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XFjhsvaF8RfGKFrk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.register',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/password/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/email/verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.notice',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/email/resend' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.resend',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/plan/listAsync' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'plans.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/change-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update.password',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/error/frontend' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KQmaVb57JMQl6qM0',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/midtrans/callback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8CWjDTocsFhksSGM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/app/proposal/template/setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.template.setting',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/oauth/(?|tokens/([^/]++)(*:32)|clients/([^/]++)(?|(*:58))|personal\\-access\\-tokens/([^/]++)(*:99))|/ap(?|i/(?|bank\\-account/([^/]++)/(?|edit(*:148)|delete(*:162))|c(?|ategory/([^/]++)(?|(*:194)|/(?|edit(*:210)|delete(*:224)))|ustomer(?|/(?|name/([^/]++)(*:261)|([^/]++)/(?|edit(*:285)|delete(*:299)))|\\-category/([^/]++)(?|(*:331)|/(?|edit(*:347)|delete(*:361)))))|expense/([^/]++)/(?|edit(*:397)|delete(*:411))|order/([^/]++)/(?|edit(*:442)|de(?|lete(*:459)|tail(*:471)))|p(?|roduct\\-service/([^/]++)(?|(*:512)|/(?|edit(*:528)|delete(*:542)))|ayment\\-method/([^/]++)(?|/(?|edit(*:586)|delete(*:600))|(*:609)))|unit/([^/]++)(?|(*:635)|/(?|edit(*:651)|delete(*:665)))|tax/([^/]++)(?|(*:690)|/(?|edit(*:706)|delete(*:720)))|supplier/([^/]++)(?|(*:750)|/delete(*:765))|v2/(?|format/([^/]++)(*:795)|asset/([^/]++)/(?|update(*:827)|delete(*:841))|bank\\-account/([^/]++)/(?|update(*:882)|delete(*:896))|category/([^/]++)(?|(*:925)|/(?|create(*:943)|([^/]++)/(?|update(*:969)|delete(*:983))))))|p/(?|c(?|ustomer(?|/(?|login(?|(?:/([^/]++))?(*:1041)|(*:1050))|proposal/([^/]++)/show(*:1082)|invoice/([^/]++)/s(?|end(?|(*:1118)|/mail(*:1132))|how(*:1145))|change\\-language/([^/]++)(*:1180)|ajax/([^/]++)(*:1202)|([^/]++)(?|(*:1222)|/edit(*:1236)|(*:1245)))|\\-category/(?|ajax/([^/]++)(*:1283)|([^/]++)(?|(*:1303)|/edit(*:1317)|(*:1326))))|hange\\-language/([^/]++)(*:1362))|vender/(?|login(?|(?:/([^/]++))?(*:1404)|(*:1413))|bill/([^/]++)/s(?|how(*:1444)|end(?|(*:1459)|/mail(*:1473)))|change\\-language/([^/]++)(*:1509)|([^/]++)(?|(*:1529)|/edit(*:1543)|(*:1552)))|agreement/([^/]++)/(?|edit(*:1589)|update(*:1604))|d(?|ashboard/charts/(?|cash\\-flow/([^/]++)/([^/]++)(*:1665)|income\\-expense/([^/]++)(*:1698)|doughnut/([^/]++)/([^/]++)/([^/]++)(*:1742))|efaults/([^/]++)(?|(*:1771)|/edit(*:1785)|(*:1794)))|user(?|/([^/]++)/plan(?|(*:1829)|/([^/]++)(*:1847))|s/(?|([^/]++)(?|/edit(*:1878)|(*:1887))|search/([^/]++)(?|/([^/]++)(*:1924)|(*:1933))|([^/]++)(?|(*:1954)|/activity(*:1972))))|r(?|edeem\\-referral/(?|plan/(?|([^/]++)(*:2023)|checkout(*:2040))|withdraw/([^/]++)/(?|process(*:2078)|cancel(*:2093)))|oles/([^/]++)(?|(*:2120)|/edit(*:2134)|(*:2143)))|p(?|ermissions/([^/]++)(?|(*:2180)|/edit(*:2194)|(*:2203))|roduct(?|service/([^/]++)(?|(*:2241)|/edit(*:2255)|(*:2264))|\\-stock/([^/]++)(?|/(?|stock(*:2302)|history(*:2318)|([^/]++)(*:2335))|(*:2345))))|manage\\-language/([^/]++)(*:2382)|s(?|tore\\-language\\-data/([^/]++)(*:2424)|ystems/([^/]++)(?|(*:2451)|/edit(*:2465)|(*:2474)))|bank\\-account/([^/]++)(?|(*:2510)|/edit(*:2524)|(*:2533))|t(?|ransfer/([^/]++)(?|(*:2566)|/edit(*:2580)|(*:2589))|axes/([^/]++)(?|(*:2615)|/edit(*:2629)|(*:2638)))|([^/]++)/category(?|/(?|get(*:2676)|create(*:2691)|([^/]++)(?|(*:2711)|/edit(*:2725)|(*:2734)))|(*:2745))|p(?|ro(?|duct\\-unit/([^/]++)(?|(*:2786)|/edit(*:2800)|(*:2809))|posal/(?|([^/]++)(?|/(?|s(?|tatus/change(*:2859)|ent(*:2871))|convert(*:2888)|duplicate(*:2906)|edit(*:2919))|(*:2929))|p(?|df/([^/]++)(*:2954)|review/([^/]++)/([^/]++)(*:2987))))|a(?|yment(?|\\-method/([^/]++)(?|(*:3031)|/edit(*:3045)|(*:3054))|/([^/]++)(?|(*:3076)|/edit(*:3090)|(*:3099)))|ssword/reset(?|/([^/]++)(*:3134)|(?:/([^/]++))?(*:3157)))|lans/([^/]++)(?|(*:3184)|/edit(*:3198)|(*:3207))|urchase/([^/]++)(*:3233))|invoice(?|/(?|([^/]++)(?|/(?|credit\\-note(?|(*:3287)|/(?|edit/([^/]++)(?|(*:3316))|delete/([^/]++)(*:3341)))|d(?|uplicate(*:3364)|eliver(?|ing(*:3385)|ed(*:3396)))|s(?|hipping/print(*:3424)|ent(*:3436))|p(?|ayment(?|(*:3459)|/(?|([^/]++)/destroy(*:3488)|reminder(*:3505)))|icked\\-up(*:3525)|repared(*:3541))|edit(*:3555))|(*:3565))|thermal/([^/]++)(*:3591)|pdf/([^/]++)(*:3612))|s/preview/([^/]++)/([^/]++)(*:3649))|re(?|venue/([^/]++)(?|(*:3681)|/edit(*:3695)|(*:3704))|port/export/([^/]++)(*:3734)|gister(?:/([^/]++))?(*:3763))|bill/(?|([^/]++)(?|/(?|d(?|ebit\\-note(?|(*:3813)|/(?|edit/([^/]++)(?|(*:3842))|delete/([^/]++)(*:3867)))|uplicate(*:3886))|s(?|hipping/print(*:3913)|ent(*:3925))|payment(?|(*:3945)|/([^/]++)/destroy(*:3971))|edit(*:3985))|(*:3995))|thermal/([^/]++)(*:4021)|p(?|df/([^/]++)(*:4045)|review/([^/]++)/([^/]++)(*:4078)))|e(?|xpenses/([^/]++)(?|(*:4112)|/edit(*:4126)|(*:4135))|mail/verify/([^/]++)/([^/]++)(*:4174))|c(?|oupons/([^/]++)(?|(*:4206)|/edit(*:4220)|(*:4229))|ustom\\-field/([^/]++)(?|(*:4263)|/edit(*:4277)|(*:4286)))|goal/([^/]++)(?|(*:4313)|/edit(*:4327)|(*:4336))|a(?|ccount\\-(?|assets/([^/]++)(?|(*:4379)|/edit(*:4393)|(*:4402))|equities/([^/]++)(?|(*:4432)|/edit(*:4446)|(*:4455))|liabilities/([^/]++)(?|(*:4488)|/edit(*:4502)|(*:4511)))|greement/([^/]++)(*:4539))|samples/import/([^/]++)(*:4572)|login(?:/([^/]++))?(*:4600))))/?$}sDu',
    ),
    3 => 
    array (
      32 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      58 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.update',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.destroy',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      99 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      148 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.bank-account.edit',
          ),
          1 => 
          array (
            0 => 'account_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      162 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.bank-account.destroy',
          ),
          1 => 
          array (
            0 => 'account_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      194 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.category.get',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      210 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.category.edit',
          ),
          1 => 
          array (
            0 => 'category_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      224 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.category.destroy',
          ),
          1 => 
          array (
            0 => 'category_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      261 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.customer.name',
          ),
          1 => 
          array (
            0 => 'name',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      285 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.customer.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      299 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.customer.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      331 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.customer-category.get',
          ),
          1 => 
          array (
            0 => 'category_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      347 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.customer-category.edit',
          ),
          1 => 
          array (
            0 => 'category_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      361 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.customer-category.destroy',
          ),
          1 => 
          array (
            0 => 'category_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      397 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.expense.edit',
          ),
          1 => 
          array (
            0 => 'expense_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      411 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.expense.destroy',
          ),
          1 => 
          array (
            0 => 'expense_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      442 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.order.edit',
          ),
          1 => 
          array (
            0 => 'order_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      459 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.order.destroy',
          ),
          1 => 
          array (
            0 => 'order_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      471 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.order.detail',
          ),
          1 => 
          array (
            0 => 'order_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      512 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.product-service.get',
          ),
          1 => 
          array (
            0 => 'product_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      528 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.product-service.edit',
          ),
          1 => 
          array (
            0 => 'product_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      542 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.product-service.destroy',
          ),
          1 => 
          array (
            0 => 'product_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      586 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.payment-method.edit',
          ),
          1 => 
          array (
            0 => 'method_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      600 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.payment-method.destroy',
          ),
          1 => 
          array (
            0 => 'method_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      609 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.payment-method.get',
          ),
          1 => 
          array (
            0 => 'method_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      635 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.unit.get',
          ),
          1 => 
          array (
            0 => 'unit_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      651 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.unit.edit',
          ),
          1 => 
          array (
            0 => 'unit_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      665 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.unit.destroy',
          ),
          1 => 
          array (
            0 => 'unit_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      690 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.tax.get',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      706 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.tax.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      720 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.tax.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      750 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.supplier.get',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      765 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.supplier.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      795 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.format.get',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      827 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.asset.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      841 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.asset.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      882 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.bank-account.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      896 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.bank-account.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      925 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.category.get',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      943 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.category.create',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      969 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.category.update',
          ),
          1 => 
          array (
            0 => 'type',
            1 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      983 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.category.delete',
          ),
          1 => 
          array (
            0 => 'type',
            1 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1041 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.login.lang',
            'lang' => NULL,
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1050 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.login',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1082 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.proposal.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1118 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.invoice.send',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1132 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.invoice.send.mail',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1145 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.invoice.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1180 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.change.language',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1202 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.name.ajax',
          ),
          1 => 
          array (
            0 => 'name',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1222 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.show',
          ),
          1 => 
          array (
            0 => 'customer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1236 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.edit',
          ),
          1 => 
          array (
            0 => 'customer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1245 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.update',
          ),
          1 => 
          array (
            0 => 'customer',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'customer.destroy',
          ),
          1 => 
          array (
            0 => 'customer',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1283 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.category.ajax',
          ),
          1 => 
          array (
            0 => 'category_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1303 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer-category.show',
          ),
          1 => 
          array (
            0 => 'customer_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1317 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer-category.edit',
          ),
          1 => 
          array (
            0 => 'customer_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1326 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer-category.update',
          ),
          1 => 
          array (
            0 => 'customer_category',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'customer-category.destroy',
          ),
          1 => 
          array (
            0 => 'customer_category',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1362 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'change.language',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1404 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.login.lang',
            'lang' => NULL,
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1413 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.login',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1444 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.bill.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1459 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.bill.send',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1473 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.bill.send.mail',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1509 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.change.language',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1529 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.show',
          ),
          1 => 
          array (
            0 => 'vender',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1543 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.edit',
          ),
          1 => 
          array (
            0 => 'vender',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1552 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vender.update',
          ),
          1 => 
          array (
            0 => 'vender',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'vender.destroy',
          ),
          1 => 
          array (
            0 => 'vender',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1589 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agreement.edit',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1604 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agreement.update',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1665 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard-chart.cashflow',
          ),
          1 => 
          array (
            0 => 'month',
            1 => 'year',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1698 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard-chart.income-expense',
          ),
          1 => 
          array (
            0 => 'year',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1742 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard-chart.category',
          ),
          1 => 
          array (
            0 => 'type',
            1 => 'month',
            2 => 'year',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1771 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'defaults.show',
          ),
          1 => 
          array (
            0 => 'default',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1785 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'defaults.edit',
          ),
          1 => 
          array (
            0 => 'default',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1794 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'defaults.update',
          ),
          1 => 
          array (
            0 => 'default',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'defaults.destroy',
          ),
          1 => 
          array (
            0 => 'default',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1829 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'plan.upgrade',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1847 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'plan.active',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'pid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1878 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.edit',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1887 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'users.destroy',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1924 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.page-with-search',
          ),
          1 => 
          array (
            0 => 'query',
            1 => 'page',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1933 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.search',
          ),
          1 => 
          array (
            0 => 'query',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1954 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.page',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1972 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.activity',
          ),
          1 => 
          array (
            0 => 'userID',
          ),
          2 => 
          array (
            'GET' => 0,
            'PUT' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2023 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'referral.redeem.plan',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2040 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'referral.checkout.plan',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2078 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'referral.withdraw.process',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2093 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'referral.withdraw.cancel',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2120 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'roles.show',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2134 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'roles.edit',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2143 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'roles.update',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'roles.destroy',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2180 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.show',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2194 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.edit',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2203 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.update',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.destroy',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2241 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'productservice.show',
          ),
          1 => 
          array (
            0 => 'productservice',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2255 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'productservice.edit',
          ),
          1 => 
          array (
            0 => 'productservice',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2264 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'productservice.update',
          ),
          1 => 
          array (
            0 => 'productservice',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'productservice.destroy',
          ),
          1 => 
          array (
            0 => 'productservice',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2302 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product-stock.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2318 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product-stock.history',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2335 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product-stock.modify',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'operation',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2345 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product-stock.update',
          ),
          1 => 
          array (
            0 => 'operation',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2382 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manage.language',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2424 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'store.language.data',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2451 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'systems.show',
          ),
          1 => 
          array (
            0 => 'system',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2465 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'systems.edit',
          ),
          1 => 
          array (
            0 => 'system',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2474 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'systems.update',
          ),
          1 => 
          array (
            0 => 'system',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'systems.destroy',
          ),
          1 => 
          array (
            0 => 'system',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2510 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bank-account.show',
          ),
          1 => 
          array (
            0 => 'bank_account',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2524 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bank-account.edit',
          ),
          1 => 
          array (
            0 => 'bank_account',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2533 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bank-account.update',
          ),
          1 => 
          array (
            0 => 'bank_account',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'bank-account.destroy',
          ),
          1 => 
          array (
            0 => 'bank_account',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2566 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transfer.show',
          ),
          1 => 
          array (
            0 => 'transfer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2580 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transfer.edit',
          ),
          1 => 
          array (
            0 => 'transfer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2589 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transfer.update',
          ),
          1 => 
          array (
            0 => 'transfer',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'transfer.destroy',
          ),
          1 => 
          array (
            0 => 'transfer',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2615 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'taxes.show',
          ),
          1 => 
          array (
            0 => 'tax',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2629 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'taxes.edit',
          ),
          1 => 
          array (
            0 => 'tax',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2638 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'taxes.update',
          ),
          1 => 
          array (
            0 => 'tax',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'taxes.destroy',
          ),
          1 => 
          array (
            0 => 'tax',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2676 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.get',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2691 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.create',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2711 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.show',
          ),
          1 => 
          array (
            0 => 'type',
            1 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2725 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.edit',
          ),
          1 => 
          array (
            0 => 'type',
            1 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2734 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.update',
          ),
          1 => 
          array (
            0 => 'type',
            1 => 'category',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'category.destroy',
          ),
          1 => 
          array (
            0 => 'type',
            1 => 'category',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2745 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.index',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'category.store',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2786 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product-unit.show',
          ),
          1 => 
          array (
            0 => 'product_unit',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2800 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product-unit.edit',
          ),
          1 => 
          array (
            0 => 'product_unit',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2809 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product-unit.update',
          ),
          1 => 
          array (
            0 => 'product_unit',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'product-unit.destroy',
          ),
          1 => 
          array (
            0 => 'product_unit',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2859 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.status.change',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2871 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.sent',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2888 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.convert',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2906 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.duplicate',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2919 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.edit',
          ),
          1 => 
          array (
            0 => 'proposal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2929 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.show',
          ),
          1 => 
          array (
            0 => 'proposal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.update',
          ),
          1 => 
          array (
            0 => 'proposal',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.destroy',
          ),
          1 => 
          array (
            0 => 'proposal',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2954 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.pdf',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2987 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proposal.preview',
          ),
          1 => 
          array (
            0 => 'template',
            1 => 'color',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3031 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment-method.show',
          ),
          1 => 
          array (
            0 => 'payment_method',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3045 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment-method.edit',
          ),
          1 => 
          array (
            0 => 'payment_method',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3054 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment-method.update',
          ),
          1 => 
          array (
            0 => 'payment_method',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'payment-method.destroy',
          ),
          1 => 
          array (
            0 => 'payment_method',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3076 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.show',
          ),
          1 => 
          array (
            0 => 'payment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3090 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.edit',
          ),
          1 => 
          array (
            0 => 'payment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3099 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.update',
          ),
          1 => 
          array (
            0 => 'payment',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'payment.destroy',
          ),
          1 => 
          array (
            0 => 'payment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3134 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3157 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'change.langPass',
            'lang' => NULL,
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3184 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'plans.show',
          ),
          1 => 
          array (
            0 => 'plan',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3198 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'plans.edit',
          ),
          1 => 
          array (
            0 => 'plan',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3207 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'plans.update',
          ),
          1 => 
          array (
            0 => 'plan',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'plans.destroy',
          ),
          1 => 
          array (
            0 => 'plan',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3233 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'purchase',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3287 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.credit.note',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.credit.note.store',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3316 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.edit.credit.note',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'cn_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.update.credit.note',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'cn_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3341 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.destroy.credit.note',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'cn_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3364 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.duplicate',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3385 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.delivering',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3396 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.delivered',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3424 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.shipping.print',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3436 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.sent',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3459 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.payment',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.payment.create',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3488 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.payment.destroy',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'pid',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3505 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.payment.reminder',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3525 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.picked-up',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3541 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.prepared',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3555 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.edit',
          ),
          1 => 
          array (
            0 => 'invoice',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3565 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.show',
          ),
          1 => 
          array (
            0 => 'invoice',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.update',
          ),
          1 => 
          array (
            0 => 'invoice',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.destroy',
          ),
          1 => 
          array (
            0 => 'invoice',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3591 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.thermal',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3612 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.pdf',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3649 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.preview',
          ),
          1 => 
          array (
            0 => 'template',
            1 => 'color',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3681 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'revenue.show',
          ),
          1 => 
          array (
            0 => 'revenue',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3695 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'revenue.edit',
          ),
          1 => 
          array (
            0 => 'revenue',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3704 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'revenue.update',
          ),
          1 => 
          array (
            0 => 'revenue',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'revenue.destroy',
          ),
          1 => 
          array (
            0 => 'revenue',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3734 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.export',
          ),
          1 => 
          array (
            0 => 'name',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3763 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register.show',
            'lang' => NULL,
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3813 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.debit.note',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'bill.debit.note.store',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3842 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.edit.debit.note',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'cn_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'bill.update.debit.note',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'cn_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3867 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.delete.debit.note',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'cn_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3886 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.duplicate',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3913 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.shipping.print',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3925 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.sent',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3945 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.payment',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'bill.payment.create',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3971 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.payment.destroy',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'pid',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3985 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.edit',
          ),
          1 => 
          array (
            0 => 'bill',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3995 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.show',
          ),
          1 => 
          array (
            0 => 'bill',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'bill.update',
          ),
          1 => 
          array (
            0 => 'bill',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'bill.destroy',
          ),
          1 => 
          array (
            0 => 'bill',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4021 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.thermal',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4045 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.pdf',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4078 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bill.preview',
          ),
          1 => 
          array (
            0 => 'template',
            1 => 'color',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4112 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'expenses.show',
          ),
          1 => 
          array (
            0 => 'expense',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4126 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'expenses.edit',
          ),
          1 => 
          array (
            0 => 'expense',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4135 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'expenses.update',
          ),
          1 => 
          array (
            0 => 'expense',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'expenses.destroy',
          ),
          1 => 
          array (
            0 => 'expense',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4174 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.verify',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'hash',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4206 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'coupons.show',
          ),
          1 => 
          array (
            0 => 'coupon',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4220 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'coupons.edit',
          ),
          1 => 
          array (
            0 => 'coupon',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4229 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'coupons.update',
          ),
          1 => 
          array (
            0 => 'coupon',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'coupons.destroy',
          ),
          1 => 
          array (
            0 => 'coupon',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4263 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'custom-field.show',
          ),
          1 => 
          array (
            0 => 'custom_field',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4277 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'custom-field.edit',
          ),
          1 => 
          array (
            0 => 'custom_field',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4286 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'custom-field.update',
          ),
          1 => 
          array (
            0 => 'custom_field',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'custom-field.destroy',
          ),
          1 => 
          array (
            0 => 'custom_field',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4313 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'goal.show',
          ),
          1 => 
          array (
            0 => 'goal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4327 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'goal.edit',
          ),
          1 => 
          array (
            0 => 'goal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4336 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'goal.update',
          ),
          1 => 
          array (
            0 => 'goal',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'goal.destroy',
          ),
          1 => 
          array (
            0 => 'goal',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4379 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account-assets.show',
          ),
          1 => 
          array (
            0 => 'account_asset',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4393 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account-assets.edit',
          ),
          1 => 
          array (
            0 => 'account_asset',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4402 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account-assets.update',
          ),
          1 => 
          array (
            0 => 'account_asset',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'account-assets.destroy',
          ),
          1 => 
          array (
            0 => 'account_asset',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4432 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account-equities.show',
          ),
          1 => 
          array (
            0 => 'account_equity',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4446 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account-equities.edit',
          ),
          1 => 
          array (
            0 => 'account_equity',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4455 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account-equities.update',
          ),
          1 => 
          array (
            0 => 'account_equity',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'account-equities.destroy',
          ),
          1 => 
          array (
            0 => 'account_equity',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4488 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account-liabilities.show',
          ),
          1 => 
          array (
            0 => 'account_liability',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4502 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account-liabilities.edit',
          ),
          1 => 
          array (
            0 => 'account_liability',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4511 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account-liabilities.update',
          ),
          1 => 
          array (
            0 => 'account_liability',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'account-liabilities.destroy',
          ),
          1 => 
          array (
            0 => 'account_liability',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4539 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agreement.show',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4572 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'samples.import',
          ),
          1 => 
          array (
            0 => 'name',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4600 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.login',
            'lang' => NULL,
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.authorize' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
        'as' => 'passport.authorizations.authorize',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.approve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
        'as' => 'passport.authorizations.approve',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.deny' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
        'as' => 'passport.authorizations.deny',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.token' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/token',
      'action' => 
      array (
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'as' => 'passport.token',
        'middleware' => 'throttle',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'as' => 'passport.tokens.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'as' => 'passport.tokens.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.token.refresh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/token/refresh',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'as' => 'passport.token.refresh',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'as' => 'passport.clients.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'as' => 'passport.clients.store',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'as' => 'passport.clients.update',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'as' => 'passport.clients.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.scopes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/scopes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'as' => 'passport.scopes.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'as' => 'passport.personal.tokens.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'as' => 'passport.personal.tokens.store',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/personal-access-tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'as' => 'passport.personal.tokens.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\Auth\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\api\\Auth\\AuthController@login',
        'as' => 'api.login',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.company.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/company',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\CompanyController@get',
        'controller' => 'App\\Http\\Controllers\\api\\CompanyController@get',
        'as' => 'api.company.get',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.company.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/company/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\CompanyController@update',
        'controller' => 'App\\Http\\Controllers\\api\\CompanyController@update',
        'as' => 'api.company.update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\Auth\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\api\\Auth\\AuthController@logout',
        'as' => 'api.logout',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.role-and-permission' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/role-and-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\Auth\\AuthController@RolePermission',
        'controller' => 'App\\Http\\Controllers\\api\\Auth\\AuthController@RolePermission',
        'as' => 'api.role-and-permission',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.bank-account.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/bank-account',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\BankAccountController@get',
        'controller' => 'App\\Http\\Controllers\\api\\BankAccountController@get',
        'as' => 'api.bank-account.get',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.bank-account.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/bank-account/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\BankAccountController@create',
        'controller' => 'App\\Http\\Controllers\\api\\BankAccountController@create',
        'as' => 'api.bank-account.create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.bank-account.edit' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/bank-account/{account_id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\BankAccountController@edit',
        'controller' => 'App\\Http\\Controllers\\api\\BankAccountController@edit',
        'as' => 'api.bank-account.edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.bank-account.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/bank-account/{account_id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\BankAccountController@destroy',
        'controller' => 'App\\Http\\Controllers\\api\\BankAccountController@destroy',
        'as' => 'api.bank-account.destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.category.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/category/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ProductServiceCategoryController@create',
        'controller' => 'App\\Http\\Controllers\\api\\ProductServiceCategoryController@create',
        'as' => 'api.category.create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.category.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/category/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ProductServiceCategoryController@get',
        'controller' => 'App\\Http\\Controllers\\api\\ProductServiceCategoryController@get',
        'as' => 'api.category.get',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.category.edit' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/category/{category_id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ProductServiceCategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\api\\ProductServiceCategoryController@edit',
        'as' => 'api.category.edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.category.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/category/{category_id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ProductServiceCategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\api\\ProductServiceCategoryController@destroy',
        'as' => 'api.category.destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.customer.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\CustomerController@get',
        'controller' => 'App\\Http\\Controllers\\api\\CustomerController@get',
        'as' => 'api.customer.get',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.customer.name' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/name/{name}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\CustomerController@name',
        'controller' => 'App\\Http\\Controllers\\api\\CustomerController@name',
        'as' => 'api.customer.name',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.customer.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\CustomerController@create',
        'controller' => 'App\\Http\\Controllers\\api\\CustomerController@create',
        'as' => 'api.customer.create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.customer.edit' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/customer/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\CustomerController@edit',
        'controller' => 'App\\Http\\Controllers\\api\\CustomerController@edit',
        'as' => 'api.customer.edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.customer.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/customer/{id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\CustomerController@destroy',
        'controller' => 'App\\Http\\Controllers\\api\\CustomerController@destroy',
        'as' => 'api.customer.destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.customer-category.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer-category/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\CustomerCategoryController@create',
        'controller' => 'App\\Http\\Controllers\\api\\CustomerCategoryController@create',
        'as' => 'api.customer-category.create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.customer-category.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer-category/{category_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\CustomerCategoryController@get',
        'controller' => 'App\\Http\\Controllers\\api\\CustomerCategoryController@get',
        'as' => 'api.customer-category.get',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.customer-category.edit' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/customer-category/{category_id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\CustomerCategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\api\\CustomerCategoryController@edit',
        'as' => 'api.customer-category.edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.customer-category.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/customer-category/{category_id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\CustomerCategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\api\\CustomerCategoryController@destroy',
        'as' => 'api.customer-category.destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.expense.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/expense',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ExpenseController@get',
        'controller' => 'App\\Http\\Controllers\\api\\ExpenseController@get',
        'as' => 'api.expense.get',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.expense.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/expense/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ExpenseController@create',
        'controller' => 'App\\Http\\Controllers\\api\\ExpenseController@create',
        'as' => 'api.expense.create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.expense.edit' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/expense/{expense_id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ExpenseController@edit',
        'controller' => 'App\\Http\\Controllers\\api\\ExpenseController@edit',
        'as' => 'api.expense.edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.expense.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/expense/{expense_id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ExpenseController@destroy',
        'controller' => 'App\\Http\\Controllers\\api\\ExpenseController@destroy',
        'as' => 'api.expense.destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.order.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/order',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\OrderController@index',
        'controller' => 'App\\Http\\Controllers\\api\\OrderController@index',
        'as' => 'api.order.index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.order.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/order/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\OrderController@create',
        'controller' => 'App\\Http\\Controllers\\api\\OrderController@create',
        'as' => 'api.order.create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.order.edit' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/order/{order_id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\OrderController@edit',
        'controller' => 'App\\Http\\Controllers\\api\\OrderController@edit',
        'as' => 'api.order.edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.order.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/order/{order_id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\OrderController@destroy',
        'controller' => 'App\\Http\\Controllers\\api\\OrderController@destroy',
        'as' => 'api.order.destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.order.detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/order/{order_id}/detail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\OrderController@detail',
        'controller' => 'App\\Http\\Controllers\\api\\OrderController@detail',
        'as' => 'api.order.detail',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.product-service.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/product-service/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ProductServiceController@create',
        'controller' => 'App\\Http\\Controllers\\api\\ProductServiceController@create',
        'as' => 'api.product-service.create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.product-service.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/product-service/{product_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ProductServiceController@get',
        'controller' => 'App\\Http\\Controllers\\api\\ProductServiceController@get',
        'as' => 'api.product-service.get',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.product-service.edit' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/product-service/{product_id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ProductServiceController@edit',
        'controller' => 'App\\Http\\Controllers\\api\\ProductServiceController@edit',
        'as' => 'api.product-service.edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.product-service.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/product-service/{product_id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ProductServiceController@destroy',
        'controller' => 'App\\Http\\Controllers\\api\\ProductServiceController@destroy',
        'as' => 'api.product-service.destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.unit.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/unit/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ProductServiceUnitController@create',
        'controller' => 'App\\Http\\Controllers\\api\\ProductServiceUnitController@create',
        'as' => 'api.unit.create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.unit.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/unit/{unit_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ProductServiceUnitController@get',
        'controller' => 'App\\Http\\Controllers\\api\\ProductServiceUnitController@get',
        'as' => 'api.unit.get',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.unit.edit' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/unit/{unit_id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ProductServiceUnitController@edit',
        'controller' => 'App\\Http\\Controllers\\api\\ProductServiceUnitController@edit',
        'as' => 'api.unit.edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.unit.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/unit/{unit_id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ProductServiceUnitController@destroy',
        'controller' => 'App\\Http\\Controllers\\api\\ProductServiceUnitController@destroy',
        'as' => 'api.unit.destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.tax.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/tax/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\TaxController@create',
        'controller' => 'App\\Http\\Controllers\\api\\TaxController@create',
        'as' => 'api.tax.create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.tax.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/tax/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\TaxController@get',
        'controller' => 'App\\Http\\Controllers\\api\\TaxController@get',
        'as' => 'api.tax.get',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.tax.edit' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/tax/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\TaxController@edit',
        'controller' => 'App\\Http\\Controllers\\api\\TaxController@edit',
        'as' => 'api.tax.edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.tax.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/tax/{id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\TaxController@destroy',
        'controller' => 'App\\Http\\Controllers\\api\\TaxController@destroy',
        'as' => 'api.tax.destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.supplier.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/supplier/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\SupplierController@create',
        'controller' => 'App\\Http\\Controllers\\api\\SupplierController@create',
        'as' => 'api.supplier.create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.supplier.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/supplier/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\SupplierController@get',
        'controller' => 'App\\Http\\Controllers\\api\\SupplierController@get',
        'as' => 'api.supplier.get',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.supplier.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/supplier/{id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\SupplierController@destroy',
        'controller' => 'App\\Http\\Controllers\\api\\SupplierController@destroy',
        'as' => 'api.supplier.destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.payment-method.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/payment-method/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\PaymentMethodController@create',
        'controller' => 'App\\Http\\Controllers\\api\\PaymentMethodController@create',
        'as' => 'api.payment-method.create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.payment-method.edit' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/payment-method/{method_id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\PaymentMethodController@edit',
        'controller' => 'App\\Http\\Controllers\\api\\PaymentMethodController@edit',
        'as' => 'api.payment-method.edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.payment-method.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/payment-method/{method_id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\PaymentMethodController@destroy',
        'controller' => 'App\\Http\\Controllers\\api\\PaymentMethodController@destroy',
        'as' => 'api.payment-method.destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.payment-method.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/payment-method/{method_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\PaymentMethodController@get',
        'controller' => 'App\\Http\\Controllers\\api\\PaymentMethodController@get',
        'as' => 'api.payment-method.get',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.report.income' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/report/income',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ReportController@income',
        'controller' => 'App\\Http\\Controllers\\api\\ReportController@income',
        'as' => 'api.report.income',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.report.expense' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/report/expense',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\ReportController@expense',
        'controller' => 'App\\Http\\Controllers\\api\\ReportController@expense',
        'as' => 'api.report.expense',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.format.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v2/format/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\Format\\Controller@get',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\Format\\Controller@get',
        'as' => 'api.v2.format.get',
        'namespace' => NULL,
        'prefix' => 'api/v2/format',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.auth.login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v2/auth/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\Auth\\LoginController@index',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\Auth\\LoginController@index',
        'as' => 'api.v2.auth.login',
        'namespace' => NULL,
        'prefix' => 'api/v2/auth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.auth.register' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v2/auth/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\Auth\\RegisterController@index',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\Auth\\RegisterController@index',
        'as' => 'api.v2.auth.register',
        'namespace' => NULL,
        'prefix' => 'api/v2/auth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.auth.logout' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v2/auth/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
          2 => 'auth:api',
          3 => 'plan',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\Auth\\LogoutController@index',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\Auth\\LogoutController@index',
        'as' => 'api.v2.auth.logout',
        'namespace' => NULL,
        'prefix' => 'api/v2',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.asset.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v2/asset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
          2 => 'auth:api',
          3 => 'plan',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\AssetController@get',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\AssetController@get',
        'as' => 'api.v2.asset.get',
        'namespace' => NULL,
        'prefix' => 'api/v2/asset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.asset.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v2/asset/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
          2 => 'auth:api',
          3 => 'plan',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\AssetController@create',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\AssetController@create',
        'as' => 'api.v2.asset.create',
        'namespace' => NULL,
        'prefix' => 'api/v2/asset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.asset.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v2/asset/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
          2 => 'auth:api',
          3 => 'plan',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\AssetController@update',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\AssetController@update',
        'as' => 'api.v2.asset.update',
        'namespace' => NULL,
        'prefix' => 'api/v2/asset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.asset.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v2/asset/{id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
          2 => 'auth:api',
          3 => 'plan',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\AssetController@destroy',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\AssetController@destroy',
        'as' => 'api.v2.asset.delete',
        'namespace' => NULL,
        'prefix' => 'api/v2/asset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.bank-account.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v2/bank-account',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
          2 => 'auth:api',
          3 => 'plan',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\BankAccountController@get',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\BankAccountController@get',
        'as' => 'api.v2.bank-account.get',
        'namespace' => NULL,
        'prefix' => 'api/v2/bank-account',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.bank-account.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v2/bank-account/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
          2 => 'auth:api',
          3 => 'plan',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\BankAccountController@create',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\BankAccountController@create',
        'as' => 'api.v2.bank-account.create',
        'namespace' => NULL,
        'prefix' => 'api/v2/bank-account',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.bank-account.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v2/bank-account/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
          2 => 'auth:api',
          3 => 'plan',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\BankAccountController@update',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\BankAccountController@update',
        'as' => 'api.v2.bank-account.update',
        'namespace' => NULL,
        'prefix' => 'api/v2/bank-account',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.bank-account.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v2/bank-account/{id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
          2 => 'auth:api',
          3 => 'plan',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\BankAccountController@destroy',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\BankAccountController@destroy',
        'as' => 'api.v2.bank-account.delete',
        'namespace' => NULL,
        'prefix' => 'api/v2/bank-account',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.category.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v2/category/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
          2 => 'auth:api',
          3 => 'plan',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\CategoryController@get',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\CategoryController@get',
        'as' => 'api.v2.category.get',
        'namespace' => NULL,
        'prefix' => 'api/v2/category/{type}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.category.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v2/category/{type}/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
          2 => 'auth:api',
          3 => 'plan',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\CategoryController@create',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\CategoryController@create',
        'as' => 'api.v2.category.create',
        'namespace' => NULL,
        'prefix' => 'api/v2/category/{type}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.category.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v2/category/{type}/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
          2 => 'auth:api',
          3 => 'plan',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\CategoryController@update',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\CategoryController@update',
        'as' => 'api.v2.category.update',
        'namespace' => NULL,
        'prefix' => 'api/v2/category/{type}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.category.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v2/category/{type}/{id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
          2 => 'auth:api',
          3 => 'plan',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\CategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\CategoryController@destroy',
        'as' => 'api.v2.category.delete',
        'namespace' => NULL,
        'prefix' => 'api/v2/category/{type}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v2.report.balance-sheet' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v2/report/balance-sheet',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'xss',
          2 => 'auth:api',
          3 => 'plan',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\v2\\BalanceSheetController@get',
        'controller' => 'App\\Http\\Controllers\\api\\v2\\BalanceSheetController@get',
        'as' => 'api.v2.report.balance-sheet',
        'namespace' => NULL,
        'prefix' => 'api/v2/report',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZkoWPrHgeCOe1J26' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:273:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:55:"function () {
    return \\view(\'landing-page.index\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000006450000000000000000";}";s:4:"hash";s:44:"vpsgwVpZlxsLWNUq61cLJE376s61oHze4PeG2lNnHws=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ZkoWPrHgeCOe1J26',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::46jbVxyVU46Q8kQU' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'github/webhook',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Github\\WebhookController@handle',
        'controller' => 'App\\Http\\Controllers\\Github\\WebhookController@handle',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::46jbVxyVU46Q8kQU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7UY1USP52KSMGMHz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/test',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:281:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:63:"function () {
            return \\view(\'test.index\');
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000006820000000000000000";}";s:4:"hash";s:44:"hC8REaW32iNlJuFie8vMY3VyNKNR2dEYFbfECgNVNKI=";}}',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'generated::7UY1USP52KSMGMHz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.login.lang' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer/login/{lang?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showCustomerLoginLang',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showCustomerLoginLang',
        'as' => 'customer.login.lang',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/customer/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@customerLogin',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@customerLogin',
        'as' => 'customer.login',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@dashboard',
        'controller' => 'App\\Http\\Controllers\\CustomerController@dashboard',
        'as' => 'customer.dashboard',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.invoice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer/invoice',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@customerInvoice',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@customerInvoice',
        'as' => 'customer.invoice',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.proposal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer/proposal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\ProposalController@customerProposal',
        'controller' => 'App\\Http\\Controllers\\ProposalController@customerProposal',
        'as' => 'customer.proposal',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.proposal.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer/proposal/{id}/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\ProposalController@customerProposalShow',
        'controller' => 'App\\Http\\Controllers\\ProposalController@customerProposalShow',
        'as' => 'customer.proposal.show',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.invoice.send' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer/invoice/{id}/send',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@customerInvoiceSend',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@customerInvoiceSend',
        'as' => 'customer.invoice.send',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.invoice.send.mail' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/customer/invoice/{id}/send/mail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@customerInvoiceSendMail',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@customerInvoiceSendMail',
        'as' => 'customer.invoice.send.mail',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.invoice.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer/invoice/{id}/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@customerInvoiceShow',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@customerInvoiceShow',
        'as' => 'customer.invoice.show',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.payment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer/payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@payment',
        'controller' => 'App\\Http\\Controllers\\CustomerController@payment',
        'as' => 'customer.payment',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.transaction' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer/transaction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@transaction',
        'controller' => 'App\\Http\\Controllers\\CustomerController@transaction',
        'as' => 'customer.transaction',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/customer/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@customerLogout',
        'controller' => 'App\\Http\\Controllers\\CustomerController@customerLogout',
        'as' => 'customer.logout',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@profile',
        'controller' => 'App\\Http\\Controllers\\CustomerController@profile',
        'as' => 'customer.profile',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.update.profile' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/customer/update-profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@editprofile',
        'controller' => 'App\\Http\\Controllers\\CustomerController@editprofile',
        'as' => 'customer.update.profile',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.update.billing.info' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/customer/billing-info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@editBilling',
        'controller' => 'App\\Http\\Controllers\\CustomerController@editBilling',
        'as' => 'customer.update.billing.info',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.update.shipping.info' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/customer/shipping-info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@editShipping',
        'controller' => 'App\\Http\\Controllers\\CustomerController@editShipping',
        'as' => 'customer.update.shipping.info',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.update.password' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/customer/change.password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@updatePassword',
        'controller' => 'App\\Http\\Controllers\\CustomerController@updatePassword',
        'as' => 'customer.update.password',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.change.language' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer/change-language/{lang}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@changeLanquage',
        'controller' => 'App\\Http\\Controllers\\CustomerController@changeLanquage',
        'as' => 'customer.change.language',
        'namespace' => NULL,
        'prefix' => 'app/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.login.lang' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/vender/login/{lang?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showVenderLoginLang',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showVenderLoginLang',
        'as' => 'vender.login.lang',
        'namespace' => NULL,
        'prefix' => 'app/vender',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/vender/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@VenderLogin',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@VenderLogin',
        'as' => 'vender.login',
        'namespace' => NULL,
        'prefix' => 'app/vender',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/vender/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:vender',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\VenderController@dashboard',
        'controller' => 'App\\Http\\Controllers\\VenderController@dashboard',
        'as' => 'vender.dashboard',
        'namespace' => NULL,
        'prefix' => 'app/vender',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.bill' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/vender/bill',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:vender',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@VenderBill',
        'controller' => 'App\\Http\\Controllers\\BillController@VenderBill',
        'as' => 'vender.bill',
        'namespace' => NULL,
        'prefix' => 'app/vender',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.bill.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/vender/bill/{id}/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:vender',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@venderBillShow',
        'controller' => 'App\\Http\\Controllers\\BillController@venderBillShow',
        'as' => 'vender.bill.show',
        'namespace' => NULL,
        'prefix' => 'app/vender/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.bill.send' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/vender/bill/{id}/send',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:vender',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@venderBillSend',
        'controller' => 'App\\Http\\Controllers\\BillController@venderBillSend',
        'as' => 'vender.bill.send',
        'namespace' => NULL,
        'prefix' => 'app/vender/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.bill.send.mail' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/vender/bill/{id}/send/mail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:vender',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@venderBillSendMail',
        'controller' => 'App\\Http\\Controllers\\BillController@venderBillSendMail',
        'as' => 'vender.bill.send.mail',
        'namespace' => NULL,
        'prefix' => 'app/vender/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.payment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/vender/payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:vender',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\VenderController@payment',
        'controller' => 'App\\Http\\Controllers\\VenderController@payment',
        'as' => 'vender.payment',
        'namespace' => NULL,
        'prefix' => 'app/vender',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.transaction' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/vender/transaction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:vender',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\VenderController@transaction',
        'controller' => 'App\\Http\\Controllers\\VenderController@transaction',
        'as' => 'vender.transaction',
        'namespace' => NULL,
        'prefix' => 'app/vender',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/vender/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:vender',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\VenderController@venderLogout',
        'controller' => 'App\\Http\\Controllers\\VenderController@venderLogout',
        'as' => 'vender.logout',
        'namespace' => NULL,
        'prefix' => 'app/vender',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/vender/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:vender',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\VenderController@profile',
        'controller' => 'App\\Http\\Controllers\\VenderController@profile',
        'as' => 'vender.profile',
        'namespace' => NULL,
        'prefix' => 'app/vender',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.update.profile' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/vender/update-profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:vender',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\VenderController@editprofile',
        'controller' => 'App\\Http\\Controllers\\VenderController@editprofile',
        'as' => 'vender.update.profile',
        'namespace' => NULL,
        'prefix' => 'app/vender',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.update.billing.info' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/vender/billing-info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:vender',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\VenderController@editBilling',
        'controller' => 'App\\Http\\Controllers\\VenderController@editBilling',
        'as' => 'vender.update.billing.info',
        'namespace' => NULL,
        'prefix' => 'app/vender',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.update.shipping.info' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/vender/shipping-info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:vender',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\VenderController@editShipping',
        'controller' => 'App\\Http\\Controllers\\VenderController@editShipping',
        'as' => 'vender.update.shipping.info',
        'namespace' => NULL,
        'prefix' => 'app/vender',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.update.password' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/vender/change.password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:vender',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\VenderController@updatePassword',
        'controller' => 'App\\Http\\Controllers\\VenderController@updatePassword',
        'as' => 'vender.update.password',
        'namespace' => NULL,
        'prefix' => 'app/vender',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.change.language' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/vender/change-language/{lang}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:vender',
          2 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\VenderController@changeLanquage',
        'controller' => 'App\\Http\\Controllers\\VenderController@changeLanquage',
        'as' => 'vender.change.language',
        'namespace' => NULL,
        'prefix' => 'app/vender',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agreement.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/agreement/{type}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAgreementController@edit',
        'controller' => 'App\\Http\\Controllers\\UserAgreementController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'agreement.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agreement.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/agreement/{type}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAgreementController@update',
        'controller' => 'App\\Http\\Controllers\\UserAgreementController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'agreement.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@index',
        'controller' => 'App\\Http\\Controllers\\DashboardController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard-chart.cashflow' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/dashboard/charts/cash-flow/{month}/{year}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@GetCashFlow',
        'controller' => 'App\\Http\\Controllers\\DashboardController@GetCashFlow',
        'as' => 'dashboard-chart.cashflow',
        'namespace' => NULL,
        'prefix' => 'app/dashboard/charts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard-chart.income-expense' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/dashboard/charts/income-expense/{year}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@GetIncomeExpense',
        'controller' => 'App\\Http\\Controllers\\DashboardController@GetIncomeExpense',
        'as' => 'dashboard-chart.income-expense',
        'namespace' => NULL,
        'prefix' => 'app/dashboard/charts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard-chart.category' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/dashboard/charts/doughnut/{type}/{month}/{year}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@GetCategoryData',
        'controller' => 'App\\Http\\Controllers\\DashboardController@GetCategoryData',
        'as' => 'dashboard-chart.category',
        'namespace' => NULL,
        'prefix' => 'app/dashboard/charts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'plan.upgrade' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/user/{id}/plan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@upgradePlan',
        'controller' => 'App\\Http\\Controllers\\UserController@upgradePlan',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'plan.upgrade',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'plan.active' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/user/{id}/plan/{pid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@activePlan',
        'controller' => 'App\\Http\\Controllers\\UserController@activePlan',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'plan.active',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@profile',
        'controller' => 'App\\Http\\Controllers\\UserController@profile',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update.account' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/edit-profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@editprofile',
        'controller' => 'App\\Http\\Controllers\\UserController@editprofile',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'update.account',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'users.index',
        'uses' => 'App\\Http\\Controllers\\UserController@index',
        'controller' => 'App\\Http\\Controllers\\UserController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/users/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'users.create',
        'uses' => 'App\\Http\\Controllers\\UserController@create',
        'controller' => 'App\\Http\\Controllers\\UserController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'users.store',
        'uses' => 'App\\Http\\Controllers\\UserController@store',
        'controller' => 'App\\Http\\Controllers\\UserController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/users/{user}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'users.edit',
        'uses' => 'App\\Http\\Controllers\\UserController@edit',
        'controller' => 'App\\Http\\Controllers\\UserController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'users.update',
        'uses' => 'App\\Http\\Controllers\\UserController@update',
        'controller' => 'App\\Http\\Controllers\\UserController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'users.destroy',
        'uses' => 'App\\Http\\Controllers\\UserController@destroy',
        'controller' => 'App\\Http\\Controllers\\UserController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.page-with-search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/users/search/{query}/{page}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@search',
        'controller' => 'App\\Http\\Controllers\\UserController@search',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'users.page-with-search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/users/search/{query}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@search',
        'controller' => 'App\\Http\\Controllers\\UserController@search',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'users.search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/users/{page}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@index',
        'controller' => 'App\\Http\\Controllers\\UserController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'users.page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.activity' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'PUT',
        2 => 'HEAD',
      ),
      'uri' => 'app/users/{userID}/activity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@activity',
        'controller' => 'App\\Http\\Controllers\\UserController@activity',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'user.activity',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'referral.redeem' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/redeem-referral',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReferralController@redeem',
        'controller' => 'App\\Http\\Controllers\\ReferralController@redeem',
        'as' => 'referral.redeem',
        'namespace' => NULL,
        'prefix' => 'app/redeem-referral',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'referral.redeem.plan' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/redeem-referral/plan/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReferralController@RedeemPlan',
        'controller' => 'App\\Http\\Controllers\\ReferralController@RedeemPlan',
        'as' => 'referral.redeem.plan',
        'namespace' => NULL,
        'prefix' => 'app/redeem-referral',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'referral.checkout.plan' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/redeem-referral/plan/checkout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReferralController@CheckoutPlan',
        'controller' => 'App\\Http\\Controllers\\ReferralController@CheckoutPlan',
        'as' => 'referral.checkout.plan',
        'namespace' => NULL,
        'prefix' => 'app/redeem-referral',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'referral.withdraw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/redeem-referral/withdraw',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReferralController@WithdrawRequest',
        'controller' => 'App\\Http\\Controllers\\ReferralController@WithdrawRequest',
        'as' => 'referral.withdraw',
        'namespace' => NULL,
        'prefix' => 'app/redeem-referral',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'referral.withdraw.request' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/redeem-referral/withdraw/request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReferralController@RequestWithdraw',
        'controller' => 'App\\Http\\Controllers\\ReferralController@RequestWithdraw',
        'as' => 'referral.withdraw.request',
        'namespace' => NULL,
        'prefix' => 'app/redeem-referral',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'referral.withdraw.process' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/redeem-referral/withdraw/{id}/process',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReferralController@ProcessWithdrawRequest',
        'controller' => 'App\\Http\\Controllers\\ReferralController@ProcessWithdrawRequest',
        'as' => 'referral.withdraw.process',
        'namespace' => NULL,
        'prefix' => 'app/redeem-referral',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'referral.withdraw.cancel' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/redeem-referral/withdraw/{id}/cancel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReferralController@CancelWithdrawRequest',
        'controller' => 'App\\Http\\Controllers\\ReferralController@CancelWithdrawRequest',
        'as' => 'referral.withdraw.cancel',
        'namespace' => NULL,
        'prefix' => 'app/redeem-referral',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'referral.history' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/redeem-referral/withdraw/history',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReferralController@history',
        'controller' => 'App\\Http\\Controllers\\ReferralController@history',
        'as' => 'referral.history',
        'namespace' => NULL,
        'prefix' => 'app/redeem-referral',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'roles.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'roles.index',
        'uses' => 'App\\Http\\Controllers\\RoleController@index',
        'controller' => 'App\\Http\\Controllers\\RoleController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'roles.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/roles/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'roles.create',
        'uses' => 'App\\Http\\Controllers\\RoleController@create',
        'controller' => 'App\\Http\\Controllers\\RoleController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'roles.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'roles.store',
        'uses' => 'App\\Http\\Controllers\\RoleController@store',
        'controller' => 'App\\Http\\Controllers\\RoleController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'roles.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/roles/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'roles.show',
        'uses' => 'App\\Http\\Controllers\\RoleController@show',
        'controller' => 'App\\Http\\Controllers\\RoleController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'roles.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/roles/{role}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'roles.edit',
        'uses' => 'App\\Http\\Controllers\\RoleController@edit',
        'controller' => 'App\\Http\\Controllers\\RoleController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'roles.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/roles/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'roles.update',
        'uses' => 'App\\Http\\Controllers\\RoleController@update',
        'controller' => 'App\\Http\\Controllers\\RoleController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'roles.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/roles/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'roles.destroy',
        'uses' => 'App\\Http\\Controllers\\RoleController@destroy',
        'controller' => 'App\\Http\\Controllers\\RoleController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'permissions.index',
        'uses' => 'App\\Http\\Controllers\\PermissionController@index',
        'controller' => 'App\\Http\\Controllers\\PermissionController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/permissions/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'permissions.create',
        'uses' => 'App\\Http\\Controllers\\PermissionController@create',
        'controller' => 'App\\Http\\Controllers\\PermissionController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'permissions.store',
        'uses' => 'App\\Http\\Controllers\\PermissionController@store',
        'controller' => 'App\\Http\\Controllers\\PermissionController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/permissions/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'permissions.show',
        'uses' => 'App\\Http\\Controllers\\PermissionController@show',
        'controller' => 'App\\Http\\Controllers\\PermissionController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/permissions/{permission}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'permissions.edit',
        'uses' => 'App\\Http\\Controllers\\PermissionController@edit',
        'controller' => 'App\\Http\\Controllers\\PermissionController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/permissions/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'permissions.update',
        'uses' => 'App\\Http\\Controllers\\PermissionController@update',
        'controller' => 'App\\Http\\Controllers\\PermissionController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/permissions/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'permissions.destroy',
        'uses' => 'App\\Http\\Controllers\\PermissionController@destroy',
        'controller' => 'App\\Http\\Controllers\\PermissionController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'change.language' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/change-language/{lang}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\LanguageController@changeLanquage',
        'controller' => 'App\\Http\\Controllers\\LanguageController@changeLanquage',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'change.language',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manage.language' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/manage-language/{lang}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\LanguageController@manageLanguage',
        'controller' => 'App\\Http\\Controllers\\LanguageController@manageLanguage',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'manage.language',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'store.language.data' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/store-language-data/{lang}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\LanguageController@storeLanguageData',
        'controller' => 'App\\Http\\Controllers\\LanguageController@storeLanguageData',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'store.language.data',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create.language' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/create-language',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\LanguageController@createLanguage',
        'controller' => 'App\\Http\\Controllers\\LanguageController@createLanguage',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'create.language',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'store.language' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/store-language',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\LanguageController@storeLanguage',
        'controller' => 'App\\Http\\Controllers\\LanguageController@storeLanguage',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'store.language',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'systems.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/systems',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'systems.index',
        'uses' => 'App\\Http\\Controllers\\SystemController@index',
        'controller' => 'App\\Http\\Controllers\\SystemController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'systems.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/systems/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'systems.create',
        'uses' => 'App\\Http\\Controllers\\SystemController@create',
        'controller' => 'App\\Http\\Controllers\\SystemController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'systems.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/systems',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'systems.store',
        'uses' => 'App\\Http\\Controllers\\SystemController@store',
        'controller' => 'App\\Http\\Controllers\\SystemController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'systems.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/systems/{system}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'systems.show',
        'uses' => 'App\\Http\\Controllers\\SystemController@show',
        'controller' => 'App\\Http\\Controllers\\SystemController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'systems.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/systems/{system}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'systems.edit',
        'uses' => 'App\\Http\\Controllers\\SystemController@edit',
        'controller' => 'App\\Http\\Controllers\\SystemController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'systems.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/systems/{system}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'systems.update',
        'uses' => 'App\\Http\\Controllers\\SystemController@update',
        'controller' => 'App\\Http\\Controllers\\SystemController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'systems.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/systems/{system}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'systems.destroy',
        'uses' => 'App\\Http\\Controllers\\SystemController@destroy',
        'controller' => 'App\\Http\\Controllers\\SystemController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'referral.settings' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/referral-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\SystemController@saveReferralSettings',
        'controller' => 'App\\Http\\Controllers\\SystemController@saveReferralSettings',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'referral.settings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'asset-version.settings' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/asset-version-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\SystemController@saveAssetVersion',
        'controller' => 'App\\Http\\Controllers\\SystemController@saveAssetVersion',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'asset-version.settings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'email.settings' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/email-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\SystemController@saveEmailSettings',
        'controller' => 'App\\Http\\Controllers\\SystemController@saveEmailSettings',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'email.settings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company.settings' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/company-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\SystemController@saveCompanySettings',
        'controller' => 'App\\Http\\Controllers\\SystemController@saveCompanySettings',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'company.settings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'stripe.settings' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/stripe-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\SystemController@saveStripeSettings',
        'controller' => 'App\\Http\\Controllers\\SystemController@saveStripeSettings',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'stripe.settings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'midtrans.settings' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/midtrans-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\SystemController@saveMidtransSettings',
        'controller' => 'App\\Http\\Controllers\\SystemController@saveMidtransSettings',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'midtrans.settings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'system.settings' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/system-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\SystemController@saveSystemSettings',
        'controller' => 'App\\Http\\Controllers\\SystemController@saveSystemSettings',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'system.settings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company.setting' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/company-setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\SystemController@companyIndex',
        'controller' => 'App\\Http\\Controllers\\SystemController@companyIndex',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'company.setting',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'business.setting' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/business-setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\SystemController@saveBusinessSettings',
        'controller' => 'App\\Http\\Controllers\\SystemController@saveBusinessSettings',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'business.setting',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productservice.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/productservice/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductServiceController@get',
        'controller' => 'App\\Http\\Controllers\\ProductServiceController@get',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'productservice.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productservice.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/productservice/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductServiceController@export',
        'controller' => 'App\\Http\\Controllers\\ProductServiceController@export',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'productservice.export',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productservice.import' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/productservice/import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductServiceController@import',
        'controller' => 'App\\Http\\Controllers\\ProductServiceController@import',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'productservice.import',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productservice.import.store' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/productservice/import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductServiceController@storeImport',
        'controller' => 'App\\Http\\Controllers\\ProductServiceController@storeImport',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'productservice.import.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productservice.import.headings' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/productservice/import/header',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductServiceController@getImportHeadings',
        'controller' => 'App\\Http\\Controllers\\ProductServiceController@getImportHeadings',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'productservice.import.headings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productservice.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/productservice',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'productservice.index',
        'uses' => 'App\\Http\\Controllers\\ProductServiceController@index',
        'controller' => 'App\\Http\\Controllers\\ProductServiceController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productservice.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/productservice/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'productservice.create',
        'uses' => 'App\\Http\\Controllers\\ProductServiceController@create',
        'controller' => 'App\\Http\\Controllers\\ProductServiceController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productservice.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/productservice',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'productservice.store',
        'uses' => 'App\\Http\\Controllers\\ProductServiceController@store',
        'controller' => 'App\\Http\\Controllers\\ProductServiceController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productservice.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/productservice/{productservice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'productservice.show',
        'uses' => 'App\\Http\\Controllers\\ProductServiceController@show',
        'controller' => 'App\\Http\\Controllers\\ProductServiceController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productservice.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/productservice/{productservice}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'productservice.edit',
        'uses' => 'App\\Http\\Controllers\\ProductServiceController@edit',
        'controller' => 'App\\Http\\Controllers\\ProductServiceController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productservice.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/productservice/{productservice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'productservice.update',
        'uses' => 'App\\Http\\Controllers\\ProductServiceController@update',
        'controller' => 'App\\Http\\Controllers\\ProductServiceController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productservice.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/productservice/{productservice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'productservice.destroy',
        'uses' => 'App\\Http\\Controllers\\ProductServiceController@destroy',
        'controller' => 'App\\Http\\Controllers\\ProductServiceController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product-stock.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/product-stock',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductServiceStockController@index',
        'controller' => 'App\\Http\\Controllers\\ProductServiceStockController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'product-stock.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product-stock.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/product-stock/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductServiceStockController@get',
        'controller' => 'App\\Http\\Controllers\\ProductServiceStockController@get',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'product-stock.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product-stock.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/product-stock/{id}/stock',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductServiceStockController@show',
        'controller' => 'App\\Http\\Controllers\\ProductServiceStockController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'product-stock.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product-stock.history' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/product-stock/{id}/history',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductServiceStockController@history',
        'controller' => 'App\\Http\\Controllers\\ProductServiceStockController@history',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'product-stock.history',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product-stock.modify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/product-stock/{id}/{operation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductServiceStockController@modify',
        'controller' => 'App\\Http\\Controllers\\ProductServiceStockController@modify',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'product-stock.modify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product-stock.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/product-stock/{operation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductServiceStockController@update',
        'controller' => 'App\\Http\\Controllers\\ProductServiceStockController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'product-stock.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.name.ajax' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer/ajax/{name}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\CustomerController@name',
        'controller' => 'App\\Http\\Controllers\\api\\CustomerController@name',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'customer.name.ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/customer/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@get',
        'controller' => 'App\\Http\\Controllers\\CustomerController@get',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'customer.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'customer.index',
        'uses' => 'App\\Http\\Controllers\\CustomerController@index',
        'controller' => 'App\\Http\\Controllers\\CustomerController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'customer.create',
        'uses' => 'App\\Http\\Controllers\\CustomerController@create',
        'controller' => 'App\\Http\\Controllers\\CustomerController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/customer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'customer.store',
        'uses' => 'App\\Http\\Controllers\\CustomerController@store',
        'controller' => 'App\\Http\\Controllers\\CustomerController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer/{customer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'customer.show',
        'uses' => 'App\\Http\\Controllers\\CustomerController@show',
        'controller' => 'App\\Http\\Controllers\\CustomerController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer/{customer}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'customer.edit',
        'uses' => 'App\\Http\\Controllers\\CustomerController@edit',
        'controller' => 'App\\Http\\Controllers\\CustomerController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/customer/{customer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'customer.update',
        'uses' => 'App\\Http\\Controllers\\CustomerController@update',
        'controller' => 'App\\Http\\Controllers\\CustomerController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/customer/{customer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'customer.destroy',
        'uses' => 'App\\Http\\Controllers\\CustomerController@destroy',
        'controller' => 'App\\Http\\Controllers\\CustomerController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.category.ajax' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer-category/ajax/{category_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\CustomerCategoryController@get',
        'controller' => 'App\\Http\\Controllers\\api\\CustomerCategoryController@get',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'customer.category.ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer-category.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/customer-category/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerCategoryController@get',
        'controller' => 'App\\Http\\Controllers\\CustomerCategoryController@get',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'customer-category.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer-category.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'customer-category.index',
        'uses' => 'App\\Http\\Controllers\\CustomerCategoryController@index',
        'controller' => 'App\\Http\\Controllers\\CustomerCategoryController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer-category.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer-category/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'customer-category.create',
        'uses' => 'App\\Http\\Controllers\\CustomerCategoryController@create',
        'controller' => 'App\\Http\\Controllers\\CustomerCategoryController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer-category.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/customer-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'customer-category.store',
        'uses' => 'App\\Http\\Controllers\\CustomerCategoryController@store',
        'controller' => 'App\\Http\\Controllers\\CustomerCategoryController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer-category.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer-category/{customer_category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'customer-category.show',
        'uses' => 'App\\Http\\Controllers\\CustomerCategoryController@show',
        'controller' => 'App\\Http\\Controllers\\CustomerCategoryController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer-category.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/customer-category/{customer_category}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'customer-category.edit',
        'uses' => 'App\\Http\\Controllers\\CustomerCategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\CustomerCategoryController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer-category.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/customer-category/{customer_category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'customer-category.update',
        'uses' => 'App\\Http\\Controllers\\CustomerCategoryController@update',
        'controller' => 'App\\Http\\Controllers\\CustomerCategoryController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer-category.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/customer-category/{customer_category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'customer-category.destroy',
        'uses' => 'App\\Http\\Controllers\\CustomerCategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\CustomerCategoryController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/vender/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\VenderController@get',
        'controller' => 'App\\Http\\Controllers\\VenderController@get',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'vender.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/vender',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'vender.index',
        'uses' => 'App\\Http\\Controllers\\VenderController@index',
        'controller' => 'App\\Http\\Controllers\\VenderController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/vender/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'vender.create',
        'uses' => 'App\\Http\\Controllers\\VenderController@create',
        'controller' => 'App\\Http\\Controllers\\VenderController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/vender',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'vender.store',
        'uses' => 'App\\Http\\Controllers\\VenderController@store',
        'controller' => 'App\\Http\\Controllers\\VenderController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/vender/{vender}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'vender.show',
        'uses' => 'App\\Http\\Controllers\\VenderController@show',
        'controller' => 'App\\Http\\Controllers\\VenderController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/vender/{vender}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'vender.edit',
        'uses' => 'App\\Http\\Controllers\\VenderController@edit',
        'controller' => 'App\\Http\\Controllers\\VenderController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/vender/{vender}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'vender.update',
        'uses' => 'App\\Http\\Controllers\\VenderController@update',
        'controller' => 'App\\Http\\Controllers\\VenderController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vender.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/vender/{vender}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'vender.destroy',
        'uses' => 'App\\Http\\Controllers\\VenderController@destroy',
        'controller' => 'App\\Http\\Controllers\\VenderController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bank-account.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bank-account',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'bank-account.index',
        'uses' => 'App\\Http\\Controllers\\BankAccountController@index',
        'controller' => 'App\\Http\\Controllers\\BankAccountController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bank-account.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bank-account/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'bank-account.create',
        'uses' => 'App\\Http\\Controllers\\BankAccountController@create',
        'controller' => 'App\\Http\\Controllers\\BankAccountController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bank-account.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/bank-account',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'bank-account.store',
        'uses' => 'App\\Http\\Controllers\\BankAccountController@store',
        'controller' => 'App\\Http\\Controllers\\BankAccountController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bank-account.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bank-account/{bank_account}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'bank-account.show',
        'uses' => 'App\\Http\\Controllers\\BankAccountController@show',
        'controller' => 'App\\Http\\Controllers\\BankAccountController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bank-account.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bank-account/{bank_account}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'bank-account.edit',
        'uses' => 'App\\Http\\Controllers\\BankAccountController@edit',
        'controller' => 'App\\Http\\Controllers\\BankAccountController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bank-account.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/bank-account/{bank_account}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'bank-account.update',
        'uses' => 'App\\Http\\Controllers\\BankAccountController@update',
        'controller' => 'App\\Http\\Controllers\\BankAccountController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bank-account.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/bank-account/{bank_account}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'bank-account.destroy',
        'uses' => 'App\\Http\\Controllers\\BankAccountController@destroy',
        'controller' => 'App\\Http\\Controllers\\BankAccountController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transfer.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/transfer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'transfer.index',
        'uses' => 'App\\Http\\Controllers\\TransferController@index',
        'controller' => 'App\\Http\\Controllers\\TransferController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transfer.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/transfer/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'transfer.create',
        'uses' => 'App\\Http\\Controllers\\TransferController@create',
        'controller' => 'App\\Http\\Controllers\\TransferController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transfer.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/transfer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'transfer.store',
        'uses' => 'App\\Http\\Controllers\\TransferController@store',
        'controller' => 'App\\Http\\Controllers\\TransferController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transfer.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/transfer/{transfer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'transfer.show',
        'uses' => 'App\\Http\\Controllers\\TransferController@show',
        'controller' => 'App\\Http\\Controllers\\TransferController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transfer.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/transfer/{transfer}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'transfer.edit',
        'uses' => 'App\\Http\\Controllers\\TransferController@edit',
        'controller' => 'App\\Http\\Controllers\\TransferController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transfer.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/transfer/{transfer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'transfer.update',
        'uses' => 'App\\Http\\Controllers\\TransferController@update',
        'controller' => 'App\\Http\\Controllers\\TransferController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transfer.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/transfer/{transfer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'transfer.destroy',
        'uses' => 'App\\Http\\Controllers\\TransferController@destroy',
        'controller' => 'App\\Http\\Controllers\\TransferController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transaction.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/transaction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\TransactionController@index',
        'controller' => 'App\\Http\\Controllers\\TransactionController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'transaction.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transaction.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/transaction/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\TransactionController@get',
        'controller' => 'App\\Http\\Controllers\\TransactionController@get',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'transaction.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'defaults.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/defaults',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'defaults.index',
        'uses' => 'App\\Http\\Controllers\\DefaultValueController@index',
        'controller' => 'App\\Http\\Controllers\\DefaultValueController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'defaults.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/defaults/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'defaults.create',
        'uses' => 'App\\Http\\Controllers\\DefaultValueController@create',
        'controller' => 'App\\Http\\Controllers\\DefaultValueController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'defaults.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/defaults',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'defaults.store',
        'uses' => 'App\\Http\\Controllers\\DefaultValueController@store',
        'controller' => 'App\\Http\\Controllers\\DefaultValueController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'defaults.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/defaults/{default}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'defaults.show',
        'uses' => 'App\\Http\\Controllers\\DefaultValueController@show',
        'controller' => 'App\\Http\\Controllers\\DefaultValueController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'defaults.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/defaults/{default}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'defaults.edit',
        'uses' => 'App\\Http\\Controllers\\DefaultValueController@edit',
        'controller' => 'App\\Http\\Controllers\\DefaultValueController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'defaults.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/defaults/{default}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'defaults.update',
        'uses' => 'App\\Http\\Controllers\\DefaultValueController@update',
        'controller' => 'App\\Http\\Controllers\\DefaultValueController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'defaults.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/defaults/{default}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'defaults.destroy',
        'uses' => 'App\\Http\\Controllers\\DefaultValueController@destroy',
        'controller' => 'App\\Http\\Controllers\\DefaultValueController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'initial-setup.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/initial-setup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@index',
        'controller' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@index',
        'as' => 'initial-setup.index',
        'namespace' => NULL,
        'prefix' => 'app/initial-setup',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'initial-setup.revenue' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'app/initial-setup/revenue',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@revenue',
        'controller' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@revenue',
        'as' => 'initial-setup.revenue',
        'namespace' => NULL,
        'prefix' => 'app/initial-setup',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'initial-setup.expense' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'app/initial-setup/expense',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@expense',
        'controller' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@expense',
        'as' => 'initial-setup.expense',
        'namespace' => NULL,
        'prefix' => 'app/initial-setup',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'initial-setup.product-category' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'app/initial-setup/product-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@product_category',
        'controller' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@product_category',
        'as' => 'initial-setup.product-category',
        'namespace' => NULL,
        'prefix' => 'app/initial-setup',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'initial-setup.unit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'app/initial-setup/unit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@unit',
        'controller' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@unit',
        'as' => 'initial-setup.unit',
        'namespace' => NULL,
        'prefix' => 'app/initial-setup',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'initial-setup.tax' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'app/initial-setup/tax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@tax',
        'controller' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@tax',
        'as' => 'initial-setup.tax',
        'namespace' => NULL,
        'prefix' => 'app/initial-setup',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'initial-setup.method' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'app/initial-setup/payment-method',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@paymentMethod',
        'controller' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@paymentMethod',
        'as' => 'initial-setup.method',
        'namespace' => NULL,
        'prefix' => 'app/initial-setup',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'initial-setup.complete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/initial-setup/complete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@complete',
        'controller' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@complete',
        'as' => 'initial-setup.complete',
        'namespace' => NULL,
        'prefix' => 'app/initial-setup',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'initial-setup.skip' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/initial-setup/skip',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@skip',
        'controller' => 'App\\Http\\Controllers\\Auth\\PostRegisterController@skip',
        'as' => 'initial-setup.skip',
        'namespace' => NULL,
        'prefix' => 'app/initial-setup',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'taxes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/taxes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'taxes.index',
        'uses' => 'App\\Http\\Controllers\\TaxController@index',
        'controller' => 'App\\Http\\Controllers\\TaxController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'taxes.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/taxes/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'taxes.create',
        'uses' => 'App\\Http\\Controllers\\TaxController@create',
        'controller' => 'App\\Http\\Controllers\\TaxController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'taxes.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/taxes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'taxes.store',
        'uses' => 'App\\Http\\Controllers\\TaxController@store',
        'controller' => 'App\\Http\\Controllers\\TaxController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'taxes.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/taxes/{tax}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'taxes.show',
        'uses' => 'App\\Http\\Controllers\\TaxController@show',
        'controller' => 'App\\Http\\Controllers\\TaxController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'taxes.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/taxes/{tax}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'taxes.edit',
        'uses' => 'App\\Http\\Controllers\\TaxController@edit',
        'controller' => 'App\\Http\\Controllers\\TaxController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'taxes.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/taxes/{tax}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'taxes.update',
        'uses' => 'App\\Http\\Controllers\\TaxController@update',
        'controller' => 'App\\Http\\Controllers\\TaxController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'taxes.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/taxes/{tax}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'taxes.destroy',
        'uses' => 'App\\Http\\Controllers\\TaxController@destroy',
        'controller' => 'App\\Http\\Controllers\\TaxController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product-category.suggestion' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/product-category/suggestion',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductServiceCategoryController@createSuggestions',
        'controller' => 'App\\Http\\Controllers\\ProductServiceCategoryController@createSuggestions',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'product-category.suggestion',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/{type}/category/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductServiceCategoryController@get',
        'controller' => 'App\\Http\\Controllers\\ProductServiceCategoryController@get',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'category.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/{type}/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'category.index',
        'uses' => 'App\\Http\\Controllers\\ProductServiceCategoryController@index',
        'controller' => 'App\\Http\\Controllers\\ProductServiceCategoryController@index',
        'namespace' => NULL,
        'prefix' => 'app/{type}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/{type}/category/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'category.create',
        'uses' => 'App\\Http\\Controllers\\ProductServiceCategoryController@create',
        'controller' => 'App\\Http\\Controllers\\ProductServiceCategoryController@create',
        'namespace' => NULL,
        'prefix' => 'app/{type}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/{type}/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'category.store',
        'uses' => 'App\\Http\\Controllers\\ProductServiceCategoryController@store',
        'controller' => 'App\\Http\\Controllers\\ProductServiceCategoryController@store',
        'namespace' => NULL,
        'prefix' => 'app/{type}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/{type}/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'category.show',
        'uses' => 'App\\Http\\Controllers\\ProductServiceCategoryController@show',
        'controller' => 'App\\Http\\Controllers\\ProductServiceCategoryController@show',
        'namespace' => NULL,
        'prefix' => 'app/{type}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/{type}/category/{category}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'category.edit',
        'uses' => 'App\\Http\\Controllers\\ProductServiceCategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\ProductServiceCategoryController@edit',
        'namespace' => NULL,
        'prefix' => 'app/{type}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/{type}/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'category.update',
        'uses' => 'App\\Http\\Controllers\\ProductServiceCategoryController@update',
        'controller' => 'App\\Http\\Controllers\\ProductServiceCategoryController@update',
        'namespace' => NULL,
        'prefix' => 'app/{type}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/{type}/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'category.destroy',
        'uses' => 'App\\Http\\Controllers\\ProductServiceCategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\ProductServiceCategoryController@destroy',
        'namespace' => NULL,
        'prefix' => 'app/{type}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product-unit.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/product-unit/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductServiceUnitController@get',
        'controller' => 'App\\Http\\Controllers\\ProductServiceUnitController@get',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'product-unit.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product-unit.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/product-unit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'product-unit.index',
        'uses' => 'App\\Http\\Controllers\\ProductServiceUnitController@index',
        'controller' => 'App\\Http\\Controllers\\ProductServiceUnitController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product-unit.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/product-unit/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'product-unit.create',
        'uses' => 'App\\Http\\Controllers\\ProductServiceUnitController@create',
        'controller' => 'App\\Http\\Controllers\\ProductServiceUnitController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product-unit.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/product-unit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'product-unit.store',
        'uses' => 'App\\Http\\Controllers\\ProductServiceUnitController@store',
        'controller' => 'App\\Http\\Controllers\\ProductServiceUnitController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product-unit.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/product-unit/{product_unit}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'product-unit.show',
        'uses' => 'App\\Http\\Controllers\\ProductServiceUnitController@show',
        'controller' => 'App\\Http\\Controllers\\ProductServiceUnitController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product-unit.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/product-unit/{product_unit}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'product-unit.edit',
        'uses' => 'App\\Http\\Controllers\\ProductServiceUnitController@edit',
        'controller' => 'App\\Http\\Controllers\\ProductServiceUnitController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product-unit.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/product-unit/{product_unit}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'product-unit.update',
        'uses' => 'App\\Http\\Controllers\\ProductServiceUnitController@update',
        'controller' => 'App\\Http\\Controllers\\ProductServiceUnitController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product-unit.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/product-unit/{product_unit}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'product-unit.destroy',
        'uses' => 'App\\Http\\Controllers\\ProductServiceUnitController@destroy',
        'controller' => 'App\\Http\\Controllers\\ProductServiceUnitController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment-method.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/payment-method/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentMethodController@get',
        'controller' => 'App\\Http\\Controllers\\PaymentMethodController@get',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'payment-method.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment-method.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/payment-method',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'payment-method.index',
        'uses' => 'App\\Http\\Controllers\\PaymentMethodController@index',
        'controller' => 'App\\Http\\Controllers\\PaymentMethodController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment-method.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/payment-method/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'payment-method.create',
        'uses' => 'App\\Http\\Controllers\\PaymentMethodController@create',
        'controller' => 'App\\Http\\Controllers\\PaymentMethodController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment-method.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/payment-method',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'payment-method.store',
        'uses' => 'App\\Http\\Controllers\\PaymentMethodController@store',
        'controller' => 'App\\Http\\Controllers\\PaymentMethodController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment-method.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/payment-method/{payment_method}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'payment-method.show',
        'uses' => 'App\\Http\\Controllers\\PaymentMethodController@show',
        'controller' => 'App\\Http\\Controllers\\PaymentMethodController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment-method.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/payment-method/{payment_method}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'payment-method.edit',
        'uses' => 'App\\Http\\Controllers\\PaymentMethodController@edit',
        'controller' => 'App\\Http\\Controllers\\PaymentMethodController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment-method.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/payment-method/{payment_method}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'payment-method.update',
        'uses' => 'App\\Http\\Controllers\\PaymentMethodController@update',
        'controller' => 'App\\Http\\Controllers\\PaymentMethodController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment-method.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/payment-method/{payment_method}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'payment-method.destroy',
        'uses' => 'App\\Http\\Controllers\\PaymentMethodController@destroy',
        'controller' => 'App\\Http\\Controllers\\PaymentMethodController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'order.create.ajax' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/order/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\api\\OrderController@create',
        'controller' => 'App\\Http\\Controllers\\api\\OrderController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'order.create.ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/invoice/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@get',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@get',
        'as' => 'invoice.get',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.credit.note' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/invoice/{id}/credit-note',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\CreditNoteController@create',
        'controller' => 'App\\Http\\Controllers\\CreditNoteController@create',
        'as' => 'invoice.credit.note',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.credit.note.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/invoice/{id}/credit-note',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\CreditNoteController@store',
        'controller' => 'App\\Http\\Controllers\\CreditNoteController@store',
        'as' => 'invoice.credit.note.store',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.edit.credit.note' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/invoice/{id}/credit-note/edit/{cn_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\CreditNoteController@edit',
        'controller' => 'App\\Http\\Controllers\\CreditNoteController@edit',
        'as' => 'invoice.edit.credit.note',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.update.credit.note' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/invoice/{id}/credit-note/edit/{cn_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\CreditNoteController@update',
        'controller' => 'App\\Http\\Controllers\\CreditNoteController@update',
        'as' => 'invoice.update.credit.note',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.destroy.credit.note' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/invoice/{id}/credit-note/delete/{cn_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\CreditNoteController@destroy',
        'controller' => 'App\\Http\\Controllers\\CreditNoteController@destroy',
        'as' => 'invoice.destroy.credit.note',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.duplicate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/invoice/{id}/duplicate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@duplicate',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@duplicate',
        'as' => 'invoice.duplicate',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.shipping.print' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/invoice/{id}/shipping/print',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@shippingDisplay',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@shippingDisplay',
        'as' => 'invoice.shipping.print',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.sent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/invoice/{id}/sent',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@sent',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@sent',
        'as' => 'invoice.sent',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.payment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/invoice/{id}/payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoicePaymentController@create',
        'controller' => 'App\\Http\\Controllers\\InvoicePaymentController@create',
        'as' => 'invoice.payment',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.payment.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/invoice/{id}/payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoicePaymentController@store',
        'controller' => 'App\\Http\\Controllers\\InvoicePaymentController@store',
        'as' => 'invoice.payment.create',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.payment.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/invoice/{id}/payment/{pid}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoicePaymentController@destroy',
        'controller' => 'App\\Http\\Controllers\\InvoicePaymentController@destroy',
        'as' => 'invoice.payment.destroy',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.payment.reminder' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/invoice/{id}/payment/reminder',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoicePaymentController@reminder',
        'controller' => 'App\\Http\\Controllers\\InvoicePaymentController@reminder',
        'as' => 'invoice.payment.reminder',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.customer' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/invoice/customer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@customer',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@customer',
        'as' => 'invoice.customer',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/invoice/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@export',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@export',
        'as' => 'invoice.export',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.import' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/invoice/import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@import',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@import',
        'as' => 'invoice.import',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.import.headings' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/invoice/import/headings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@getImportHeadings',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@getImportHeadings',
        'as' => 'invoice.import.headings',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.import.store' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/invoice/import/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@storeImport',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@storeImport',
        'as' => 'invoice.import.store',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.product.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/invoice/product/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@productDestroy',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@productDestroy',
        'as' => 'invoice.product.destroy',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.product.sku' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/invoice/product/SKU',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@productBySKU',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@productBySKU',
        'as' => 'invoice.product.sku',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.product' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/invoice/product',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@product',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@product',
        'as' => 'invoice.product',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.picked-up' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/invoice/{id}/picked-up',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceStatusController@PickedUp',
        'controller' => 'App\\Http\\Controllers\\InvoiceStatusController@PickedUp',
        'as' => 'invoice.picked-up',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.prepared' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/invoice/{id}/prepared',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceStatusController@Prepared',
        'controller' => 'App\\Http\\Controllers\\InvoiceStatusController@Prepared',
        'as' => 'invoice.prepared',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.delivering' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/invoice/{id}/delivering',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceStatusController@Delivering',
        'controller' => 'App\\Http\\Controllers\\InvoiceStatusController@Delivering',
        'as' => 'invoice.delivering',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.delivered' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/invoice/{id}/delivered',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceStatusController@Delivered',
        'controller' => 'App\\Http\\Controllers\\InvoiceStatusController@Delivered',
        'as' => 'invoice.delivered',
        'namespace' => NULL,
        'prefix' => 'app/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/invoice',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'invoice.index',
        'uses' => 'App\\Http\\Controllers\\InvoiceController@index',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/invoice/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'invoice.create',
        'uses' => 'App\\Http\\Controllers\\InvoiceController@create',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/invoice',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'invoice.store',
        'uses' => 'App\\Http\\Controllers\\InvoiceController@store',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/invoice/{invoice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'invoice.show',
        'uses' => 'App\\Http\\Controllers\\InvoiceController@show',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/invoice/{invoice}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'invoice.edit',
        'uses' => 'App\\Http\\Controllers\\InvoiceController@edit',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/invoice/{invoice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'invoice.update',
        'uses' => 'App\\Http\\Controllers\\InvoiceController@update',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/invoice/{invoice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'invoice.destroy',
        'uses' => 'App\\Http\\Controllers\\InvoiceController@destroy',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'template.setting' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/invoices/template/setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@saveTemplateSettings',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@saveTemplateSettings',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'template.setting',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'credit.note' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/credit-note',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\CreditNoteController@index',
        'controller' => 'App\\Http\\Controllers\\CreditNoteController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'credit.note',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'credit.note.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/credit-note/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\CreditNoteController@get',
        'controller' => 'App\\Http\\Controllers\\CreditNoteController@get',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'credit.note.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.custom.credit.note' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/custom-credit-note',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\CreditNoteController@customCreate',
        'controller' => 'App\\Http\\Controllers\\CreditNoteController@customCreate',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'invoice.custom.credit.note',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.custom.credit.note.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/custom-credit-note',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\CreditNoteController@customStore',
        'controller' => 'App\\Http\\Controllers\\CreditNoteController@customStore',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'invoice.custom.credit.note.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get.invoice.credit.note' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/credit-note/invoice',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\CreditNoteController@getinvoice',
        'controller' => 'App\\Http\\Controllers\\CreditNoteController@getinvoice',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'get.invoice.credit.note',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'revenue.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/revenue/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\RevenueController@export',
        'controller' => 'App\\Http\\Controllers\\RevenueController@export',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'revenue.export',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'revenue.import' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/revenue/import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\RevenueController@import',
        'controller' => 'App\\Http\\Controllers\\RevenueController@import',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'revenue.import',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'revenue.import.headings' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/revenue/import/heading',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\RevenueController@getImportHeadings',
        'controller' => 'App\\Http\\Controllers\\RevenueController@getImportHeadings',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'revenue.import.headings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'revenue.import.store' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/revenue/import/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\RevenueController@storeImport',
        'controller' => 'App\\Http\\Controllers\\RevenueController@storeImport',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'revenue.import.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'revenue.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'app/revenue/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\RevenueController@get',
        'controller' => 'App\\Http\\Controllers\\RevenueController@get',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'revenue.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'revenue.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/revenue',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'revenue.index',
        'uses' => 'App\\Http\\Controllers\\RevenueController@index',
        'controller' => 'App\\Http\\Controllers\\RevenueController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'revenue.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/revenue/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'revenue.create',
        'uses' => 'App\\Http\\Controllers\\RevenueController@create',
        'controller' => 'App\\Http\\Controllers\\RevenueController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'revenue.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/revenue',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'revenue.store',
        'uses' => 'App\\Http\\Controllers\\RevenueController@store',
        'controller' => 'App\\Http\\Controllers\\RevenueController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'revenue.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/revenue/{revenue}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'revenue.show',
        'uses' => 'App\\Http\\Controllers\\RevenueController@show',
        'controller' => 'App\\Http\\Controllers\\RevenueController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'revenue.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/revenue/{revenue}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'revenue.edit',
        'uses' => 'App\\Http\\Controllers\\RevenueController@edit',
        'controller' => 'App\\Http\\Controllers\\RevenueController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'revenue.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/revenue/{revenue}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'revenue.update',
        'uses' => 'App\\Http\\Controllers\\RevenueController@update',
        'controller' => 'App\\Http\\Controllers\\RevenueController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'revenue.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/revenue/{revenue}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'revenue.destroy',
        'uses' => 'App\\Http\\Controllers\\RevenueController@destroy',
        'controller' => 'App\\Http\\Controllers\\RevenueController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/bill/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@get',
        'controller' => 'App\\Http\\Controllers\\BillController@get',
        'as' => 'bill.get',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.debit.note' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bill/{id}/debit-note',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DebitNoteController@create',
        'controller' => 'App\\Http\\Controllers\\DebitNoteController@create',
        'as' => 'bill.debit.note',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.debit.note.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/bill/{id}/debit-note',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DebitNoteController@store',
        'controller' => 'App\\Http\\Controllers\\DebitNoteController@store',
        'as' => 'bill.debit.note.store',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.edit.debit.note' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bill/{id}/debit-note/edit/{cn_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DebitNoteController@edit',
        'controller' => 'App\\Http\\Controllers\\DebitNoteController@edit',
        'as' => 'bill.edit.debit.note',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.update.debit.note' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/bill/{id}/debit-note/edit/{cn_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DebitNoteController@update',
        'controller' => 'App\\Http\\Controllers\\DebitNoteController@update',
        'as' => 'bill.update.debit.note',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.delete.debit.note' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/bill/{id}/debit-note/delete/{cn_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DebitNoteController@destroy',
        'controller' => 'App\\Http\\Controllers\\DebitNoteController@destroy',
        'as' => 'bill.delete.debit.note',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.duplicate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bill/{id}/duplicate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@duplicate',
        'controller' => 'App\\Http\\Controllers\\BillController@duplicate',
        'as' => 'bill.duplicate',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.shipping.print' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bill/{id}/shipping/print',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@shippingDisplay',
        'controller' => 'App\\Http\\Controllers\\BillController@shippingDisplay',
        'as' => 'bill.shipping.print',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.sent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bill/{id}/sent',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@sent',
        'controller' => 'App\\Http\\Controllers\\BillController@sent',
        'as' => 'bill.sent',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.payment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bill/{id}/payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@payment',
        'controller' => 'App\\Http\\Controllers\\BillController@payment',
        'as' => 'bill.payment',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.payment.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/bill/{id}/payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@createPayment',
        'controller' => 'App\\Http\\Controllers\\BillController@createPayment',
        'as' => 'bill.payment.create',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.payment.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/bill/{id}/payment/{pid}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@paymentDestroy',
        'controller' => 'App\\Http\\Controllers\\BillController@paymentDestroy',
        'as' => 'bill.payment.destroy',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bill/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@export',
        'controller' => 'App\\Http\\Controllers\\BillController@export',
        'as' => 'bill.export',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.import' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bill/import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@import',
        'controller' => 'App\\Http\\Controllers\\BillController@import',
        'as' => 'bill.import',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.import.headings' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/bill/import/headings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@getImportHeadings',
        'controller' => 'App\\Http\\Controllers\\BillController@getImportHeadings',
        'as' => 'bill.import.headings',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.import.store' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/bill/import/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@storeImport',
        'controller' => 'App\\Http\\Controllers\\BillController@storeImport',
        'as' => 'bill.import.store',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.product.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/bill/product/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@productDestroy',
        'controller' => 'App\\Http\\Controllers\\BillController@productDestroy',
        'as' => 'bill.product.destroy',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.product' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/bill/product',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@product',
        'controller' => 'App\\Http\\Controllers\\BillController@product',
        'as' => 'bill.product',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.vender' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/bill/vender',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@vender',
        'controller' => 'App\\Http\\Controllers\\BillController@vender',
        'as' => 'bill.vender',
        'namespace' => NULL,
        'prefix' => 'app/bill',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bill',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'bill.index',
        'uses' => 'App\\Http\\Controllers\\BillController@index',
        'controller' => 'App\\Http\\Controllers\\BillController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bill/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'bill.create',
        'uses' => 'App\\Http\\Controllers\\BillController@create',
        'controller' => 'App\\Http\\Controllers\\BillController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/bill',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'bill.store',
        'uses' => 'App\\Http\\Controllers\\BillController@store',
        'controller' => 'App\\Http\\Controllers\\BillController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bill/{bill}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'bill.show',
        'uses' => 'App\\Http\\Controllers\\BillController@show',
        'controller' => 'App\\Http\\Controllers\\BillController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bill/{bill}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'bill.edit',
        'uses' => 'App\\Http\\Controllers\\BillController@edit',
        'controller' => 'App\\Http\\Controllers\\BillController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/bill/{bill}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'bill.update',
        'uses' => 'App\\Http\\Controllers\\BillController@update',
        'controller' => 'App\\Http\\Controllers\\BillController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/bill/{bill}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'bill.destroy',
        'uses' => 'App\\Http\\Controllers\\BillController@destroy',
        'controller' => 'App\\Http\\Controllers\\BillController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.template.setting' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/bill/template/setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@saveBillTemplateSettings',
        'controller' => 'App\\Http\\Controllers\\BillController@saveBillTemplateSettings',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'bill.template.setting',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debit.note' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/debit-note',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DebitNoteController@index',
        'controller' => 'App\\Http\\Controllers\\DebitNoteController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'debit.note',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debit.note.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/debit-note/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DebitNoteController@get',
        'controller' => 'App\\Http\\Controllers\\DebitNoteController@get',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'debit.note.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.custom.debit.note' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/custom-debit-note',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DebitNoteController@customCreate',
        'controller' => 'App\\Http\\Controllers\\DebitNoteController@customCreate',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'bill.custom.debit.note',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.custom.debit.note.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/custom-debit-note',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DebitNoteController@customStore',
        'controller' => 'App\\Http\\Controllers\\DebitNoteController@customStore',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'bill.custom.debit.note.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.get.debit.note' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/debit-note/bill',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DebitNoteController@getbill',
        'controller' => 'App\\Http\\Controllers\\DebitNoteController@getbill',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'bill.get.debit.note',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/payment/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@export',
        'controller' => 'App\\Http\\Controllers\\PaymentController@export',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'payment.export',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.import' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/payment/import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@import',
        'controller' => 'App\\Http\\Controllers\\PaymentController@import',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'payment.import',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.import.headings' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/payment/import/heading',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@getImportHeadings',
        'controller' => 'App\\Http\\Controllers\\PaymentController@getImportHeadings',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'payment.import.headings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.import.store' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/payment/import/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@storeImport',
        'controller' => 'App\\Http\\Controllers\\PaymentController@storeImport',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'payment.import.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/payment/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@get',
        'controller' => 'App\\Http\\Controllers\\PaymentController@get',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'payment.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'payment.index',
        'uses' => 'App\\Http\\Controllers\\PaymentController@index',
        'controller' => 'App\\Http\\Controllers\\PaymentController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/payment/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'payment.create',
        'uses' => 'App\\Http\\Controllers\\PaymentController@create',
        'controller' => 'App\\Http\\Controllers\\PaymentController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'payment.store',
        'uses' => 'App\\Http\\Controllers\\PaymentController@store',
        'controller' => 'App\\Http\\Controllers\\PaymentController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/payment/{payment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'payment.show',
        'uses' => 'App\\Http\\Controllers\\PaymentController@show',
        'controller' => 'App\\Http\\Controllers\\PaymentController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/payment/{payment}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'payment.edit',
        'uses' => 'App\\Http\\Controllers\\PaymentController@edit',
        'controller' => 'App\\Http\\Controllers\\PaymentController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/payment/{payment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'payment.update',
        'uses' => 'App\\Http\\Controllers\\PaymentController@update',
        'controller' => 'App\\Http\\Controllers\\PaymentController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/payment/{payment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'payment.destroy',
        'uses' => 'App\\Http\\Controllers\\PaymentController@destroy',
        'controller' => 'App\\Http\\Controllers\\PaymentController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'expenses.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/expenses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'expenses.index',
        'uses' => 'App\\Http\\Controllers\\ExpenseController@index',
        'controller' => 'App\\Http\\Controllers\\ExpenseController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'expenses.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/expenses/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'expenses.create',
        'uses' => 'App\\Http\\Controllers\\ExpenseController@create',
        'controller' => 'App\\Http\\Controllers\\ExpenseController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'expenses.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/expenses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'expenses.store',
        'uses' => 'App\\Http\\Controllers\\ExpenseController@store',
        'controller' => 'App\\Http\\Controllers\\ExpenseController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'expenses.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/expenses/{expense}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'expenses.show',
        'uses' => 'App\\Http\\Controllers\\ExpenseController@show',
        'controller' => 'App\\Http\\Controllers\\ExpenseController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'expenses.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/expenses/{expense}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'expenses.edit',
        'uses' => 'App\\Http\\Controllers\\ExpenseController@edit',
        'controller' => 'App\\Http\\Controllers\\ExpenseController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'expenses.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/expenses/{expense}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'expenses.update',
        'uses' => 'App\\Http\\Controllers\\ExpenseController@update',
        'controller' => 'App\\Http\\Controllers\\ExpenseController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'expenses.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/expenses/{expense}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'expenses.destroy',
        'uses' => 'App\\Http\\Controllers\\ExpenseController@destroy',
        'controller' => 'App\\Http\\Controllers\\ExpenseController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'plan.expired' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/plans/expired',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\PlanController@expired',
        'controller' => 'App\\Http\\Controllers\\PlanController@expired',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'plan.expired',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'plans.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/plans',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'plans.index',
        'uses' => 'App\\Http\\Controllers\\PlanController@index',
        'controller' => 'App\\Http\\Controllers\\PlanController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'plans.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/plans/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'plans.create',
        'uses' => 'App\\Http\\Controllers\\PlanController@create',
        'controller' => 'App\\Http\\Controllers\\PlanController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'plans.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/plans',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'plans.store',
        'uses' => 'App\\Http\\Controllers\\PlanController@store',
        'controller' => 'App\\Http\\Controllers\\PlanController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'plans.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/plans/{plan}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'plans.show',
        'uses' => 'App\\Http\\Controllers\\PlanController@show',
        'controller' => 'App\\Http\\Controllers\\PlanController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'plans.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/plans/{plan}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'plans.edit',
        'uses' => 'App\\Http\\Controllers\\PlanController@edit',
        'controller' => 'App\\Http\\Controllers\\PlanController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'plans.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/plans/{plan}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'plans.update',
        'uses' => 'App\\Http\\Controllers\\PlanController@update',
        'controller' => 'App\\Http\\Controllers\\PlanController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'plans.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/plans/{plan}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'plans.destroy',
        'uses' => 'App\\Http\\Controllers\\PlanController@destroy',
        'controller' => 'App\\Http\\Controllers\\PlanController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'order.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/orders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\MidtransPaymentController@index',
        'controller' => 'App\\Http\\Controllers\\MidtransPaymentController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'order.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'purchase' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/purchase/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\MidtransPaymentController@showOrder',
        'controller' => 'App\\Http\\Controllers\\MidtransPaymentController@showOrder',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'purchase',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'order.pay' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/midtrans',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\MidtransPaymentController@payPlan',
        'controller' => 'App\\Http\\Controllers\\MidtransPaymentController@payPlan',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'order.pay',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'coupons.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/coupons',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'coupons.index',
        'uses' => 'App\\Http\\Controllers\\CouponController@index',
        'controller' => 'App\\Http\\Controllers\\CouponController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'coupons.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/coupons/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'coupons.create',
        'uses' => 'App\\Http\\Controllers\\CouponController@create',
        'controller' => 'App\\Http\\Controllers\\CouponController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'coupons.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/coupons',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'coupons.store',
        'uses' => 'App\\Http\\Controllers\\CouponController@store',
        'controller' => 'App\\Http\\Controllers\\CouponController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'coupons.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/coupons/{coupon}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'coupons.show',
        'uses' => 'App\\Http\\Controllers\\CouponController@show',
        'controller' => 'App\\Http\\Controllers\\CouponController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'coupons.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/coupons/{coupon}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'coupons.edit',
        'uses' => 'App\\Http\\Controllers\\CouponController@edit',
        'controller' => 'App\\Http\\Controllers\\CouponController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'coupons.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/coupons/{coupon}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'coupons.update',
        'uses' => 'App\\Http\\Controllers\\CouponController@update',
        'controller' => 'App\\Http\\Controllers\\CouponController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'coupons.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/coupons/{coupon}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'coupons.destroy',
        'uses' => 'App\\Http\\Controllers\\CouponController@destroy',
        'controller' => 'App\\Http\\Controllers\\CouponController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.income.summary' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/report/income-summary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@incomeSummary',
        'controller' => 'App\\Http\\Controllers\\ReportController@incomeSummary',
        'as' => 'report.income.summary',
        'namespace' => NULL,
        'prefix' => 'app/report',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.expense.summary' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/report/expense-summary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@expenseSummary',
        'controller' => 'App\\Http\\Controllers\\ReportController@expenseSummary',
        'as' => 'report.expense.summary',
        'namespace' => NULL,
        'prefix' => 'app/report',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.income.vs.expense.summary' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/report/income-vs-expense-summary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@incomeVsExpenseSummary',
        'controller' => 'App\\Http\\Controllers\\ReportController@incomeVsExpenseSummary',
        'as' => 'report.income.vs.expense.summary',
        'namespace' => NULL,
        'prefix' => 'app/report',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.tax.summary' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/report/tax-summary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@taxSummary',
        'controller' => 'App\\Http\\Controllers\\ReportController@taxSummary',
        'as' => 'report.tax.summary',
        'namespace' => NULL,
        'prefix' => 'app/report',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.profit.loss.summary' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/report/profit-loss-summary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@profitLossSummary',
        'controller' => 'App\\Http\\Controllers\\ReportController@profitLossSummary',
        'as' => 'report.profit.loss.summary',
        'namespace' => NULL,
        'prefix' => 'app/report',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.invoice.summary' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/report/invoice-summary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@invoiceSummary',
        'controller' => 'App\\Http\\Controllers\\ReportController@invoiceSummary',
        'as' => 'report.invoice.summary',
        'namespace' => NULL,
        'prefix' => 'app/report',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.bill.summary' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/report/bill-summary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@billSummary',
        'controller' => 'App\\Http\\Controllers\\ReportController@billSummary',
        'as' => 'report.bill.summary',
        'namespace' => NULL,
        'prefix' => 'app/report',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.invoice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/report/invoice-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@invoiceReport',
        'controller' => 'App\\Http\\Controllers\\ReportController@invoiceReport',
        'as' => 'report.invoice',
        'namespace' => NULL,
        'prefix' => 'app/report',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.account.statement' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/report/account-statement-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@accountStatement',
        'controller' => 'App\\Http\\Controllers\\ReportController@accountStatement',
        'as' => 'report.account.statement',
        'namespace' => NULL,
        'prefix' => 'app/report',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/report/export/{name}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@export',
        'controller' => 'App\\Http\\Controllers\\ReportController@export',
        'as' => 'report.export',
        'namespace' => NULL,
        'prefix' => 'app/report',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'journal.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/journal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\JournalController@index',
        'controller' => 'App\\Http\\Controllers\\JournalController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'journal.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ledger.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/ledger',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\LedgerController@index',
        'controller' => 'App\\Http\\Controllers\\LedgerController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'ledger.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'balance-sheet.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/balance-sheet/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\BalanceSheetController@index',
        'controller' => 'App\\Http\\Controllers\\BalanceSheetController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'balance-sheet.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.status.change' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/proposal/{id}/status/change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProposalController@statusChange',
        'controller' => 'App\\Http\\Controllers\\ProposalController@statusChange',
        'as' => 'proposal.status.change',
        'namespace' => NULL,
        'prefix' => 'app/proposal',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.convert' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/proposal/{id}/convert',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProposalController@convert',
        'controller' => 'App\\Http\\Controllers\\ProposalController@convert',
        'as' => 'proposal.convert',
        'namespace' => NULL,
        'prefix' => 'app/proposal',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.duplicate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/proposal/{id}/duplicate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProposalController@duplicate',
        'controller' => 'App\\Http\\Controllers\\ProposalController@duplicate',
        'as' => 'proposal.duplicate',
        'namespace' => NULL,
        'prefix' => 'app/proposal',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.product.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/proposal/product/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProposalController@productDestroy',
        'controller' => 'App\\Http\\Controllers\\ProposalController@productDestroy',
        'as' => 'proposal.product.destroy',
        'namespace' => NULL,
        'prefix' => 'app/proposal',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.customer' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/proposal/customer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProposalController@customer',
        'controller' => 'App\\Http\\Controllers\\ProposalController@customer',
        'as' => 'proposal.customer',
        'namespace' => NULL,
        'prefix' => 'app/proposal',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.product' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/proposal/product',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProposalController@product',
        'controller' => 'App\\Http\\Controllers\\ProposalController@product',
        'as' => 'proposal.product',
        'namespace' => NULL,
        'prefix' => 'app/proposal',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.sent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/proposal/{id}/sent',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ProposalController@sent',
        'controller' => 'App\\Http\\Controllers\\ProposalController@sent',
        'as' => 'proposal.sent',
        'namespace' => NULL,
        'prefix' => 'app/proposal',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/proposal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'proposal.index',
        'uses' => 'App\\Http\\Controllers\\ProposalController@index',
        'controller' => 'App\\Http\\Controllers\\ProposalController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/proposal/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'proposal.create',
        'uses' => 'App\\Http\\Controllers\\ProposalController@create',
        'controller' => 'App\\Http\\Controllers\\ProposalController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/proposal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'proposal.store',
        'uses' => 'App\\Http\\Controllers\\ProposalController@store',
        'controller' => 'App\\Http\\Controllers\\ProposalController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/proposal/{proposal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'proposal.show',
        'uses' => 'App\\Http\\Controllers\\ProposalController@show',
        'controller' => 'App\\Http\\Controllers\\ProposalController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/proposal/{proposal}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'proposal.edit',
        'uses' => 'App\\Http\\Controllers\\ProposalController@edit',
        'controller' => 'App\\Http\\Controllers\\ProposalController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/proposal/{proposal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'proposal.update',
        'uses' => 'App\\Http\\Controllers\\ProposalController@update',
        'controller' => 'App\\Http\\Controllers\\ProposalController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/proposal/{proposal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'proposal.destroy',
        'uses' => 'App\\Http\\Controllers\\ProposalController@destroy',
        'controller' => 'App\\Http\\Controllers\\ProposalController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'goal.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/goal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'goal.index',
        'uses' => 'App\\Http\\Controllers\\GoalController@index',
        'controller' => 'App\\Http\\Controllers\\GoalController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'goal.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/goal/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'goal.create',
        'uses' => 'App\\Http\\Controllers\\GoalController@create',
        'controller' => 'App\\Http\\Controllers\\GoalController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'goal.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/goal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'goal.store',
        'uses' => 'App\\Http\\Controllers\\GoalController@store',
        'controller' => 'App\\Http\\Controllers\\GoalController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'goal.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/goal/{goal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'goal.show',
        'uses' => 'App\\Http\\Controllers\\GoalController@show',
        'controller' => 'App\\Http\\Controllers\\GoalController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'goal.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/goal/{goal}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'goal.edit',
        'uses' => 'App\\Http\\Controllers\\GoalController@edit',
        'controller' => 'App\\Http\\Controllers\\GoalController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'goal.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/goal/{goal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'goal.update',
        'uses' => 'App\\Http\\Controllers\\GoalController@update',
        'controller' => 'App\\Http\\Controllers\\GoalController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'goal.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/goal/{goal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'goal.destroy',
        'uses' => 'App\\Http\\Controllers\\GoalController@destroy',
        'controller' => 'App\\Http\\Controllers\\GoalController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-assets.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/account-assets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-assets.index',
        'uses' => 'App\\Http\\Controllers\\AssetController@index',
        'controller' => 'App\\Http\\Controllers\\AssetController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-assets.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/account-assets/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-assets.create',
        'uses' => 'App\\Http\\Controllers\\AssetController@create',
        'controller' => 'App\\Http\\Controllers\\AssetController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-assets.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/account-assets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-assets.store',
        'uses' => 'App\\Http\\Controllers\\AssetController@store',
        'controller' => 'App\\Http\\Controllers\\AssetController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-assets.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/account-assets/{account_asset}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-assets.show',
        'uses' => 'App\\Http\\Controllers\\AssetController@show',
        'controller' => 'App\\Http\\Controllers\\AssetController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-assets.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/account-assets/{account_asset}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-assets.edit',
        'uses' => 'App\\Http\\Controllers\\AssetController@edit',
        'controller' => 'App\\Http\\Controllers\\AssetController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-assets.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/account-assets/{account_asset}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-assets.update',
        'uses' => 'App\\Http\\Controllers\\AssetController@update',
        'controller' => 'App\\Http\\Controllers\\AssetController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-assets.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/account-assets/{account_asset}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-assets.destroy',
        'uses' => 'App\\Http\\Controllers\\AssetController@destroy',
        'controller' => 'App\\Http\\Controllers\\AssetController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-equities.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/account-equities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-equities.index',
        'uses' => 'App\\Http\\Controllers\\EquityController@index',
        'controller' => 'App\\Http\\Controllers\\EquityController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-equities.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/account-equities/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-equities.create',
        'uses' => 'App\\Http\\Controllers\\EquityController@create',
        'controller' => 'App\\Http\\Controllers\\EquityController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-equities.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/account-equities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-equities.store',
        'uses' => 'App\\Http\\Controllers\\EquityController@store',
        'controller' => 'App\\Http\\Controllers\\EquityController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-equities.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/account-equities/{account_equity}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-equities.show',
        'uses' => 'App\\Http\\Controllers\\EquityController@show',
        'controller' => 'App\\Http\\Controllers\\EquityController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-equities.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/account-equities/{account_equity}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-equities.edit',
        'uses' => 'App\\Http\\Controllers\\EquityController@edit',
        'controller' => 'App\\Http\\Controllers\\EquityController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-equities.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/account-equities/{account_equity}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-equities.update',
        'uses' => 'App\\Http\\Controllers\\EquityController@update',
        'controller' => 'App\\Http\\Controllers\\EquityController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-equities.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/account-equities/{account_equity}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-equities.destroy',
        'uses' => 'App\\Http\\Controllers\\EquityController@destroy',
        'controller' => 'App\\Http\\Controllers\\EquityController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-liabilities.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/account-liabilities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-liabilities.index',
        'uses' => 'App\\Http\\Controllers\\LiabilityController@index',
        'controller' => 'App\\Http\\Controllers\\LiabilityController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-liabilities.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/account-liabilities/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-liabilities.create',
        'uses' => 'App\\Http\\Controllers\\LiabilityController@create',
        'controller' => 'App\\Http\\Controllers\\LiabilityController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-liabilities.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/account-liabilities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-liabilities.store',
        'uses' => 'App\\Http\\Controllers\\LiabilityController@store',
        'controller' => 'App\\Http\\Controllers\\LiabilityController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-liabilities.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/account-liabilities/{account_liability}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-liabilities.show',
        'uses' => 'App\\Http\\Controllers\\LiabilityController@show',
        'controller' => 'App\\Http\\Controllers\\LiabilityController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-liabilities.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/account-liabilities/{account_liability}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-liabilities.edit',
        'uses' => 'App\\Http\\Controllers\\LiabilityController@edit',
        'controller' => 'App\\Http\\Controllers\\LiabilityController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-liabilities.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/account-liabilities/{account_liability}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-liabilities.update',
        'uses' => 'App\\Http\\Controllers\\LiabilityController@update',
        'controller' => 'App\\Http\\Controllers\\LiabilityController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account-liabilities.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/account-liabilities/{account_liability}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'account-liabilities.destroy',
        'uses' => 'App\\Http\\Controllers\\LiabilityController@destroy',
        'controller' => 'App\\Http\\Controllers\\LiabilityController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'custom-field.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/custom-field',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'custom-field.index',
        'uses' => 'App\\Http\\Controllers\\CustomFieldController@index',
        'controller' => 'App\\Http\\Controllers\\CustomFieldController@index',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'custom-field.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/custom-field/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'custom-field.create',
        'uses' => 'App\\Http\\Controllers\\CustomFieldController@create',
        'controller' => 'App\\Http\\Controllers\\CustomFieldController@create',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'custom-field.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/custom-field',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'custom-field.store',
        'uses' => 'App\\Http\\Controllers\\CustomFieldController@store',
        'controller' => 'App\\Http\\Controllers\\CustomFieldController@store',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'custom-field.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/custom-field/{custom_field}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'custom-field.show',
        'uses' => 'App\\Http\\Controllers\\CustomFieldController@show',
        'controller' => 'App\\Http\\Controllers\\CustomFieldController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'custom-field.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/custom-field/{custom_field}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'custom-field.edit',
        'uses' => 'App\\Http\\Controllers\\CustomFieldController@edit',
        'controller' => 'App\\Http\\Controllers\\CustomFieldController@edit',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'custom-field.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'app/custom-field/{custom_field}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'custom-field.update',
        'uses' => 'App\\Http\\Controllers\\CustomFieldController@update',
        'controller' => 'App\\Http\\Controllers\\CustomFieldController@update',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'custom-field.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'app/custom-field/{custom_field}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'as' => 'custom-field.destroy',
        'uses' => 'App\\Http\\Controllers\\CustomFieldController@destroy',
        'controller' => 'App\\Http\\Controllers\\CustomFieldController@destroy',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'syncData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/syncAllData',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@syncData',
        'controller' => 'App\\Http\\Controllers\\UserController@syncData',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'syncData',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NN8QWvQ9bJ85JX0j' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/dialog-empty-input',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DialogController@EmptyInput',
        'controller' => 'App\\Http\\Controllers\\DialogController@EmptyInput',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'generated::NN8QWvQ9bJ85JX0j',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::O2CxH7GROwlmM1bu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/dialog-status-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DialogController@StatusUpdate',
        'controller' => 'App\\Http\\Controllers\\DialogController@StatusUpdate',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'generated::O2CxH7GROwlmM1bu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6GMjlne6yr2xG2di' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/dialog-confirm-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\DialogController@ConfirmDelete',
        'controller' => 'App\\Http\\Controllers\\DialogController@ConfirmDelete',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'generated::6GMjlne6yr2xG2di',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'samples.import' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/samples/import/{name}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'xss',
          3 => 'verified',
          4 => 'plan',
        ),
        'uses' => 'App\\Http\\Controllers\\ImportSampleController@get',
        'controller' => 'App\\Http\\Controllers\\ImportSampleController@get',
        'as' => 'samples.import',
        'namespace' => NULL,
        'prefix' => 'app/samples',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.thermal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/invoice/thermal/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@thermal',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@thermal',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'invoice.thermal',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/invoice/pdf/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@invoice',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@invoice',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'invoice.pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.thermal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bill/thermal/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@thermal',
        'controller' => 'App\\Http\\Controllers\\BillController@thermal',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'bill.thermal',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bill/pdf/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@bill',
        'controller' => 'App\\Http\\Controllers\\BillController@bill',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'bill.pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/proposal/pdf/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\ProposalController@proposal',
        'controller' => 'App\\Http\\Controllers\\ProposalController@proposal',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'proposal.pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agreement.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/agreement/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'xss',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAgreementController@show',
        'controller' => 'App\\Http\\Controllers\\UserAgreementController@show',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'agreement.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1Un2bLoyDRsgFaab' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:294:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:76:"function () {
            return \\redirect()->route(\'user.login\');
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000006910000000000000000";}";s:4:"hash";s:44:"nyjiC1IvaWgMKW8GnWIJkae4ruuHCcbT+hPA2O840vs=";}}',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'generated::1Un2bLoyDRsgFaab',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XFjhsvaF8RfGKFrk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'generated::XFjhsvaF8RfGKFrk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.register' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'user.register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/password/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/password/reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verification.notice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/email/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\VerificationController@show',
        'controller' => 'App\\Http\\Controllers\\Auth\\VerificationController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'verification.notice',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verification.verify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/email/verify/{id}/{hash}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\VerificationController@verify',
        'controller' => 'App\\Http\\Controllers\\Auth\\VerificationController@verify',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'verification.verify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verification.resend' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/email/resend',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\VerificationController@resend',
        'controller' => 'App\\Http\\Controllers\\Auth\\VerificationController@resend',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'verification.resend',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/register/{lang?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'register.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/login/{lang?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'user.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'plans.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/plan/listAsync',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PlanController@getPlanAsync',
        'controller' => 'App\\Http\\Controllers\\PlanController@getPlanAsync',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'plans.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'change.langPass' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/password/reset/{lang?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLinkRequestForm',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'change.langPass',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update.password' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'app/change-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@updatePassword',
        'controller' => 'App\\Http\\Controllers\\UserController@updatePassword',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'update.password',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KQmaVb57JMQl6qM0' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/error/frontend',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\FrontEndErrorController@storeError',
        'controller' => 'App\\Http\\Controllers\\FrontEndErrorController@storeError',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'generated::KQmaVb57JMQl6qM0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.preview' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/invoices/preview/{template}/{color}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\InvoiceController@previewInvoice',
        'controller' => 'App\\Http\\Controllers\\InvoiceController@previewInvoice',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'invoice.preview',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bill.preview' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/bill/preview/{template}/{color}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\BillController@previewBill',
        'controller' => 'App\\Http\\Controllers\\BillController@previewBill',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'bill.preview',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8CWjDTocsFhksSGM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/midtrans/callback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\MidtransPaymentController@handlePaymentNotification',
        'controller' => 'App\\Http\\Controllers\\MidtransPaymentController@handlePaymentNotification',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'generated::8CWjDTocsFhksSGM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.preview' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/proposal/preview/{template}/{color}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ProposalController@previewProposal',
        'controller' => 'App\\Http\\Controllers\\ProposalController@previewProposal',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'proposal.preview',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proposal.template.setting' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'app/proposal/template/setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ProposalController@saveProposalTemplateSettings',
        'controller' => 'App\\Http\\Controllers\\ProposalController@saveProposalTemplateSettings',
        'namespace' => NULL,
        'prefix' => '/app',
        'where' => 
        array (
        ),
        'as' => 'proposal.template.setting',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
