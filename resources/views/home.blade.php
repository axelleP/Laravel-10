@extends('layouts.app')

@section('title', __('menu.home'))

@section('content')
    @lang('home.welcome')
    @auth
        {{ auth()->user()->username }}
    @endauth
    <br/><br/>

    @if(!empty($joke))
        {{ $joke }}
    @endif

    @if ($errors->any() && config('app.env') == 'local')
        <div class="text-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('authFailed'))
        <div class="text-danger">
            {{ session('authFailed') }}
        </div>
        <br/>
    @endif
    
    @guest
        <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <th><label for="email">@lang('user.email')</label></th>
                    <td><input type="email" name="email" id="email"></td>
                </tr>
                <tr>
                    <th><label for="password">@lang('user.password')</label></th>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <th colspan="2"><button type="submit">@lang('actions.signin')</button></th>
                </tr>
            </table>
        </form>
    @endguest
@endsection