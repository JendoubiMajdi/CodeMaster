@extends('layouts.app') 

@section('content')
<style>
    body {
        background-color: #e9f5ff; /* Couleur de fond de la page */
    }

    h1 {
        color: #007bff; /* Couleur du titre */
        margin-bottom: 20px; /* Espacement sous le titre */
    }

    .card {
        background-color: #ffffff; /* Couleur de fond de la carte */
        border-radius: 8px; /* Coins arrondis de la carte */
        padding: 20px; /* Espacement interne de la carte */
    }
</style>

<div class="container" style="padding: 20px;">
    <h1 class="text-center">Détails du Transport</h1>

    <div class="card">
        <h5>{{ $transport->type }}</h5>
        <p><strong>Mode:</strong> {{ ucfirst($transport->mode) }}</p>
        <p><strong>Coût:</strong> {{ $transport->cout }} &euro;</p>
        <p><strong>Horaire de départ:</strong> {{ $transport->horaire_depart }}</p>
        <p><strong>Horaire d'arrivée:</strong> {{ $transport->horaire_arrivee }}</p>
        <p><strong>Éco-friendly:</strong> {{ $transport->eco_friendly ? 'Oui' : 'Non' }}</p>
        @if ($transport->image)
        <img src="{{ Storage::url($transport->image) }}" alt="Image du transport">
    @endif
        <div class="d-flex justify-content-end">
            <a href="{{ route('transports.edit', $transport->id) }}" class="btn btn-warning btn-sm">Modifier</a>
            <form action="{{ route('transports.destroy', $transport->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce transport ?');">Supprimer</button>
            </form>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('transports.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>
@endsection
