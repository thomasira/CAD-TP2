@extends('layouts.layout')
@section('title', 'Article')
@section('content')
<main>
    <section>
        <header>
            <h1>{{ $blog['title'] }}</h1>  
            <p>written by {{ $blog['author'] }}</p>
        </header>
        <article>
            <p>{{ $blog['article'] }}</p>
        </article>
        <time>{{ $blog['date'] }}</time>
    </section>
</main>
@endsection