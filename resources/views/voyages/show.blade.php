


<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>                          
    
<div class="container mt-5 text-center" style="background-color: #f4f6f9; padding: 40px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
    <h1 class="text-center mb-4" style="color: #007bff;">Détails du Voyage</h1>

    <div class="card" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
        <div class="card-body">
            <h5 class="card-title" style="color: #007bff;">{{ $voyage->titre }}</h5>
            <p class="card-text"><strong>Date de Début :</strong> {{ $voyage->start_date }}</p>
            <p class="card-text"><strong>Date de Fin :</strong> {{ $voyage->end_date }}</p>
            <p class="card-text"><strong>Détails :</strong> {{ $voyage->details }}</p>
            <p class="card-text"><strong>Destination :</strong> {{ optional($voyage->destination)->nom ?? 'N/A' }}</p>

            <div class="text-center">
    @if ($voyage->image)
        <img src="{{ asset('storage/' . $voyage->image) }}" alt="{{ $voyage->titre }}" class="img-fluid d-block mx-auto" style="border-radius: 10px; max-height: 250px; max-width: 100%; object-fit: cover; width: 70%;">
    @endif
</div>


            <div class="text-center mt-4">
                <a href="{{ route('voyages.index') }}" class="btn btn-primary" style="padding: 10px 20px;"> ← Retour à la liste</a>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #e3f2fd; /* Bleu très clair pour un fond attrayant */
    }
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }
    .btn-primary {
        background-color: #0288d1;
        border: none;
    }
    .text-center {
        text-align: center; /* Ajout de cette ligne pour centrer le texte */
    }
</style>
    </x-app-layout>