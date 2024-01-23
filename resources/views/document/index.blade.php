@extends('layouts.layout')
@section('title', 'documents')
@section('content')
<main>
    <header class="banner">
        <h1>@lang('lang.document-index-banner')</h1>
    </header>
    <div class="blog-page">
        <section>
            <header>
                <a href="{{ route('document.create')}}" class="btn">@lang('lang.document-create-banner')</a>
            </header>
            <ul>
            @foreach ($documents->resolve() as $document)
                <li class="file-thumb">
                    <header>
                        <h4>{{ $document['name'] }}</h4>
                        <p>@lang('lang.word-by') <strong>{{ $document['author'] }}</strong></p>
                    </header>
                    <a href="{{ route('document.download', $document['id']) }}">
                        <img src="assets/icons/download.svg" alt="download link" title="download file">
                    </a>
                </li>
            @endforeach
        </ul>
        {{ $documents->links() }}
        </section>
    </div>
</main>
@endsection