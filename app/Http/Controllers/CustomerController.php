<?php

namespace App\Http\Controllers;

use App\Classes\Pagination;
use App\Models\Customer;
use App\Models\CustomField;
use App\Mail\UserCreate;
use App\Models\CustomerCategory;
use App\Models\Plan;
use App\Models\Transaction;
use App\Models\Utility;
use App\Traits\ApiResponse;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class CustomerController extends Controller
{

    use ApiResponse;
    public function dashboard()
    {
        $data['invoiceChartData'] = Auth::user()->invoiceChartData();

        return view('customer.dashboard', $data);
    }

    public function index()
    {
        if(Auth::user()->can('manage customer'))
        {
            $customers = Customer::where('created_by', Auth::user()->creatorId())->get();

            return view('customer.index', compact('customers'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function get(Request $request) {
        if(!Auth::user()->can('manage customer')) {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make($request->all(), [
            'page'              => 'nullable|numeric',
            'limit'             => 'nullable|numeric',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse();
        }

        $query  = Customer::where('created_by', Auth::user()->creatorId());
        $page   = Pagination::getTotalPage($query, $request);

        if($page === false) {
            return $this->NotFoundResponse();
        }

        $customers  = $query->select('id', 'name', 'email', 'category_id', 'contact', 'customer_id')
                    ->with('category:id,name')
                    ->skip($page['skip'])->take($page['limit'])
                    ->get();
        if(empty($customers)) {
            return $this->NotFoundResponse();
        }
        foreach($customers as $customer) {
            $customer->customer_number = $customer->customerNumber();
        }
        return $this->PaginationSuccess($customers, $page['totalPage']);
    }

    public function create()
    {
        if(Auth::user()->can('create customer'))
        {
            $customFields   = CustomField::where('created_by', Auth::user()->creatorId())->where('module', '=', 'customer')->get();
            $categories     = CustomerCategory::where('created_by', Auth::user()->creatorId())->get()->pluck('name', 'id');
            $categories->prepend(__('General customer'), null);
            $categories     = $categories->union(['new.customer-category' => __('Create new customer category')]);

            return view('customer.create', compact('customFields', 'categories'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function store(Request $request)
    {
        if(Auth::user()->can('create customer'))
        {

            $rules = [
                'name'              => 'required',
                'contact'           => 'required',
                'email'             => 'email',
                'billing_name'      => 'required',
                'billing_phone'     => 'required',
                'billing_address'   => 'required',
                'shipping_name'     => 'required',
                'shipping_phone'    => 'required',
                'shipping_address'  => 'required',
            ];

            $validator = \Validator::make($request->all(), $rules);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->route('customer.index')->with('error', $messages->first());
            }

            $customerData = $request->all();
            $customerData['created_by']         = Auth::user()->creatorId();
            $customerData['customer_id']        = $this->customerNumber();
            $customerData['biling_country']     = 'Indonesia';
            $customerData['shipping_country']   = 'Indonesia';

            if(empty($customerData['category_id'])) {
                $customerData['category_id'] = 0;
            }

            $customer   = Customer::create($customerData);
            $customer->refresh();

            CustomField::saveData($customer, $request->input('customField'));

            $role_r = Role::where('name', '=', 'customer')->firstOrFail();
            $customer->assignRole($role_r);

            $customer->password = $request->input('password');
            $customer->type     = 'Customer';
            try
            {
                Mail::to($customer->email)->send(new UserCreate($customer));
            }
            catch(\Exception $e)
            {
                $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            }

            return redirect()->route('customer.index')->with('success', __('Customer successfully created.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function show($id)
    {
        $customer = Customer::find($id);

        return view('customer.show', compact('customer'));
    }


    public function edit($id)
    {
        if(Auth::user()->can('edit customer'))
        {
            $customer              = Customer::find($id);
            $customer->customField = CustomField::getData($customer, 'customer');
            $categories     = CustomerCategory::where('created_by', Auth::user()->creatorId())->get()->pluck('name', 'id');
            $categories->prepend(__('General customer'), null);
            $categories     = $categories->union(['new.customer-category' => __('Create new customer category')]);

            $customFields = CustomField::where('created_by', Auth::user()->creatorId())->where('module', '=', 'customer')->get();

            return view('customer.edit', compact('customer', 'customFields', 'categories'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, Customer $customer)
    {

        if(Auth::user()->can('edit customer'))
        {

            $rules = [
                'name' => 'required',
                'contact' => 'required',
                'billing_name' => 'required',
                'billing_phone' => 'required',
                'billing_address' => 'required',
                'shipping_name' => 'required',
                'shipping_phone' => 'required',
                'shipping_address' => 'required',
            ];

            $validator = \Validator::make($request->all(), $rules);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->route('customer.index')->with('error', $messages->first());
            }

            $customerData = $request->all();
            $customer->update($customerData);

            CustomField::saveData($customer, $request->input('customField'));

            return redirect()->route('customer.index')->with('success', __('Customer successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(Customer $customer)
    {
        if(Auth::user()->can('delete customer'))
        {
            if($customer->created_by == Auth::user()->creatorId())
            {
                $customer->delete();

                return redirect()->route('customer.index')->with('success', __('Customer successfully deleted.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    function customerNumber()
    {
        $latest = Customer::where('created_by', '=', Auth::user()->creatorId())->latest()->first();
        if(!$latest)
        {
            return 1;
        }

        return $latest->customer_id + 1;
    }

    public function customerLogout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();

        return redirect()->route('customer.login');
    }

    public function payment(Request $request)
    {

        if(Auth::user()->can('manage customer payment'))
        {
            $category = [
                'Invoice' => 'Invoice',
                'Deposit' => 'Deposit',
                'Sales' => 'Sales',
            ];

            $query = Transaction::where('user_id', Auth::user()->id)->where('user_type', 'Customer')->where('type', 'Payment');
            if(!empty($request->date))
            {
                $date_range = explode(' - ', $request->date);
                $query->whereBetween('date', $date_range);
            }

            if(!empty($request->category))
            {
                $query->where('category', '=', $request->category);
            }
            $payments = $query->get();

            return view('customer.payment', compact('payments', 'category'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function transaction(Request $request)
    {

        if(Auth::user()->can('manage customer payment'))
        {

            $category = [
                'Invoice' => 'Invoice',
                'Deposit' => 'Deposit',
                'Sales' => 'Sales',
            ];

            $query = Transaction::where('user_id', Auth::user()->id)->where('user_type', 'Customer');

            if(!empty($request->date))
            {
                $date_range = explode(' - ', $request->date);
                $query->whereBetween('date', $date_range);
            }

            if(!empty($request->category))
            {
                $query->where('category', '=', $request->category);
            }
            $transactions = $query->get();

            return view('customer.transaction', compact('transactions', 'category'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function profile()
    {
        if(Auth::user()->can('manage account'))
        {
            $userDetail              = Auth::user();
            $userDetail->customField = CustomField::getData($userDetail, 'customer');
            $customFields            = CustomField::where('created_by', Auth::user()->creatorId())->where('module', '=', 'customer')->get();

            return view('customer.profile', compact('userDetail', 'customFields'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function editprofile(Request $request)
    {
        if(Auth::user()->can('edit account'))
        {
            $userDetail = Auth::user();
            $user       = Customer::findOrFail($userDetail['id']);

            $this->validate(
                $request, [
                            'name' => 'required|max:120',
                            'contact' => 'required',
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
            $user['name']    = $request['name'];
            $user['email']   = $request['email'];
            $user['contact'] = $request['contact'];
            $user->save();
            CustomField::saveData($user, $request->customField);

            return redirect()->back()->with(
                'success', 'Profile successfully updated.'
            );
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function editBilling(Request $request)
    {
        if(Auth::user()->can('edit account'))
        {
            $userDetail = Auth::user();
            $user       = Customer::findOrFail($userDetail['id']);
            $this->validate(
                $request, [
                            'billing_name' => 'required',
                            'billing_country' => 'required',
                            'billing_state' => 'required',
                            'billing_city' => 'required',
                            'billing_phone' => 'required',
                            'billing_zip' => 'required',
                            'billing_address' => 'required',
                        ]
            );
            $input = $request->all();
            $user->fill($input)->save();

            return redirect()->back()->with(
                'success', 'Profile successfully updated.'
            );
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function editShipping(Request $request)
    {
        if(Auth::user()->can('edit account'))
        {
            $userDetail = Auth::user();
            $user       = Customer::findOrFail($userDetail['id']);
            $this->validate(
                $request, [
                            'shipping_name' => 'required',
                            'shipping_country' => 'required',
                            'shipping_state' => 'required',
                            'shipping_city' => 'required',
                            'shipping_phone' => 'required',
                            'shipping_zip' => 'required',
                            'shipping_address' => 'required',
                        ]
            );
            $input = $request->all();
            $user->fill($input)->save();

            return redirect()->back()->with(
                'success', 'Profile successfully updated.'
            );
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function updatePassword(Request $request)
    {
        if(Auth::user()->can('change password account'))
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
                    $obj_user           = Customer::find($user_id);
                    $obj_user->password = Hash::make($request_data['new_password']);;
                    $obj_user->save();

                    return redirect()->back()->with('success', __('Password updated successfully.'));
                }
                else
                {
                    return redirect()->back()->with('error', __('Please enter correct current password.'));
                }
            }
            else
            {
                return redirect()->back()->with('error', __('Something is wrong.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

    }

    public function changeLanquage($lang)
    {
        if(Auth::user()->can('manage language'))
        {
            $user       = Auth::user();
            $user->lang = $lang;
            $user->save();

            return redirect()->back()->with('success', __('Language Change Successfully!'));
        }
        else
        {
            return redirect()->back();
        }

    }
}
