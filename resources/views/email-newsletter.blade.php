<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@lang('email.content.subject', ['app_name' => env('APP_NAME')])</title>
    </head>
    <body>
        @lang('email.content.welcome')
    </body>
</html>
