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
        
        <label for="locale">@lang('localization.change_locale')</label>
        <select onchange="window.location.href = this.value;" id="locale">
            <option value="{{ route('locale.change', __('localization.en')) }}" @if(app()->getLocale() == __('localization.en')) selected @endif>@lang('localization.english')</option>
            <option value="{{ route('locale.change', __('localization.fr')) }}" @if(app()->getLocale() == __('localization.fr')) selected @endif>@lang('localization.french')</option>
        </select>

        <br/><br/>

        @yield('content')
        
        <br/><br/>

        <x-form-newsletter/>

        @yield('scripts')
    </body>
</html>
