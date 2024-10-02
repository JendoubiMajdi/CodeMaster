@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #f0f0f0; padding: 20px;">
    <h1 style="color: #4CAF50; text-align: center;">Liste des Chambres</h1>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
            {{ session('success') }}
        </div>
    @endif
    <!-- Bouton pour ajouter une nouvelle chambre -->
    <div class="mb-4">
        <a href="{{ route('chambres.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Ajouter une Chambre
        </a>
    </div>

    <div class="row">
        @foreach($chambres as $chambre)
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="card shadow-sm" style="width: 100%; background-color: #ffffff;">
                    <img src="{{ asset('storage/' . $chambre->image) }}" class="card-img-top" alt="Image de la chambre" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <p class="card-text" style="color: #4CAF50; font-weight: bold;">
                            Tarif Total: {{ $chambre->tarif_total }} Dinars
                            <strong>Disponibilité: </strong>
                            {{ $chambre->reserver ? 'Réservée' : 'Disponible' }}
                        </p>
                       
                        <div class="mt-auto d-flex justify-content-between">
                            <a href="{{ route('chambres.show', $chambre->id) }}" class="btn btn-outline-info btn-sm" title="Voir">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('chambres.edit', $chambre->id) }}" class="btn btn-outline-warning btn-sm" title="Éditer">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('chambres.destroy', $chambre->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @if (!$chambre->reserver)
                            <a href="{{ route('reservations.create', $chambre->id) }}" class="btn btn-outline-success btn-sm" title="Réserver">
    <i class="fas fa-check-circle"></i> Réserver
</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    window.onload = function() {
        var alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(function() {
                alert.style.display = 'none';
            }, 2000);
        }
    }
</script>
@endsection