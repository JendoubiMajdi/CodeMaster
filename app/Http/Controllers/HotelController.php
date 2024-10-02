<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotel.index', compact('hotels'));
    }

    public function create()
    {
        return view('hotel.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
     
          'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'nombre_etages' => 'required|integer|min:1',
            'services' => 'nullable|string',
            'activites' => 'nullable|string',
        
    ]);

    // Formatage des services
    $services_array = [];
    if (!empty($request->services)) {
        $services = explode(',', $request->services);
        foreach ($services as $service) {
            $parts = explode(':', $service);
            if (count($parts) === 2) {
                $services_array[trim($parts[0])] = (float) trim($parts[1]);
            }
        }
    }
    $validated['services'] = json_encode($services_array);

    // Formatage des activités
    $activites_array = [];
    if (!empty($request->activites)) {
        $activites = explode(',', $request->activites);
        foreach ($activites as $activite) {
            $parts = explode(':', $activite);
            if (count($parts) === 2) {
                $activites_array[trim($parts[0])] = (float) trim($parts[1]);
            }
        }
    }
    $validated['activites'] = json_encode($activites_array);

    // Création de l'hôtel
    Hotel::create($validated);

    return redirect()->route('hotel.index')->with('success', 'Hôtel créé avec succès.');
}
    public function show(Hotel $hotel)
    {
        return view('hotel.show', compact('hotel'));
    }

    public function edit(Hotel $hotel)
    {
        return view('hotel.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:500',
            'ville' => 'required|string|max:100',
            'etoiles' => 'required|integer|min:1|max:5',
             'pays' => 'required|string|max:100'
        ]);

        // Mise à jour de l'hôtel
        $hotel->update($request->all());

        return redirect()->route('hotel.index')->with('success', 'Hôtel mis à jour avec succès.');
    }

    public function destroy(Hotel $hotel)
    {
        // Suppression de l'hôtel
        $hotel->delete();

        return redirect()->route('hotel.index')->with('success', 'Hôtel supprimé avec succès.');
    }
}
