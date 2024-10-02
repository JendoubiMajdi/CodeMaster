
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<style>
    body {
        background-color: #e9f5ff; /* Couleur de fond de la page */
    }

    h1 {
        color: #007bff; /* Couleur du titre */
        margin-bottom: 20px; /* Espacement sous le titre */
    }

    .card {
        margin-bottom: 20px; /* Espacement entre les cartes */
        border: 1px solid #ddd; /* Bordure de la carte */
        border-radius: 8px; /* Coins arrondis de la carte */
        padding: 15px; /* Espacement interne de la carte */
        background-color: #ffffff; /* Couleur de fond de la carte */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre de la carte */
    }

    .btn-success {
        background-color: #FFF7D1; /* Couleur du bouton 'Ajouter' */
        color: transparent; /* Masquer le texte du bouton */
        border-radius: 5px; /* Coins arrondis du bouton */
    }

    .btn-info {
        background-color: #FFECC8; /* Couleur du bouton 'Voir' */
        color: transparent; /* Masquer le texte du bouton */
        border-radius: 5px; /* Coins arrondis du bouton */
    }

    .btn-warning {
        background-color: #FFD09B; /* Couleur du bouton 'Modifier' */
        color: transparent; /* Masquer le texte du bouton */
        border-radius: 5px; /* Coins arrondis du bouton */
    }

    .btn-danger {
        background-color: #FFB0B0; /* Couleur du bouton 'Supprimer' */
        color: transparent; /* Masquer le texte du bouton */
        border-radius: 5px; /* Coins arrondis du bouton */
    }

    .alert {
        margin-bottom: 20px; /* Espacement sous l'alerte */
    }

    .btn-icon {
        width: 40px; /* Largeur des icônes */
        height: 40px; /* Hauteur des icônes */
        display: flex; /* Utilisation du flexbox */
        align-items: center; /* Alignement centré */
        justify-content: center; /* Alignement centré */
    }
</style>

<div class="container" style="padding: 20px;">
    <h1 class="text-center">Liste des Transports</h1>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('transports.create') }}" class="btn btn-success btn-icon">
            <i class="fas fa-plus"></i>
        </a>
    </div>

    <div class="row">
        @foreach($transports as $transport)
            <div class="col-md-4">
                <div class="card">
                    <h5>{{ $transport->type }}</h5>
                    <p><strong>Coût:</strong> {{ ucfirst($transport->cout) }} &euro;</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('transports.show', $transport->id) }}" class="btn btn-info btn-icon">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('transports.edit', $transport->id) }}" class="btn btn-warning btn-icon">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('transports.destroy', $transport->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-icon" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce transport ?');">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Ajoutez le CDN de Font Awesome ou Bootstrap Icons dans le fichier blade ou layout -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMC1D26z8TqCpmS4x20T9/LK7dQv/oNw9xl3sJ" crossorigin="anonymous">
</x-app-layout>

