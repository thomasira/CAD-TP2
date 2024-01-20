@extends('layouts.layout')
@section('title', 'Creer')
@section('content')
@include('layouts.nav')
<main class="formulaire">
    <section>
        <h2>Formulaire d'ajout d'un étudiant</h2>
        <p>Ce formulaire permet l'ajout d'un étudiant dans le système informatique du Forum. Ceci entrainera l'enregistrement des données requises à tout jamais. Veuillez obtenir toutes les autorisations nécessaires avant de procéder.</p>
    </section>
    <section>
        <header>
            <h3>Formulaire c45a</h3>
            <div>
                <p></p>
                <p>{{ $date }}</p>
            </div>
        </header>
        <form method="post">
            @csrf
            <div>
                <label>Nom
                    <input type="text" name="nom" value="{{ old('nom') }}">
                    @if ($errors->has('nom'))
                        <span class="error">{{ $errors->first('nom') }}</span>
                    @endif
                </label>
            </div>
            <button class="btn">Sauvegarder</button>
        </form>
    </section>
</main>
@include('layouts.footer')
@endsection