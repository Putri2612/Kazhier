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
            data    : {installed: @json($bait), installable: @json($revenues)}
        });
        @error('items')
            toastrs('Error', '{{ __('Please add at least one item') }}', 'error');
        @enderror
    </script>
@endpush
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="login-brand">
                        <img class="img-fluid logo-img" style="width:140px" src="{{asset('storage/logo/logo.png')}} " alt="">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3>{{ __('Revenue Categories') }}</h3>
                        </div>
                        <div class="card-body">
                            <p>
                                <span>
                                    {{ __('Press the plus (+) button on the left panel to add a category') }}
                                    {!! __('or press the <strong>"create new"</strong> on the right panel to create your own category.') !!}
                                </span> <br/>
                                <span class="text-danger">
                                    {{ __('Press the minus(-) button on the right panel to remove a category') }}
                                </span>
                            </p>
                            {{ Form::open(array('route' => 'initial-setup.revenue', 'method' => 'post')) }}
                            {{ Form::text('items', '', array('class' => 'items'))}}
                            <div class="text-end">
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