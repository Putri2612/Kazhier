<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Thermal print') }}</title>
    <style>
        body{
            max-width: 300px;
            margin: 10px auto;
        }
        table{
            width: 100%;
        }
        @media print {
            html, body {
                width: 58mm;
                height: auto;
            }
            body {
                padding:0 0 5mm;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img width="125" src="{{$img}}">
        <hr>
        @php
            $totalQTY = 0;
        @endphp
        <table>
            <tr>
                <td colspan="2">{{ __('NO.') }}</td>
                <td>:</td>
                <td colspan="3">{{ $bill->billNumber() }}</td>
            </tr>
            <tr>
                <td colspan="2">{{ __('Date') }}</td>
                <td>:</td>
                <td colspan="3">{{ Helper::dateFormat($bill->bill_date) }}</td>    
            </tr>
            <tr>
                <td colspan="2">{{ __('Server') }}</td>
                <td>:</td>
                <td colspan="3">{{ empty($bill->server) ? '' : $bill->server->name }}</td>
            </tr>
            <tr>
                <td colspan="2">{{ __('Vender') }}</td>
                <td>:</td>
                <td colspan="3">{{ $vendor->name }}</td>
            </tr>
            <tr><td colspan="6"><hr></td></tr>
            @if(isset($bill->items) && count($bill->items) > 0)
                @foreach($bill->items as $key => $item)
                @php
                    $totalQTY += $item->quantity;
                @endphp
                    <tr>
                        <td>{{ substr($item->name, 0, 6) }}</td>
                        <td>{{ $item->price }}</td>
                        <td>x</td>
                        <td>{{ $item->quantity }}</td>
                        <td>=</td>
                        <td>{{ $item->price * $item->quantity }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                </tr>
            @endif
            <tr>
                <td colspan="6">
                    <hr>
                </td>
            </tr>
            <tr>
                <td>{{ __('BRS') }} = {{ count($bill->items) }}</td>
                <td>{{ __('QTY') }} = {{ $totalQTY }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $bill->getSubTotal() }}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2">{{ __('DISC') }}</td>
                <td>=</td>
                <td>{{ $bill->getTotalDiscount() }}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2">{{ __('TAX') }}</td>
                <td>=</td>
                <td>{{ $bill->getTotalTax() }}</td>
            </tr>
            <tr>
                @php
                    $total = $bill->getSubTotal()-$bill->getTotalDiscount()+$bill->getTotalTax();
                @endphp
                <td colspan="2"></td>
                <td colspan="2">{{ __('TOTAL') }}</td>
                <td>=</td>
                <td>{{ $total }}</td>
            </tr>
            <tr>
                <td colspan="6"><hr></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2">{{ __('DEBIT') }}</td>
                <td>=</td>
                <td>{{ $bill->payments()->sum('amount')  }}</td>
            </tr>
            <tr>
                <td colspan="6"><hr></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>{{ __('DUE ') }}</td>
                <td>=</td>
                <td>{{ $bill->getDue()  }}</td>
            </tr>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>