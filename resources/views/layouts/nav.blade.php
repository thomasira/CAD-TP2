@php 
$locale = session()->get('locale') ? session()->get('locale') : 'fr';
$user = Auth::user() ? Auth::user() : false;
if($user) $profile = $user->student->name;
else $profile = 'FRM';
@endphp
<nav class="nav">
    <a href="{{ route('home') }}" class="logo" title="home">forum_</a>
    <div>
        @guest
        <div>
            <a href="{{ route('login') }}">@lang('lang.nav-login')</a>
            <span></span>
        </div>
        @else
        <div>
            <a href="{{ route('blog.index') }}">@lang('lang.nav-blog')</a>
            <span></span>
        </div>
        <div>
            <a href="{{ route('document.index') }}">@lang('lang.nav-file')</a>
            <span></span>
        </div>
        @endguest
        <div>
            <a href="{{ route('info') }}">@lang('lang.nav-info')</a>
            <span></span>
        </div>
        <aside class="profile"  tabindex="0">
        @guest
            <a href="{{ route('login') }}" title="login">{{ $profile }}_</a>
        @else
            <a href="{{ route('profile', $user->id) }}" title="profile">{{ $profile }}_</a>
        @endguest
            <div>
            @guest
                <a href="{{ route('login') }}">@lang('lang.nav-login')</a>
            @else
                <a href="{{ route('profile', $user->id) }}">@lang('lang.nav-profile')</a>
                <a href="{{ route('logout') }}">@lang('lang.nav-logout')</a>
            @endguest
                <div>
                    <p>langues</p>
                    <div>
                        <a href="{{ route('lang', 'fr') }}" {{ $locale == 'fr' ? 'class=selected' : ''}}>fr</a>
                        <a href="{{ route('lang', 'en') }}" {{ $locale == 'en' ? 'class=selected' : ''}}>en</a>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</nav>

