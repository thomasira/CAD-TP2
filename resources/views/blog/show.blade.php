@extends('layouts.layout')
@section('title', 'Article')
@section('content')
@include('layouts.nav')
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
@include('layouts.footer')
@endsection