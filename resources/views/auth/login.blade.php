@extends('layouts.layout')
@section('title', 'Creer')
@section('content')
@include('layouts.nav')

<main>
    <section class="formulaire">
        <form action="{{ route('authent') }}" method="post">
        @csrf
            <header>
                <h3>Connexion</h3>
            </header>
            <div>
                <label>Email
                    <input type="text" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="error">{{ $errors->first('email') }}</span>
                    @endif
                </label>
                <label>Password
                    <input type="password" name="password">
                    @if($errors->has('password'))
                        <span class="error">{{ $errors->first('password') }}</span>
                    @endif
                </label>
                <button class="btn">Connexion</button>
                <p>ou</p>
                <a href="{{ route('auth.create')}}" class="btn">S'inscrire</a>
            </div>
        </form>
    </section>
</main>
@endsection