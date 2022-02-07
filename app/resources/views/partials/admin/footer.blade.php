<script src="{{ asset('assets/modules/jquery.min.js') }} "></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
<script>
    moment.locale('{{App::getLocale()}}');
</script>

<script src="{{ asset('assets/js/stisla.js') }} "></script>

<script src="{{ asset('assets/modules/jquery.sparkline.min.js') }} "></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>

<script src="{{ asset('assets/js/InputSuggestion.js') }}?{{ config('asset-version.js.inputsuggestion') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>

<script src="{{ asset('assets/modules/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/modules/bootstrap-toastr/ui-toastr.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }} "></script>

<script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }} "></script>
<script src="{{ asset('assets/js/jquery.easy-autocomplete.min.js') }}"></script>
<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}} "></script>

<script src="{{ asset('assets/js/jscolor.js') }} "></script>
<script src="{{ asset('assets/js/scripts.min.js') }}?{{ config('asset-version.js.scripts') }}"></script>
<script src="{{ asset('assets/js/custom.min.js') }}?{{ config('asset-version.js.custom') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=G-5ENX028256"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-5ENX028256');

    loginUser('{!! Auth::user()->cryptId() !!}');
    checkActivity();
    userActivity();
    document.querySelector('#frm-logout').addEventListener('submit', logoutUser);

    document.addEventListener('change', event => {
        let target = event.target;

        if(target.classList.contains('form-control') && target.tagName == 'SELECT'){
            if(target.value.includes('new')){
                let url     = window.location.href,
                    pos     = url.indexOf('/app/'),
                    location    = target.value.split('.')[1],
                    destination = url.substring(0, pos + 5) + location;

                window.location.href = destination;
            }
        }
    })
</script>

<script src="{{ asset('assets/modules/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>

<script>
    var date_picker_locale = {
        format: 'YYYY-MM-DD',
        daysOfWeek: [
            "{{__('Sun')}}",
            "{{__('Mon')}}",
            "{{__('Tue')}}",
            "{{__('Wed')}}",
            "{{__('Thu')}}",
            "{{__('Fri')}}",
            "{{__('Sat')}}"
        ],
        monthNames: [
            "{{__('January')}}",
            "{{__('February')}}",
            "{{__('March')}}",
            "{{__('April')}}",
            "{{__('May')}}",
            "{{__('June')}}",
            "{{__('July')}}",
            "{{__('August')}}",
            "{{__('September')}}",
            "{{__('October')}}",
            "{{__('November')}}",
            "{{__('December')}}"
        ],
    };

    var calender_header = {
        today: "{{__('today')}}",
        month: '{{__('month')}}',
        week: '{{__('week')}}',
        day: '{{__('day')}}',
        list: '{{__('list')}}'
    };
</script>

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

@stack('script-page')
