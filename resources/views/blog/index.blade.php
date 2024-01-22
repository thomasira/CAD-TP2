@extends('layouts.layout')
@section('title', 'Blog')
@section('content')
<main>
    <header class="banner">
        <h1>@lang('lang.blog-index-banner')</h1>
    </header>
    <div class="blog-page">
        <section>
            <header>
                <a href="{{ route('blog.create')}}" class="btn">@lang('lang.btn-write-blog')</a>
            </header>
            <ul>
            @foreach ($blog->resolve() as $article)
                <li class="article-thumb">
                    <section>
                        <h4>{{ $article['title'] }}</h4>
                        <p>written by {{ $article['author'] }}</p>
                        <p>{{ $article['date'] }}</p>
                    </section>
                    <div>
                        <a href="{{ route('blog.show', $article['id']) }}" class="btn">@lang('lang.btn-read-blog')</a>
                    </div>
                </li>
            @endforeach
            </ul>
            {{ $blog->links() }}
        </section>
    </div>
</main>
@endsection