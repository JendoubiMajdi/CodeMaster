@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Hôtels</h1>
    <a href="{{ route('hotel.create') }}" class="btn btn-primary mb-3">Ajouter un Hôtel</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Étoiles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->nom }}</td>
                    <td>{{ $hotel->adresse }}</td>
                    <td>{{ $hotel->ville }}</td>
                    <td>{{ $hotel->etoiles }}</td>
                    <td>
                        <a href="{{ route('hotel.show', $hotel->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('hotel.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
