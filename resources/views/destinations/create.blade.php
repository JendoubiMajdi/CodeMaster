

<style>
    body {
        background-color: #e3f2fd; /* Couleur de fond douce */
    }

    .form-control {
        border: 1px solid #ced4da; /* Couleur de bordure standard */
        transition: box-shadow 0.3s, border-color 0.3s; /* Animation de bordure */
    }

    .form-control:focus {
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        border-color: #007bff; /* Couleur de bordure lors de la mise au point */
    }

    .btn-primary {
        background-color: #007bff; /* Couleur principale */
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Couleur au survol */
        transition: background-color 0.3s, transform 0.3s; /* Animation de transition */
        transform: scale(1.05); /* Effet de zoom */
    }

    .btn-secondary {
        background-color: #6c757d; /* Couleur secondaire */
    }

    .btn-secondary:hover {
        background-color: #5a6268; /* Changement de couleur au survol */
        transition: background-color 0.3s;
    }
</style>


<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>                         
<div class="container mt-5" style="background-color: #ffffff; padding: 40px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
    <h1 class="mb-4 text-center" style="color: #007bff; font-family: 'Arial', sans-serif;">Ajouter une Destination</h1>

    <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label" style="color: #333;">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required style="border-radius: 10px; transition: border-color 0.3s;">
        </div>

        <div class="mb-3">
            <label for="lieu_visite" class="form-label" style="color: #333;">Lieu Visité</label>
            <input type="text" name="lieu_visite" id="lieu_visite" class="form-control" required style="border-radius: 10px; transition: border-color 0.3s;">
        </div>

        <div class="mb-3">
            <label for="region" class="form-label" style="color: #333;">Région</label>
            <input type="text" name="region" id="region" class="form-control" style="border-radius: 10px; transition: border-color 0.3s;">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label" style="color: #333;">Type</label>
            <input type="text" name="type" id="type" class="form-control" style="border-radius: 10px; transition: border-color 0.3s;">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label" style="color: #333;">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required style="border-radius: 10px; transition: border-color 0.3s;"></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label" style="color: #333;">Image</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" style="border-radius: 10px; transition: border-color 0.3s;">
        </div>

        <div class="d-flex justify-content-end">
         <div class="d-flex justify-content-between mb-4">
    <a href="{{ url()->previous() }}" class="btn btn-secondary" style="background-color: #6c757d; padding: 10px 20px">
        ← Retour
    </a>
    
    <button type="submit" class="btn btn-primary" style="padding: 10px 20px;"> + Créer </button>
</div>
    </form>

    <div class="d-flex justify-content-start mb-4">
       
    </div>
</div></x-app-layout>