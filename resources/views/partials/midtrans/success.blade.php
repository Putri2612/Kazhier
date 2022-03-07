<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <div class="navbar-nav ml-auto me-auto me-sm-auto me-lg-0 me-md-auto">
            <a href="index.html" class="navbar-brand">
                <img src="frontend/images/logo.png" alt="">
            </a>
        </div>
         <ul class ="navbar-nav class me-auto d-none d-lg-block">
            <li>
                <span class="text-muted">
                    | &nbsp; Beyond the explore of the world
                </span>
            </li>
         </ul>

    </nav>
</div>
<main>
    <div class="section-success d-flex align-items-center">
        <div class=" col text-center">
            <img src="{{ url('assets/img/midtrans/ic_email.png') }}" class="img-success" alt="">
            <h1>
                Yay! Success
            </h1>
            <p>
                We've send you email for trip instruction
                <br />
                please read it as well
            </p>
            <a href="{{route('dashboard')}}" class="btn btn-home-page mt-3 px-5">
                Home Page
            </a>
        </div>
    </div>
</main>