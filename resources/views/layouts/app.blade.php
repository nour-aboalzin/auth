<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
</head>

<body>

    <div class="container">
        @session('success')
            <div class="alert" id="success-alert">
                {{ session('success') }}
            </div>
        @endsession

        @session('error')
            <div class="alert alert-error" id="error-alert">
                {{ session('error') }}
            </div>
        @endsession

        @yield('content')

    </div>

</body>

</html>
