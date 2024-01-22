@extends('layouts.layout')
@section('title', 'Blog')
@section('content')
<main>
    <header class="banner">
        <h1>@lang('lang.document-index-banner')</h1>
    </header>
    <div class="blog-page">
        <section>
            <form method="post" action="{{ route('document.upload') }}" enctype="multipart/form-data"  class="formulaire">
                <h3>@lang('lang.document-upload-title')</h3>
                <p>@lang('lang.form-warning')</p>
                @csrf
                <label>@lang('lang.document-upload-name')
                    <input type="text" name="name">
                </label>
                <label>
                    <input type="file" name="file">
                </label>
                    <button class="btn">@lang('lang.btn-upload')</button>
                @if ($errors->has('document'))
                    <span class="error">{{ $errors->first('document') }}</span>
                @endif
            </form>
            <ul>
            @foreach ($documents as $document)
                <li class="file-thumb">{{ $document->name }}<a href="{{ route('document.download', $document->id) }}"><img src="assets/icons/download.svg" alt="download link" title="download file"></a></li>
            @endforeach
            {{ $documents }}
            </ul>
            {{ $documents }}
        </section>
    </div>
</main>
@endsection