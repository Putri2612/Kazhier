<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_id',
        'customer_id',
        'issue_date',
        'due_date',
        'ref_number',
        'status',
        'type',
        'category_id',
        'created_by',
    ];

    public static $statuses = [
        'default' => [
            'Draft',            // 0
            'Sent',             // 1
            'Unpaid',           // 2
            'Partialy Paid',    // 3
            'Paid',             // 4
        ],
        'pickup' => [
            'Draft',                // 0
            'Awaiting For Pickup',  // 1
            'Picked Up',            // 2
            'Unpaid',               // 3
            'Partialy Paid',        // 4
            'Paid',                 // 5
        ],
        'delivery' => [
            'Draft',                         // 0
            'Preparing',                     // 1
            'Prepared, Waiting For Courier', // 2
            'Delivering',                    // 3
            'Delivered',                     // 4
            'Partialy Paid',                 // 5
            'Paid',                          // 6
        ]
    ];

    public static $types = [
        'Default',
        'Pickup',
        'Delivery'
    ];

    protected $casts = [
        'issue_date'    => 'datetime',
        'due_date'      => 'datetime',
    ];

    public function getStatus() {
        return __(self::$statuses[strtolower($this->getType())][$this->status]);
    }

    public function updateStatus() {
        $due = $this->getDue();

        $status = self::$statuses[strtolower($this->getType())];

        if($due <= 0) {
            $this->status = array_search('Paid', $status);
        } else if($due == $this->getTotal()) {
            $this->status = array_search('Unpaid', $status);
            if($this->status === false) {
                $this->status = array_search('Delivered', $status);
            }
        } else {
            $this->status = array_search('Partialy Paid', $status);
        }
        $this->save();
    }

    public function getType() {
        if(empty($this->type)) {
            $type = 0;
        } else {
            $type = $this->type;
        }

        return self::$types[$type];
    }


    public function tax()
    {
        return $this->hasOne(Tax::class, 'id', 'tax_id');
    }

    public function items()
    {
        return $this->hasMany(InvoiceProduct::class, 'invoice_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany(InvoicePayment::class, 'invoice_id', 'id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function getSubTotal()
    {
        $subTotal = 0;
        foreach($this->items as $product)
        {
            $subTotal += ($product->price * $product->quantity);
        }

        return $subTotal;
    }

    public function getTotalTax()
    {
        $totalTax = 0;
        foreach($this->items as $product)
        {
            $totalTax += ($product->tax / 100) * ($product->price * $product->quantity);
        }

        return $totalTax;
    }

    public function getTotalDiscount()
    {
        $totalDiscount = $this->items()->sum('discount');

        return $totalDiscount;
    }

    public function getTotal()
    {
        return ($this->getSubTotal() + $this->getTotalTax()) - $this->getTotalDiscount();
    }

    public function getDue()
    {
        $due = $this->payments()->sum('amount');

        return ($this->getTotal() - $due) - $this->invoiceTotalCreditNote();
    }

    public static function change_status($invoice_id, $status)
    {

        $invoice         = Invoice::find($invoice_id);
        $invoice->status = $status;
        $invoice->update();
    }

    public function category()
    {
        return $this->hasOne(ProductServiceCategory::class, 'id', 'category_id');
    }

    public function creditNote()
    {

        return $this->hasMany(CreditNote::class, 'invoice', 'id');
    }

    public function invoiceTotalCreditNote()
    {
        return $this->hasMany(CreditNote::class, 'invoice', 'id')->sum('amount');
    }

    public function lastPayments()
    {
        return $this->hasOne(InvoicePayment::class, 'id', 'invoice_id');
    }
    public function server(){
        return $this->hasOne(User::class, 'id', 'served_by');
    }

    public function invoiceNumber() {
        $settings = Utility::settings();

        return $settings['invoice_prefix'] . sprintf("%05d", $this->invoice_id);
    }

    public function withSignature() {
        return isset($this->signed_by) && isset($this->signee_position);
    }

    public static function number($id) {
        $settings = Utility::settings();
        return $settings["invoice_prefix"] . sprintf("%05d", $id);
    }

    public static function weekly() {
        $start  = now()->startOfWeek();
        $end    = (clone $start)->endOfWeek();
        $invoices = Invoice::select('id')
                    ->where('created_by', Auth::user()->creatorId())
                    ->where('issue_date', '>=', $start)
                    ->where('issue_date', '<=', $end)
                    ->get();
        return self::processStatistic($invoices);
    }

    public static function monthly() {
        $start  = now()->startOfMonth();
        $end    = (clone $start)->endOfMonth();
        $invoices = Invoice::select('id')
                    ->where('created_by', Auth::user()->creatorId())
                    ->where('issue_date', '>=', $start)
                    ->where('issue_date', '<=', $end)
                    ->get();
        return self::processStatistic($invoices);
    }

    private static function processStatistic($invoices) {
        $detail = [
            'invoiceTotal'  => 0,
            'invoicePaid'   => 0,
            'invoiceDue'    => 0
        ];

        foreach($invoices as $invoice) {
            $detail['invoiceTotal'] += $invoice->getTotal();
            $detail['invoicePaid']  += ($invoice->getTotal() - $invoice->getDue());
            $detail['invoiceDue']   += $invoice->getDue();
        }

        return $detail;
    }
}
