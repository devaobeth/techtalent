<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/app.css') }}">

    <!-- Scripts -->
</head>
<body class="h-100">
    <div id="app" class="h-100">

        <main class="py-4 h-100 ">
            @yield('content')
        </main>
    </div>
    <script src="{{ URL::asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ URL::asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>
