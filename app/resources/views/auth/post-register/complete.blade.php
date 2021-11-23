@extends('layouts.auth')
@section('page-title')
    {{__('Post Registration Setup')}}
@endsection
@push('page-script')
    <script>
        const countdown = num => {
            return new Promise(resolve => setTimeout(() => {
                resolve(--num);
            }, 1000));
        }

        async function counter (target) {
            let num = parseInt(target.innerHTML);
            while (num != 0) {
                num = await countdown(num);
                target.innerHTML = num;
            }
            window.location.replace("{{ route('dashboard') }}")
        }

        counter(document.querySelector('.counter'));
    </script>
@endpush
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="login-brand">
                        <img class="img-fluid logo-img" src="{{asset('storage/logo/logo.png')}} " alt="">
                    </div>
                    <div class="card card-primary">
                        <div class="card-body text-center">
                            <div class="display-4">Thank You</div>
                            <p>
                                {{ __('Thank you for completing the setup') }} <br/>
                                {{ __('We will redirect you to dashboard in') }}
                            </p>
                            <div class="display-1 counter">5</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection