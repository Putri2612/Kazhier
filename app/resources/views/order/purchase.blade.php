@extends('layouts.admin')

@push('script-page')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{env('MIDTRANS_CLIENT')}}"></script>
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
