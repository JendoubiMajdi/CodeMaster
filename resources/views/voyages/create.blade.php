


<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>                         

    <div class="container mt-5" style="background-color: #f9fbfc; padding: 40px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); max-width: 800px; margin: auto;">
    <h1 class="text-center mb-4" style="color: #007bff;">Créer un Voyage</h1>

    <form action="{{ route('voyages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="titre" class="form-label" style="font-weight: bold; color: #007bff;">Titre du Voyage</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre') }}" placeholder="Entrez le titre" required>
            @error('titre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label for="start_date" class="form-label" style="font-weight: bold; color: #007bff;">Date de Début</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                @error('start_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="end_date" class="form-label" style="font-weight: bold; color: #007bff;">Date de Fin</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                @error('end_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="destination_id" class="form-label" style="font-weight: bold; color: #007bff;">Destination</label>
            <select id="destination_id" name="destination_id" class="form-select" required>
                <option value="" selected disabled>Choisir une destination</option>
                @foreach ($destinations as $destination)
                    <option value="{{ $destination->id }}" {{ old('destination_id') == $destination->id ? 'selected' : '' }}>
                        {{ $destination->nom }}
                    </option>
                @endforeach
            </select>
            @error('destination_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="details" class="form-label" style="font-weight: bold; color: #007bff;">Détails</label>
            <textarea class="form-control" id="details" name="details" rows="4" placeholder="Entrez les détails du voyage" required>{{ old('details') }}</textarea>
            @error('details')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between mb-4">
    <a href="{{ url()->previous() }}" class="btn btn-secondary" style="background-color: #6c757d; padding: 10px 20px">
        ← Retour
    </a>
    
    <button type="submit" class="btn btn-primary" style="padding: 10px 20px;"> + Créer </button>
</div>


    </form>
</div>

<style>
    body {
        background-color: #eef5f9;
    }
    form input, form textarea, form select {
        border-radius: 5px;
        border: 1px solid #ced4da;
    }
    form input:focus, form textarea:focus, form select:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
    button.btn-primary {
        background-color: #007bff;
        border: none;
        transition: background-color 0.3s ease;
    }
    button.btn-primary:hover {
        background-color: #0056b3;
    }
</style>

    </x-app-layout>