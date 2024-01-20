@php $locale = session()->get('locale') @endphp
<nav class="nav">
    <a href="{{ route('home') }}" class="logo">forum_</a>
    <div>
        @guest
        <div>
            <a href="{{ route('login') }}">@lang('lang.nav-login')</a>
            <span></span>
        </div>
        @else
        <div>
            <a href="{{ route('blog.index') }}">Blog</a>
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
        <div class="lang">
        @if($locale == 'fr')
            <p>fr</p>
        @else
            <p>en</p>
        @endif
        <div>
            <a href="{{ route('lang', 'fr') }}">français</a>
            <a href="{{ route('lang', 'en') }}">english</a>
        </div>
        </div>
    </div>
</nav>

