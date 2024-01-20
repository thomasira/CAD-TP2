
<nav class="nav">
    <a href="{{ route('home') }}" class="logo">forum_</a>
    <div>
        @guest
        <div>
            <a href="{{ route('login') }}">Connexion</a>
            <span></span>
        </div>
        @else
        <div>
            <a href="{{ route('blog.index') }}">Blogs</a>
            <span></span>
        </div>
        <div>
            <a href="{{ route('logout') }}">Logout</a>
            <span></span>
        </div>
        @endguest
        <div>
            <a href="{{ route('info') }}">Info</a>
            <span></span>
        </div>
    </div>
</nav>

