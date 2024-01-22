@extends('layouts.layout')
@section('title', 'Creer')
@section('content')
<main>
    <header class="banner">
        <h1>Modifier</h1>
    </header>
    <div class="write-page">
        <header>
            <p>Vous devez écrire l'article obligatoirement en français. Il vous est aussi possible d'écrire cet article en version anglaise, utilisez le formulaire à cette fin.</p>
            <p>* les champs suivis d'un astérisque sont obligatoires.</p>
        </header>
        <form method="post">
            @csrf
            @method('put')
            <div>
                <section class="formulaire">
                    <header>
                        <h3>Article en français <small>(obligatoire)</small></h3>
                        <div>
                            <p>{{ $date }}</p>
                        </div>
                    </header>
                    <div>
                        <label>Titre *
                            <input type="text" name="title" value="{{ $article->title }}">
                            @if ($errors->has('title'))
                                <span class="error">{{ $errors->first('title') }}</span>
                            @endif
                        </label>
                        <label>Article *
                            <textarea name="article" cols="30" rows="20">{{ $article->article }}</textarea>
                            @if ($errors->has('article'))
                                <span class="error">{{ $errors->first('article') }}</span>
                            @endif
                        </label>
                    </div>
                </section>
                <section class="formulaire">
                    <header>
                        <h3>Article en anglais</h3>
                        <div>
                            <p></p>
                            <p>{{ $date }}</p>
                        </div>
                    </header>
                    <div>
                        <label>Title
                            <input type="text" name="title_en" value="{{ $article->title_en }}">
                            @if ($errors->has('title_en'))
                                <span class="error">{{ $errors->first('title_en') }}</span>
                            @endif
                        </label>
                        <label>Article
                            <textarea name="article_en" cols="30" rows="20">{{ $article->article_en }}</textarea>
                            @if ($errors->has('article_en'))
                                <span class="error">{{ $errors->first('article_en') }}</span>
                            @endif
                        </label>
                    </div>
                </section>
            </div>
            <button class="btn">Publier</button>
        </form>
    </div>
</main>
@endsection