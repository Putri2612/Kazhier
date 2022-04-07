<?php

namespace App\Exports;

use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class BillExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $bills      = Bill::with(['vender', 'server', 'category', 'payments', 'payments.bankAccount', 'payments.server', 'items', 'items.product'])
                    ->where('created_by', '=', Auth::user()->creatorId())->orderBy('issue_date', 'asc')->get();
        $data       = [];
        $number     = 1;

        foreach ($bills as $bill) {
            $content = [
                'number'            => $number++,
                'bill_id'           => $bill->bill_id,
                'issue_date'        => $bill->issue_date,
                'due_date'          => $bill->due_date,
                'customer_name'     => $bill->vender->name,
                'status'            => Bill::$statuses[$bill->status],
                'category'          => $bill->category->name,
                'served_by'         => $bill->server ? $bill->server->name : Auth::user()->name,
                'payments'          => '',
                'payment_servers'   => '',
                'payment_accounts'  => '',
                'items'             => '',
                'items_quantity'    => '',
            ];
            foreach($bill->payments as $payment) {
                $account    = $payment->bankAccount;
                $content['payments']            .= $payment->amount . '; ';
                $content['payment_accounts']    .= $account->bank_name . '-' . $account->holder_name. '; ';
                $content['payment_servers']     .= $payment->server ? $payment->server->name : Auth::user()->name . '; ';
            }

            foreach($bill->items as $item) {
                $content['items']           .= $item->product->name . '; ';
                $content['items_quantity']  .= $item->quantity. '; ';
            }
            
            array_push($data, $content);
        }

        return collect($data);
    }

    public function headings():array{
        return [
            '#', 'Bill ID', 'Issue Date', 'Due Date', 'Customer Name', 'Status', 'Category',
            'Server', 'Payments', 'Payment Servers', 'Payment Account', 'Items', 'Items Quantity'
        ];
    }
}
