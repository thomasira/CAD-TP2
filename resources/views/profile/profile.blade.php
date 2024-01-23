@extends('layouts.layout')
@section('title', 'Profile')
@section('content')
<main class="profile-page">
    <header>
        <h1>@lang('lang.word-welcome') {{ $cad2Student->name }}</h1>
        <p>ID{{ $cad2Student->user_id }} | @lang('lang.word-student')</p>
    </header>
    <div>
        <a href="{{ route('blog.create')}}" class="btn">@lang('lang.btn-write-blog')</a>
        <a href="{{ route('document.create') }}" class="btn">@lang('lang.document-create-banner')</a>
    </div>
    <div>
        <section>
            <header>
                <h2>@lang('lang.profile-your-articles')</h2>
            </header>
            <ul>
                @forelse($blogpost as $article)
                    <li class="article-thumb">
                        <h4><a href="{{ route('blog.show', $article['id']) }}">{{ $article['title'] }}</a></h4>
                        <div>
                            <a href="{{ route('blog.edit', $article['id']) }}" class="btn small">@lang('lang.btn-edit')</a>
                            <form method="post" action="{{ route('blog.delete', $article['id']) }}">
                                @method('delete')
                                @csrf
                                <button class="btn danger btn small">@lang('lang.btn-delete')</button>
                            </form>
                        </div>
                    </li>
                @empty
                    <li>@lang('lang.empty-articles')</li>
                @endforelse
            </ul>
        </section>
        <div>
            <section>
                <h2>@lang('lang.profile-your-infos')</h2>
                <table>
                    <tr>
                        <th>@lang('lang.profile-info-email')</th>
                        <td>{{ $cad2Student->user->email }}</td>
                    </tr>
                    <tr>
                        <th>@lang('lang.profile-info-phone')</th>
                        <td>{{ $cad2Student->phone }}</td>
                    </tr>
                    <tr>
                        <th>@lang('lang.profile-info-address')</th>
                        <td>{{ $cad2Student->address }}</td>
                    </tr>
                    <tr>
                        <th>@lang('lang.profile-info-city')</th>
                        <td>{{ $cad2Student->city->city }}</td>
                    </tr>
                </table>
                <div>
                    <a href="{{ route('student.edit', $cad2Student->user_id) }}" class="btn">@lang('lang.btn-edit')</a>
                    <form method="post" action="{{ route('student.delete', $cad2Student->user_id) }}">
                        @method('delete')
                        @csrf
                        <button class="btn danger">@lang('lang.btn-delete-account')</button>
                    </form>
                </div>
            </section>
                <section>
                <h2>@lang('lang.profile-your-documents')</h2>
                <ul>
                    @forelse($documents as $document)
                    <li class="file-thumb">
                        <header>
                            <h4>{{ $document['name'] }}</h4>
                        </header>
                        <div>
                            <a href="{{ route('document.download', $document['id']) }}"><img src="../assets/icons/download.svg" alt="download link" title="download file"></a>
                            <a href="{{ route('document.edit', $document['id']) }}"><img src="../assets/icons/edit.svg" alt="edit link" title="edit file name"></a>
                            <form method="post" action="{{ route('document.delete', $document['id']) }}">
                                @method('delete')
                                @csrf
                                <button class="icon">
                                    <img src="../assets/icons/delete.svg" alt="delete file" title="delete file">
                                </button>
                            </form>
                        </div>
                    </li>
                    @empty
                        <li>@lang('lang.empty-documents')</li>
                    @endforelse
                </ul>
            </section>
        </div>

    </div>
</main>
@endsection