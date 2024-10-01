

    <x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>                          


    <h1>Modifier le Voyage</h1>

    <form action="{{ route('voyages.update', $voyage->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ $voyage->titre }}" required>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Date de Début</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $voyage->start_date }}" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Date de Fin</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $voyage->end_date }}" required>
        </div>

        <div class="mb-3">
            <label for="destination_id" class="form-label">Destination</label>
            <select class="form-control" id="destination_id" name="destination_id" required>
                @foreach($destinations as $destination)
                    <option value="{{ $destination->id }}" {{ $voyage->destination_id == $destination->id ? 'selected' : '' }}>
                        {{ $destination->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="details" class="form-label">Détails</label>
            <textarea class="form-control" id="details" name="details" required>{{ $voyage->details }}</textarea>
        </div>
       


        <button type="submit" class="btn btn-primary"> + Mettre à Jour</button>
        <a href="{{ route('voyages.index') }}" class="btn btn-secondary">        ← Retour
        </a>
    </form>


</x-app-layout>