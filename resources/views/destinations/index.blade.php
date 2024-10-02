<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="container mt-5" style="background-color: #f4f6f9; padding: 40px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
    <h1 class="text-center mb-4" style="color: #007bff;">Liste des Destinations</h1>

    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('destinations.create') }}" class="btn btn-lg" style="background-color: #007bff; color: white; border: none; padding: 10px 20px; font-size: 1.1em;">
            + Ajouter une destination
        </a>
    </div>

    @if ($destinations->isEmpty())
        <p class="text-center" style="color: #555;">Aucune destination disponible pour le moment.</p>
    @else
        <div class="row">
            @foreach ($destinations as $destination)
                <div class="col-md-4 mb-4">
                    <div class="card" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); height: 100%;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title" style="color: #007bff;">{{ $destination->nom }}</h5>
                            <p class="card-text"><strong>Lieu Visité :</strong> {{ $destination->lieu_visite }}</p>
                            <p class="card-text"><strong>Région :</strong> {{ $destination->region ?? 'N/A' }}</p>
                            <p class="card-text"><strong>Type :</strong> {{ $destination->type }}</p>
                            <p class="card-text flex-grow-1"><strong>Description :</strong> {{ $destination->description }}</p>

                            @if ($destination->image)
                                <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->nom }}" class="img-fluid" style="border-radius: 10px; height: 150px; object-fit: cover; width: 100%;">
                            @endif

                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('destinations.show', $destination->id) }}" class="btn btn-primary">Détails</a>
                                <a href="{{ route('destinations.edit', $destination->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette destination ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
</x-app-layout>
