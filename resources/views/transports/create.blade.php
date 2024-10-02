@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Nouveau Transport</h1>

    <form action="{{ route('transports.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="public">Public</option>
                <option value="privé">Privé</option>
                <option value="partagé">Partagé</option>
            </select>
        </div>

        <div class="form-group">
            <label for="mode">Mode</label>
            <select name="mode" id="mode" class="form-control" required>
                <option value="bus">Bus</option>
                <option value="train">Train</option>
                <option value="avion">Avion</option>
                <option value="bateau">Bateau</option>
                <option value="voiture">Voiture</option>
            </select>
        </div>

        <div class="form-group">
            <label for="cout">Coût</label>
            <input type="number" step="0.01" class="form-control" name="cout" id="cout" required>
        </div>

        <div class="form-group">
            <label for="horaire_depart">Horaire de Départ</label>
            <input type="time" class="form-control" name="horaire_depart" id="horaire_depart" required>
        </div>

        <div class="form-group">
            <label for="horaire_arrivee">Horaire d'Arrivée</label>
            <input type="time" class="form-control" name="horaire_arrivee" id="horaire_arrivee" required>
        </div>

        <div class="form-group">
            <label for="eco_friendly">Écologique</label>
            <select name="eco_friendly" id="eco_friendly" class="form-control">
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter Transport</button>
    </form>
</div>
@endsection
