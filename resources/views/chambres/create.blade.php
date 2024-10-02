@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-sm" style="background-color: #E0F7FA; width: 350px;">
            <h2 class="text-center text-success mb-4">Ajouter une Chambre</h2>
            <form action="{{ route('chambres.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="form-group">
                    <label for="hotel_id" class="text-primary">Hôtel</label>
                    <select name="hotel_id" id="hotel_id" class="form-control" required>
                        <option value="">Sélectionnez un Hôtel</option>
                        @foreach($hotels as $hotel)
                            <option value="{{ $hotel->id }}" data-services="{{ $hotel->services }}" data-activites="{{ $hotel->activites }}">
                                {{ $hotel->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="etage" class="text-primary">Étage</label>
                    <input type="number" name="etage" class="form-control" min="1" required>
                </div>

                <div class="form-group">
                    <label for="type" class="text-primary">Type de Chambre</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="simple">Simple</option>
                        <option value="double">Double</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="vue" class="text-primary">Vue</label>
                    <select name="vue" class="form-control">
                        <option value="">Aucune</option>
                        <option value="mer">Vue sur Mer</option>
                        <option value="foret">Vue sur Forêt</option>
                        <option value="piscine">Vue sur Piscine</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nombre_nuitees" class="text-primary">Nombre de Nuitées</label>
                    <input type="number" name="nombre_nuitees" id="nombre_nuitees" class="form-control" min="1" required>
                </div>

                <div class="form-group">
                    <label for="services_choisis" class="text-primary">Services Inclus</label>
                    <select name="services_choisis[]" id="services_choisis" class="form-control" multiple>
                        {{-- Les services seront ajoutés dynamiquement selon l'hôtel sélectionné --}}
                    </select>
                </div>

                <div class="form-group">
                    <label for="eco_friendly" class="text-primary">Éco-Friendly</label>
                    <input type="checkbox" name="eco_friendly" value="1">
                </div>

                <div class="form-group">
                    <label for="tarif_total" class="text-primary">Tarif Total (en dinars)</label>
                    <input type="text" id="tarif_total" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="image" class="text-primary">Sélectionner une Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>
                <div class="form-group">
    

                <button type="submit" class="btn btn-success btn-block">Créer Chambre</button>
            </form>
        </div>
    </div>

    <style>
        body {
            background: url('https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDF8fHRvdXJpc3R8ZW58MHx8fHwxNjc0OTg3MzQz&ixlib=rb-4.0.3&q=80&w=1920') no-repeat center center fixed;
            background-size: cover;
        }

        .card {
            border-radius: 15px;
            opacity: 0.95;
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #4DB6AC;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #A5D6A7;
            box-shadow: 0 0 5px rgba(77, 182, 172, 0.5);
        }

        .btn-success {
            background-color: #81C784;
            border-color: #66BB6A;
        }

        .btn-success:hover {
            background-color: #66BB6A;
            border-color: #388E3C;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const hotelSelect = document.getElementById('hotel_id');
            const servicesSelect = document.getElementById('services_choisis');
            const typeSelect = document.getElementById('type');
            const nombreNuiteesInput = document.getElementById('nombre_nuitees');
            const tarifTotalInput = document.getElementById('tarif_total');

            hotelSelect.addEventListener('change', updateServices);
            typeSelect.addEventListener('change', calculateTotal);
            nombreNuiteesInput.addEventListener('input', calculateTotal);
            servicesSelect.addEventListener('change', calculateTotal);

            function updateServices() {
                const selectedOption = hotelSelect.options[hotelSelect.selectedIndex];
                const services = selectedOption.getAttribute('data-services');
                
                if (services) {
                    const servicesData = JSON.parse(services);
                    servicesSelect.innerHTML = '';

                    for (const [service, prix] of Object.entries(servicesData)) {
                        const option = document.createElement('option');
                        option.value = service;
                        option.textContent = `${service} (${prix} €)`;
                        servicesSelect.appendChild(option);
                    }
                } else {
                    servicesSelect.innerHTML = '';
                }
            }

            function calculateTotal() {
                let tarifBase = typeSelect.value === 'simple' ? 100 : 150; 
                const nombreNuitees = parseInt(nombreNuiteesInput.value) || 1;
                let tarifTotal = tarifBase * nombreNuitees;

                Array.from(servicesSelect.selectedOptions).forEach(option => {
                    const prixService = parseFloat(option.textContent.match(/\((\d+) €/)[1]);
                    tarifTotal += prixService * nombreNuitees;
                });

                tarifTotalInput.value = tarifTotal.toFixed(2);
            }
        });
    </script>
@endsection