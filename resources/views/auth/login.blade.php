@extends('layouts.layout')
@section('title', 'Login')
@section('content')
<main>
    <header class="banner">
        <h1>@lang('lang.text-login')</h1>
    </header>
    <div>
        <section>
            <form action="{{ route('authent') }}" method="post"  class="formulaire">
                @csrf
                <header>
                    <h2>@lang('lang.form-login-title')</h2>
                </header>
                <div>
                    <div>
                        <label>@lang('lang.form-user-email')
                            <input type="text" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                            @endif
                        </label>
                        <label>@lang('lang.form-user-password')
                            <input type="password" name="password">
                            @if($errors->has('password'))
                                <span class="error">{{ $errors->first('password') }}</span>
                            @endif
                        </label>
                        <button class="btn">@lang('lang.btn-login')</button>
                        <p>@lang('lang.word-or')</p>
                        <a href="{{ route('student.create')}}" class="btn">@lang('lang.btn-register')</a>
                    </div>
                </div>
            </form>
        </section>
    </div>
</main>
@endsection