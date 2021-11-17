<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\CustomField;
use App\Models\Order;
use App\Models\Plan;
use App\Models\User;
use App\Models\UserCompany; 
use App\Models\BankAccount;
use App\Models\Bill;
use App\Models\Payment;
use App\Models\BillPayment;
use App\Models\BillProduct;
use App\Models\Customer;
use App\Models\Goal;
use App\Models\Invoice;
use App\Models\Revenue;
use App\Models\InvoicePayment;
use App\Models\InvoiceProduct;
use App\Models\PaymentMethod;
use App\Models\ProductService;
use App\Models\ProductServiceCategory;
use App\Models\ProductServiceUnit;
use App\Models\Proposal;
use App\Models\ProposalProduct;
use App\Models\Tax;
use App\Models\Transfer;
use App\Models\Transaction;
use App\Models\Vender;
use App\Traits\CanManageBalance;
use Auth;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    use CanManageBalance;

    public function index()
    {
        $user = \Auth::user();
        if(\Auth::user()->can('manage user'))
        {
            if(\Auth::user()->type == 'super admin')
            {
                $users = User::where('created_by', '=', $user->creatorId())->where('type', '=', 'company')->get();
            }
            else
            {
                $users = User::where('created_by', '=', $user->creatorId())->where('type', '!=', 'client')->get();
            }

            return view('user.index')->with('users', $users);
        }
        else
        {
            return redirect()->back();
        }

    }


    public function create()
    {
        $customFields = CustomField::where('module', '=', 'user')->get();

        $user  = \Auth::user();
        $roles = Role::where('created_by', '=', $user->creatorId())->get()->pluck('name', 'id');
        if(\Auth::user()->can('create user'))
        {
            return view('user.create', compact('roles', 'customFields'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {

        if(\Auth::user()->can('create user'))
        {
            if(\Auth::user()->type == 'super admin')
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required|max:120',
                                       'email' => 'required|email|unique:users',
                                       'password' => 'required|min:6',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $user               = new User();
                $user['name']       = $request->name;
                $user['email']      = $request->email;
                $user['password']   = Hash::make($request->password);
                $user['type']       = 'company';
                $user['lang']       = 'id';
                $user['created_by'] = \Auth::user()->creatorId();
                $user['plan']       = Plan::first()->id;
                $user->save();
                CustomField::saveData($user, $request->customField);

                $role_r = Role::findByName('company');
                $user->assignRole($role_r);

            }
            else
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required|max:120',
                                       'email' => 'required|email|unique:users',
                                       'password' => 'required|min:6',
                                       'role' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }


                $objUser    = \Auth::user();
                $total_user = $objUser->countUsers();
                $plan       = Plan::find($objUser->plan);
                if($total_user < $plan->max_users || $plan->max_users == -1)
                {
                    $role_r                = Role::findById($request->role);
                    $request['password']   = Hash::make($request->password);
                    $request['type']       = $role_r->name;
                    $request['lang']       = 'id';
                    $request['created_by'] = \Auth::user()->creatorId();

                    $user = User::create($request->all());
                    CustomField::saveData($user, $request->customField);

                    $user->assignRole($role_r);
                }
                else
                {
                    return redirect()->back()->with('error', __('Your user limit is over, Please upgrade plan.'));
                }
            }


            return redirect()->route('users.index')->with(
                'success', 'User successfully added.'
            );
        }
        else
        {
            return redirect()->back();
        }

    }

    public function edit($id)
    {

        $user  = \Auth::user();
        $roles = Role::where('created_by', '=', $user->creatorId())->get()->pluck('name', 'id');
        if(\Auth::user()->can('edit user'))
        {
            $user              = User::findOrFail($id);
            $user->customField = CustomField::getData($user, 'user');
            $customFields      = CustomField::where('module', '=', 'user')->get();

            return view('user.edit', compact('user', 'roles', 'customFields'));
        }
        else
        {
            return redirect()->back();
        }

    }


    public function update(Request $request, $id)
    {

        if(\Auth::user()->can('edit user'))
        {
            if(\Auth::user()->type == 'super admin')
            {
                $user = User::findOrFail($id);

                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required|max:120',
                                       'email' => 'required|email|unique:users,email,' . $id,
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $input = $request->all();
                $user->fill($input)->save();
                CustomField::saveData($user, $request->customField);

                return redirect()->route('users.index')->with(
                    'success', 'User successfully updated.'
                );
            }
            else
            {
                $user = User::findOrFail($id);
                $this->validate(
                    $request, [
                                'name' => 'required|max:120',
                                'email' => 'required|email|unique:users,email,' . $id,
                                'role' => 'required',
                            ]
                );

                $role          = Role::findById($request->role);
                $input         = $request->all();
                $input['type'] = $role->name;
                $user->fill($input)->save();

                CustomField::saveData($user, $request->customField);

                $roles[] = $request->role;
                $user->roles()->sync($roles);

                return redirect()->route('users.index')->with(
                    'success', 'User successfully updated.'
                );
            }
        }
        else
        {
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        if(\Auth::user()->can('delete user'))
        {
            $user = User::find($id);
            if($user)
            {
                if(\Auth::user()->type == 'super admin')
                {
                    if($user->delete_status == 0)
                    {
                        $user->delete_status = 1;
                    }
                    else
                    {
                        $user->delete_status = 0;
                    }
                    $user->save();
                }
                else
                {
                    $user->delete();

                }

                return redirect()->route('users.index')->with('success', __('User successfully deleted .'));
            }
            else
            {
                return redirect()->back()->with('error', __('Something is wrong.'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function destroyPermanently($id){
        if(\Auth::user()->type == 'super admin'){
            $user = User::find($id);
            if($user && $user->delete_status){
                // bills, invoices, payments, revenues
                $revenues        = Revenue::where('created_by', '=', $user->creatorId())->get();
                $payments        = Payment::where('created_by', '=', $user->creatorId())->get();
                $transfers       = Transfer::where('creator_id', '=', $user->creatorId())->get();
                $invoicePayments = InvoicePayment::where('created_by', '=', $user->creatorId())->get();
                $billPayments    = BillPayment::where('created_by', '=', $user->creatorId())->get();
                $invoices        = Invoice::where('created_by', '=', $user->creatorId())->get();
                $bills           = Bill::where('created_by', '=', $user->creatorId())->get();

                $dir                     = storage_path('app/public/reference/');
                foreach($revenues as $revenue){
                    $imgPath                 = $dir . $revenue->reference;
                    
                    if(File::exists($imgPath) && $revenue->reference != "nofile.svg"){
                        File::delete($imgPath);
                    }
                    $revenue->delete();
                    $type = 'Payment';
                    $userType = 'Customer';
                    Transaction::destroyTransaction($revenue->id, $type, $userType);
                }
                foreach($payments as $payment){
                    $imgPath                 = $dir . $payment->reference;

                    if(File::exists($imgPath) && $payment->reference != "nofile.svg"){
                        File::delete($imgPath);
                    }
                    $payment->delete();
                    $type = 'Payment';
                    $userType = 'Vender';
                    Transaction::destroyTransaction($payment->id, $type, $userType);
                }
                foreach($transfers as $transfer){
                    $imgPath              = $dir . $transfer->reference;

                    if(File::exists($imgPath) && $transfer->reference != 'nofile.svg'){
                        File::delete($imgPath);
                    }
                    $transfer->delete();
                }

                foreach($invoicePayments as $payment){
                    $payment->delete();
                    $type = 'Partial';
                    $userType = 'Customer';
                    Transaction::destroyTransaction($payment->id, $type, $userType);
                }
                foreach($billPayments as $payment){
                    $payment->delete();
                    $type = 'Partial';
                    $userType = 'Vender';
                    Transaction::destroyTransaction($payment->id, $type, $userType);
                }

                foreach($invoices as $invoice){
                    $invoice->delete();
                    InvoiceProduct::where('invoice_id', '=', $invoice->id)->delete();
                }
                foreach($bills as $bill){
                    $bill->delete();
                    BillProduct::where('bill_id', '=', $bill->id)->delete();
                }

                // proposal, assets, & target
                $proposals = Proposal::where('created_by', '=', $user->creatorId())->get();
                foreach($proposals as $proposal){
                    $proposal->delete();
                    ProposalProduct::where('proposal_id', '=', $proposal->id)->delete();
                }
                Asset::where('created_by', '=', $user->creatorId())->delete();
                Goal::where('created_by', '=', $user->creatorId())->delete();

                // Vender & customer
                Vender::where('created_by', '=', $user->creatorId())->delete();
                Customer::where('created_by', '=', $user->creatorId())->delete();

                // product & services
                ProductService::where('created_by', '=', $user->creatorId())->delete();
                
                // bank account & balance
                BankAccount::where('created_by', '=', $user->creatorId())->delete();
                \DB::delete('DELETE FROM balance WHERE created_by = ?', $user->creatorId());
                
                // sub users
                User::where('created_by', '=', $user->creatorId())->delete();
                Role::where('created_by', '=', $user->creatorId())->delete();

                // constants
                Tax::where('created_by', '=', $user->creatorId())->delete();
                ProductServiceUnit::where('created_by', '=', $user->creatorId())->delete();
                ProductServiceCategory::where('created_by', '=', $user->creatorId())->delete();
                PaymentMethod::where('created_by', '=', $user->creatorId())->delete();
                CustomField::where('created_by', '=', $user->creatorId())->delete();

                $user->delete();
            }
        }
    }

    public function profile()
    {
        $userDetail              = \Auth::user();
        $userDetail->customField = CustomField::getData($userDetail, 'user');
        $customFields            = CustomField::where('module', '=', 'user')->get();

        return view('user.profile', compact('userDetail', 'customFields'));
    }

    public function editprofile(Request $request)
    {
        $userDetail = \Auth::user();
        $user       = User::findOrFail($userDetail['id']);
        $this->validate(
            $request, [
                        'name' => 'required|max:120',
                        'email' => 'required|email|unique:users,email,' . $userDetail['id'],
                    ]
        );
        if($request->hasFile('profile'))
        {
            $filenameWithExt = $request->file('profile')->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension       = $request->file('profile')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            $dir        = storage_path('app/public/avatar/');
            $image_path = $dir . $userDetail['avatar'];

            if(File::exists($image_path))
            {
                File::delete($image_path);
            }

            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }

            $path = $request->file('profile')->storeAs('public/avatar/', $fileNameToStore);

        }

        if(!empty($request->profile))
        {
            $user['avatar'] = $fileNameToStore;
        }
        $user['name']  = $request['name'];
        $user['email'] = $request['email'];
        $user->save();
        CustomField::saveData($user, $request->customField);

        return redirect()->route('dashboard')->with(
            'success', 'Profile successfully updated.'
        );
    }

    public function updatePassword(Request $request)
    {
        if(\Auth::user()->can('change password account'))
        {
            if(Auth::Check())
            {
                $request->validate(
                    [
                        'current_password' => 'required',
                        'new_password' => 'required|min:6',
                        'confirm_password' => 'required|same:new_password',
                    ]
                );
                $objUser          = Auth::user();
                $request_data     = $request->All();
                $current_password = $objUser->password;
                if(Hash::check($request_data['current_password'], $current_password))
                {
                    $user_id            = Auth::User()->id;
                    $obj_user           = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['new_password']);;
                    $obj_user->save();

                    return redirect()->route('profile', $objUser->id)->with('success', __('Password successfully updated.'));
                }
                else
                {
                    return redirect()->route('profile', $objUser->id)->with('error', __('Please enter correct current password.'));
                }
            }
            else
            {
                return redirect()->route('profile', \Auth::user()->id)->with('error', __('Something is wrong.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function upgradePlan($user_id)
    {
        $user = User::find($user_id);

        $plans = Plan::get();

        return view('user.plan', compact('user', 'plans'));
    }

    public function activePlan($user_id, $plan_id)
    {

        $user       = User::find($user_id);
        $assignPlan = $user->assignPlan($plan_id);
        $plan       = Plan::find($plan_id);
        if($assignPlan['is_success'] == true && !empty($plan))
        {
            $orderID = strtoupper(str_replace('.', '', uniqid('', true)));
            Order::create(
                [
                    'order_id' => $orderID,
                    'name' => null,
                    'card_number' => null,
                    'card_exp_month' => null,
                    'card_exp_year' => null,
                    'plan_name' => $plan->name,
                    'plan_id' => $plan->id,
                    'price' => $plan->price,
                    'price_currency' => isset(\Auth::user()->planPrice()['stripe_currency']) ? \Auth::user()->planPrice()['stripe_currency'] : '',
                    'txn_id' => '',
                    'payment_status' => 'succeeded',
                    'receipt' => null,
                    'user_id' => $user->id,
                ]
            );

            return redirect()->back()->with('success', 'Plan successfully upgraded.');
        }
        else
        {
            return redirect()->back()->with('error', 'Plan fail to upgrade.');
        }

    }

    public function syncData(){
        $user = \Auth::user();
        if($user->type == 'super admin'){
            $users     = User::where('type', '=', 'company')->get();

            foreach ($users as $usr){
                DB::delete('DELETE FROM balance WHERE created_by = ?', array($usr->id));

                $revenues = Revenue::where('created_by', '=', $usr->id)->get();
                foreach($revenues as $revenue){
                    $this->AddBalance($revenue->account_id, $revenue->amount, $revenue->date);
                }

                $payments = Payment::where('created_by', '=', $usr->id)->get();
                foreach($payments as $payment){
                    $this->AddBalance($payment->account_id, -$payment->amount, $payment->date);
                }

                $invoicePayments = InvoicePayment::where('created_by', '=', $usr->id)->get();
                foreach($invoicePayments as $invoicePayment){
                    $this->AddBalance($invoicePayment->account_id, $invoicePayment->amount, $invoicePayment->date);
                }

                $billPayments = BillPayment::where('created_by', '=', $usr->id)->get();
                foreach($billPayments as $billPayment){
                    $this->AddBalance($billPayment->account_id, -$billPayment->amount, $billPayment->date);
                }

                $transfers = Transfer::where('created_by', '=', $usr->id)->get();
                foreach($transfers as $transfer){
                    $this->TransferBalance($transfer->from_account, $transfer->to_account, $transfer->amount, $transfer->date);
                }
            }
            return redirect()->back()->with('success', __('Data synchronized.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

}
