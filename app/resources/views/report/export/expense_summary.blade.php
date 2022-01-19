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
    @foreach($expenseArr as $i=>$expense)
        <tr>
            <td>{{$expense['category']}}</td>
            @foreach($expense['data'] as $j=>$data)
                <td>{{\Auth::user()->priceFormat($data)}}</td>
            @endforeach
        </tr>
    @endforeach
    <tr>
        <td colspan="13"><b><h6>{{__('Bill :')}}</h6></b></td>
    </tr>
    @foreach($billArray as $i=>$bill)
        <tr>
            <td>{{$bill['category']}}</td>
            @foreach($bill['data'] as $j=>$data)
                <td>{{\Auth::user()->priceFormat($data)}}</td>
            @endforeach
        </tr>
    @endforeach
    <tr>
        <td colspan="13"><b><h6>{{__('Expense = Payment + Bill :')}}</h6></b></td>
    </tr>
    <tr>
        <td>{{__('Total')}}</td>
        @foreach($chartExpenseArr as $i=>$expense)
            <td>{{\Auth::user()->priceFormat($expense)}}</td>
        @endforeach
    </tr>
    </tbody>
</table>