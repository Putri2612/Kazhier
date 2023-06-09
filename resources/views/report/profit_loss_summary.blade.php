@extends('layouts.admin')
@section('page-title')
    {{__('Profit && Loss Summary')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Profit && Loss Summary')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Profit && Loss Summary')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mb-10">
                <div class="col-12">
                    {{ Form::open(array('route' => array('report.profit.loss.summary'),'method' => 'GET', 'class' => 'row justify-content-end align-items-center')) }}
                        <div class="form-group col-12 col-md-6 col-lg-3 col-xxl-2">
                            {{ Form::label('year', __('Year')) }}
                            {{ Form::select('year',$yearList, $currentYear, array('class' => 'form-control font-style selectric')) }}
                        </div>
                        <div class="col-auto text-end">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            <a href="{{route('report.profit.loss.summary')}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            @php
                                $param = explode('?', Request::getRequestUri());
                                $param = count($param) > 1 ? '?'.$param[1] : ''
                            @endphp
                            <a href="{!! route('report.export', ['profit-loss-summary']).$param !!}" class="btn btn-dark">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
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
                                        {{ __('Profit && Loss Summary') }}
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
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row mb-5">
                                            <div class="col-sm-12">
                                                <h4>{{__('Income')}}</h4>
                                                <table class="table table-flush font-style" id="dataTable-manual">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th width="25%">{{__('Category')}}</th>
                                                        @foreach($month as $m)
                                                            <th width="15%">{{$m}}</th>
                                                        @endforeach
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Revenue : ')}}</h6></b></td>
                                                    </tr>
                                                    @if(!empty($revenueIncome))
                                                        @foreach($revenueIncome as $revenue)
                                                            <tr>
                                                                <td>{{$revenue['category']}}</td>
                                                                @foreach($revenue['amount'] as $amount)
                                                                    <td width="15%">{{ Auth::user()->priceFormat($amount)}}</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Invoice : ')}}</h6></b></td>
                                                    </tr>
                                                    @if(!empty($invoiceIncome))
                                                        @foreach($invoiceIncome as $invoice)
                                                            <tr>
                                                                <td>{{$invoice['category']}}</td>
                                                                @foreach($invoice['amount'] as $amount)
                                                                    <td width="15%">{{Auth::user()->priceFormat($amount)}}</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                                <table class="table table-flush" id="dataTable-manual">
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Total Income =  Revenue + Invoice ')}}</h6></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%">{{__('Total Income')}}</td>
                                                        @foreach($totalIncome as $income)
                                                            <td width="15%">{{Auth::user()->priceFormat($income)}}</td>
                                                        @endforeach
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row mb-5">
                                            <div class="col-sm-12">
                                                <h4>{{__('Expense')}}</h4>
                                                <table class="table table-flush font-style" id="dataTable-manual">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th width="25%">{{__('Category')}}</th>
                                                        @foreach($month as $m)
                                                            <th width="15%">{{$m}}</th>
                                                        @endforeach
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Payment : ')}}</h6></b></td>
                                                    </tr>
                                                    @if(!empty($paymentExpense))
                                                        @foreach($paymentExpense as $payment)
                                                            <tr>
                                                                <td>{{$payment['category']}}</td>
                                                                @foreach($payment['amount'] as $amount)
                                                                    <td width="15%">{{Auth::user()->priceFormat($amount)}}</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Bill : ')}}</h6></b></td>
                                                    </tr>
                                                    @if(!empty($billExpense))
                                                        @foreach($billExpense as $bill)
                                                            <tr>
                                                                <td>{{$bill['category']}}</td>
                                                                @foreach($bill['amount'] as $amount)
                                                                    <td width="15%">{{Auth::user()->priceFormat($amount)}}</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                                <table class="table table-flush" id="dataTable-manual">
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Total Expense =  Payment + Bill ')}}</h6></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('Total Expenses')}}</td>
                                                        @foreach($totalExpense as $expense)
                                                            <td width="15%">{{Auth::user()->priceFormat($expense)}}</td>
                                                        @endforeach
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-flush" id="dataTable-manual">
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Net Profit = Total Income - Total Expense ')}}</h6></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%">{{__('Net Profit')}}</td>
                                                        @foreach($netProfitArray as $profit)
                                                            <td width="15%"> {{Auth::user()->priceFormat($profit)}}</td>
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


