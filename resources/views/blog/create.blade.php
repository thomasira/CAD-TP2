@extends('layouts.layout')
@section('title', 'Creer')
@section('content')
<main>
    <header class="banner">
        <h1>@lang('lang.blog-create-banner')</h1>
    </header>
    <div class="write-page">
        <header>
            <p>@lang('lang.blog-create-explain')</p>
            <p>@lang('lang.form-warning')</p>
        </header>
        <form method="post">
            @csrf
            <div>
                <section class="formulaire">
                    <header>
                        <h3>@lang('lang.blog-create-header')</h3>
                        <div>
                            <p>{{ $date }}</p>
                        </div>
                    </header>
                    <div>
                        <label>@lang('lang.blog-create-title') *
                            <input type="text" name="title" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span class="error">{{ $errors->first('title') }}</span>
                            @endif
                        </label>
                        <label>@lang('lang.blog-create-article') *
                            <textarea name="article" cols="30" rows="20">{{ old('article') }}</textarea>
                            @if ($errors->has('article'))
                                <span class="error">{{ $errors->first('article') }}</span>
                            @endif
                        </label>
                    </div>
                </section>
                <section class="formulaire">
                    <header>
                        <h3>@lang('lang.blog-create-header-en')</h3>
                        <div>
                            <p></p>
                            <p>{{ $date }}</p>
                        </div>
                    </header>
                    <div>
                        <label>@lang('lang.blog-create-title-en')
                            <input type="text" name="title_en" value="{{ old('title_en') }}">
                            @if ($errors->has('title_en'))
                                <span class="error">{{ $errors->first('title_en') }}</span>
                            @endif
                        </label>
                        <label>@lang('lang.blog-create-article-en')
                            <textarea name="article_en" cols="30" rows="20">{{ old('article_en') }}</textarea>
                            @if ($errors->has('article_en'))
                                <span class="error">{{ $errors->first('article_en') }}</span>
                            @endif
                        </label>
                    </div>
                </section>
            </div>
            <button class="btn">@lang('lang.btn-publish')</button>
        </form>
    </div>
</main>
@endsection