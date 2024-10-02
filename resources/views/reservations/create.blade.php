
@extends('layouts.app')

@section('content')


<form action="{{ route('reservations.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nombre_personnes">Nombre de Personnes</label>
        <input type="number" name="nombre_personnes" id="nombre_personnes" class="form-control" required min="1">
    </div>
    
    <div class="form-group">
        <label for="date_debut">Date de Début</label>
        <input type="date" name="date_debut" id="date_debut" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="date_fin">Date de Fin</label>
        <input type="date" name="date_fin" id="date_fin" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="type_chambre">Type de Chambre</label>
        <select name="type_chambre" id="type_chambre" class="form-control" required>
            <option value="simple">Simple</option>
            <option value="double">Double</option>
        </select>
    </div>

    <input type="hidden" name="tarif_total" value="{{ $chambre->tarif_total }}">
    <input type="hidden" name="chambre_id" value="{{ $chambre->id }}">

    <button type="submit" class="btn btn-primary">Réserver</button>
</form>
@endsection
