@extends('layouts.layout')
@section('title', 'Login')
@section('content')
<main>
    <header class="banner">
        <h1>Connexion</h1>
    </header>
    <div>
        <section>
            <form action="{{ route('authent') }}" method="post"  class="formulaire">
                @csrf
                <header>
                    <h2>Connectez-vous</h2>
                </header>
                <div>
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
                </div>
            </form>
        </section>
    </div>
</main>
@endsection