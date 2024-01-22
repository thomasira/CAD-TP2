@extends('layouts.layout')
@section('title', 'Blog')
@section('content')
<main>
    <header class="banner">
        <h1>Les articles</h1>
    </header>
    <div class="blog-page">
        <section>
            <header>
                <a href="{{ route('blog.create')}}" class="btn">écrire un article</a>
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
                        <a href="{{ route('blog.show', $article['id']) }}" class="btn">lire l'article</a>
                    </div>
                </li>
            @endforeach
            </ul>
            {{ $blog->links() }}
        </section>
    </div>
</main>
@endsection