@extends('layouts.layout')
@section('title', 'home')
@section('content')
<main>
    <header class="banner">
        <h1>@lang('lang.home-welcome-banner') Forum_ </h1>
    </header>
    <div class="home-page">
        <section>
            <header>
                <h2>@lang('lang.home-recent-articles')</h2>
            </header>
            <ul>
            @foreach ($blog->resolve() as $article)
                <li class="article-thumb">
                    <section>
                        <h4>{{ $article['title'] }}</h4>
                        <p>@lang('lang.word-written-by') {{ $article['author'] }}</p>
                        <p>{{ $article['date'] }}</p>
                    </section>
                    <div>
                        <a href="{{ route('blog.show', $article['id']) }}" class="btn">@lang('lang.btn-read-blog')</a>
                    </div>
                </li>
            @endforeach
            </ul>
            <a href="{{ route('blog.index') }}" class="btn">@lang('lang.btn-blogs')</a>
        </section>
        <aside>
            <header>
                <h3>@lang('lang.home-recent-documents')</h3>
            </header>
            <ul>
                @foreach($documents->resolve() as $document)
                    <li class="file-thumb">
                        <header>
                            <h4>{{ $document['name'] }}</h4>
                            <p>@lang('lang.word-by') <strong>{{ $document['author'] }}</strong></p>
                        </header>
                        <a href="{{ route('document.download', $document['id']) }}">
                            <img src="assets/icons/download.svg" alt="download link" title="download file">
                        </a>
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('document.index') }}" class="btn light">@lang('lang.btn-documents')</a>
        </aside>
    </div>
</main>
@endsection