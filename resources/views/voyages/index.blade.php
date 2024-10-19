
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>              
    <div class="container mt-5" style="background-color: #f4f6f9; padding: 40px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
    <h1 class="text-center mb-4" style="color: #007bff;">Liste des Voyages</h1>
    @if(auth()->user()->isAdmin())
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('voyages.create') }}" class="btn btn-lg" style="background-color: #007bff; color: white; border: none; padding: 10px 20px; font-size: 1.1em;">
            + Ajouter un voyage
        </a>
    </div>
   @endif
    @if ($voyages->isEmpty())
        <p class="text-center" style="color: #555;">Aucun voyage disponible pour le moment.</p>
    @else
        <div class="row">
            @foreach ($voyages as $voyage)
                <div class="col-md-4 mb-4">
                    <div class="card" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #007bff;">{{ $voyage->titre }}</h5>
                            <p class="card-text"><strong>Date de Début :</strong> {{ $voyage->start_date }}</p>
                            <p class="card-text"><strong>Date de Fin :</strong> {{ $voyage->end_date }}</p>
                            <p class="card-text"><strong>Détails :</strong> {{ $voyage->details }}</p>
                            <p class="card-text"><strong>Destination :</strong> {{ optional($voyage->destination)->nom ?? 'N/A' }}</p>

                            @if ($voyage->image)
                                <img src="{{ asset('storage/' . $voyage->image) }}" alt="{{ $voyage->titre }}" class="img-fluid" style="border-radius: 10px; max-height: 200px; object-fit: cover; width: 100%;">
                            @endif

                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('voyages.show', $voyage->id) }}" class="btn btn-primary">Détails</a>
                                @if(auth()->user()->isAdmin())
                                <a href="{{ route('voyages.edit', $voyage->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('voyages.destroy', $voyage->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce voyage ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
    body {
        background-color: #e3f2fd; /* Bleu très clair pour un fond attrayant */
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }
    .btn-primary {
        background-color: #0288d1;
        border: none;
    }
    .btn-warning {
        background-color: #fbc02d;
        border: none;
    }
    .btn-danger {
        background-color: #d32f2f;
        border: none;
    }
</style>
</x-app-layout>
