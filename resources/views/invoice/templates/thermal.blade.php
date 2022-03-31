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
                <td colspan="3">{{ Utility::invoiceNumberFormat($settings,$invoice->invoice_id) }}</td>
            </tr>
            <tr>
                <td colspan="2">{{ __('Date') }}</td>
                <td>:</td>
                <td colspan="3">{{ Utility::dateFormat($settings,$invoice->issue_date) }}</td>    
            </tr>
            <tr>
                <td colspan="2">{{ __('Server') }}</td>
                <td>:</td>
                <td colspan="3">{{ empty($invoice->server) ? '' : $invoice->server->name }}</td>
            </tr>
            <tr>
                <td colspan="2">{{ __('Customer') }}</td>
                <td>:</td>
                <td colspan="3">{{ $customer->name }}</td>
            </tr>
            <tr><td colspan="6"><hr></td></tr>
            @if(isset($invoice->items) && count($invoice->items) > 0)
                @foreach($invoice->items as $key => $item)
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
                <td>{{ __('BRS') }} = {{ count($invoice->items) }}</td>
                <td>{{ __('QTY') }} = {{ $totalQTY }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $invoice->getSubTotal() }}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2">{{ __('DISC') }}</td>
                <td>=</td>
                <td>{{ $invoice->getTotalDiscount() }}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2">{{ __('TAX') }}</td>
                <td>=</td>
                <td>{{ $invoice->getTotalTax() }}</td>
            </tr>
            <tr>
                @php
                    $total = $invoice->getSubTotal()-$invoice->getTotalDiscount()+$invoice->getTotalTax();
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
                <td colspan="2">{{ __('CREDIT') }}</td>
                <td>=</td>
                <td>{{ $invoice->payments()->sum('amount')  }}</td>
            </tr>
            <tr>
                <td colspan="6"><hr></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>{{ __('DUE ') }}</td>
                <td>=</td>
                <td>{{ $invoice->getDue()  }}</td>
            </tr>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>