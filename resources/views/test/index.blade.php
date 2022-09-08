<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="canonical" href="{{ Request::url() }}">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <link href="{{ asset('assets/modules/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/modules/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/modules/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/components.min.css') }}?{{ config('asset-version.css.components', 1) }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}?{{ config('asset-version.css.style', 1) }}">
    <link rel="stylesheet" href="{{ asset('assets/css/kaka.css') }}?{{ config('asset-version.css.kaka', 1) }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css') }}?{{ config('asset-version.css.custom', 1) }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <title>Test web component</title>
</head>
<body>
    {{-- <pg-list page="1" max="10"></pg-list> --}}
    <pg-tbl getter-url="{{ route('revenue.get') }}">
        <template>
            <thead>
                <tr>
                    <th>
                        <tl-str>Date</tl-str>
                    </th>
                    <th>
                        <tl-str>Amount</tl-str>
                    </th>
                    <th>
                        <tl-str>Account</tl-str>
                    </th>
                    <th>
                        <tl-str>Customer</tl-str>
                    </th>
                    <th>
                        <tl-str>Category</tl-str>
                    </th>
                    <th>
                        <tl-str>Payment Method</tl-str>
                    </th>
                    <th>
                        <tl-str>Reference</tl-str>
                    </th>
                    <th>
                        <tl-str>Description</tl-str>
                    </th>
                    @if (Gate::check('edit revenue') || Gate::check('delete revenue'))
                        <th>
                            <tl-str>Action</tl-str>
                        </th>
                    @endif
                </tr>
            </thead>
            <tbody>
                <td>
                    <date-str>${date}</date-str>
                </td>
                <td>
                    <price-str>
                        ${amount}
                    </price-str>
                </td>
                <td>${bank_account.bank_name} ${bank_account.holder_name}</td>
                <td>${customer.name}</td>
                <td>${category.name}</td>
                <td>${payment_method.name}</td>
                <td>
                    <a href="#!"
                        class="btn btn-light"
                        data-url="{{ route('revenue.index') }}/${id}"
                        data-ajax-popup="true"
                        title="{{ __('View Reference') }}">
                        <i class="fa-solid fa-paperclip"></i>
                    </a>
                </td>
                <td>${description}</td>
                @if (Gate::check('edit revenue') || Gate::check('delete revenue'))
                    <td class="action text-center">
                        @can('edit revenue')
                            @php
                                $url = route('revenue.edit', ':ID');
                                $url = str_replace(':ID', '${id}', $url);
                            @endphp
                            <a href="#!" 
                                class="btn btn-primary btn-action me-1" 
                                data-url="{!! $url !!}" 
                                data-ajax-popup="true" 
                                data-title="{{__('Edit Revenue')}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        @endcan
                        @can('delete revenue')
                            @php
                                $url = route('revenue.destroy', ':ID');
                                $url = str_replace(':ID', '${id}', $url);
                            @endphp
                            <a href="#!" class="btn btn-danger btn-action" 
                                data-is-delete 
                                data-delete-url="{!! $url !!}">
                                <i class="fas fa-trash"></i>
                            </a>
                        @endcan
                    </td>
                @endif
            </tbody>
        </template>
    </pg-tbl>
    <script src="{{ asset('assets/js/web-component.js') }}"></script>
</body>
</html>