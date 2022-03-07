@extends('layouts.admin')
@section('page-title')
    {{__('Income Summary')}}
@endsection

@push('script-page')
    <script>
        ChartsConstant.locale = '{{ Config::get('app.locale') }}';

        const Canvas    = document.querySelector('#income-chart').getContext('2d'),
            DisplayChart= new Chart(Canvas, {
                type: 'line',
                data: {
                    labels: @json($monthList),
                    datasets: [{
                        label: '{{__('Income')}}',
                        borderColor: '#0087f8',
                        backgroundColor: '#0087f833',
                        fill: true,
                        data: @json($chartData),
                    }]
                }, 
                options: {
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
                        }
                    }
                }
            });
        var year = '{{$currentYear}}';
    </script>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Income Summary')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Income Summary')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mb-10">
                <div class="col-12">
                    <div class="row justify-content-end">
                        <div class="col">
                            {{ Form::open(array('route' => array('report.income.summary'),'method' => 'GET', 'class' => 'row justify-content-end align-items-center')) }}
                                <div class="form-group col-12 col-md-6 col-lg-3 col-xxl-2">
                                    {{ Form::label('year', __('Year')) }}
                                    {{ Form::select('year',$yearList, $currentYear, array('class' => 'form-control font-style selectric')) }}
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-3 col-xxl-2">
                                    {{ Form::label('account', __('Account')) }}
                                    {{ Form::select('account',$account,isset($_GET['account'])?$_GET['account']:'', array('class' => 'form-control font-style selectric')) }}
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-3 col-xxl-2">
                                    {{ Form::label('category', __('Category')) }}
                                    {{ Form::select('category',$category,isset($_GET['category'])?$_GET['category']:'', array('class' => 'form-control font-style selectric')) }}
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-3 col-xxl-2">
                                    {{ Form::label('customer', __('Customer')) }}
                                    {{ Form::select('customer',$customer,isset($_GET['customer'])?$_GET['customer']:'', array('class' => 'form-control font-style selectric')) }}
                                </div>
                                <div class="col-auto text-end">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    <a href="{{route('report.income.summary')}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    @php
                                        $param = explode('?', Request::getRequestUri());
                                        $param = count($param) > 1 ? '?'.$param[1] : ''
                                    @endphp
                                    <a href="{!! route('report.export', ['income-summary']).$param !!}" class="btn btn-dark"><i class="fas fa-download"></i></a>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card card-statistic-1 py-3">
                                <div class="card-wrap">
                                    <div class="card-header py-0">
                                        <h4> {{ __('Report') }} : </h4>
                                    </div>
                                    <div class="card-body">
                                        {{ __('Income Summary') }}
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
                    <div class="card py-4">
                        <div class="card-body" id="chart-container">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <canvas id="income-chart" height="300"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body" id="table-container">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush border font-style" id="dataTable-manual">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>{{__('Category')}}</th>
                                                        @foreach($monthList as $month)
                                                            <th>{{$month}}</th>
                                                        @endforeach
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Revenue :')}}</h6></b></td>
                                                    </tr>
                                                    @foreach($revenues as $revenues)
                                                        <tr>
                                                            <td>{{$revenues['category']}}</td>
                                                            @foreach($revenues['data'] as $data)
                                                                <td>{{\Auth::user()->priceFormat($data)}}</td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Invoice :')}}</h6></b></td>
                                                    </tr>
                                                    @foreach($invoices as $invoice)
                                                        <tr>
                                                            <td>{{$invoice['category']}}</td>
                                                            @foreach($invoice['data'] as $data)
                                                                <td>{{\Auth::user()->priceFormat($data)}}</td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Income = Revenue + Invoice :')}}</h6></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('Total')}}</td>
                                                        @foreach($chartData as $income)
                                                            <td>{{\Auth::user()->priceFormat($income)}}</td>
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


