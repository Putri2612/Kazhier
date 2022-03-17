<!DOCTYPE html>
<html lang="en">
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
@include('partials.admin.head')
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            @include('partials.admin.content')
        </div>
    </div>
</div>
@include('partials.admin.footer')

</body>
</html>