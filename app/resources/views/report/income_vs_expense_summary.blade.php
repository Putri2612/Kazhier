@extends('layouts.admin')
@section('page-title')
    {{__('Income Vs Expense Summary')}}
@endsection

@push('script-page')
    <script src="{{ asset('assets/js/jspdf.min.js') }} "></script>
    <script src="{{ asset('assets/js/html2canvas.min.js') }} "></script>
    <script>
        var SalesChart = (function () {
            var $chart = $('#chart-sales');

            function init($this) {
                var salesChart = new Chart($this, {
                    type: 'line',
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    color: Charts.colors.gray[200],
                                    zeroLineColor: Charts.colors.gray[200]
                                },
                                ticks: {
                                    callback: (label, index, labels) => {
                                        return new Intl.NumberFormat('{{ Config::get('app.locale') }}', { maximumSignificantDigits: 2 }).format(label);
                                    }
                                }
                            }]
                        }, 
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItem, data) {
                                    let Value = data.datasets[tooltipItem.datasetIndex].label;
                                    Value += ': ';
                                    Value += `${new Intl.NumberFormat('{{ Config::get('app.locale') }}', { maximumSignificantDigits: 2 }).format(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index])}`
                                    return Value;
                                }
                            }
                        }
                    },
                    data: {
                        labels: {!! json_encode($monthList) !!},
                        datasets: [{
                            label: '{{__('Profit')}}',
                            data:{!! json_encode($profit) !!},
                        }]
                    },
                    plugins: {
                        beforeRender: (x, options) => {
                            const chart = x.chart,
                                dataset = x.data.datasets[0],
                                yScale  = x.scales['y-axis-0'],
                                yPos    = yScale.getPixelForValue(0);
                            
                            const gradientFill = chart.ctx.createLinearGradient(0, 0, 0, chart.height);
                            gradientFill.addColorStop(0, '#0087f8');
                            gradientFill.addColorStop(yPos / chart.height, '#0087f8');
                            gradientFill.addColorStop(yPos / chart.height, '#ff5909');
                            gradientFill.addColorStop(1, '#ff5909');

                            const model = x.data.datasets[0]._meta[Object.keys(dataset._meta)[0]].dataset._model;
                            model.borderColor = gradientFill;

                        }
                    }
                });
                $this.data('chart', salesChart);
            };
            if ($chart.length) {
                init($chart);
            }
        })();
        var year = '{{$currentYear}}';

        function saveAsPDF() {
            html2canvas(document.getElementById("chart-container"), {
                onrendered: function (canvas) {
                    var img = canvas.toDataURL();
                    var doc = new jsPDF("p", "pt", "a2");
                    doc.addImage(img, 10, 10);
                    doc.save(year + '_income_vs_expense_report.pdf');
                }
            });
        }

    </script>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Income Vs Expense Summary')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Income Vs Expense Summary')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mb-10">
                <div class="col-12">
                    {{ Form::open(array('route' => array('report.income.vs.expense.summary'),'method' => 'GET', 'class' => 'row justify-content-end align-items-center')) }}
                    <div class="form-group col-12 col-md-6 col-lg-3 col-xxl-2">
                        {{ Form::label('year', __('Year')) }}
                        {{ Form::select('year',$yearList, $currentYear, array('class' => 'form-control font-style selectric')) }}
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-3 col-xxl-2">
                        {{ Form::label('account', __('Account')) }}
                        {{ Form::select('account',$account,isset($_GET['account'])?$_GET['account']:'', array('class' => 'form-control font-style selectric')) }}
                    </div>
                    <div class="form-group col-12 col-md-4 col-lg-3 col-xxl-2">
                        {{ Form::label('category', __('Category')) }}
                        {{ Form::select('category',$category,isset($_GET['category'])?$_GET['category']:'', array('class' => 'form-control font-style selectric')) }}
                    </div>
                    <div class="form-group col-12 col-md-4 col-lg-3 col-xxl-2">
                        {{ Form::label('customer', __('Customer')) }}
                        {{ Form::select('customer',$customer,isset($_GET['customer'])?$_GET['customer']:'', array('class' => 'form-control font-style selectric')) }}
                    </div>
                    <div class="form-group col-12 col-md-4 col-lg-3 col-xxl-2">
                        {{ Form::label('vender', __('Vendor')) }}
                        {{ Form::select('vender',$vender,isset($_GET['vender'])?$_GET['vender']:'', array('class' => 'form-control font-style selectric')) }}
                    </div>
                    <div class="col-auto text-end">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        <a href="{{route('report.income.vs.expense.summary')}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        @php
                            $param = explode('?', Request::getRequestUri());
                            $param = count($param) > 1 ? '?'.$param[1] : ''
                        @endphp
                        <a href="{!! route('report.export', 'income-vs-expense-summary').$param !!}" class="btn btn-dark"><i class="fas fa-download"></i></a>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card card-statistic-1 py-3">
                        <div class="card-wrap">
                            <div class="card-header py-0">
                                <h4> {{ __('Report') }} : </h4>
                            </div>
                            <div class="card-body">
                                {{ __('Income Vs Expense Summary') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card card-statistic-1 py-3">
                        <div class="card-wrap">
                            <div class="card-header py-0">
                                <h4> {{ __('Date') }} : </h4>
                            </div>
                            <div class="card-body">
                                {{ __('January') }} {{ $currentYear }} - {{ __('December') }} {{ $currentYear }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12" id="chart-container">
                    <div class="card py-4">
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <canvas id="chart-sales" height="300"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush border" id="dataTable-manual">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>{{__('Type')}}</th>
                                                        @foreach($monthList as $month)
                                                            <th>{{$month}}</th>
                                                        @endforeach
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Income : ')}}</h6></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{(__('Revenue'))}}</td>
                                                        @foreach($revenueIncomeTotal as $revenue)
                                                            <td>{{\Auth::user()->priceFormat($revenue)}}</td>
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        <td>{{(__('Invoice'))}}</td>
                                                        @foreach($invoiceIncomeTotal as $invoice)
                                                            <td>{{\Auth::user()->priceFormat($invoice)}}</td>
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Expense : ')}}</h6></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{(__('Payment'))}}</td>
                                                        @foreach($paymentExpenseTotal as $payment)
                                                            <td>{{\Auth::user()->priceFormat($payment)}}</td>
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        <td>{{(__('Bill'))}}</td>
                                                        @foreach($billExpenseTotal as $bill)
                                                            <td>{{\Auth::user()->priceFormat($bill)}}</td>
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Profit = Income - Expense ')}}</h6></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{(__('Profit'))}}</td>
                                                        @foreach($profit as $prft)
                                                            <td>{{\Auth::user()->priceFormat($prft)}}</td>
                                                        @endforeach
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection


