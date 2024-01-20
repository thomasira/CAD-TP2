@extends('layouts.layout')
@section('title', 'Blog')
@section('content')
@include('layouts.nav')
<main>
    <section>
        <header>
            <h1>Les Articles</h1>
            <a href="{{ route('blog.create')}}" class="btn">écrire un article</a>
        </header>
        <ul>
        @foreach ($blog->resolve() as $article)
            <li>
                <h2>{{ $article['title'] }}</h2>
                <a href="{{ route('blog.show', $article['id'])}}">lire l'article</a>
            </li>
        @endforeach
        </ul>
        {{ $blog->links() }}
    </section>
</main>
@include('layouts.footer')
@endsection