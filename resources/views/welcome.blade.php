@extends('layouts.layout')
@section('title', 'welcome')
@section('content')
<div class="home" data-js-forum>
    <div data-js-type="1" data-js-text="">
        <!-- string is defined and animated in JS -->
    </div>

    <main data-js-main class="hidden">
        <section>
            <header>
                <h1 class="logo">Forum_</h1>
            </header>
                <div data-js-type="2" data-js-text="@lang('lang.forum-definition')">
                    <!-- string is defined in data-js-text -->
                </div>
        </section>
        <section>
            <div>
                <a href="{{ route('blog.index')}}" class="btn large">@lang('lang.btn-enter')</a>
            </div>
        </section>
    </main>
</div>
@endsection
