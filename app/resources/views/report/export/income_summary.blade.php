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
    @foreach($revenues as $revenue)
        <tr>
            <td>{{$revenue['category']}}</td>
            @foreach($revenue['data'] as $data)
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