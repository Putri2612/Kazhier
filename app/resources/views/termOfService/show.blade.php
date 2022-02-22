@extends('layouts.auth')
@section('title')
    {{ __('Term of Service') }}
@endsection
@php
    $appName = (Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'Kazhier');
@endphp
@section('page-description'){{ __('By using :appName, you agree to the following term of service.',['appName' => $appName]) }}@endsection
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="login-brand">
                        <img class="img-fluid logo-img" style="width:140px" src="{{asset('storage/logo/logo.png')}}" alt="logo">
                    </div>
                    <div class="card card-primary">
                        <a role="button" class="back-btn return-btn"><i class="fas fa-arrow-left"></i></a>
                        <div class="card-header">
                            <div>
                                <div class="display-6">{{ __('Term of Service') }}</div><br/>
                                <div class="text-muted">{{ __('Last updated:') }} {{ $content['date'] ? $content['date'] : __("Never") }}</div>
                            </div>
                        </div>
                        <div class="card-body mh-75">
                            {{ json_decode($content['content']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection