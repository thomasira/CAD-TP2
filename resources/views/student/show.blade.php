@extends('layouts.layout')
@section('title', 'Student')
@section('content')
@include('layouts.nav')
<main class="etudiant-file">
    <section>
        <header>
            <h1>{{ $cad2Student->name }}</h1>
            <p>ID{{ $cad2Student->user_id }} | Étudiant</p>
        </header>
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
        <table>
            <tr>
                <th>Email</th>
                <td>{{ $cad2Student->email }}</td>
            </tr>
            <tr>
                <th>Téléphone</th>
                <td>{{ $cad2Student->phone }}</td>
            </tr>
            <tr>
                <th>Adresse</th>
                <td>{{ $cad2Student->adresse }}</td>
            </tr>
            <tr>
                <th>Ville</th>
            </tr>
        </table>
    </section>
</main>
@include('layouts.footer')
@endsection