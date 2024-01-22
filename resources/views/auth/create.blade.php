@extends('layouts.layout')
@section('title', 'Create User')
@section('content')
<main>
    <header class="banner">
        <h1>Inscription</h1>
    </header>
    <div>
        <section>
            <form method="post" class="formulaire">
                @csrf
                <header>
                    <h2>@lang('lang.user-create-title')</h2>
                    <p>@lang('lang.form-warning')</p>
                </header>
                <div>
                    <div>
                        <label>@lang('lang.form-user-name') *
                            <input type="text" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="error">{{ $errors->first('name') }}</span>
                            @endif
                        </label>
                        <label>@lang('lang.form-user-phone')
                            <input type="text" name="phone" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                <span class="error">{{ $errors->first('phone') }}</span>
                            @endif
                        </label>
                        <label>@lang('lang.form-user-address') *
                            <input type="text" name="address" value="{{ old('address') }}">
                            @if ($errors->has('address'))
                                <span class="error">{{ $errors->first('address') }}</span>
                            @endif
                        </label>
                        <div>
                            <label>@lang('lang.form-user-city') *
                                <select name="city_id">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->city }}</option>
                                @endforeach
                                </select>
                            </label>
                            <label>@lang('lang.form-user-d_o_b')
                                <input type="date" name="d_o_b" value="{{ old('d_o_b') }}">
                                @if ($errors->has('d_o_b'))
                                    <span class="">{{ $errors->first('d_o_b') }}</span>
                                @endif
                            </label>
                        </div>
                    </div>
                    <div>
                        <label>@lang('lang.form-user-email') *
                            <input type="text" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                            @endif
                        </label>
                        <label>@lang('lang.form-user-password') *
                            <input type="password" name="password">
                            @if($errors->has('password'))
                                <span class="error">{{ $errors->first('password') }}</span>
                            @endif
                        </label>
                        <label>@lang('lang.form-user-password-confirmed') *
                            <input type="password" name="password_confirmation">
                        </label>
                    </div>
                </div>
                <button class="btn">@lang('lang.btn-save')</button>
            </form>
        </section>
    </div>
</main>
@endsection
