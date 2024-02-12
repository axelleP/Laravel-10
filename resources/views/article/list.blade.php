@extends('layouts.app')

@section('title', __('article.list'))

@section('content')
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
        <br/>
    @endif

    @if(session('error'))
        <div class="text-danger">
            {{ session('error') }}
        </div>
        <br/>
    @endif

    @auth
        @if(auth()->user()->role == 'admin')
            <a href="{{ route('article.form') }}">@lang('actions.add')</a>
            <br/><br/>
        @endif
    @endauth
    
    {{ $articles->links() }}
    <table>
        <thead>
            <tr>
                <th>@lang('article.name')</th>
                <th>@lang('article.description')</th>
                <th>@lang('article.price')</th>
                <th>@lang('article.image')</th>
                <th>@lang('actions.view')</th>
                @auth
                    @if(auth()->user()->role == 'admin')
                        <th>@lang('actions.edit')</th>
                        <th>@lang('actions.delete')</th>
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->name }}</td>
                    <td>{{ $article->description }}</td>
                    <td>{{ Number::currency($article->price, in: config('app.currency'), locale: config('app.locale')) }}</td>
                    <td><img src="{{ asset('img/article/' . $article->image) }}"/></td>
                    <td><a href="{{ route('article.view', $article->id) }}"><img width="48" height="48" src="https://img.icons8.com/color/48/search--v1.png" alt="view"/></a></td>
                    @auth
                        @if(auth()->user()->role == 'admin')
                            <td><a href="{{ route('article.form', $article->id) }}"><img width="48" height="48" src="https://img.icons8.com/color-glass/48/pencil.png" alt="form"/></a></td>
                            <td><a href="{{ route('article.delete', $article->id) }}"><img width="48" height="48" src="https://img.icons8.com/color/48/delete-sign--v1.png" alt="delete"/></a></td>
                        @endif
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $articles->links() }}
@endsection