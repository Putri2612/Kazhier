<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{(Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'AccountGo')}} - @yield('page-title')</title>
    <link rel="icon" href="{{asset(Storage::url('logo')).'/favicon.png'}}" type="image" sizes="16x16">
    
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css')}} ">

    <link href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}" rel="stylesheet" type="text/css"/>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/components.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('assets/css/kaka.css')}} ">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom1.css')}}">
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
<script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js')}} "></script>
<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}} "></script>
<script src="{{ asset('assets/modules/moment.min.js')}} "></script>
<script src="{{ asset('assets/js/stisla.js')}} "></script>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }} "></script>
<script src="{{ asset('assets/js/scripts.js')}} "></script>
<script src="{{ asset('assets/js/custom.js')}} "></script>

@stack('page-script')
</body>
</html>
