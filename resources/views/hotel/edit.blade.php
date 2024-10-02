<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="container">
    <h1>Modifier l'Hôtel</h1>
    <form action="{{ route('hotel.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom de l'hôtel</label>
            <input type="text" name="nom" class="form-control" value="{{ $hotel->nom }}" required>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" class="form-control" value="{{ $hotel->adresse }}" required>
        </div>
        <div class="form-group">
            <label for="ville">pays</label>
            <input type="text" name="pays" class="form-control" value="{{ $hotel->pays}}" required>
        </div>
        <div class="form-group">
            <label for="etoiles">Nombre d'étoiles</label>
            <input type="number" name="etoiles" class="form-control" value="{{ $hotel->etoiles }}" min="1" max="5" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>
</x-app-layout>
