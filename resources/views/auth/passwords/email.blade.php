@extends('layouts.auth')
@php
    $logo=asset(Storage::url('logo/'));
@endphp
@section('page-title')
    {{__('Forgot Password')}}
@endsection
@section('content')
    <section class="section">
        <div class="container-fluid">
            <div class="row justify-content-end">
                <div class="col-auto pt-4">
                    <div class="changeLanguage float-right me-1 position-relative">
                        <select name="language" id="language" class="form-control w-25 position-absolute selectric" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            @foreach(Utility::languages() as $language)
                                <option @if($lang == $language) selected @endif value="{{ route('change.langPass',$language) }}">{{Str::upper($language)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img class="img-fluid logo-img" src="{{$logo.'/logo.png'}} "  alt="">
                    </div>

                    <div class="card card-primary">
                        <a role="button" class="back-btn return-btn"><i class="fas fa-arrow-left"></i></a>
                        <div class="card-header"><h4>{{__('Forgot Password')}}</h4></div>
                        <div class="card-body">
                            @if ($message = Session::get('status'))
                            <div class="alert alert-success" role="alert">
                                {!! $message !!}
                            </div>
                            @endif
                            <p class="text-muted">{{__('Enter your email address and we will send you an email with instructions to reset your password.')}}</p>
                            {{Form::open(array('route'=>'password.email','method'=>'post','id'=>'loginForm'))}}

                            <div class="form-group">
                                {{Form::label('email',__('Email'))}}
                                {{Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Your Email')))}}
                                @error('email')
                                <span class="invalid-email text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{Form::submit(__(' Forgot Passwordd'),array('class'=>'btn btn-primary btn-lg btn-block','id'=>'saveBtn'))}}
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                    <div class="simple-footer">
                        {{(Utility::getValByName('footer_text')) ? Utility::getValByName('footer_text') :  __('Copyright AccountGo') }} {{ date('Y') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
