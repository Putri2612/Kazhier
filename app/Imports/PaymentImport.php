<?php

namespace App\Imports;

use App\Classes\Helpers\ImportDateFormatter as DateFormatter;
use App\Models\BankAccount;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\ProductServiceCategory;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Vender;
use App\Traits\CanManageBalance;
use App\Traits\CanManageIDs;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\AfterImport;
use Symfony\Component\HttpFoundation\File\Exception\NoFileException;

class PaymentImport implements ToCollection, WithHeadingRow, WithEvents
{
    use RegistersEventListeners, CanManageIDs, CanManageBalance;

    /**
    * @param Collection $collection
    */
    private $headingNames, $user, $row, $processed;
    private static $failMessage = '', $noDataProcessed = false;

    public function __construct($headings, User $user)
    {
        $this->headingNames = $headings;
        $this->user         = $user;
        $this->row          = 0;
        $this->processed    = 0;
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collections)
    {
        $headings   = $this->headingNames;
        $fails      = '';
        foreach($collections as $collection) {
            $this->row++;
            $collection = $collection->toArray();
            $validator = Validator::make($collection, [
                $headings['date']       => 'required',
                $headings['amount']     => 'numeric',
                $headings['account']    => 'string|regex:/^[\w\-\s]*/i',
            ]);
            if($validator->fails()) {
                foreach($validator->errors()->all() as $message) {
                    $fails .= "Error: {$message} on row {$this->row}\n";
                }
                continue;
            }

            $this->processed++;
            $categoryID = ProductServiceCategory::where('created_by', $this->user->creatorId())
                            ->where('type', 2)->first();
            
            if(!empty($headings['category']) && $headings['category'] != '---') {
                $validator = Validator::make($collection, [
                    $headings['category'] => 'string|regex:/^[\w\-\s]*/i',
                ]);
                if($validator->fails()) {
                    $message = __('Category name invalid');
                    $fails  .= "Error: {$message} on row {$this->row}\n";
                } else {
                    $category = ProductServiceCategory::firstOrNew(['name' => $collection[$headings['category']], 'type' => 2, 'created_by' => $this->user->creatorId()]);
                    if(!$category->exists) {
                        $category->color = '0087ff';
                        $category->save();
                    }
                    $categoryID = $category;
                }
            }

            if(!empty($categoryID)) {
                $categoryID = $categoryID->id;
            } else {
                $categoryID = ProductServiceCategory::create(['name' => 'Penjualan', 'color' => '0087ff', 'type' => 2, 'created_by' => $this->user->creatorId()])->id;
            }

            $payment_methodID = PaymentMethod::where('created_by', $this->user->creatorId())->first();
            
            if(!empty($headings['payment_method']) && $headings['payment_method'] != '---') {
                $validator = Validator::make($collection, [
                    $headings['payment_method'] => 'string|regex:/^[\w\-\s]*/i',
                ]);
                if($validator->fails()) {
                    $message = __('Payment method invalid');
                    $fails  .= "Error: {$message} on row {$this->row}\n";
                } else {
                    $payment_method = PaymentMethod::firstOrNew(['name' => $collection[$headings['payment_method']], 'created_by' => $this->user->creatorId()]);
                    if(!$payment_method->exists) {
                        $payment_method->save();
                    }
                    $payment_methodID = $payment_method;
                }
            }

            if(!empty($payment_methodID)) {
                $payment_methodID = $payment_methodID->id;
            } else {
                $payment_methodID = PaymentMethod::create([
                    'name' => 'Transfer Bank', 
                    'created_by' => $this->user->creatorId()
                ])->id;
            }
            
            $description = ' ';
            if(!empty($headings['description']) && $headings['description'] != '---') {
                $validator = Validator::make($collection, [
                    $headings['description'] => 'string|regex:/^[\w\-\s\n\r\(\)]*/i'
                ]);

                if($validator->fails()) {
                    $message = __('Description invalid');
                    $fails  .= "Error: {$message} on row {$this->row}\n";
                } else {
                    $description = $collection[$headings['description']];
                }
            }


            $accountID = BankAccount::where('created_by', $this->user->creatorId())->first();

            if(!empty($headings['account']) && $headings['account'] != '---') {
                $validator = Validator::make($collection, [
                    $headings['account'] => 'string|regex:/^[\w\-\s]*/i',
                ]);
                if($validator->fails()) {
                    $message = __('Bank account invalid');
                    $fails  .= "Error: {$message} on row {$this->row}\n";
                } else if($this->user->currentPlan->max_bank_accounts > $this->user->countBankAccount()){
                    $exploded   = explode('-', $collection[$headings['account']]);
                    $bank_name  = count($exploded) > 1 ? $exploded[0] : 'Bank Indonesia';
                    $holder_name= count($exploded) > 1 ? $exploded[1] : $exploded[0];
                    $account = BankAccount::firstOrNew([
                        'holder_name'   => $holder_name,
                        'bank_name'     => $bank_name,
                        'created_by'    => $this->user->creatorId()
                    ]);
                    if(!$account->exists) {
                        $account->bank_address      = 'Indonesia';
                        $account->account_number    = '000';
                        $account->opening_balance   = 100000;
                        $account->contact_number    = '000';
                        $account->save();
                    }
                    $accountID = $account;
                } else {
                    $exploded   = explode('-', $collection[$headings['account']]);
                    $bank_name  = count($exploded) > 1 ? $exploded[0] : 'Bank Indonesia';
                    $holder_name= count($exploded) > 1 ? $exploded[1] : $exploded[0];
                    $account = BankAccount::where('holder_name', $holder_name)
                                ->where('bank_name', $bank_name)
                                ->where('created_by', $this->user->creatorId())
                                ->first();
                    if(!empty($account)) {
                        $accountID = $account;
                    }
                }
            }

            if(!empty($accountID)) {
                $accountID = $accountID->id;
            } else {
                $accountID = BankAccount::create([
                    'holder_name'       => $this->user->name, 
                    'created_by'        => $this->user->creatorId(),
                    'bank_name'         => 'Bank Indonesia',
                    'account_number'    => '000',
                    'opening_balance'   => 100000,
                    'contact_number'    => '000',
                ])->id;
            }

            $venderID = null;

            if(!empty($headings['vender']) && $headings['vender'] != '---') {
                $validator = Validator::make($collection, [
                    $headings['vender'] => 'string|regex:/^[\w\-\s]*/i',
                ]);
                if($validator->fails()) {
                    $message = __('Vendor name invalid');
                    $fails  .= "Error: {$message} on row {$this->row}\n";
                } else {
                    $vender = Vender::firstOrNew([
                        'name'      => $collection[$headings['vender']],
                        'created_by'=> $this->user->creatorId()
                    ]);

                    if(!$vender->exists) {
                        $vender->email = '';
                        $vender->billing_phone = $vender->shipping_phone = $vender->contact  = '080000000000';
                        $vender->billing_name = $vender->shipping_name  = $vender->name;
                        $vender->billing_address = $vender->shipping_address = 'Indonesia';
                        $vender->vender_id  = $this->VenderNumber();
                        $vender->save();
                    }
                    $venderID = $vender->id;
                }
            }

            $date = DateFormatter::format($collection[$headings['date']]);

            $payment                = new Payment();
            $payment->date          = $date;
            $payment->amount        = $collection[$headings['amount']];
            $payment->account_id    = $accountID;
            $payment->vender_id     = $venderID;
            $payment->category_id   = $categoryID;
            $payment->payment_method= $payment_methodID;
            $payment->created_by    = $this->user->creatorId();
            $payment->description   = $description;
            $payment->save();

            $this->AddBalance($accountID, -($payment->amount), $payment->date);

            $payment->payment_id = $payment->id;
            $payment->payment_id = $payment->id;
            $payment->type       = 'Payment';
            $payment->category   = $category->name;
            $payment->user_id    = $payment->vender_id;
            $payment->user_type  = 'Vender';

            Transaction::addTransaction($payment);
        }
        if($fails != ''){
            Log::debug($fails);
            self::$failMessage .= $fails;
        }
        if(!$this->processed) {
            self::$noDataProcessed = true;
        }
    }

    public static function afterImport(AfterImport $event) {
        if(self::$noDataProcessed) {
            throw new NoFileException(__('No data imported!'));
        }
        if(self::$failMessage != '') {
            throw new \Exception(self::$failMessage);
        }
    }
}
