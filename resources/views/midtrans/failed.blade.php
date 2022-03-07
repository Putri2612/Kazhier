<!DOCTYPE html>
<html lang="en">
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
@include('partials.admin.head')
<body>
    
    <div class="main-content">
        @include('partials.midtrans.failed')
    </div>
    <!--Navbar-->
    
    @include('partials.admin.footer')

</body>

</html>
