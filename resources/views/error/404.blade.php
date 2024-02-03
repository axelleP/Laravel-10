<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel 10 training</title>
        <link rel="shorcut icon" type="image/png" href="{{ asset('favicon.png') }}">
    </head>
    <body>
        {{-- inclure une vue --}}
        @include('header')

        <h1>ERREUR 404 !</h1>
        <a href="{{ route('home') }}">Revenir sur le site</a>
    </body>
</html>
