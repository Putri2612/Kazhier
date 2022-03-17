@extends('layouts.api')
@section('page-title')
    {{__('Expense Summary')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Expense Summary')}}</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12" id="chart-container">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card card-statistic-1 py-3">
                                <div class="card-wrap">
                                    <div class="card-header py-0">
                                        <h4> {{ __('Report') }} : </h4>
                                    </div>
                                    <div class="card-body">
                                        {{ __('Expense Summary') }}
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
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <canvas id="expense-chart" height="300"></canvas>
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
                                                        <td colspan="13"><b><h6>{{__('Payment :')}}</h6></b></td>
                                                    </tr>
                                                    @foreach($payments as $payment)
                                                        <tr>
                                                            <td>{{$payment['category']}}</td>
                                                            @foreach($payment['data'] as $data)
                                                                <td>{{ Auth::user()->priceFormat($data)}}</td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Bill :')}}</h6></b></td>
                                                    </tr>
                                                    @foreach($bills as $bill)
                                                        <tr>
                                                            <td>{{$bill['category']}}</td>
                                                            @foreach($bill['data'] as $data)
                                                                <td>{{ Auth::user()->priceFormat($data)}}</td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Expense = Payment + Bill :')}}</h6></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('Total')}}</td>
                                                        @foreach($chartData as $expense)
                                                            <td>{{ Auth::user()->priceFormat($expense)}}</td>
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


