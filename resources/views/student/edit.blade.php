@extends('layouts.layout')
@section('title', 'Modifier')
@section('content')
<main>
    <header class="banner">
        <h1>modifier info</h1>
    </header>
    <div>
        <section>
            <form method="post" class="formulaire">
                @csrf
                @method('put')
                <header>
                    <h3>Formulaire c45b</h3>
                    <div>
                        <p>ID{{ $student->id }}</p>
                        <p>{{ $student->createdAt }}</p>
                    </div>
                </header>
                <div>
                    <div>
                        <label>@lang('lang.form-user-name') *
                            <input type="text" name="name" value="{{ $student->name }}">
                            @if ($errors->has('name'))
                                <span class="error">{{ $errors->first('name') }}</span>
                            @endif
                        </label>
                        <label>@lang('lang.form-user-phone')
                            <input type="text" name="phone" value="{{ $student->phone }}">
                            @if ($errors->has('phone'))
                                <span class="error">{{ $errors->first('phone') }}</span>
                            @endif
                        </label>
                        <label>@lang('lang.form-user-address') *
                            <input type="text" name="address"  value="{{ $student->address }}">
                            @if ($errors->has('address'))
                                <span class="error">{{ $errors->first('address') }}</span>
                            @endif
                        </label>
                        <div>
                            <label>@lang('lang.form-user-city') *
                                <select name="city_id">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ $student->city_id == $city->id ? 'selected' : '' }}> {{ $city->city }}</option>
                                @endforeach
                                </select>
                            </label>
                            
                        </div>
                    </div>
                    <div>
                        <label>@lang('lang.form-user-email') *
                            <input type="text" name="email" value="{{ $student->user->email }}">
                            @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                            @endif
                        </label>
                        <label>@lang('lang.form-user-d_o_b')
                                <input type="date" name="d_o_b" value="{{ $student->d_o_b }}">
                                @if ($errors->has('d_o_b'))
                                    <span class="">{{ $errors->first('d_o_b') }}</span>
                                @endif
                        </label>
                    </div>
                </div>
                <button class="btn">@lang('lang.btn-save')</button>
            </form>
        </section>
    </div>
</main>
@endsection