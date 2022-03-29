@extends('layouts.admin')

@php
    $url = config('midtrans.isProduction') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js';
@endphp

@push('script-page')
    <script type="text/javascript" src="{{ $url }}" data-client-key="{{ config('midtrans.clientKey') }}"></script>
    <script type="text/javascript">
        $(() => {
            snap.pay('{{$snapToken}}', {
                onSuccess: (result) => {
                    window.location = './plans';
                },
                onPending: (result) => {
                    window.location = './plans';
                },
                onError: (result) => {
                    window.location = './plans';
                }
            });
        });
    </script>
@endpush

@section('page-title')
    {{__('Purchase Plan')}}
@endsection
@section('content')
    <section class="section">
    </section>
@endsection
