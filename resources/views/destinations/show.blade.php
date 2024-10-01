

<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>                          

    <div class="container mt-5" style="background-color: #f4f6f9; padding: 40px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
    <h1 class="mb-4" style="text-align: center; color: #007bff;">{{ $destination->nom }}</h1>

    <div class="text-center mb-4">
        @if ($destination->image)
            <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->nom }}" class="img-fluid" style="max-height: 300px; transition: transform 0.3s; border-radius: 10px;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
        @endif
    </div>

    <p style="text-align: center; font-size: 1.2em; color: #555;"><strong>Lieu Visité :</strong> {{ $destination->lieu_visite }}</p>
    <p style="text-align: center; font-size: 1.2em; color: #555;"><strong>Région :</strong> {{ $destination->region ?? 'N/A' }}</p>
    <p style="text-align: center; font-size: 1.2em; color: #555;"><strong>Type :</strong> {{ $destination->type }}</p>
    <p style="text-align: center; font-size: 1.2em; color: #555;"><strong>Description :</strong> {{ $destination->description }}</p>

    <div class="text-center mt-4">
        <a href="{{ route('destinations.index') }}" class="btn btn-secondary" style="padding: 10px 20px; background-color: #6c757d; border: none; font-size: 1.1em; transition: background-color 0.3s;">
        ← Retour à la liste
        </a>
    </div>
</div>

<style>
    body {
        background-color: #e3f2fd; /* Couleur de fond plus claire */
    }

    .container {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .btn-secondary:hover {
        background-color: #5a6268; /* Changement de couleur au survol */
        transition: background-color 0.3s;
    }
</style>



</x-app-layout>