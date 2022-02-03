<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{(Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'AccountGo')}} - @yield('page-title')</title>
    <link rel="icon" href="{{asset(Storage::url('logo')).'/favicon.png'}}" type="image" sizes="16x16">

    <link rel="canonical" href="{{ Request::url() }}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css')}} ">

    <link href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/modules/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/components.min.css')}}?{{ config('asset-version.css.components') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/kaka.css')}}?{{ config('asset-version.css.kaka') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css')}}?{{ config('asset-version.css.style') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom1.css')}}?{{ config('asset-version.css.custom1') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">

</head>

<body>
<div id="app">
    @yield('content')
</div>

<!-- General JS Scripts -->
<script src="{{ asset('assets/modules/jquery.min.js')}} "></script>
<script src="{{ asset('assets/modules/popper.js')}} "></script>
<script src="{{ asset('assets/modules/tooltip.js')}} "></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}} "></script>
<script src="{{ asset('assets/modules/moment.min.js')}} "></script>
<script src="{{ asset('assets/js/stisla.js')}} "></script>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }} "></script>
<script src="{{ asset('assets/modules/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/modules/bootstrap-toastr/ui-toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js')}}?{{ config('asset-version.js.scripts') }}"></script>
<script src="{{ asset('assets/js/custom.js')}}?{{ config('asset-version.js.custom') }}"></script>

@stack('page-script')

@if ($message = Session::get('success'))
    <script>
        toastrs('Success', '{!! $message !!}', 'success')
    </script>
@endif

@if ($message = Session::get('error'))
    <script>toastrs('Error', '{!! $message !!}', 'error')</script>
@endif

@if ($message = Session::get('info'))
    <script>toastrs('Info', '{!! $message !!}', 'info')</script>
@endif
</body>
</html>
