@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier Chambre</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('chambres.update', $chambre->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

    <div class="form-group"> 
    <label for="type" class="text-primary">Type de Chambre</label>
    <select name="type" id="type" class="form-control" required>
        <option value="simple" {{ old('type', $chambre->type) == 'simple' ? 'selected' : '' }}>Simple</option>
        <option value="double" {{ old('type', $chambre->type) == 'double' ? 'selected' : '' }}>Double</option>
    </select>
</div>

        <div class="mb-3">
            <label for="etage" class="form-label">Étage</label>
            <input type="number" name="etage" class="form-control" id="etage" value="{{ old('etage', $chambre->etage) }}" required>
        </div>

        <div class="form-group">
    <label for="vue" class="text-primary">Vue</label>
    <select name="vue" class="form-control">
        <option value="" {{ $chambre->vue == '' ? 'selected' : '' }}>Aucune</option>
        <option value="mer" {{ $chambre->vue == 'mer' ? 'selected' : '' }}>Vue sur Mer</option>
        <option value="foret" {{ $chambre->vue == 'foret' ? 'selected' : '' }}>Vue sur Forêt</option>
        <option value="piscine" {{ $chambre->vue == 'piscine' ? 'selected' : '' }}>Vue sur Piscine</option>
    </select>
</div>

        <div class="mb-3">
            <label for="tarif_total" class="form-label">Tarif Total</label>
            <input type="number" name="tarif_total" class="form-control" id="tarif_total" value="{{ old('tarif_total', $chambre->tarif_total) }}" required>
        </div>
        


        <div class="mb-3">
            <label for="eco_friendly" class="form-label">Écologique</label>
            <select name="eco_friendly" class="form-control" id="eco_friendly" required>
                <option value="1" {{ old('eco_friendly', $chambre->eco_friendly) == 1 ? 'selected' : '' }}>Oui</option>
                <option value="0" {{ old('eco_friendly', $chambre->eco_friendly) == 0 ? 'selected' : '' }}>Non</option>
            </select>
        </div>
        

        <div class="mb-3">
            <label for="image" class="form-label">Image de la Chambre</label>
            <input type="file" name="image" class="form-control" id="image">
            @if ($chambre->image)
                <img src="{{ asset('storage/' . $chambre->image) }}" alt="Image de la chambre" class="img-thumbnail mt-2" width="200">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('chambres.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection