@extends('layouts.layout')
@section('title', 'Info')
@section('content')
<main class="info">
    <header class="banner">
        <h1>@lang('lang.info-banner')</h1>
        <a href="https://github.com/thomasIRA/CAD-TP2">@lang('lang.info-git-link')</a>
    </header>
    <div>
        <section>
            <h2>@lang('lang.info-resume-title')</h2>
            <p>@lang('lang.info-resume')</p>
        </section>
        <section>
            <h2>@lang('lang.info-refs-title')</h2>
            <p>@lang('lang.info-refs')</p>
            <table>
                <tr>
                    <th>@lang('lang.info-animations')</th>
                    <td><a href="https://animejs.com/documentation/">AnimeJs</a></td>
                </tr>
                <tr>
                    <th>@lang('lang.info-animation-lettering')</th>
                    <td><a href="https://github.com/mattboldt/typed.js">Typed.js</a></td>
                </tr>
                <tr>
                    <th>@lang('lang.info-framework')</th>
                    <td><a href="https://laravel.com/docs/10.x/readme">Laravel</a></td>
                </tr>
            </table>
        </section>
    </div>
</main>
@endsection