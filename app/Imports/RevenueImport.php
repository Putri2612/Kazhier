<?php

namespace App\Imports;

use App\Classes\Helpers\ImportDateFormatter as DateFormatter;
use App\Models\BankAccount;
use App\Models\Customer;
use App\Models\PaymentMethod;
use App\Models\ProductServiceCategory;
use App\Models\Revenue;
use App\Models\Transaction;
use App\Models\User;
use App\Traits\CanManageBalance;
use App\Traits\CanManageIDs;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\AfterImport;
use Symfony\Component\HttpFoundation\File\Exception\NoFileException;

class RevenueImport implements ToCollection, WithHeadingRow, WithEvents
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
                    $fails .= __("Error: :message on row :row", ['message' => $message, 'row' => $this->row]);
                    $fails .= '\n';
                }
                continue;
            }

            $this->processed++;
            $categoryID = ProductServiceCategory::where('created_by', $this->user->creatorId())
                            ->where('type', 1)->first();
            
            if(!empty($headings['category']) && $headings['category'] != '---') {
                $validator = Validator::make($collection, [
                    $headings['category'] => 'string|regex:/^[\w\-\s]*/i',
                ]);
                if($validator->fails()) {
                    $message = __('Category name invalid');
                    $fails  .= __("Error: :message on row :row", ['message' => $message, 'row' => $this->row]);
                    $fails  .= '<br/>';
                } else {
                    $category = ProductServiceCategory::firstOrNew(['name' => $collection[$headings['category']], 'type' => 1, 'created_by' => $this->user->creatorId()]);
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
                $categoryID = ProductServiceCategory::create(['name' => 'Penjualan', 'color' => '0087ff', 'type' => 1, 'created_by' => $this->user->creatorId()])->id;
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
                $payment_methodID = PaymentMethod::create(['name' => 'Transfer Bank', 'created_by' => $this->user->creatorId()])->id;
            }

            $description = ' ';
            if(!empty($headings['description']) && $headings['description'] != '---') {
                $validator = Validator::make($collection, [
                    $headings['description'] => 'string|nullable|regex:/^[\w\-\s\n\r\(\)]*/i'
                ]);

                if($validator->fails()) {
                    $message = __("Description invalid, please only use these characters: A-Z, a-z, 0-9, \"(\", \")\", and \"-\"");
                    $fails  .= __("Error: :message on row :row", ['message' => $message, 'row' => $this->row]);
                    $fails  .= '<br/>';
                } else if($collection[$headings['description']]){
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
                    $fails  .= __("Error: :message on row :row", ['message' => $message, 'row' => $this->row]);
                    $fails  .= '<br/>';
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
                    'bank_address'      => 'Indonesia',
                    'opening_balance'   => 100000,
                    'contact_number'    => '000',
                ])->id;
            }

            $customerID = null;

            if(!empty($headings['customer']) && $headings['customer'] != '---') {
                $validator = Validator::make($collection, [
                    $headings['customer'] => 'string|regex:/^[\w\-\s]*/i',
                ]);
                if($validator->fails()) {
                    $message = __('Customer name invalid');
                    $fails  .= __("Error: :message on row :row", ['message' => $message, 'row' => $this->row]);
                    $fails  .= '<br/>';
                } else {
                    $customer = Customer::firstOrNew([
                        'name'          => $collection[$headings['customer']],
                        'created_by'    => $this->user->creatorId()
                    ]);
                    if(!$customer->exists) {
                        $customer->email    = '';
                        $customer->billing_phone = $customer->shipping_phone = $customer->contact  = '080000000000';
                        $customer->billing_name = $customer->shipping_name  = $customer->name;
                        $customer->billing_address = $customer->shipping_address = 'Indonesia';
                        $customer->customer_id  = $this->CustomerNumber();
                        $customer->save();
                    }
                    $customerID = $customer->id;
                }
            }
            
            $date = DateFormatter::format($collection[$headings['date']]);

            $revenue                 = new Revenue();
            $revenue->date           = $date;
            $revenue->amount         = $collection[$headings['amount']];
            $revenue->account_id     = $accountID;
            $revenue->customer_id    = $customerID;
            $revenue->category_id    = $categoryID;
            $revenue->payment_method = $payment_methodID;
            $revenue->created_by     = $this->user->creatorId();
            $revenue->description    = $description;
            $revenue->save();

            $this->AddBalance($accountID, $collection[$headings['amount']], $date);

            $revenue->payment_id = $revenue->id;
            $revenue->type       = 'Payment';
            $revenue->category   = $category->name;
            $revenue->user_id    = $revenue->customer_id;
            $revenue->user_type  = 'Customer';

            Transaction::addTransaction($revenue);
        }
        if($fails != ''){
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
