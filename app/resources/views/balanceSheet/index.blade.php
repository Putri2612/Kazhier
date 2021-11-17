@extends('layouts.admin')
@section('page-title')
    {{__('Balance Sheet')}}
@endsection
@php
    $assetCount     = count($assets['Current Assets']) +
                      count($assets['Fixed Assets']) +
                      count($assets['Inventories']) +
                      count($assets['Non-current Assets']) +
                      count($assets['Prepayments']) +
                      count($assets['Bank & Cash']) +
                      count($assets['Depreciations']);
    $liabilityCount = count($liabilities['Current Liabilities'])+
                      count($liabilities['Liabilities'])+
                      count($liabilities['Non-current Liabilities']);
    $assetAmount = 0;
    $liabilityAmount = 0;
    $equityAmount = 0;
@endphp


@section('content')
<section class="section">
        <div class="section-header">
            <h1>{{__('Balance Sheet')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Balance Sheet')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <h4 class="font-weight-normal mb-3">{{__('Balance Sheet Report')}}</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush dataTable no-footer">  
                                                    <thead class="thead-light">
                                                    </thead>
                                                    <tbody>
                                                        @if ($assetCount || $liabilityCount || !empty($equity))
                                                            <tr>
                                                                <td rowspan='2'>
                                                                    @if ($assetCount)
                                                                        <table class="table table-flush dataTable no-footer">
                                                                            <thead class="thead-light">
                                                                                <tr>
                                                                                    <th colspan="3" class="text-center">{{__('Assets')}}</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @if($assets['Current Assets']->count())
                                                                                    <tr>
                                                                                        <th colspan="3">{{__('Current Assets')}}</th>
                                                                                    </tr>
                                                                                    @foreach ($assets['Current Assets'] as $asset)
                                                                                        <tr>
                                                                                            @if(is_a($asset, 'App\Models\Asset'))
                                                                                            <td></td>
                                                                                            <td>{{$asset->name}}</td>
                                                                                            <td class="text-right">{{\Auth::user()->priceFormat($asset->amount)}}</td>
                                                                                            @php
                                                                                                $assetAmount += $asset->amount;
                                                                                            @endphp
                                                                                            @else
                                                                                            <td></td>
                                                                                            <td>{{$asset->bank_name . ' ' . $asset->holder_name}}</td>
                                                                                            <td class="text-right">{{\Auth::user()->priceFormat($asset->CurrentBalance())}}</td>
                                                                                            @php
                                                                                                $assetAmount += $asset->CurrentBalance();
                                                                                            @endphp
                                                                                            @endif
                                                                                        </tr>
                                                                                    @endforeach
                                                                                @endif
                                                                                @if($assets['Fixed Assets']->count())
                                                                                    <tr>
                                                                                        <th colspan="3">{{__('Fixed Assets')}}</th>
                                                                                    </tr>
                                                                                    @foreach ($assets['Fixed Assets'] as $asset)
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td>{{$asset->name}}</td>
                                                                                            <td class="text-right">{{\Auth::user()->priceFormat($asset->amount)}}</td>
                                                                                            @php
                                                                                                $assetAmount += $asset->amount;
                                                                                            @endphp
                                                                                        </tr>
                                                                                    @endforeach
                                                                                @endif
                                                                                @if($assets['Inventories']->count())
                                                                                    <tr>
                                                                                        <th colspan="3">{{__('Inventories')}}</th>
                                                                                    </tr>
                                                                                    @foreach ($assets['Inventories'] as $asset)
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td>{{$asset->name}}</td>
                                                                                            <td class="text-right">{{\Auth::user()->priceFormat($asset->amount)}}</td>
                                                                                            @php
                                                                                                $assetAmount += $asset->amount;
                                                                                            @endphp
                                                                                        </tr>
                                                                                    @endforeach
                                                                                @endif
                                                                                @if($assets['Non-current Assets']->count())
                                                                                    <tr>
                                                                                        <th colspan="3">{{__('Non-current Assets')}}</th>
                                                                                    </tr>
                                                                                    @foreach ($assets['Non-current Assets'] as $asset)
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td>{{$asset->name}}</td>
                                                                                            <td class="text-right">{{\Auth::user()->priceFormat($asset->amount)}}</td>
                                                                                            @php
                                                                                                $assetAmount += $asset->amount;
                                                                                            @endphp
                                                                                        </tr>
                                                                                    @endforeach
                                                                                @endif
                                                                                @if($assets['Prepayments']->count())
                                                                                    <tr>
                                                                                        <th colspan="3">{{__('Prepayment')}}</th>
                                                                                    </tr>
                                                                                    @foreach ($assets['Prepayment'] as $asset)
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td>{{$asset->name}}</td>
                                                                                            <td class="text-right">{{\Auth::user()->priceFormat($asset->amount)}}</td>
                                                                                            @php
                                                                                                $assetAmount += $asset->amount;
                                                                                            @endphp
                                                                                        </tr>
                                                                                    @endforeach
                                                                                @endif
                                                                                @if($assets['Bank & Cash']->count())
                                                                                    <tr>
                                                                                        <th colspan="3">{{__('Bank & Cash')}}</th>
                                                                                    </tr>
                                                                                    @foreach ($assets['Bank & Cash'] as $asset)
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td>{{$asset->name}}</td>
                                                                                            <td class="text-right">{{\Auth::user()->priceFormat($asset->amount)}}</td>
                                                                                            @php
                                                                                                $assetAmount += $asset->amount;
                                                                                            @endphp
                                                                                        </tr>
                                                                                    @endforeach
                                                                                @endif
                                                                                @if($assets['Depreciations']->count())
                                                                                    <tr>
                                                                                        <th colspan="3">{{__('Depreciations')}}</th>
                                                                                    </tr>
                                                                                    @foreach ($assets['Depreciations'] as $asset)
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td>{{$asset->name}}</td>
                                                                                            <td class="text-right">{{\Auth::user()->priceFormat($asset->amount)}}</td>
                                                                                            @php
                                                                                                $assetAmount += $asset->amount;
                                                                                            @endphp
                                                                                        </tr>
                                                                                    @endforeach
                                                                                @endif
                                                                            </tbody>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th colspan="2">{{__('Total Asset')}}</th>
                                                                                    <th class="text-right">{{\Auth::user()->priceFormat($assetAmount)}}</th>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($liabilityCount)
                                                                        <table class="table table-flush dataTable no-footer">
                                                                            <thead class="thead-light">
                                                                                <tr>
                                                                                    <th colspan="3" class="text-center">{{__('Liabilities')}}</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @if ($liabilities['Current Liabilities']->count())
                                                                                    <tr>
                                                                                        <th colspan="3">{{__('Current Liabilities')}}</th>
                                                                                    </tr>
                                                                                    @foreach ($liabilities['Current Liabilities'] as $liability)
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td>{{$liability->name}}</td>
                                                                                            <td class="text-right">{{\Auth::user()->priceFormat($liability->amount)}}</td>
                                                                                            @php
                                                                                                $liabilityAmount += $liability->amount;
                                                                                            @endphp
                                                                                        </tr>
                                                                                    @endforeach
                                                                                @endif
                                                                                @if ($liabilities['Liabilities']->count())
                                                                                    <tr>
                                                                                        <th colspan="3">{{__('Liabilities')}}</th>
                                                                                    </tr>
                                                                                    @foreach ($liabilities['Liabilities'] as $liability)
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td>{{$liability->name}}</td>
                                                                                            <td class="text-right">{{\Auth::user()->priceFormat($liability->amount)}}</td>
                                                                                            @php
                                                                                                $liabilityAmount += $liability->amount;
                                                                                            @endphp
                                                                                        </tr>
                                                                                    @endforeach
                                                                                @endif
                                                                                @if ($liabilities['Non-current Liabilities']->count())
                                                                                    <tr>
                                                                                        <th colspan="3">{{__('Non-current Liabilities')}}</th>
                                                                                    </tr>
                                                                                    @foreach ($liabilities['Non-current Liabilities'] as $liability)
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td>{{$liability->name}}</td>
                                                                                            <td class="text-right">{{\Auth::user()->priceFormat($liability->amount)}}</td>
                                                                                            @php
                                                                                                $liabilityAmount += $liability->amount;
                                                                                            @endphp
                                                                                        </tr>
                                                                                    @endforeach
                                                                                @endif
                                                                            </tbody>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th colspan="2">{{__('Total Liabilities')}}</th>
                                                                                    <th class="text-right">{{\Auth::user()->priceFormat($liabilityAmount)}}</th>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    @if(!empty($equities))
                                                                    <table class="table table-flush dataTable no-footer">
                                                                        <thead class="thead-light">
                                                                            <tr>
                                                                                <th colspan="3" class="text-center">{{__('Equities')}}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($equities as $equity)
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td>{{$equity->name}}</td>
                                                                                    <td class="text-right">{{\Auth::user()->priceFormat($equity->amount)}}</td>
                                                                                    @php
                                                                                        $equityAmount += $equity->amount;
                                                                                    @endphp
                                                                                </tr>
                                                                            @endforeach
                                                                            <tr>
                                                                                <td></td>
                                                                                <td>{{__('Stock')}}</td>
                                                                                <td class="text-right">
                                                                                    @php
                                                                                        $stockAmount = (!empty($assetAmount) ? $assetAmount : 0) - (!empty($liabilityAmount) ? $liabilityAmount : 0) - (!empty($equityAmount) ? $equityAmount : 0);
                                                                                    @endphp
                                                                                    {{\Auth::user()->priceFormat($stockAmount)}}
                                                                                </td>
                                                                                @php
                                                                                    $equityAmount += $stockAmount;
                                                                                @endphp
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th colspan="2">{{__('Total Equities')}}</th>
                                                                                <th class="text-right">{{\Auth::user()->priceFormat($equityAmount)}}</th>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @else
                                                            <tr class="odd">
                                                                <td colspan="2" class="dataTables_empty">No data available in table</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>    
                                                    <tfoot>
                                                        @if ($assetCount || $liabilityCount || !empty($equity))
                                                            <tr>
                                                                <th class="text-center">{{__('Total')}} : {{\Auth::user()->priceFormat($assetAmount)}}</th>
                                                                <th class="text-center">{{__('Total')}} : {{\Auth::user()->priceFormat($liabilityAmount + $equityAmount)}}</th>
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
	