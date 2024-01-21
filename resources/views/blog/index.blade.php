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
    <aside>
        <header>
            <h1>Les documents</h1>
            <div>
                @foreach($documents as $document)
                    <a href="{{ route('document.download', $document->id) }}">{{ $document->name }}</a>
                @endforeach
            </div>
            <form method="post" action="{{ route('document.upload') }}" enctype="multipart/form-data">
                @csrf
                <label>Nom du document
                    <input type="text" name="name">
                </label>
                <label>
                    <input type="file" name="file">
                </label>
                    <button class="btn">téléverser</button>
                @if ($errors->has('document'))
                    <span class="error">{{ $errors->first('document') }}</span>
                @endif
            </form>
        </header>
    </aside>
</main>
@include('layouts.footer')
@endsection