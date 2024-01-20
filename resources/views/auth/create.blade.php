@extends('layouts.layout')
@section('title', 'Create User')
@section('content')
<section class="">
    <div class="">
        <div class="">
            <div class="">
                <form method="post">
                @csrf
                    <div class="">
                        <h2>@lang('lang.text_user-add-title')</h2>
                    </div>
                    <div class="">
                        <div class="">
                            <label>@lang('lang.form_user-name')
                                <input type="text" name="name" class="" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="">{{ $errors->first('name') }}</span>
                                @endif
                            </label>
                            <label>@lang('lang.form_user-email')
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="">{{ $errors->first('email') }}</span>
                                @endif
                            </label>
                            <label>@lang('lang.form_user-password')
                                <input type="password" name="password" class="form-control">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </label>
                            <label>address
                                <input type="text" name="address" value="{{ old('address') }}">
                                @if ($errors->has('address'))
                                    <span class="">{{ $errors->first('address') }}</span>
                                @endif
                            </label>
                            <label>phone number
                                <input type="text" name="phone" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="">{{ $errors->first('phone') }}</span>
                                @endif
                            </label>
                            <label>date of birth
                                <input type="date" name="d_o_b" value="{{ old('phone') }}">
                                @if ($errors->has('d_o_b'))
                                    <span class="">{{ $errors->first('d_o_b') }}</span>
                                @endif
                            </label>
                            <label>City
                                <select name="city_id">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->city }}</option>
                                @endforeach
                                </select>
                                @if ($errors->has('d_o_b'))
                                    <span class="">{{ $errors->first('d_o_b') }}</span>
                                @endif
                            </label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success">@lang('lang.form_user-submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection