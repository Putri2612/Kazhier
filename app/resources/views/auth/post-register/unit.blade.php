@extends('layouts.auth')
@section('page-title')
    {{__('Post Registration Setup')}}
@endsection
@push('page-script')
    <script src="{{ asset('assets/js/installable-list.js') }}"></script>
    <script>
        console.log(Installable);
        let Items = new Installable.List({
            target  : '.items',
            data    : {installed: [], installable: @json($units)}
        });
    </script>
@endpush
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
                            <h3>{{ __('Product & Service Units') }}</h3>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ __('Insert product & service units') }}
                            </p>
                            {{ Form::open(array('route' => 'post-register.unit', 'method' => 'post')) }}
                            {{ Form::text('items', '', array('class' => 'items'))}}
                            <div class="text-right">
                                {{ Form::submit( __('Next'), array('class'=>'btn btn-primary btn-lg') ) }}
                            </div>
                            {{ Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection