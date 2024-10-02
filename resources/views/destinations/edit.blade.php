<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container d-flex justify-content-center mt-5 ">
        <div class="col-md-6" style="background-color: #aed6f1; padding: 40px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
            <h1 class="text-center mb-4" style="color: #007bff;">Modifier la Destination</h1>

            <form action="{{ route('destinations.update', $destination->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nom" class="form-label" style="color: #007bff">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $destination->nom }}" required>
                </div>

                <div class="mb-3">
                    <label for="lieu_visite" class="form-label" style="color: #007bff">Lieu Visité</label>
                    <input type="text" class="form-control" id="lieu_visite" name="lieu_visite" value="{{ $destination->lieu_visite }}" required>
                </div>

                <div class="mb-3">
                    <label for="region" class="form-label" style="color: #007bff">Région</label>
                    <input type="text" class="form-control" id="region" name="region" value="{{ $destination->region }}" required>
                </div>

                <div class="mb-3">
    <label for="type" class="form-label" style="color: #007bff;">Type</label>
    <select name="type" id="type" class="form-control" style="border-radius: 10px; transition: border-color 0.3s;" required>
        <option value="" disabled {{ empty($destination->type) ? 'selected' : '' }}>Sélectionner un type</option>
        <option value="nature" {{ $destination->type == 'nature' ? 'selected' : '' }}>Nature</option>
        <option value="plage" {{ $destination->type == 'plage' ? 'selected' : '' }}>Plage</option>
        <option value="écologique" {{ $destination->type == 'écologique' ? 'selected' : '' }}>Écologique</option>
        <option value="aventure" {{ $destination->type == 'aventure' ? 'selected' : '' }}>Aventure</option>
        <option value="culturel" {{ $destination->type == 'culturel' ? 'selected' : '' }}>Culturel</option>
        <option value="bien-être" {{ $destination->type == 'bien-être' ? 'selected' : '' }}>Bien-être</option>
        <option value="solaire" {{ $destination->type == 'solaire' ? 'selected' : '' }}>Solaire</option>
        <option value="conservation" {{ $destination->type == 'conservation' ? 'selected' : '' }}>Conservation</option>
        <option value="agrotourisme" {{ $destination->type == 'agrotourisme' ? 'selected' : '' }}>Agrotourisme</option>
        <option value="communautaire" {{ $destination->type == 'communautaire' ? 'selected' : '' }}>Communautaire</option>
    </select>
</div>


                <div class="mb-3">
                    <label for="description" class="form-label" style="color: #007bff">Description</label>
                    <textarea class="form-control" id="description" name="description" required>{{ $destination->description }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('destinations.index') }}" class="btn btn-secondary">← Retour</a>
                    <button type="submit" class="btn btn-primary">+ Mettre à Jour</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
