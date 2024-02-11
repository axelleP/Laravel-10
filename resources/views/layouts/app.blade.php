<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel 10 training - @yield('title')</title>
        <link rel="shorcut icon" type="image/png" href="{{ asset('img/favicon.png') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @section('sidebar')
            {{-- inclure une vue --}}
            @include('header')
        @show

        @yield('content')
    </body>
</html>
