@extends('layouts.admin')
@php
    $logo=asset(Storage::url('logo/'));

@endphp
@section('page-title')
    {{__('Settings')}}
@endsection
@push('css-page')
    <link href="{{ asset('assets/modules/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@push('script-page')
    <script src="{{ asset('assets/modules/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Settings')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Settings')}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h4 class="fw-normal">{{__('Settings')}}</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="setting-tab">
                            <ul class="nav nav-pills mb-3" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="contact-tab4" data-bs-toggle="tab" data-bs-target="#site-setting" href="#site-setting" role="tab" aria-controls="" aria-selected="false">{{__('Site Setting')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-bs-toggle="tab" data-bs-target="#email-setting" href="#email-setting" role="tab" aria-controls="" aria-selected="false">{{__('Email Setting')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-bs-toggle="tab" data-bs-target="#midtrans-setting" href="#midtrans-setting" role="tab" aria-controls="" aria-selected="false">{{__('Midtrans Setting')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-bs-toggle="tab" data-bs-target="#referral-setting" href="#referral-setting" role="tab" aria-controls="" aria-selected="false">{{__('Referral Setting')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-bs-toggle="tab" data-bs-target="#asset-version-setting" href="#asset-version-setting" role="tab" aria-controls="" aria-selected="false">{{__('Asset Version Setting')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade fade show active" id="site-setting" role="tabpanel" aria-labelledby="profile-tab3">
                                    <div class="company-setting-wrap">
                                        {{Form::model($settings,array('route'=>'systems.store','method'=>'POST','enctype' => "multipart/form-data"))}}
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <h5>{{__('Logo')}}</h5>
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail h-150">
                                                                <img src="{{$logo.'/logo.png'}}" alt="">
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail thumbnail-h3"></div>
                                                            <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"> {{__('Select image')}} </span>
                                                                <span class="fileinput-exists"> {{__('Change')}} </span>
                                                                <input type="hidden">
                                                                <input type="file" name="logo" id="logo">
                                                            </span>
                                                                <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> {{__('Remove')}} </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <h5>{{__('Small Logo')}}</h5>
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail h-150">
                                                                <img src="{{$logo.'/small_logo.png'}}" alt="">
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail thumbnail-h3"></div>
                                                            <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"> {{__('Select image')}} </span>
                                                                <span class="fileinput-exists"> {{__('Change')}} </span>
                                                                <input type="hidden">
                                                                <input type="file" name="small_logo" id="small_logo">
                                                            </span>
                                                                <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> {{__('Remove')}} </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <h5>{{__('Favicon')}}</h5>
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail h-150">
                                                                <img src="{{$logo.'/favicon.png'}}" alt="">
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail thumbnail-h3"></div>
                                                            <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"> {{__('Select image')}} </span>
                                                                <span class="fileinput-exists"> {{__('Change')}} </span>
                                                                <input type="hidden">
                                                                <input type="file" name="favicon" id="favicon">
                                                            </span>
                                                                <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> {{__('Remove')}} </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @error('logo')
                                                    <span class="invalid-logo" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                     </span>
                                                    @enderror
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="form-group col-md-6">
                                                        {{Form::label('title_text',__('Title Text')) }}
                                                        {{Form::text('title_text',null,array('class'=>'form-control','placeholder'=>__('Title Text')))}}
                                                        @error('title_text')
                                                        <span class="invalid-title_text" role="alert">
                                                             <strong class="text-danger">{{ $message }}</strong>
                                                             </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        {{Form::label('footer_text',__('Footer Text')) }}
                                                        {{Form::text('footer_text',null,array('class'=>'form-control','placeholder'=>__('Footer Text')))}}
                                                        @error('footer_text')
                                                        <span class="invalid-footer_text" role="alert">
                                                                 <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-end">
                                            {{Form::submit(__('Save Change'),array('class'=>'btn btn-primary'))}}
                                        </div>
                                        {{Form::close()}}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="email-setting" role="tabpanel" aria-labelledby="contact-tab4">
                                    <div class="email-setting-wrap">
                                        {{Form::open(array('route'=>'email.settings','method'=>'post'))}}
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                {{Form::label('mail_driver',__('Mail Driver')) }}
                                                {{Form::text('mail_driver',env('MAIL_DRIVER'),array('class'=>'form-control','placeholder'=>__('Enter Mail Driver')))}}
                                                @error('mail_driver')
                                                <span class="invalid-mail_driver" role="alert">
                                                 <strong class="text-danger">{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                {{Form::label('mail_host',__('Mail Host')) }}
                                                {{Form::text('mail_host',env('MAIL_HOST'),array('class'=>'form-control ','placeholder'=>__('Enter Mail Driver')))}}
                                                @error('mail_host')
                                                <span class="invalid-mail_driver" role="alert">
                                                 <strong class="text-danger">{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                {{Form::label('mail_port',__('Mail Port')) }}
                                                {{Form::text('mail_port',env('MAIL_PORT'),array('class'=>'form-control','placeholder'=>__('Enter Mail Port')))}}
                                                @error('mail_port')
                                                <span class="invalid-mail_port" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                {{Form::label('mail_username',__('Mail Username')) }}
                                                {{Form::text('mail_username',env('MAIL_USERNAME'),array('class'=>'form-control','placeholder'=>__('Enter Mail Username')))}}
                                                @error('mail_username')
                                                <span class="invalid-mail_username" role="alert">
                                                 <strong class="text-danger">{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                {{Form::label('mail_password',__('Mail Password')) }}
                                                {{Form::text('mail_password',env('MAIL_PASSWORD'),array('class'=>'form-control','placeholder'=>__('Enter Mail Password')))}}
                                                @error('mail_password')
                                                <span class="invalid-mail_password" role="alert">
                                                 <strong class="text-danger">{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                {{Form::label('mail_encryption',__('Mail Encryption')) }}
                                                {{Form::text('mail_encryption',env('MAIL_ENCRYPTION'),array('class'=>'form-control','placeholder'=>__('Enter Mail Encryption')))}}
                                                @error('mail_encryption')
                                                <span class="invalid-mail_encryption" role="alert">
                                                 <strong class="text-danger">{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                {{Form::label('mail_from_address',__('Mail From Address')) }}
                                                {{Form::text('mail_from_address',env('MAIL_FROM_ADDRESS'),array('class'=>'form-control','placeholder'=>__('Enter Mail From Address')))}}
                                                @error('mail_from_address')
                                                <span class="invalid-mail_from_address" role="alert">
                                                 <strong class="text-danger">{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                {{Form::label('mail_from_name',__('Mail From Name')) }}
                                                {{Form::text('mail_from_name',env('MAIL_FROM_NAME'),array('class'=>'form-control','placeholder'=>__('Enter Mail Encryption')))}}
                                                @error('mail_from_name')
                                                <span class="invalid-mail_from_name" role="alert">
                                                 <strong class="text-danger">{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="card-footer text-end">
                                            {{Form::submit(__('Save Change'),array('class'=>'btn btn-primary'))}}
                                        </div>
                                        {{Form::close()}}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="midtrans-setting" role="tabpanel" aria-labelledby="contact-tab4">
                                    <div class="stripe-setting-wrap">
                                        {{Form::open(array('route'=>'midtrans.settings','method'=>'post'))}}

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                {{Form::label('midtrans_server',__('Server Key')) }}
                                                {{Form::text('midtrans_server',env('MIDTRANS_SERVER'),array('class'=>'form-control','placeholder'=>__('Enter Midtrans Server Key')))}}
                                                @error('midtrans_server')
                                                <span class="invalid-stripe_key" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                {{Form::label('midtrans_client',__('Client Key')) }}
                                                {{Form::text('midtrans_client',env('MIDTRANS_CLIENT'),array('class'=>'form-control ','placeholder'=>__('Enter Midtrans Client Key')))}}
                                                @error('midtrans_client')
                                                <span class="invalid-stripe_secret" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <p>
                                            @php
                                                $uri = $_SERVER['HTTP_HOST'];
                                                $url = $_SERVER['REQUEST_URI'];
                                                $url = mb_substr($url, 0, -7);
                                            @endphp
                                            {{__('Set Midtrans Payment Notification URL to ')}}
                                            <a href="#">{{'https://'.$uri.$url.'midtrans/callback'}}</a>
                                        </p>
                                        <div class="card-footer text-end">
                                            {{Form::submit(__('Save Change'),array('class'=>'btn btn-primary'))}}
                                        </div>
                                        {{Form::close()}}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="asset-version-setting" role="tabpanel" aria-labelledby="contact-tab4">
                                    <div class="stripe-setting-wrap">
                                        {{Form::open(array('route'=>'asset-version.settings','method'=>'put'))}}

                                        @foreach (config('asset-version') as $type => $items)    
                                            @if ($type != 'img')
                                                <h2 class="display-5">{{ strtoupper($type) }}</h2>
                                                <div class="row">
                                                    @foreach ($items as $name => $version)    
                                                        <div class="form-group col-3">
                                                            {{Form::label("{$type}_{$name}", ucfirst($name)) }}
                                                            {{Form::number("{$type}_{$name}",$version,array('class'=>'form-control'))}}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="card-footer text-end">
                                            {{Form::submit(__('Save Change'),array('class'=>'btn btn-primary'))}}
                                        </div>
                                        {{Form::close()}}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="referral-setting" role="tabpanel">
                                    @if ($message = Session::get('success'))
                                        <p>
                                            {{ __('It may take a while until the settings get updated.') }}
                                            {{ __('Please refresh the page in a few seconds to check the changes.') }}
                                        </p>
                                    @endif
                                    {{ Form::open(['route' => 'referral.settings', 'method' => 'put']) }}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            {{ Form::label('ref_percentage', __('Referral Percentage per Purchase')) }}
                                            {{ Form::number('ref_percentage', config('referral.percentage'), ['class' => 'form-control', 'min' => 0, 'max' => 100]) }}
                                        </div>
                                        <div class="col-sm-6">
                                            {{ Form::label('ref_withdraw_min', __('Minimum Withdrawal Amount')) }}
                                            {{ Form::text('ref_withdraw_min', Utility::formatNumber(config('referral.minWithdrawal')), ['class' => 'form-control', 'data-is-number']) }}
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        {{Form::submit(__('Save Change'),array('class'=>'btn btn-primary'))}}
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
