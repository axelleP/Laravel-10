<header>
    <nav>
        <ul>
            {{-- on met le nom de la route : ->name('home') --}}
            <li><a href="{{ route('home') }}">@lang('menu.home')</a></li>
            <li><a href="{{ route('article.list') }}">@lang('article.list')</a></li>
            @auth
                <li><a onclick="js:return confirm('@lang('actions.confirm_signout')')" href="{{ route('logout') }}">@lang('actions.signout')</a></li>
            @endauth
        </ul>
    </nav>
</header>