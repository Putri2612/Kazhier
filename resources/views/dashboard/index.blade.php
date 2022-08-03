@extends('layouts.admin')
@section('page-title')
    {{__('Dashboard')}}
@endsection
@push('script-page')
    <script>
        const Canvas = {
            Cashflow        : document.querySelector('#cash-flow').getContext('2d'),
            IncomeExpense   : document.querySelector('#income-expense').getContext('2d'),
            DoughnutIncome  : document.querySelector('#chart-doughnut-income').getContext('2d'),
            DoughnutExpense : document.querySelector('#chart-doughnut-expense').getContext('2d'),
        }

        ChartsConstant.locale = '{{ Config::get('app.locale') }}';

        const ChartOptions = {
            line: {
                scales: {
                    yAxis: {
                        min: 0,
                        ticks: {
                            callback: ChartsConstant.Callbacks.ticks
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: ChartsConstant.Callbacks.tooltipsLabel
                        }
                    },
                    legend: {
                        display: true
                    }
                }
            },
            doughnut: {
                cutout: "75%",
                interaction:{
                    intersect: true,
                },
                legend: {
                    position: 'top',
                }, 
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: ChartsConstant.Callbacks.tooltipsDoughnut
                        }
                    }
                }
            }
        }

        const CreateCharts = {
            Line: ({context, labels, datasets}) => new Chart(context, { type: 'line', data: { labels: labels, datasets: datasets }, options: ChartOptions.line }),
            Doughnut: ({context, labels, datasets}) => new Chart(context, { type: 'doughnut', data: { datasets: datasets, labels: labels }, options: ChartOptions.doughnut }),
        }

        const DisplayCharts = {
            Cashflow: CreateCharts.Line({
                context: Canvas.Cashflow, 
                labels: @json($CashFlowChart['dates']), 
                datasets: @json($CashFlowChart['data'])
            }),
            IncomeExpense: CreateCharts.Line({
                context: Canvas.IncomeExpense, 
                labels: @json($IncomeExpenseChart['months']), 
                datasets: @json($IncomeExpenseChart['data'])
            }),

            DoughnutIncome: CreateCharts.Doughnut({
                context: Canvas.DoughnutIncome,
                labels: @json($incomeCategory), 
                datasets: [{
                    data: @json($incomeCategoryAmount),
                    backgroundColor: @json($incomeCategoryColor),
                }]
            }),
            DoughnutExpense: CreateCharts.Doughnut({
                context: Canvas.DoughnutExpense,
                labels: @json($expenseCategory), 
                datasets: [{
                    data: @json($expenseCategoryAmount),
                    backgroundColor: @json($expenseCategoryColor),
                }]
            }),
        }

        document.querySelectorAll('.underline-dropdown select').forEach(element => {
            element.addEventListener('change', event => {
                const target = event.currentTarget;
                // parse url
                let url = target.getAttribute('data-source');
                if(target.hasAttribute('data-name')) {
                    const values = {
                        month   : parseInt(document.querySelector('select[data-name="cashflow-month"]').value) + 1,
                        year    : document.querySelector('select[data-name="cashflow-year"]').value
                    };

                    url = url.replace(':year', values.year);
                    url = url.replace(':month', values.month);
                } else {
                    url = url.replace(':year', target.value);
                }
                
                fetch(url).then(response => {
                    if(response.ok) {
                        return response.json()
                    } else {
                        throw new Error(`{response.status}: {{__('Something bad happened')}}`)
                    }
                }).then(data => {
                    const targetName = target.getAttribute('data-target'),
                        targetChart = DisplayCharts[targetName];
                    if(targetName.includes('Doughnut')) {
                        const dataset = [{
                            data : data.amounts,
                            backgroundColor: data.colors
                        }];
                        targetChart.data.datasets = dataset;
                        targetChart.data.labels = data.categories;
                        
                        const type      = targetName.replace('Doughnut', '').toLowerCase(),
                            list        = document.querySelector(`.${type}-category-list`);
                        let priceFormat = "{{ Auth::user()->priceFormat(0) }}".replace('.', '').replace(',', '');
                        
                        let zeros = '';
                        for(let i = 0; i < priceFormat.match(/0/gi).length; i++) {
                            zeros += '0';
                        }

                        priceFormat = priceFormat.replace(zeros, '0');
                        
                        list.innerHTML = '';
                        data.categories.forEach((category, index) => {
                            const amount = new Intl.NumberFormat('{{ Config::get('app.locale') }}', { maximumSignificantDigits: 2 }).format(data.amounts[index]),
                                formattedAmount = priceFormat.replace('0', amount),
                                content = `<div class="text-end mt-10">
                                    <span class="graph-label" style="background-color: ${data.colors[index]}">${category}</span>
                                    <span>${formattedAmount}</span>
                                </div>`;
                            list.insertAdjacentHTML('beforeend', content);
                        });
                    } else {
                        targetChart.data.datasets   = data.data;
                        if(targetName.includes('Cashflow')) {
                            targetChart.data.labels   = data.dates;
                        } else if(targetName.includes('IncomeExpense')) {
                            targetChart.data.labels   = data.months
                        }
                    } 
                    targetChart.update();
                }).catch(error => {
                    console.error(error);
                })
            });
        });
    </script>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Dashboard')}}</h1>
        </div>
        @if(\Auth::user()->type=='company')
            <div class="row align-items-stretch">
                @if($constant['taxes']<=0)
                    <div class="col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                        <div class="alert alert-danger flex-grow-1 d-flex flex-column justify-content-between">
                            <div>
                                {{__('Please add taxes.')}}
                            </div>
                            <div class="text-end">
                                <a href="{{route('taxes.index')}}"><b>{{ucfirst(__('click here'))}}</b></a>
                            </div>
                        </div>
                    </div>
                @endif
                @foreach (['product-service', 'income', 'expense'] as $cat)
                    @if($constant['category'][$cat]<=0)
                        <div class="col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                            <div class="alert alert-danger flex-grow-1 d-flex flex-column justify-content-between">
                                @php
                                    $categ = str_replace('-', ' & ', $cat);
                                @endphp
                                <div>
                                    {{__("Please add {$categ} category.")}}
                                </div>
                                <div class="text-end">
                                    <a href="{{route('category.index', $cat)}}"><b>{{ucfirst(__('click here'))}}</b></a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @if($constant['units']<=0)
                    <div class="col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                        <div class="alert alert-danger flex-grow-1 d-flex flex-column justify-content-between">
                            <div>
                                {{__('Please add product & service unit.')}}
                            </div>
                            <div class="text-end">
                                <a href="{{route('product-unit.index')}}"><b>{{ucfirst(__('click here'))}}</b></a>
                            </div>
                        </div>
                    </div>
                @endif
                @if($constant['paymentMethod']<=0)
                    <div class="col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                        <div class="alert alert-danger flex-grow-1 d-flex flex-column justify-content-between">
                            <div>
                                {{__('Please add payment method.')}}
                            </div>
                            <div class="text-end">
                                <a href="{{route('payment-method.index')}}"><b>{{ucfirst(__('click here'))}}</b></a>
                            </div>
                        </div>
                    </div>
                @endif
                @if($constant['bankAccount']<=0)
                    <div class="col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                        <div class="alert alert-danger flex-grow-1 d-flex flex-column justify-content-between">
                            <div>
                                {{__('Please create bank account.')}}
                            </div>
                            <div class="text-end">
                                <a href="{{route('bank-account.index')}}"><b>{{ucfirst(__('click here'))}}</b></a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endif
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('customer.index') }}" class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('TOTAL CUSTOMERS')}}</h4>
                        </div>
                        <div class="card-body">
                            {{\Auth::user()->countCustomers()}}
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('vender.index') }}" class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('TOTAL VENDORS')}}</h4>
                        </div>
                        <div class="card-body">
                            {{\Auth::user()->countVenders()}}
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('invoice.index') }}" class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-money-bill-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('TOTAL INVOICES')}}</h4>
                        </div>
                        <div class="card-body">
                            {{\Auth::user()->countInvoices()}}
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('bill.index') }}" class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-money-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('TOTAL BILLS')}}</h4>
                        </div>
                        <div class="card-body">
                            {{\Auth::user()->countBills()}}
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-12 col-12 col-sm-12">
                <div>
                    <h4 class="fw-normal">{{__('Income Vs Expense')}}</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <div class="media-body">
                                    <div><h6>{{__('Income Today')}}</h6></div>
                                    <div class="media-right">{{\Auth::user()->priceFormat(\Auth::user()->todayIncome())}}</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-body">
                                    <div><h6>{{__('Expense Today')}}</h6></div>
                                    <div class="media-right">{{\Auth::user()->priceFormat(\Auth::user()->todayExpense())}}</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-body">
                                    <div><h6>{{__('Income This Month')}}</h6></div>
                                    <div class="media-right">{{\Auth::user()->priceFormat(\Auth::user()->incomeCurrentMonth())}}</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-body">
                                    <div><h6>{{__('Expense This Month')}}</h6></div>
                                    <div class="media-right">{{\Auth::user()->priceFormat(\Auth::user()->expenseCurrentMonth())}}</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-12 col-sm-12">
                <div class="row">
                    <h4 class="col-md-6 fw-normal">{{__('Cashflow')}}</h4>
                    <div class="col-md-6 fw-400 row justify-content-md-end align-items-end">
                        <div class="col-auto underline-dropdown">
                            {{ Form::select('cashflow_month',$months, date('n') - 1, array('class' => 'h5', 'data-source' => route('dashboard-chart.cashflow', ['month' => ':month', 'year' => ':year']), 'data-name' => 'cashflow-month', 'data-target' => 'Cashflow')) }}
                        </div>
                        <div class="col-auto underline-dropdown">
                            {{ Form::select('cashflow_year',$years, $currentYear, array('class' => 'h5', 'data-source' => route('dashboard-chart.cashflow', ['month' => ':month', 'year' => ':year']), 'data-name' => 'cashflow-year', 'data-target' => 'Cashflow')) }}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <canvas id="cash-flow" class="chartjs-render-monitor" height="310"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <h4 class="col-md-8 fw-normal">{{__('Income & Expense')}}</h4>
                    <div class="col-md-4 fw-400 row justify-content-md-end align-items-end">
                        <div class="col-auto underline-dropdown">
                            {{ Form::select('income_expense_year',$years, $currentYear, array('class' => 'h4', 'data-source' => route('dashboard-chart.income-expense', ['year' => ':year']), 'data-target' => 'IncomeExpense')) }}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <canvas id="income-expense" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                        <div class="row">
                            <h4 class="col-md-8 fw-normal">{{__('Income By Category')}}</h4>
                            <div class="col-md-4 fw-400 row justify-content-md-end align-items-end">
                                <div class="col-auto underline-dropdown">
                                    {{ Form::select('income_category_year',$years, $currentYear, array('class' => 'h4', 'data-source' => route('dashboard-chart.category', ['type' => 'income', 'year' => ':year']), 'data-target' => 'DoughnutIncome')) }}
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row flex-md-row-reverse align-items-md-center">
                                    <div class="col-12 col-md-4 income-category-list">
                                        @forelse($incomeCategory as $key=>$category)
                                            <div class="text-end mt-10">
                                                <span class="graph-label" style="background-color: {{$incomeCategoryColor[$key]}}">{{$category}}</span>
                                                <span>{{\Auth::user()->priceFormat($incomeCategoryAmount[$key])}}</span>
                                            </div>
                                        @empty
                                            <div class="text-center">
                                                <h6>{{__('there is no income by category')}}</h6>
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <canvas id="chart-doughnut-income" height="182"></canvas>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                        <div class="row">
                            <h4 class="col-md-8 fw-normal">{{__('Expense By Category')}}</h4>
                            <div class="col-md-4 fw-400 row justify-content-md-end align-items-end">
                                <div class="col-auto underline-dropdown">
                                    {{ Form::select('expense_category_year',$years, $currentYear, array('class' => 'h4', 'data-source' => route('dashboard-chart.category', ['type' => 'expense', 'year' => ':year']), 'data-target' => 'DoughnutExpense')) }}
                                </div>
                            </div>
                        </div>
                        <div class="card">                            
                            <div class="card-body">
                                <div class="row flex-md-row-reverse align-items-md-center">
                                    <div class="col-12 col-md-4 expense-category-list">
                                        @forelse($expenseCategory as $key=>$category)
                                            <div class="text-end mt-10">
                                                <span class="graph-label" style="background-color: {{$expenseCategoryColor[$key]}}">{{$category}}</span>
                                                <span>{{\Auth::user()->priceFormat($expenseCategoryAmount[$key])}}</span>
                                            </div>
                                        @empty
                                            <div class="text-center">
                                                <h6>{{__('there is no expense by category')}}</h6>
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <canvas id="chart-doughnut-expense" height="182"></canvas>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="row">
                    <h4 class="col-md-6 fw-normal">{{__('Latest Income')}}</h4>
                    <div class="col-md-6 text-md-end">
                        <a href="{{route('revenue.index')}}">{{__('View All')}}</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th>{{__('Date')}}</th>
                                    <th>{{__('Customer')}}</th>
                                    <th>{{__('Amount Due')}}</th>
                                    <th>{{__('Description')}}</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @forelse($latestIncome as $income)
                                    <tr class="font-style">
                                        <td>{{\Helper::DateFormat($income->date)}}</td>
                                        <td>{{!empty($income->customer)?$income->customer->name:''}}</td>
                                        <td>{{\Auth::user()->priceFormat($income->amount)}}</td>
                                        <td>{{$income->description}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="text-center">
                                                <h6>{{__('there is no latest income')}}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="row">
                    <h4 class="col-md-6 fw-normal">{{__('Latest Expense')}}</h4>
                    <div class="col-md-6 text-md-end">
                        <a href="{{route('payment.index')}}">{{__('View All')}}</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th>{{__('Date')}}</th>
                                    <th>{{__('Amount Due')}}</th>
                                    <th>{{__('Description')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($latestExpense as $expense)
                                    <tr class="font-style">
                                        <td>{{\Helper::DateFormat($expense->date)}}</td>
                                        <td>{{\Auth::user()->priceFormat($expense->amount)}}</td>
                                        <td>{{$expense->description}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="text-center">
                                                <h6>{{__('there is no latest expense')}}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="row">
                    <h4 class="col-md-6 fw-normal">{{__('Account Balance')}}</h4>
                    <div class="col-md-6 text-md-end">
                        <a href="{{route('bank-account.index')}}">{{__('Manage Account')}}</a>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table  mb-0">
                                <thead>
                                <tr>
                                    <th>{{__('Bank')}}</th>
                                    <th>{{__('Holder Name')}}</th>
                                    <th>{{__('Balance')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($bankAccountDetail as $bankAccount)
                                    <tr class="font-style">
                                        <td>{{$bankAccount->bank_name}}</td>
                                        <td>{{$bankAccount->holder_name}}</td>
                                        <td>{{\Auth::user()->priceFormat($bankAccount->CurrentBalance())}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="text-center">
                                                <h6>{{__('there is no account balance')}}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <h4 class="col-md-6 fw-normal">{{__('Invoices')}}</h4>
                    <div class="col-md-6 text-md-end">
                        <a href="{{route('invoice.index')}}">{{__('View All')}}</a>
                    </div>
                </div>
                
                <div class="card">
                    <div class="d-lg-none">
                        <div class="card-header">
                            <ul class="nav nav-pills mb-3" id="myTab0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="weekly-invoice-tab0" data-bs-toggle="tab" href="#weekly-invoice" data-bs-target="#weekly-invoice" role="tab" aria-controls="" aria-selected="true">{{__('Weekly Statistics')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="monthly-invoice-tab0" data-bs-toggle="tab" href="#monthly-invoice" data-bs-target="#monthly-invoice" role="tab" aria-controls="" aria-selected="false">{{__('Monthly Statistics')}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent0">
                                <div class="tab-pane fade show active media" id="weekly-invoice" role="tabpanel">
                                    <div class="media-title"><a href="#">{{__('Total Invoice Generated')}}</a></div>
                                    <div class="text-end text-primary fw-bolder">{{\Auth::user()->priceFormat($weeklyInvoice['invoiceTotal'])}}</div>
                                    <div class="media-title"><a href="#">{{__('Total Invoice Generated')}}</a></div>
                                    <div class="text-end text-primary fw-bolder">{{\Auth::user()->priceFormat($weeklyInvoice['invoicePaid'])}}</div>
                                    <div class="media-title"><a href="#">{{__('Total Duep')}}</a></div>
                                    <div class="text-end text-primary fw-bolder">{{\Auth::user()->priceFormat($weeklyInvoice['invoiceDue'])}}</div>
                                </div>
                                <div class="tab-pane fade media" id="monthly-invoice" role="tabpanel">
                                    <div class="media-title"><a href="#">{{__('Total Invoice Generated')}}</a></div>
                                    <div class="text-end text-primary fw-bolder">{{\Auth::user()->priceFormat($monthlyInvoice['invoiceTotal'])}}</div>
                                    <div class="media-title"><a href="#">{{__('Total Invoice Generated')}}</a></div>
                                    <div class="text-end text-primary fw-bolder">{{\Auth::user()->priceFormat($monthlyInvoice['invoicePaid'])}}</div>
                                    <div class="media-title"><a href="#">{{__('Total Duep')}}</a></div>
                                    <div class="text-end text-primary fw-bolder">{{\Auth::user()->priceFormat($monthlyInvoice['invoiceDue'])}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-lg-block">
                        <div class="row">
                            <div class="col-6">
                                <div class="card-header">
                                    <h6><b>{{__('Weekly Statistics')}}</b></h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled list-unstyled-border">
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="media-right">{{\Auth::user()->priceFormat($weeklyInvoice['invoiceTotal'])}}</div>
                                                <div class="media-title"><a href="#">{{__('Total Invoice Generated')}}</a></div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="media-right">{{\Auth::user()->priceFormat($weeklyInvoice['invoicePaid'])}}</div>
                                                <div class="media-title"><a href="#">{{__('Total Paid')}}</a></div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="media-right">{{\Auth::user()->priceFormat($weeklyInvoice['invoiceDue'])}}</div>
                                                <div class="media-title"><a href="#">{{__('Total Duep')}}</a></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card-header">
                                    <h6><b>{{__('Monthly Statistics')}}</b></h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled list-unstyled-border">
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="media-right">{{\Auth::user()->priceFormat($monthlyInvoice['invoiceTotal'])}}</div>
                                                <div class="media-title"><a href="#">{{__('Total Invoice Generated')}}</a></div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="media-right">{{\Auth::user()->priceFormat($monthlyInvoice['invoicePaid'])}}</div>
                                                <div class="media-title"><a href="#">{{__('Total Paid')}}</a></div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="media-right">{{\Auth::user()->priceFormat($monthlyInvoice['invoiceDue'])}}</div>
                                                <div class="media-title"><a href="#">{{__('Total Duep')}}</a></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <h6><b>{{__('Recent Invoices')}}</b></h6>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('Customer')}}</th>
                                    <th>{{__('Issue Date')}}</th>
                                    <th>{{__('Due Date')}}</th>
                                    <th>{{__('Amount')}}</th>
                                    <th>{{__('Status')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($recentInvoice as $invoice)
                                    <tr class="font-style">
                                        <td>
                                            <a class="btn btn-outline-primary" href="{{ route('invoice.show',$invoice->id) }}">
                                                {{\Auth::user()->invoiceNumberFormat($invoice->invoice_id)}}
                                            </a>
                                        </td>
                                        <td>{{!empty($invoice->customer)? $invoice->customer->name:'' }} </td>
                                        <td>{{ Helper::DateFormat($invoice->issue_date) }}</td>
                                        <td>{{ Helper::DateFormat($invoice->due_date) }}</td>
                                        <td>{{\Auth::user()->priceFormat($invoice->getTotal())}}</td>
                                        <td>
                                            @php
                                                $type = strtolower($invoice->getType());
                                            @endphp
                                            @if($invoice->status < count(\App\Models\Invoice::$statuses[$type]) - 1)
                                                <span class="badge badge-light">{{ $invoice->getStatus() }}</span>
                                            @else
                                                <span class="badge badge-primary">{{ $invoice->getStatus() }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="text-center">
                                                <h6>{{__('there is no recent invoice')}}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <h4 class="col-md-6 fw-normal">{{__('Bills')}}</h4>
                    <div class="col-md-6 text-md-end">
                        <a href="{{route('bill.index')}}">{{__('View All')}}</a>
                    </div>
                </div>
                
                <div class="card">
                    <div class="d-lg-none">
                        <div class="card-header">
                            <ul class="nav nav-pills mb-3" id="myTab0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="weekly-bill-tab0" data-bs-toggle="tab" href="#weekly-bill" data-bs-target="#weekly-bill" role="tab" aria-controls="" aria-selected="true">{{__('Weekly Statistics')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="monthly-bill-tab0" data-bs-toggle="tab" href="#monthly-bill" data-bs-target="#monthly-bill" role="tab" aria-controls="" aria-selected="false">{{__('Monthly Statistics')}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent0">
                                <div class="tab-pane fade show active media" id="weekly-bill" role="tabpanel">
                                    <div class="media-title"><a href="#">{{__('Total Bill Generated')}}</a></div>
                                    <div class="text-end text-primary fw-bolder">{{\Auth::user()->priceFormat($weeklyBill['billTotal'])}}</div>
                                    <div class="media-title"><a href="#">{{__('Total Bill Generated')}}</a></div>
                                    <div class="text-end text-primary fw-bolder">{{\Auth::user()->priceFormat($weeklyBill['billPaid'])}}</div>
                                    <div class="media-title"><a href="#">{{__('Total Due')}}</a></div>
                                    <div class="text-end text-primary fw-bolder">{{\Auth::user()->priceFormat($weeklyBill['billDue'])}}</div>
                                </div>
                                <div class="tab-pane fade media" id="monthly-bill" role="tabpanel">
                                    <div class="media-title"><a href="#">{{__('Total Bill Generated')}}</a></div>
                                    <div class="text-end text-primary fw-bolder">{{\Auth::user()->priceFormat($monthlyBill['billTotal'])}}</div>
                                    <div class="media-title"><a href="#">{{__('Total Bill Generated')}}</a></div>
                                    <div class="text-end text-primary fw-bolder">{{\Auth::user()->priceFormat($monthlyBill['billPaid'])}}</div>
                                    <div class="media-title"><a href="#">{{__('Total Due')}}</a></div>
                                    <div class="text-end text-primary fw-bolder">{{\Auth::user()->priceFormat($monthlyBill['billDue'])}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-lg-block">
                        <div class="row">
                            <div class="col-6">
                                <div class="card-header">
                                    <h6><b>{{__('Weekly Statistics')}}</b></h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled list-unstyled-border">
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="media-right">{{\Auth::user()->priceFormat($weeklyBill['billTotal'])}}</div>
                                                <div class="media-title"><a href="#">{{__('Total Bill Generated')}}</a></div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="media-right">{{\Auth::user()->priceFormat($weeklyBill['billPaid'])}}</div>
                                                <div class="media-title"><a href="#">{{__('Total Paid')}}</a></div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="media-right">{{\Auth::user()->priceFormat($weeklyBill['billDue'])}}</div>
                                                <div class="media-title"><a href="#">{{__('Total Due')}}</a></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card-header">
                                    <h6><b>{{__('Monthly Statistics')}}</b></h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled list-unstyled-border">
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="media-right">{{\Auth::user()->priceFormat($monthlyBill['billTotal'])}}</div>
                                                <div class="media-title"><a href="#">{{__('Total Bill Generated')}}</a></div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="media-right">{{\Auth::user()->priceFormat($monthlyBill['billPaid'])}}</div>
                                                <div class="media-title"><a href="#">{{__('Total Paid')}}</a></div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="media-right">{{\Auth::user()->priceFormat($monthlyBill['billDue'])}}</div>
                                                <div class="media-title"><a href="#">{{__('Total Due')}}</a></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <h6><b>{{__('Recent Bills')}}</b></h6>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('Vendor')}}</th>
                                    <th>{{__('Bill Date')}}</th>
                                    <th>{{__('Due Date')}}</th>
                                    <th>{{__('Amount')}}</th>
                                    <th>{{__('Status')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($recentBill as $bill)
                                    <tr class="font-style">
                                        <td>
                                            <a class="btn btn-outline-primary" href="{{ route('bill.show',$bill->id) }}">
                                                {{\Auth::user()->billNumberFormat($bill->bill_id)}}
                                            </a>
                                        </td>
                                        <td>{{!empty($bill->vender)? $bill->vender->name:'' }} </td>
                                        <td>{{ Helper::DateFormat($bill->bill_date) }}</td>
                                        <td>{{ Helper::DateFormat($bill->due_date) }}</td>
                                        <td>{{\Auth::user()->priceFormat($bill->getTotal())}}</td>
                                        <td>
                                            @if($bill->status == 0)
                                                <span class="badge badge-primary">{{ __(\App\Models\Bill::$statuses[$bill->status]) }}</span>
                                            @elseif($bill->status == 1)
                                                <span class="badge badge-warning">{{ __(\App\Models\Bill::$statuses[$bill->status]) }}</span>
                                            @elseif($bill->status == 2)
                                                <span class="badge badge-danger">{{ __(\App\Models\Bill::$statuses[$bill->status]) }}</span>
                                            @elseif($bill->status == 3)
                                                <span class="badge badge-info">{{ __(\App\Models\Bill::$statuses[$bill->status]) }}</span>
                                            @elseif($bill->status == 4)
                                                <span class="badge badge-success">{{ __(\App\Models\Bill::$statuses[$bill->status]) }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="text-center">
                                                <h6>{{__('there is no recent bill')}}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <h4 class="col-md-6 fw-normal">{{__('Goal')}}</h4>
                    <div class="col-md-6 text-md-end">
                        <a href="{{route('goal.index')}}">{{__('View All')}}</a>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        @forelse($goals as $goal)
                            @php
                                $total= $goal->target($goal->type,$goal->from,$goal->to,$goal->amount)['total'];
                            $percentage=$goal->target($goal->type,$goal->from,$goal->to,$goal->amount)['percentage'];
                            @endphp
                            <div class="col-12">
                                <div class="card card-statistic-1 card-statistic-2">
                                    <div class="card-wrap">
                                        <div class="row">
                                            <div class="col-6 col-md-4 col-xl-2">
                                                <div class="card-header">
                                                    <h4>{{__('Name')}}</h4>
                                                </div>
                                                <div class="card-body">
                                                    {{$goal->name}}
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-2">
                                                <div class="card-header">
                                                    <h4>{{__('Type')}}</h4>
                                                </div>
                                                <div class="card-body">
                                                    {{ __(\App\Models\Goal::$goalType[$goal->type]) }}
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3">
                                                <div class="card-header">
                                                    <h4>{{__('Duration')}}</h4>
                                                </div>
                                                <div class="card-body">
                                                    {{$goal->from .__(' To ').$goal->to}}
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-12 col-xl-5">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col">
                                                            {{\Auth::user()->priceFormat($total).' of '. \Auth::user()->priceFormat($goal->amount)}}
                                                        </div>
                                                        <div class="col-auto">
                                                            {{ number_format($percentage, 2, '.', '')}}%
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" style="width:{{number_format($goal->target($goal->type,$goal->from,$goal->to,$goal->amount)['percentage'], 2, '.', '')}}%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="text-center">
                                        <h6>{{__('there is no goal')}}</h6>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
        {{-- Float button --}}
        @if (Gate::check('create revenue') || Gate::check('create payment') || Gate::check('create transfer'))
        @php
            $count = 2;    
        @endphp
        <div class="floating-btn" id="float-btn">
            <i class="fas fa-plus floating-plus"></i>
            
                @can('create transfer')
                    <a href="#" data-url="{{ route('transfer.create') }}" data-ajax-popup="true" data-title="{{__('Transfer Account Balance')}}" class="float-item item-transfer item-{{$count}}">
                        <i class="fas fa-sync-alt"></i>
                    </a>
                    <a href="#" data-url="{{ route('transfer.create') }}" data-ajax-popup="true" data-title="{{__('Transfer Account Balance')}}" class="float-desc item-{{$count--}}-desc"><span>{{__('Transfer')}}</span></a>
                @endcan
                @can('create payment')
                    <a href="#" data-url="{{ route('payment.create') }}" data-ajax-popup="true" data-title="{{__('Create New Payment')}}" class="float-item item-expense item-{{$count}}">
                        <i class="fas fa-money-bill-wave-alt"></i>
                    </a>
                    <a href="#" data-url="{{ route('payment.create') }}" data-ajax-popup="true" data-title="{{__('Create New Payment')}}" class="float-desc item-{{$count--}}-desc"><span>{{__('Expense')}}</span></a>
                @endcan
                @can('create revenue')
                    <a href="#" data-url="{{ route('revenue.create') }}" data-ajax-popup="true" data-title="{{__('Create New Revenue')}}" class="float-item item-income item-{{$count}}">
                        <i class="far fa-money-bill-alt"></i>
                    </a>
                    <a href="#" data-url="{{ route('revenue.create') }}" data-ajax-popup="true" data-title="{{__('Create New Revenue')}}" class="float-desc item-{{$count}}-desc"><span>{{__('Income')}}</span></a>
                @endcan
        </div>
        @endif
    </section>
@endsection


