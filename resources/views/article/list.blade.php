@extends('layouts.app')

@section('title', __('article.list'))

@section('content')
    <a href="{{ route('article.form') }}">@lang('button.add')</a>
    <br/><br/>
    <table>
        <thead>
            <tr>
                <th>@lang('article.name')</th>
                <th>@lang('article.description')</th>
                <th>@lang('article.price')</th>
                <th>@lang('article.image')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->name }}</td>
                    <td>{{ $article->description }}</td>
                    <td>{{ Number::currency($article->price, in: config('app.currency'), locale: config('app.locale')) }}</td>
                    <td><img src="{{ asset('img/article/' . $article->image) }}"/></td>
                </tr>
            @endforeach
        </tbody>
</table>
@endsection