@extends('layouts.layout')
@section('title', 'Article')
@section('content')
<main>
    <section class="article-page">
        <article>
            <h1>{{ $blog['title'] }}</h1>  
            <p>{{ $blog['article'] }}</p>
        </article>
        <header>
            <div>
                <p>@lang('lang.blog-show-written') :</p>
                <strong>{{ $blog['author'] }}</strong>
            </div>
            <div>
                <p>@lang('lang.blog-show-date') :</p>
                <time><strong>{{ $blog['date'] }}</strong></time>
            </div>
        </header>
    </section>
</main>
@endsection