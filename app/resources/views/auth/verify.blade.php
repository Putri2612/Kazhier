@extends('layouts.auth')

@section('content')
<section class="section">
    <div class="container text-end pt-4">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="text-danger">
            <i class="fas fa-sign-out-alt"></i>
            <span>{{__('Logout')}}</span>
        </a>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
            {{ csrf_field() }}
        </form>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <img class="img-fluid logo-img" style="width:140px" src="{{asset('storage/logo/logo.png')}} " alt="">
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{ __('Verify Your Email Address') }}</h4>
                    </div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        
                        <div class="mb-4">
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                        </div>
                        {{ Form::open(array('route'=>'verification.resend','method'=>'post')) }}
                        {{ __('If you did not receive the email') }}, <button class="btn btn-primary">{{ __('click here to request another') }}</button>.
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
