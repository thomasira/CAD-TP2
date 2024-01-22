@extends('layouts.layout')
@section('title', 'Profile')
@section('content')
<main class="profile-page">
    <header>
        <h1>Bonjour {{ $cad2Student->name }}</h1>
        <p>ID{{ $cad2Student->user_id }} | Étudiant</p>
    </header>
    <div>
        <section>
            <header>
                <h2>Vos articles</h2>
                <a href="{{ route('blog.create')}}" class="btn">écrire un article</a>
            </header>
            <ul>
                @forelse($blogpost as $article)
                    <li class="article-thumb">
                        <h4>{{ $article['title'] }}</h4>
                        <div>
                            <a href="{{ route('blog.edit', $article['id']) }}" class="btn small">Modifier</a>
                            <form method="post" action="{{ route('blog.delete', $article['id']) }}">
                                @method('delete')
                                @csrf
                                <button class="btn danger btn small">Supprimer</button>
                            </form>
                        </div>
                    </li>
                @empty
                    <li>you have no article</li>
                @endforelse
            </ul>
        </section>
        <div>
            <section>
                <h2>Vos infos</h2>
                <table>
                    <tr>
                        <th>Email</th>
                        <td>{{ $cad2Student->user->email }}</td>
                    </tr>
                    <tr>
                        <th>Téléphone</th>
                        <td>{{ $cad2Student->phone }}</td>
                    </tr>
                    <tr>
                        <th>Adresse</th>
                        <td>{{ $cad2Student->address }}</td>
                    </tr>
                    <tr>
                        <th>Ville</th>
                        <td>{{ $cad2Student->city->city }}</td>
                    </tr>
                </table>
                <div>
                    <a href="{{ route('student.edit', $cad2Student->user_id) }}" class="btn">Modifier</a>
                    <form method="post">
                        @method('delete')
                        @csrf
                        <button class="btn danger">Supprimer</button>
                    </form>
                </div>
            </section>
                <section>
                <h2>Vos document</h2>
                <ul>
                    @forelse($documents as $document)
                    <li class="file-thumb">{{ $document->name }}<a href="{{ route('document.download', $document->id) }}"><img src="../assets/icons/download.svg" alt="download link" title="download file"></a></li>
                    @empty
                        <li>No documents availbale</li>
                    @endforelse
                </ul>
            </section>
        </div>

    </div>
</main>
@endsection