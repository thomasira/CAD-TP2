@extends('layouts.layout')
@section('title', 'update doc')
@section('content')
<main>
    <header class="banner">
        <h1>@lang('lang.document-update-banner')</h1>
    </header>
    <div class="write-page">
        <header>
            <p>@lang('lang.form-warning')</p>
        </header>
        <form method="post" class="formulaire">
            @csrf
            @method('put')
            <h3>@lang('lang.document-update-upload-title')</h3>
            <p>@lang('lang.form-warning')</p>
            <label>@lang('lang.document-upload-name') *
                <input type="text" name="name" value="{{ $document->name }}">
            @if ($errors->has('name'))
                <span class="error">{{ $errors->first('name') }}</span>
            @endif
            </label>
            <label>@lang('lang.document-upload-name-en')
                <input type="text" name="name_en"  value="{{ $document->name_en }}">
            @if ($errors->has('name_en'))
                <span class="error">{{ $errors->first('name_en') }}</span>
            @endif
            </label>
                <button class="btn">@lang('lang.btn-save')</button>
        </form>
    </div>
</main>
@endsection