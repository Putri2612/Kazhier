<script src="{{ asset('assets/modules/jquery.min.js') }} "></script>

<script src="{{ asset('assets/modules/popper.js') }} "></script>
<script src="{{ asset('assets/modules/tooltip.js') }} "></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
<script>
    moment.locale('{{App::getLocale()}}');
</script>

<script src="{{ asset('assets/js/stisla.js') }} "></script>

<script src="{{ asset('assets/modules/jquery.sparkline.min.js') }} "></script>

<script src="{{ asset('assets/modules/chart/Chart.min.js') }} "></script>
<script src="{{ asset('assets/modules/chart/Chart.extension.js') }} "></script>

<script src="{{ asset('assets/js/InputSuggestion.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>

<script src="{{ asset('assets/modules/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/modules/bootstrap-toastr/ui-toastr.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }} "></script>

<script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }} "></script>
<script src="{{ asset('assets/js/jquery.easy-autocomplete.min.js') }}"></script>
<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}} "></script>

<script src="{{ asset('assets/js/jscolor.js') }} "></script>
<script src="{{ asset('assets/js/scripts.min.js').'?'.time() }}"></script>
<script src="{{ asset('assets/js/custom.min.js').'?'.time() }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>

<script>
    loginUser('{!! Auth::user()->cryptId() !!}');
    checkActivity();
    userActivity();
    document.querySelector('#frm-logout').addEventListener('submit', logoutUser);
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

<script>
    
</script>

<script>
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
