<header>
    <nav>
        <ul>
            {{-- on met le nom de la route : ->name('home') --}}
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('article.list') }}">Articles</a></li>
        </ul>
    </nav>
</header>