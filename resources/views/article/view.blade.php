@extends('layouts.app')

@section('title', __('article.view'))

@section('content')
    <table>
        <tr>
            <th>@lang('article.name')</th>
            <td>{{ $article->name }}</td>
        </tr>
        <tr>
            <th>@lang('article.description')</th>
            <td>{{ $article->description }}</td>
        </tr>
        <tr>
            <th>@lang('article.price')</th>
            <td>{{ Number::currency($article->price, in: config('app.currency'), locale: config('app.locale')) }}</td>
        </tr>
        <tr>
            <th>@lang('article.image')</th>
            <td><img src="{{ asset('img/article/' . $article->image) }}"/></td>
        </tr>
    </table>

    <a href="{{ url('articles') }}">@lang('actions.back')</a>
@endsection