@extends('layouts.admin')
@section('page-title')
    {{__('Ledger')}}
@endsection

@push('script-page')
    <script>
        $(() =>{
            let account = $('#change-account');
            let month   = $('#change-month');
            let year    = $('#change-year');
            let url     = new URL(window.location);
            let query   = url.searchParams;
            account.change((e) => {
                query.set('account', e.target.value);
                window.location = url.toString();
            });
            month.change((e) => {
                query.set('month', e.target.value);
                window.location = url.toString();
            });
            year.change((e) => {
                query.set('year', e.target.value);
                window.location = url.toString();
            });
        });
    </script>
@endpush

@section('content')
<section class="section">
        <div class="section-header">
            <h1>{{__('Ledger')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Ledger')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mb-10">
                <div class="col-12">
                    <div class="row justify-content-end align-items-center">
                        <div class="form-group col-12 col-lg-3 col-xxl-2">
                            {{ Form::label('account', __('Account')) }}
                            {{ Form::select('account', $accountList, (isset($_GET['account']) ? $_GET['account'] : ''), array('id' => 'change-account', 'class' => 'form-control font-style selectric'))}}
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-3 col-xxl-2">
                            {{ Form::label('month', __('Month')) }}
                            {{ Form::select('month', $months, (isset($_GET['month']) ? $_GET['month'] : date('m')), array('id' => 'change-month', 'class' => 'form-control font-style selectric'))}}
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-3 col-xxl-2">
                            {{ Form::label('year', __('Year')) }}
                            {{ Form::select('year', $years, $selected_year, array('id' => 'change-year', 'class' => 'form-control font-style selectric'))}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card card-statistic-1 py-3">
                                <div class="card-wrap">
                                    <div class="card-header py-0">
                                        <h4>{{ __('Report') }} : </h4>
                                    </div>
                                    <div class="card-body">
                                        {{ __('Ledger') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card card-statistic-1 py-3">
                                <div class="card-wrap">
                                    <div class="card-header py-0">
                                        <h4>{{ __('Date') }} : </h4>
                                    </div>
                                    <div class="card-body">
                                        {{ isset($_GET['month']) ? $months[$_GET['month']] : $months[date('m')] }} {{ $selected_year }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card card-statistic-1 py-3">
                                <div class="card-wrap">
                                    <div class="card-header py-0">
                                        <h4>{{ __('Account') }} : </h4>
                                    </div>
                                    <div class="card-body">
                                        {{ (isset($_GET['account']) ? $accountList[$_GET['account']] : $accountList->first()) }}
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
                                        <div class="row pt-5 mb-3">
                                            <div class="col-sm-12">
                                                <table class="table table-flush dataTable no-paginate no-footer">  
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>{{__('Date')}}</th>
                                                            <th>{{__('Description')}}</th>
                                                            <th>{{__('Debit')}}</th>
                                                            <th>{{__('Credit')}}</th>
                                                            <th>{{__('Balance')}}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($count == 0)
                                                            <tr class="odd">
                                                                <td colspan="6" class="dataTables_empty">No data available in table</td>
                                                            </tr>
                                                        @else
                                                            @php
                                                                $num = 1;
                                                                $creditTotal = 0;
                                                                $debitTotal = 0;
                                                                $balance = $prevBalance;
                                                            @endphp
                                                            <tr class="font-style">
                                                                <td colspan="5"></td>
                                                                <td>{{Auth::user()->priceFormat($balance)}}</td>
                                                            </tr>
                                                            @foreach ($ledger as $data)
                                                                <tr class="font-style">
                                                                    <td>{{$num}}</td>
                                                                    <td>{{Helper::DateFormat($data->date)}}</td>
                                                                    <td>{{$data->description}}</td>
                                                                    <td>
                                                                        @if (!empty($data->debit))
                                                                            @php
                                                                                $debitTotal += $data->debit;
                                                                            @endphp
                                                                            {{Auth::user()->priceFormat($data->debit)}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($data->credit))
                                                                            @php
                                                                                $creditTotal += $data->credit;
                                                                            @endphp
                                                                            {{Auth::user()->priceFormat($data->credit)}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @php
                                                                            $credit = !empty($data->credit) ? $data->credit : 0;
                                                                            $debit  = !empty($data->debit) ? $data->debit : 0;
                                                                            $balance += ($credit - $debit);
                                                                        @endphp
                                                                        {{Auth::user()->priceFormat($balance)}}
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $num++; 
                                                                @endphp
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                    <tfoot>
                                                        @if($count != 0)
                                                            <tr>
                                                                <th class="text-end" colspan="3">{{__('Total')}}</th>
                                                                <th>{{Auth::user()->priceFormat($debitTotal)}} </th>
                                                                <th>{{Auth::user()->priceFormat($creditTotal)}}</th>
                                                                <th>{{Auth::user()->priceFormat($balance)}}</th>
                                                            </tr>
                                                        @endif
                                                    </tfoot>
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
	