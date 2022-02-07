<table>
    <thead>
        <tr>
            <th colspan="4"><b>{{ __('Category') }}</b></th>
            @foreach ($month as $m)
                <th><b>{{ $m }}</b></th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        <tr>
            <th colspan="{{count($month) + 4}}"><b>{{ __('Income') }}</b></th>
        </tr>
        <tr>
            <td></td>
            <th colspan="{{count($month) + 3}}"><b>{{__('Invoice : ')}}</b></th>
        </tr>
        @if(!empty($invoiceIncome))
            @foreach($invoiceIncome as $invoice)
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">{{$invoice['category']}}</td>
                    @foreach($invoice['amount'] as $amount)
                        <td>{{\Auth::user()->priceFormat($amount)}}</td>
                    @endforeach
                </tr>
            @endforeach
        @endif
        
        <tr>
            <td></td>
            <th colspan="{{count($month) + 3}}"><b>{{__('Revenue : ')}}</b></th>
        </tr>
        @if(!empty($revenueIncome))
            @foreach($revenueIncome as $revenue)
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">{{$revenue['category']}}</td>
                    @foreach($revenue['amount'] as $amount)
                        <td>{{\Auth::user()->priceFormat($amount)}}</td>
                    @endforeach
                </tr>
            @endforeach
        @endif
        <tr>
            <td colspan="3"></td>
            <th><b>{{ __('Total Income') }}:</b></th>
            @foreach($totalIncome as $income)
                <th><b>{{\Auth::user()->priceFormat($income)}}</b></th>
            @endforeach
        </tr>
        <tr><td colspan="{{count($month) + 4}}"></td></tr>
        <tr>
            <th colspan="{{count($month) + 4}}"><b>{{ __('Expense') }}</b></th>
        </tr>
        <tr>
            <td></td>
            <th colspan="{{count($month) + 3}}"><b>{{__('Bill : ')}}</b></th>
        </tr>
        @if(!empty($billExpense))
            @foreach($billExpense as $bill)
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">{{$bill['category']}}</td>
                    @foreach($bill['amount'] as $amount)
                        <td>{{\Auth::user()->priceFormat($amount)}}</td>
                    @endforeach
                </tr>
            @endforeach
        @endif
        <tr>
            <td></td>
            <th colspan="{{count($month) + 3}}"><b>{{__('Payment : ')}}</b></th>
        </tr>
        @if(!empty($paymentExpense))
            @foreach($paymentExpense as $expense)
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">{{$expense['category']}}</td>
                    @foreach($expense['amount'] as $amount)
                        <td>{{\Auth::user()->priceFormat($amount)}}</td>
                    @endforeach
                </tr>
            @endforeach
        @endif
        <tr>
            <td colspan="3"></td>
            <th><b>{{ __('Total Expenses') }}:</b></th>
            @foreach($totalExpense as $expense)
                <th><b>{{\Auth::user()->priceFormat($expense)}}</b></th>
            @endforeach
        </tr>
        <tr><td colspan="{{count($month) + 4}}"></td></tr>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4"><b>{{__('Net Profit : ')}}</b></th>
            @foreach($netProfitArray as $i=>$profit)
                <td> {{\Auth::user()->priceFormat($profit)}}</td>
            @endforeach
        </tr>
    </tfoot>
</table>