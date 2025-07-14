<nav class="navbar">
    <div class="navbar-left">
        <a href="#" class="logo">AnimeFlix</a>
    </div>

    <ul class="nav-links">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('anime.index') }}">Anime List</a></li>
        <li><a href="{{ route('anime.ongoing') }}">Ongoing Anime</a></li>
        <li><a href="#genre">Movie</a></li>
    </ul>

    <div class="navbar-right">
        <form action="{{ route('anime.index') }}" method="GET" class="search-container">
            <i class="bi bi-search search-icon"></i> <!-- Bootstrap Icon -->
            <input type="text" name="search" class="search-box" placeholder="Search anime..."
                value="{{ request('search') }}">
        </form>
    </div>

</nav>