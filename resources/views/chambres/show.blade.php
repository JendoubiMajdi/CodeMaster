
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="container">
    <h1>Détails de la Chambre</h1>
    <div class="card">
        <img src="{{ asset('storage/' . $chambre->image) }}" class="card-img-top" alt="Image de la chambre">
        <div class="card-body">
            <h5 class="card-title">Chambre {{ $chambre->type }}</h5>
            <p class="card-text">
                Étage: {{ $chambre->etage }}<br>
                Vue: {{ $chambre->vue ?? 'Aucune' }}<br>
                Tarif Total: {{ $chambre->tarif_total }} Dinars<br>
                Écologique: {{ $chambre->eco_friendly ? 'Oui' : 'Non' }}
            </p>
            <p>
                Réservée: {{ $chambre->reserver ? 'Oui' : 'Non' }}
            </p>
            <a href="{{ route('chambres.index') }}" class="btn btn-primary">
                Retour à la liste des chambres
            </a>
        </div>
    </div>
</div>
</x-app-layout>