@extends('layouts.layout')
@section('title', 'Creer')
@section('content')
@include('layouts.nav')
<main>
    <section>
        
    </section>
    <section>
        <form method="post">
            <header>
                <h3>Formulaire F67A</h3>
                <div>
                    <p></p>
                    <p>{{ $date }}</p>
                </div>
            </header>
            @csrf
            <div>
                <label>Titre
                    <input type="text" name="title" value="{{ old('nom') }}">
                    @if ($errors->has('title'))
                        <span class="error">{{ $errors->first('title') }}</span>
                    @endif
                </label>
                <label>Article
                    <textarea name="article" cols="30" rows="20"></textarea>
                    @if ($errors->has('article'))
                        <span class="error">{{ $errors->first('article') }}</span>
                    @endif
                </label>
                <button class="btn">Publier</button>
            </div>
            <section>
                <header>
                    <h3>Form F67AEN</h3>
                    <div>
                        <p></p>
                        <p>{{ $date }}</p>
                    </div>
                </header>
                <div>
                    <label>Title
                        <input type="text" name="title_en" value="{{ old('nom') }}">
                        @if ($errors->has('title_en'))
                            <span class="error">{{ $errors->first('title_en') }}</span>
                        @endif
                    </label>
                    <label>Article
                        <textarea name="article_en" cols="30" rows="20"></textarea>
                        @if ($errors->has('article_en'))
                            <span class="error">{{ $errors->first('article_en') }}</span>
                        @endif
                    </label>
                    <button class="btn">Save</button>
                </div>
            </section>
        </form>
    </section>
</main>
@include('layouts.footer')
@endsection