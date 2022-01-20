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
        <td>{{(__('Invoice'))}}</td>
        @foreach($invoiceIncomeTotal as $invoice)
            <td>{{\Auth::user()->priceFormat($invoice)}}</td>
        @endforeach
    </tr>
    <tr>
        <td>{{(__('Revenue'))}}</td>
        @foreach($revenueIncomeTotal as $revenue)
            <td>{{\Auth::user()->priceFormat($revenue)}}</td>
        @endforeach
    </tr>
    <tr>
        <td colspan="13"><b><h6>{{__('Expense : ')}}</h6></b></td>
    </tr>
    <tr>
        <td>{{(__('Bill'))}}</td>
        @foreach($billExpenseTotal as $bill)
            <td>{{\Auth::user()->priceFormat($bill)}}</td>
        @endforeach
    </tr>
    <tr>
        <td>{{(__('Payment'))}}</td>
        @foreach($paymentExpenseTotal as $payment)
            <td>{{\Auth::user()->priceFormat($payment)}}</td>
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