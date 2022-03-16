<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Utility;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    use ApiResponse;
    public function get() {
        $user = Auth::user();

        $settings = Utility::settings();

        return $this->FetchSuccessResponse([
            'shop_id'       => $user->creatorId(),
            'shop_name'     => empty($settings['company_name']) ? $user->name : $settings['company_name'],
            'shop_email'    => empty($settings['company_email']) ? $user->email : $settings['company_email'],
            'shop_address'  => empty($settings['company_address']) ? null : $settings['company_address'],
            'shop_contact'  => empty($settings['company_telephone']) ? null : $settings['company_telephone'],
        ]);
    }

    public function update(Request $request) {
        $user = Auth::user();
        if(!$user->type == 'company') {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make($request->all(), [
            'shop_name'     => 'required',
            'shop_email'    => 'required',
            'shop_address'  => 'required',
            'shop_contact'  => 'required',
        ]);

        if($validator->fails()) {
            $message = '';
            foreach($validator->errors()->all() as $key => $fail) {
                $message .= $fail;
                if($key < count($validator->errors()->all())) {
                    $message .= '\n';
                }
            }
            return $this->FailedResponse($message);
        }

        $post = $request->all();

        foreach($post as $key => $data) {
            $name = str_replace('contact', 'telephone', str_replace('shop', 'company', $key));
            DB::insert(
                'insert into settings (`value`, `name`,`created_by`,`created_at`,`updated_at`) 
                values (?, ?, ?, ?, ?) 
                ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
                    $data,
                    $name,
                    $user->creatorId(),
                    date('Y-m-d H:i:s'),
                    date('Y-m-d H:i:s'),
                ]
            );
        }

        return $this->EditSuccessResponse('Data successfully updated');
    }
}
