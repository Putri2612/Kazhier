<?php

namespace App\Exports;

use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvoiceExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        $invoices   = Invoice::with(['customer', 'payments', 'server', 'payments.bankAccount', 'payments.server', 'items', 'items.product'])
                    ->where('created_by', '=', Auth::user()->creatorId())->orderBy('issue_date', 'asc')->get();
        $data       = [];
        $number     = 1;

        foreach ($invoices as $invoice) {
            $content = [
                'number'            => $number++,
                'invoice_id'        => $invoice->invoice_id,
                'issue_date'        => $invoice->issue_date,
                'due_date'          => $invoice->due_date,
                'customer_name'     => $invoice->customer->name,
                'status'            => $invoice->getStatus(),
                'category'          => $invoice->category()->first()->name,
                'served_by'         => $invoice->server ? $invoice->server->name : Auth::user()->name,
                'payments'          => '',
                'payment_servers'   => '',
                'payment_accounts'  => '',
                'items'             => '',
                'items_quantity'    => '',
            ];
            foreach($invoice->payments as $payment) {
                $account    = $payment->bankAccount;
                $content['payments']            .= $payment->amount . '; ';
                $content['payment_accounts']    .= $account->bank_name . '-' . $account->holder_name. '; ';
                $content['payment_servers']     .= $payment->server ? $payment->server->name : Auth::user()->name . '; ';
            }

            foreach($invoice->items as $item) {
                $content['items']           .= $item->product->name . '; ';
                $content['items_quantity']  .= $item->quantity. '; ';
            }
            
            array_push($data, $content);
        }

        return collect($data);
    }

    public function headings():array{
        return [
            '#', 'Invoice ID', 'Issue Date', 'Due Date', 'Customer Name', 'Status', 'Category',
            'Server', 'Payments', 'Payment Servers', 'Payment Account', 'Items', 'Items Quantity'
        ];
    }
}
