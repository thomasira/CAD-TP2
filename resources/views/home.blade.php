@extends('layouts.layout')
@section('title', 'Accueil')
@section('content')
<main>
    <header class="banner">
        <h1>Bienvenue au Forum_ </h1>
    </header>
    <div class="home-page">
        <section>
            <header>
                <h2>Articles récents</h2>
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
            <a href="{{ route('blog.index') }}" class="btn">Voir tout les articles</a>
        </section>
        <aside>
            <header>
                <h3>Documents récents</h3>
            </header>
            <ul>
                @foreach($documents as $document)
                    <li class="file-thumb">{{ $document->name }}<a href="{{ route('document.download', $document->id) }}"><img src="assets/icons/download.svg" alt="download link" title="download file"></a></li>
                @endforeach
            </ul>
            <a href="{{ route('document.index') }}" class="btn light">Voir tout les documents</a>
<!--                 <form method="post" action="{{ route('document.upload') }}" enctype="multipart/form-data">
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
                </form> -->
        </aside>
    </div>
</main>
@endsection