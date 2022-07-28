<?php

namespace App\Http\Controllers;


use App\Models\Utility;
use App\Traits\CanProcessNumber;
use App\Traits\CanRedirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SystemController extends Controller
{
    use CanProcessNumber, CanRedirect;
    public function index()
    {
        if(\Auth::user()->can('manage system settings'))
        {
            $settings = Utility::settings();

            return view('settings.index', compact('settings'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function store(Request $request)
    {

        if(\Auth::user()->can('manage system settings'))
        {
            $versions = config('asset-version');
            if($request->logo)
            {
                $request->validate(
                    [
                        'logo' => 'image|mimes:png',
                    ]
                );

                $logoName = 'logo.png';
                $path     = $request->file('logo')->storeAs('public/logo/', $logoName);
                $versions['img']['logo']++;
            }
            if($request->small_logo)
            {
                $request->validate(
                    [
                        'small_logo' => 'image|mimes:png',
                    ]
                );
                $smallLogoName = 'small_logo.png';
                $path          = $request->file('small_logo')->storeAs('public/logo/', $smallLogoName);
                $versions['img']['small-logo']++;
            }
            if($request->favicon)
            {
                $request->validate(
                    [
                        'favicon' => 'image|mimes:png',
                    ]
                );
                $favicon = 'favicon.png';
                $path    = $request->file('favicon')->storeAs('public/logo/', $favicon);
                $versions['img']['favicon']++;
            }

            if(!empty($request->title_text) || !empty($request->footer_text))
            {
                $post = $request->all();
                unset($post['_token']);
                foreach($post as $key => $data)
                {
                    DB::insert(
                        'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
                                                                                                                                                     $data,
                                                                                                                                                     $key,
                                                                                                                                                     \Auth::user()->creatorId(),
                                                                                                                                                 ]
                    );
                }
            }

            if($this->saveVersion($versions)) {
                return redirect()->back()->with('warning', 'Logo version could not be updated.');
            }

            return redirect()->back()->with('success', 'Logo successfully updated.');

        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function saveEmailSettings(Request $request)
    {
        if(Auth::user()->can('manage system settings'))
        {
            $request->validate(
                [
                    'mail_driver' => 'required|string|max:50',
                    'mail_host' => 'required|string|max:50',
                    'mail_port' => 'required|string|max:50',
                    'mail_username' => 'required|string|max:50',
                    'mail_password' => 'required|string|max:50',
                    'mail_encryption' => 'required|string|max:50',
                    'mail_from_address' => 'required|string|max:50',
                    'mail_from_name' => 'required|string|max:50',
                ]
            );

            $arrEnv = [
                'MAIL_DRIVER' => $request->mail_driver,
                'MAIL_HOST' => $request->mail_host,
                'MAIL_PORT' => $request->mail_port,
                'MAIL_USERNAME' => $request->mail_username,
                'MAIL_PASSWORD' => $request->mail_password,
                'MAIL_ENCRYPTION' => $request->mail_encryption,
                'MAIL_FROM_NAME' => $request->mail_from_name,
                'MAIL_FROM_ADDRESS' => $request->mail_from_address,
            ];
            Utility::setEnvironmentValue($arrEnv);

            return redirect()->back()->with('success', __('Setting successfully updated.'));
        }
        else
        {
            return $this->RedirectDenied();
        }

    }

    public function saveAssetVersion(Request $request) {
        if(Auth::user()->can('manage system settings')) {
            $data = $request->except(['_token', '_method']);
            $versions   = config('asset-version');
            foreach ($data as $key => $version) {
                $keyNames = explode('_', $key);
                if(!isset($data[$keyNames[0]])) {
                    $data[$keyNames[0]] = [];
                }
                $versions[$keyNames[0]][$keyNames[1]]   = intval($version);
            }

            if($this->updateConfig('asset-version', $versions)) {
                return redirect()->back()->with('success', __('Setting successfully updated.'));
            }
            return redirect()->back()->with('error', __('Something bad happened.'));
        } else {
            return $this->RedirectDenied();
        }
    }

    public function saveReferralSettings(Request $request) {
        if(!Auth::user()->can('manage system settings')) {
            return $this->RedirectDenied();
        }
        $validator = Validator::make($request->all(), [
            'ref_percentage'    => 'required',
            'ref_withdraw_min'  => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->with('error', __('Incorrect input'));
        }

        $data = [
            'percentage'    => intval($request->input('ref_percentage')),
            'minWithdrawal' => intval($this->ReadableNumberToFloat($request->input('ref_withdraw_min')))
        ];

        if($this->updateConfig('referral', $data)) {
            return redirect()->back()->with('success', __('Setting successfully updated.'));
        }
        return redirect()->back()->with('error', __('Something bad happened.'));
    }

    public function saveCompanySettings(Request $request)
    {
        if(Auth::user()->can('manage company settings'))
        {
            $user = Auth::user()->creatorId();
            $request->validate(
                [
                    'company_name' => 'required|string|max:50',
                    'company_email' => 'required',
                    'company_email_from_name' => 'required|string',
                    'registration_number' => 'required|string|max:50',
                    'vat_number' => 'required|string|max:50',
                ]
            );
            $post = $request->all();
            unset($post['_token']);

            foreach($post as $key => $data)
            {
                DB::insert(
                    'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
                                                                                                                                                 $data,
                                                                                                                                                 $key,
                                                                                                                                                 $user,
                                                                                                                                             ]
                );
            }

            return redirect()->back()->with('success', __('Setting successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function saveMidtransSettings(Request $request){
        if(Auth::user()->can('manage midtrans settings')){
            $request->validate(
                [
                    'midtrans_server' => 'required|string',
                    'midtrans_client' => 'required|string',
                ]
            );
            $arrEnv = [
                'MIDTRANS_SERVER' => $request->midtrans_server,
                'MIDTRANS_CLIENT' => $request->midtrans_client,
            ];

            Utility::setEnvironmentValue($arrEnv);

            return redirect()->back()->with('success', __('Midtrans successfully updated.'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function saveStripeSettings(Request $request)
    {
        if(Auth::user()->can('manage stripe settings'))
        {
            $request->validate(
                [
                    'stripe_key' => 'required|string|max:200',
                    'stripe_secret' => 'required|string|max:200',
                    'stripe_currency_symbol' => 'required',
                    'stripe_currency' => 'required',
                ]
            );
            $arrEnv = [
                'STRIPE_KEY' => $request->stripe_key,
                'STRIPE_SECRET' => $request->stripe_secret,

            ];
            Utility::setEnvironmentValue($arrEnv);

            $post = $request->all();
            unset($post['_token'], $post['stripe_key'], $post['stripe_secret']);

            foreach($post as $key => $data)
            {
                DB::insert(
                    'insert into settings (`value`, `name`,`created_by`,`created_at`,`updated_at`) values (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
                                                                                                                                                                                 $data,
                                                                                                                                                                                 $key,
                                                                                                                                                                                 \Auth::user()->creatorId(),
                                                                                                                                                                                 date('Y-m-d H:i:s'),
                                                                                                                                                                                 date('Y-m-d H:i:s'),
                                                                                                                                                                             ]
                );
            }

            return redirect()->back()->with('success', __('Stripe successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function saveSystemSettings(Request $request)
    {
        if(Auth::user()->can('manage company settings'))
        {
            $user = Auth::user()->creatorId();
            $request->validate(
                [
                    'site_currency' => 'required',
                ]
            );
            $post = $request->all();
            unset($post['_token']);

            foreach($post as $key => $data)
            {
                DB::insert(
                    'insert into settings (`value`, `name`,`created_by`,`created_at`,`updated_at`) values (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
                                                                                                                                                                                 $data,
                                                                                                                                                                                 $key,
                                                                                                                                                                                 $user,
                                                                                                                                                                                 date('Y-m-d H:i:s'),
                                                                                                                                                                                 date('Y-m-d H:i:s'),
                                                                                                                                                                             ]
                );
            }

            return redirect()->back()->with('success', __('Setting successfully updated.'));

        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function saveBusinessSettings(Request $request)
    {

        if(Auth::user()->can('manage business settings'))
        {
            $now = time();
            $user = Auth::user();
            $creatorID = $user->creatorId();
            if($request->company_logo)
            {

                $request->validate(
                    [
                        'company_logo' => 'image|mimes:png,jpg,jpeg',
                    ]
                );
                

                $extension      = $request->file('company_logo')->getClientOriginalExtension();
                $logoName       = "{$user->id}_logo.{$extension}";
                $path           = $request->file('company_logo')->storeAs('public/logo/', $logoName);
                $company_logo   = !empty($request->company_logo) ? "{$logoName}?{$now}" : 'logo.png';

                DB::insert('insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [$company_logo,'company_logo', $creatorID ]);
            }


            if($request->company_small_logo)
            {
                $request->validate(
                    [
                        'company_small_logo' => 'image|mimes:png,jpg,jpeg',
                    ]
                );

                $extension      = $request->file('company_small_logo')->getClientOriginalExtension();
                $smallLogoName  = "{$user->id}_small_logo.{$extension}";
                $path           = $request->file('company_small_logo')->storeAs('public/logo/', $smallLogoName);

                $company_small_logo = !empty($request->company_small_logo) ? "{$smallLogoName}?{$now}" : 'small_logo.png';

                DB::insert('insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [$company_small_logo, 'company_small_logo', $creatorID,]);
            }

            if($request->company_favicon)
            {
                $request->validate(
                    [
                        'company_favicon' => 'image|mimes:png,jpg,jpeg',
                    ]
                );

                $extension  = $request->file('company_favicon')->getClientOriginalExtension();
                $favicon    = "{$user->id}_favicon.{$extension}";
                $path       = $request->file('company_favicon')->storeAs('public/logo/', $favicon);

                $company_favicon = !empty($request->favicon) ? "{$favicon}?{$now}" : 'favicon.png';

                DB::insert('insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [$company_favicon, 'company_favicon', $creatorID]);
            }

            if(!empty($request->title_text))
            {
                $post = $request->all();

                unset($post['_token'], $post['company_logo'], $post['company_small_logo'], $post['company_favicon']);
                foreach($post as $key => $data)
                {
                    DB::insert('insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [$data, $key, $creatorID,]);
                }
            }
            return redirect()->back()->with('success', 'Logo successfully updated.');
            
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function companyIndex()
    {
        if(Auth::user()->can('manage company settings'))
        {
            $settings = Utility::settings();

            return view('settings.company', compact('settings'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    private function updateConfig($name, $data) {
        $data = var_export($data, true);
        return File::put(substr(app_path(), 0, -3)."config/{$name}.php", "<?php return {$data};");
    }

}
