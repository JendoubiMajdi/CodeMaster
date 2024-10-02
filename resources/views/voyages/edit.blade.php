<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container d-flex justify-content-center mt-5">
        <div class="col-md-6" style="background-color: #aed6f1; padding: 40px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
            <h1 class="text-center mb-4" style="color: #007bff;">Modifier le Voyage</h1>

            <form action="{{ route('voyages.update', $voyage->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="titre" class="form-label" style="color: #007bff">Titre</label>
                    <input type="text" class="form-control" id="titre" name="titre" value="{{ $voyage->titre }}" required>
                </div>

                <div class="mb-3">
                    <label for="start_date" class="form-label" style="color: #007bff">Date de Début</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $voyage->start_date }}" required>
                </div>

                <div class="mb-3">
                    <label for="end_date" class="form-label" style="color: #007bff">Date de Fin</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $voyage->end_date }}" required>
                </div>

                <div class="mb-3">
                    <label for="destination_id" class="form-label" style="color: #007bff">Destination</label>
                    <select class="form-control" id="destination_id" name="destination_id" required>
                        @foreach($destinations as $destination)
                            <option value="{{ $destination->id }}" {{ $voyage->destination_id == $destination->id ? 'selected' : '' }}>
                                {{ $destination->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="details" class="form-label" style="color: #007bff">Détails</label>
                    <textarea class="form-control" id="details" name="details" required>{{ $voyage->details }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('voyages.index') }}" class="btn btn-secondary">← Retour</a>
                    <button type="submit" class="btn btn-primary">+ Mettre à Jour</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
