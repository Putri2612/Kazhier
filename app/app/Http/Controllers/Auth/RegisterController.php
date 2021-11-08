<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\ProductServiceCategory;
use App\Models\Tax;
use App\Models\ProductServiceUnit;
use App\Models\BankAccount;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data, [
                     'name' => [
                         'required',
                         'string',
                         'max:255',
                     ],
                     'email' => [
                         'required',
                         'string',
                         'email',
                         'max:255',
                         'unique:users',
                     ],
                     'password' => [
                         'required',
                         'string',
                         'min:8',
                         'confirmed',
                     ],
                 ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user   = User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'type' => 'company',
                'lang' => 'id',
                'created_by'=>1,
                'plan' => 1,
            ]
        );
        // Penjualan
        $product                = new ProductServiceCategory();
        $product->name          = 'Produk';
        $product->color         = '4ffa00';
        $product->type          = '0';
        $product->created_by    = $user->creatorId();
        $product->save();
        
        // Penjualan
        $product                = new ProductServiceCategory();
        $product->name          = 'Penjualan';
        $product->color         = '0097f8';
        $product->type          = '1';
        $product->created_by    = $user->creatorId();
        $product->save();
        
        $product                = new ProductServiceCategory();
        $product->name          = 'Pembelian';
        $product->color         = 'ff5909';
        $product->type          = '2';
        $product->created_by    = $user->creatorId();
        $product->save();

        // 'pajak'
        $product                = new Tax();
        $product->name          = 'PPn';
        $product->rate          = '10';
        $product->created_by    = $user->creatorId();
        $product->save();

        //'produk dan layanan'
        $product                = new ProductServiceUnit();
        $product->name          = 'unit';
        $product->created_by    = $user->creatorId();
        $product->save();

        //cara pembayaran
        $product                = new PaymentMethod();
        $product->name          = 'transfer bank';
        $product->created_by    = $user->creatorId();
        $product->save();
       
        $product                = new PaymentMethod();
        $product->name          = 'cash';
        $product->created_by    = $user->creatorId();
        $product->save();

        

        $role_r = Role::findByName('company');

        return $user->assignRole($role_r);
    }

    public function showRegistrationForm($lang = 'id')
    {
        \App::setLocale($lang);

        return view('auth.register', compact('lang'));
    }
}
