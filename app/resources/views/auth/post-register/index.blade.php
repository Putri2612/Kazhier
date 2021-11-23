@extends('layouts.auth')
@section('page-title')
    {{__('Post Registration Setup')}}
@endsection
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="login-brand">
                        <img class="img-fluid logo-img" src="{{asset('storage/logo/logo.png')}} " alt="">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3>{{ __('Welcome To Kakabiz!') }}</h3>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ __('Thank you for registering!') }}
                                {{ __('Please complete the following setup to use the app.') }} <br/>
                                {{ __('Don\'t worry, it will only take less than 2 minutes.') }} <br/>
                                {{ __('You can change the settings on "constant" menu afterward.') }}
                            </p>
                            <div class="text-right">
                                <a href="{{route('post-register.revenue')}}" class="btn btn-primary">{{ __('Let\'s get started!') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection