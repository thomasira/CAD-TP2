@extends('layouts.layout')
@section('title', 'Étudiants')
@section('content')
<main>
    <section>
        <header>
            <h1>Les étudiants</h1>
            <a href="{{ route('student.create') }}" class="btn">Ajoutez un étudiant</a>
        </header>
        <table>
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Adresse</th>
                <th scope="col">Ville</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <th>{{ $student->id }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->user->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->city->city }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $students }}
    </section>
</main>
@endsection