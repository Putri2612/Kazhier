<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verification</title>
</head>
<body>
    <h1>{{ __('Hi :name!', ['name' => $name]) }}</h1>
    <p>{{ __('Please click the button below to confirm your account!') }}</p>
    <a href="{{ route('verificat.verify', $id) }}">Here</a>
    <p>{{ __('Or enter this link to your browser') }}</p>
    <a href="{{ route('verificat.verify', $id) }}">{{ route('verificat.verify', $id) }}</a>
</body>
</html>