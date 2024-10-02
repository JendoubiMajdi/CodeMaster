
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="container">
    <h1>Détails de l'Hôtel</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $hotel->nom }}</h5>
            <p class="card-text"><strong>Adresse : </strong>{{ $hotel->adresse }}</p>
            <p class="card-text"><strong>pays: </strong>{{ $hotel->pays}}</p>
            <p class="card-text"><strong>Nombre d'étoiles : </strong>{{ $hotel->etoiles }}</p>
            <a href="{{ route('hotel.index') }}" class="btn btn-primary">Retour à la liste</a>
        </div>
    </div>
</div>
</x-app-layout>