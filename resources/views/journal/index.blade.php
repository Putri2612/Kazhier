@extends('layouts.admin')
@section('page-title')
    {{__('Journal')}}
@endsection
@push('script-page')
    <script>
        $(() =>{
            let month = $('#change-month');
            let year  = $('#change-year');
            let url     = new URL(window.location);
            let query   = url.searchParams;
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
            <h1>{{__('Journal')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Journal')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mb-10">
                <div class="col-12">
                    <div class="row justify-content-end align-items-center">
                        <div class="form-group col-12 col-md-6 col-lg-3 col-xxl-2">
                            {{ Form::label('month', __('Month')) }}
                            {{ Form::select('month', $months, (isset($_GET['month']) ? $_GET['month'] : date('m')), array('id' => 'change-month', 'class' => 'form-control font-style selectric'))}}
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-3 col-xxl-2">
                            {{ Form::label('month', __('Year')) }}
                            {{ Form::select('year', $years, $selected_year, array('id' => 'change-year', 'class' => 'form-control font-style selectric'))}}
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
                                        <h4>{{ __('Report') }} : </h4>
                                    </div>
                                    <div class="card-body">
                                        {{ __('Journal') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card card-statistic-1 py-3">
                                <div class="card-wrap">
                                    <div class="card-header py-0">
                                        <h4>{{ __('Date') }} : </h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $months[isset($_GET['month']) ? $_GET['month'] : date('m')] }} {{ $selected_year }}
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
                                                        <th colspan="2">{{__('Description')}}</th>
                                                        <th>{{__('Debit')}}</th>
                                                        <th>{{__('Credit')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (empty($journal_data))
                                                            <tr class="odd">
                                                                <td colspan="6" class="dataTables_empty">No data available in table</td>
                                                            </tr>
                                                        @else
                                                            @php
                                                                $num = 1; $total = 0;
                                                            @endphp
                                                            @foreach ($journal_data as $data)
                                                                    <tr class="font-style">
                                                                        <td rowspan="2">
                                                                            @if(is_a($data, 'App\Models\Revenue') || is_a($data, 'App\Models\Payment') || is_a($data, 'App\Models\Transfer'))
                                                                            <a href="#!" 
                                                                                data-url="{{route((is_a($data, 'App\Models\Revenue') ? 'revenue.show' : (is_a($data, 'App\Models\Payment') ? 'payment.show' : 'transfer.show')),$data->id) }}" 
                                                                                data-ajax-popup="true" 
                                                                                data-title="{{__('View Reference')}}" 
                                                                                data-bs-toggle="tooltip" 
                                                                                data-original-title="{{__('Reference')}}"">
                                                                                {{$num++}}
                                                                            </a>
                                                                            @endif
                                                                            @if (is_a($data, 'App\Models\InvoicePayment') || is_a($data, 'App\Models\BillPayment'))
                                                                            <a href="{{ route((is_a($data, 'App\Models\InvoicePayment') ? 'invoice.show' : 'bill.show'), $data->invoice_id) }}">
                                                                                {{$num++}}
                                                                            </a>
                                                                            @endif
                                                                        </td>
                                                                        <td rowspan="2">{{Helper::DateFormat($data->date)}}</td>
                                                                        <td colspan="2"> 
                                                                        @if(is_a($data, 'App\Models\Revenue'))
                                                                        {{ (!empty($data->customer) ? $data->customer->name : '') }}
                                                                        {{ (!empty($data->customer) && !empty($data->category) ? ' - ' : '') }}
                                                                        {{ (!empty($data->category) ? $data->category->name : '') }}
                                                                        @endif
        
                                                                        @if(is_a($data, 'App\Models\Payment'))
                                                                        {{ (!empty($data->bankAccount) ? $data->bankAccount->bank_name.' '.$data->bankAccount->holder_name : '') }}
                                                                        @endif
        
                                                                        @if(is_a($data, 'App\Models\InvoicePayment'))
                                                                        {{ (!empty($data->invoice->customer) ? $data->invoice->customer->name : '') }}
                                                                        {{ (!empty($data->invoice->customer) && !empty($data->invoice->category) ? ' - ' : '') }}
                                                                        {{ (!empty($data->invoice->category) ? $data->invoice->category->name : '') }}
                                                                        @endif
        
                                                                        @if(is_a($data, 'App\Models\BillPayment'))
                                                                        {{ (!empty($data->bankAccount) ? $data->bankAccount->bank_name . ' ' . $data->bankAccount->holder_name : '') }}
                                                                        @endif

                                                                        @if(is_a($data, 'App\Models\Transfer'))
                                                                        {{ (!empty($data->fromBankAccount())? $data->fromBankAccount()->bank_name.' '.$data->fromBankAccount()->holder_name:'') }}
                                                                        {{ '( '.__('transfer').' )'}}
                                                                        @endif
                                                                        </td>
                                                                        <td class="text-end">{{Auth::user()->priceFormat($data->amount)}}</td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr class="font-style">
                                                                        <td></td>
                                                                        <td>
                                                                        @if(is_a($data, 'App\Models\Revenue'))
                                                                        {{ (!empty($data->bankAccount) ? $data->bankAccount->bank_name . ' ' . $data->bankAccount->holder_name : '') }}
                                                                        @endif
        
                                                                        @if(is_a($data, 'App\Models\Payment'))
                                                                        {{ (!empty($data->vender) ? $data->vender->name : '') }}
                                                                        {{ (!empty($data->vender) && !empty($data->category) ? ' - ' : '') }}
                                                                        {{ (!empty($data->category) ? $data->category->name : '')}}
                                                                        @endif
        
                                                                        @if(is_a($data, 'App\Models\InvoicePayment'))
                                                                        {{ (!empty($data->bankAccount) ? $data->bankAccount->bank_name.' '.$data->bankAccount->holder_name : '') }}
                                                                        @endif
        
                                                                        @if(is_a($data, 'App\Models\BillPayment'))
                                                                        {{ (!empty($data->bill->vender) ? $data->bill->vender->name : '') }}
                                                                        {{ (!empty($data->bill->vender) && !empty($data->bill->category) ? ' - ' : '') }}
                                                                        {{ (!empty($data->bill->category) ? $data->bill->category->name : '') }}
                                                                        @endif

                                                                        @if(is_a($data, 'App\Models\Transfer'))
                                                                        {{ (!empty( $data->toBankAccount())? $data->toBankAccount()->bank_name.' '. $data->toBankAccount()->holder_name:'') }}
                                                                        @endif
                                                                        </td>
                                                                        <td></td>
                                                                        <td class="text-end">{{Auth::user()->priceFormat($data->amount)}} </td>
                                                                    </tr>
                                                                @php
                                                                    $total = $total + $data->amount;
                                                                @endphp
                                                            @endforeach
                                                        @endif
                                                    
                                                    </tbody>    
                                                    @if(!empty($journal_data))
                                                    <tfoot>
                                                        <tr>
                                                            <th class="text-end" colspan="4">{{__('Total')}}</th>
                                                            <th class="text-end">{{Auth::user()->priceFormat($total)}}</th>
                                                            <th class="text-end">{{Auth::user()->priceFormat($total)}}</th>
                                                        </tr>
                                                    </tfoot>
                                                    @endif
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
	