
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="container mt-4">
    <h2 class="text-center">Liste des Réservations</h2>
    <a href="{{ route('reservations.create') }}" class="btn btn-success mb-3">Ajouter une nouvelle réservation</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Client</th>
                <th>Chambre</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->client_name }}</td>
                <td>{{ $reservation->chambre->nom }}</td>
                <td>{{ $reservation->date_debut }}</td>
                <td>{{ $reservation->date_fin }}</td>
                <td>
                    <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-primary btn-sm">Voir</a>
                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="d-inline">
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

@section('css')
<style>
    body {
        background-color: #e6f7e6;
    }
    .table {
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }
</style>
</x-app-layout>

