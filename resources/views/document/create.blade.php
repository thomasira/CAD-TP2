@extends('layouts.layout')
@section('title', 'create doc')
@section('content')
<main>
    <header class="banner">
        <h1>@lang('lang.document-create-banner')</h1>
    </header>
    <div class="write-page">
        <form method="post" action="{{ route('document.upload') }}" enctype="multipart/form-data" class="formulaire">
            <h3>@lang('lang.document-create-title')</h3>
            <p>@lang('lang.form-warning')</p>
            @csrf
            <label>@lang('lang.document-upload-name') *
                <input type="text" name="name" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <span class="error">{{ $errors->first('name') }}</span>
            @endif
            </label>
            <label>@lang('lang.document-upload-name-en')
                <input type="text" name="name_en" value="{{ old('name_en') }}">
            @if ($errors->has('name_en'))
                <span class="error">{{ $errors->first('name_en') }}</span>
            @endif
            </label>
            <label>
                <input type="file" name="file">
            @if ($errors->has('file'))
                <span class="error">{{ $errors->first('file') }}</span>
            @endif
            </label>
                <button class="btn">@lang('lang.btn-upload')</button>  
        </form>
    </div>
</main>
@endsection