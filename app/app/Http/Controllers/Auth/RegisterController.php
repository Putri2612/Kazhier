<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\ProductServiceCategory;
use App\Models\Tax;
use App\Models\ProductServiceUnit;
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
        // Kategori
        ProductServiceCategory::insert([
            // Barang & Jasa
            [
                'name'          => 'Produk',
                'color'         => 'befba2',
                'type'          => '0',
                'created_by'    => $user->creatorId()
            ], [
                'name'          => 'Layanan jasa',
                'color'         => '87b771',
                'type'          => '0',
                'created_by'    => $user->creatorId()
            ],
            
            [
                'name'          => 'Penjualan',
                'color'         => '8ed1fb',
                'type'          => '1',
                'created_by'    => $user->creatorId()
            ], [
                'name'          => 'Penambahan modal',
                'color'         => 'b2d8f0',
                'type'          => '1',
                'created_by'    => $user->creatorId()
            ], [
                'name'          => 'Pendapatan lain',
                'color'         => 'adc4d2',
                'type'          => '1',
                'created_by'    => $user->creatorId()
            ], [
                'name'          => 'Pendapatan jasa',
                'color'         => '648ca6',
                'type'          => '1',
                'created_by'    => $user->creatorId()
            ], [
                'name'          => 'Hibah',
                'color'         => 'a5b2bb',
                'type'          => '1',
                'created_by'    => $user->creatorId()
            ], [
                'name'          => 'Pinjaman',
                'color'         => '5989ab',
                'type'          => '1',
                'created_by'    => $user->creatorId()
            ], [
                'name'          => 'Piutang',
                'color'         => '61a5d6',
                'type'          => '1',
                'created_by'    => $user->creatorId()
            ], 
            
            [
                'name'          => 'Pembelian',
                'color'         => 'f0af8f',
                'type'          => '2',
                'created_by'    => $user->creatorId()
            ], [
                'name'          => 'Pembelian bahan baku',
                'color'         => 'eea0a0',
                'type'          => '2',
                'created_by'    => $user->creatorId()
            ], [
                'name'          => 'Biaya operasional',
                'color'         => 'f2cfa6',
                'type'          => '2',
                'created_by'    => $user->creatorId()
            ], [
                'name'          => 'Pengeluaran lain-lain',
                'color'         => 'c9907e',
                'type'          => '2',
                'created_by'    => $user->creatorId()
            ], [
                'name'          => 'Pembayaran utang',
                'color'         => 'e88e73',
                'type'          => '2',
                'created_by'    => $user->creatorId()
            ], [
                'name'          => 'Pemberian utang',
                'color'         => 'd7865b',
                'type'          => '2',
                'created_by'    => $user->creatorId()
            ],
        ]);
        

        // Pajak
        Tax::insert([
            [
                'name'          => 'Bebas pajak',
                'rate'          => '0',
                'created_by'    => $user->creatorId()
            ], [
                'name'          => 'PPn',
                'rate'          => '10',
                'created_by'    => $user->creatorId()
            ]
        ]);

        // Satuan
        ProductServiceUnit::insert([
            [ 'name'          => 'Botol',   'created_by'    => $user->creatorId() ],
            [ 'name'          => 'Bungkus', 'created_by'    => $user->creatorId() ],
            [ 'name'          => 'Copy',    'created_by'    => $user->creatorId() ],
            [ 'name'          => 'Dus',     'created_by'    => $user->creatorId() ],
            [ 'name'          => 'Gram',    'created_by'    => $user->creatorId() ],
            [ 'name'          => 'Item',    'created_by'    => $user->creatorId() ],
            [ 'name'          => 'Kaleng',  'created_by'    => $user->creatorId() ],
            [ 'name'          => 'Karung',  'created_by'    => $user->creatorId() ],
            [ 'name'          => 'kg',      'created_by'    => $user->creatorId() ],
            [ 'name'          => 'Lembar',  'created_by'    => $user->creatorId() ],
            [ 'name'          => 'Liter',   'created_by'    => $user->creatorId() ],
            [ 'name'          => 'Ons',     'created_by'    => $user->creatorId() ],
            [ 'name'          => 'Pasang',  'created_by'    => $user->creatorId() ],
            [ 'name'          => 'Unit',    'created_by'    => $user->creatorId() ], 
        ]);

        // Cara pembayaran
        PaymentMethod::insert([
            [
                'name'          => 'Cash',
                'created_by'    => $user->creatorId()
            ], [
                'name'          => 'Transfer bank',
                'created_by'    => $user->creatorId()
            ],
        ]);

        $role_r = Role::findByName('company');

        return $user->assignRole($role_r);
    }

    public function showRegistrationForm($lang = 'id')
    {
        \App::setLocale($lang);

        return view('auth.register', compact('lang'));
    }
}
