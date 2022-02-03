<head>
    @php
        $logo=asset(Storage::url('logo/'));
    $company_favicon=Utility::getValByName('company_favicon');

    @endphp
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{(Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'Kazhier')}} - @yield('page-title')</title>
    <link rel="canonical" href="{{ Request::url() }}">

    <link rel="icon" href="{{$logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png?'.config('asset-version.img.favicon'))}}" type="image" sizes="16x16">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <link href="{{ asset('assets/modules/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/modules/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css"/>

    @stack('css-page')

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/modules/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/components.min.css') }}?{{ config('asset-version.css.components', 1) }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}?{{ config('asset-version.css.style', 1) }}">
    <link rel="stylesheet" href="{{ asset('assets/css/kaka.css') }}?{{ config('asset-version.css.kaka', 1) }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css') }}?{{ config('asset-version.css.custom', 1) }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">

</head>
