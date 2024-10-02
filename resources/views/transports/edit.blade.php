
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="container" style="background-color: #f0f0f0; padding: 20px;">
    <h1 style="color: #4CAF50; text-align: center;">Modifier le Transport</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transports.update', $transport->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="type">Type:</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $transport->type) }}" required>
        </div>

        <div class="form-group">
            <label for="mode">Mode:</label>
            <select class="form-control" id="mode" name="mode" required>
                <option value="bus" {{ $transport->mode === 'bus' ? 'selected' : '' }}>Bus</option>
                <option value="train" {{ $transport->mode === 'train' ? 'selected' : '' }}>Train</option>
                <option value="avion" {{ $transport->mode === 'avion' ? 'selected' : '' }}>Avion</option>
            </select>
        </div>

        <div class="form-group">
            <label for="cout">Coût:</label>
            <input type="number" class="form-control" id="cout" name="cout" step="0.01" value="{{ old('cout', $transport->cout) }}" required>
        </div>

        <div class="form-group">
            <label for="horaire_depart">Horaire de départ:</label>
            <input type="time" class="form-control" id="horaire_depart" name="horaire_depart" value="{{ old('horaire_depart', $transport->horaire_depart) }}" required>
        </div>

        <div class="form-group">
            <label for="horaire_arrivee">Horaire d'arrivée:</label>
            <input type="time" class="form-control" id="horaire_arrivee" name="horaire_arrivee" value="{{ old('horaire_arrivee', $transport->horaire_arrivee) }}" required>
        </div>

        <div class="form-group">
            <label for="eco_friendly">Éco-friendly:</label>
            <select class="form-control" id="eco_friendly" name="eco_friendly">
                <option value="1" {{ $transport->eco_friendly ? 'selected' : '' }}>Oui</option>
                <option value="0" {{ !$transport->eco_friendly ? 'selected' : '' }}>Non</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Modifier Transport</button>
    </form>
</div>
</x-app-layout>

