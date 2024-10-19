
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="container">
    <h1>Liste des Hôtels</h1>
    @if(auth()->user()->isAdmin())
    <a href="{{ route('hotel.create') }}" class="btn btn-primary mb-3">Ajouter un Hôtel</a>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Pays</th>
                <th>Étoiles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->nom }}</td>
                    <td>{{ $hotel->adresse }}</td>
                    <td>{{ $hotel->pays }}</td>
                    <td>{{ $hotel->etoiles }}</td>
                    <td>
                        <a href="{{ route('hotel.show', $hotel->id) }}" class="btn btn-info btn-sm">Voir</a>
                        @if(auth()->user()->isAdmin())
                        <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('hotel.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>