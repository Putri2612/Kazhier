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
    @foreach($incomeArr as $i=>$income)
        <tr>
            <td>{{$income['category']}}</td>
            @foreach($income['data'] as $j=>$data)
                <td>{{\Auth::user()->priceFormat($data)}}</td>
            @endforeach
        </tr>
    @endforeach
    <tr>
        <td colspan="13"><b><h6>{{__('Invoice :')}}</h6></b></td>
    </tr>
    @foreach($invoiceArray as $i=>$invoice)
        <tr>
            <td>{{$invoice['category']}}</td>
            @foreach($invoice['data'] as $j=>$data)
                <td>{{\Auth::user()->priceFormat($data)}}</td>
            @endforeach
        </tr>
    @endforeach
    <tr>
        <td colspan="13"><b><h6>{{__('Income = Revenue + Invoice :')}}</h6></b></td>
    </tr>
    <tr>
        <td>{{__('Total')}}</td>
        @foreach($chartIncomeArr as $i=>$income)
            <td>{{\Auth::user()->priceFormat($income)}}</td>
        @endforeach
    </tr>
    </tbody>
</table>