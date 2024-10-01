

    <x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>                        

    <h1>Modifier la Destination</h1>

    <form action="{{ route('destinations.update', $destination->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $destination->nom }}" required>
        </div>



        <div class="mb-3">
            <label for="lieu_visite" class="form-label">Lieu Visité</label>
            <input type="text" class="form-control" id="lieu_visite" name="lieu_visite" value="{{ $destination->lieu_visite }}" required>
        </div>

        <div class="mb-3">
            <label for="region" class="form-label">Région</label>
            <input type="text" class="form-control" id="region" name="region" value="{{ $destination->region }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $destination->type }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $destination->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
        <a href="{{ route('destinations.index') }}" class="btn btn-secondary">Retour</a>
    </form>

</x-app-layout>
