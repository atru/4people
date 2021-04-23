<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>4people news web crawler</title>

    <!-- Fonts -->
{{--    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}

{{--    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />--}}

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

{{--    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>--}}

{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>--}}
</head>
    <body class="bg-gray-200">
        <nav class="p-6 bg-white mb-6">
            <ul class="flex justify-between">
                <li><a href="{{ url('/') }}" class="p-3">Home</a></li>
                <li><a href="{{ route('sources.index') }}" class="p-3">Manage</a></li>
            </ul>
        </nav>

        @yield('content')
        @yield('script')
    </body>
</html>