@extends('layouts.admin')

@push('script-page')
    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>
    <script type="text/javascript">
        $(() => {
            snap.pay('{{$snapToken}}', {
                onSuccess: (result) => {
                    console.log(result);
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
