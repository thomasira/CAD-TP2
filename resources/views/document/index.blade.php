@extends('layouts.layout')
@section('title', 'Blog')
@section('content')
<main>
    <header class="banner">
        <h1>Les documents</h1>
    </header>
    <div class="blog-page">
        <section>
            <header>
            <form method="post" action="{{ route('document.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <label>Nom du document
                        <input type="text" name="name">
                    </label>
                    <label>
                        <input type="file" name="file">
                    </label>
                        <button class="btn">téléverser</button>
                    @if ($errors->has('document'))
                        <span class="error">{{ $errors->first('document') }}</span>
                    @endif
                </form>
            </header>
            <ul>
            @foreach ($documents as $document)
                <li class="file-thumb">{{ $document->name }}<a href="{{ route('document.download', $document->id) }}"><img src="assets/icons/download.svg" alt="download link" title="download file"></a></li>
            @endforeach
            </ul>
            {{ $documents }}
        </section>
    </div>
</main>
@endsection