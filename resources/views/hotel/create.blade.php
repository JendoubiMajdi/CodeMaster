<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container">
        <h2>Ajouter un Hôtel</h2>
        <form action="{{ route('hotel.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom de l'Hôtel</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pays">Pays</label>
                <input type="text" name="pays" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nombre_etages">Nombre d'Étages</label>
                <input type="number" name="nombre_etages" class="form-control" min="1" required>
            </div>
            <div class="form-group">
                <label for="services">Services (nom:prix)</label>
                <textarea name="services" class="form-control" placeholder="WiFi:10, Piscine:20, etc."></textarea>
            </div>
            <div class="form-group">
                <label for="activites">Activités (nom:prix)</label>
                <textarea name="activites" class="form-control" placeholder="Spa:30, Gym:15, etc."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Créer Hôtel</button>
        </form>
    </div>
</x-app-layout>
