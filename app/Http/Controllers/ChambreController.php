<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chambre;
use App\Models\Hotel; 
use Illuminate\Support\Facades\Storage;

class ChambreController extends Controller
{
         public function index()
    {
        // Récupérer toutes les chambres de la base de données
        $chambres = Chambre::all();

        // Retourner la vue avec les chambres
        return view('chambres.index', compact('chambres'));
    }

        public function create()
        {
            $hotels = Hotel::all(); // Récupérer tous les hôtels, y compris leurs services et activités
            return view('chambres.create', compact('hotels'));
        }
    
        public function store(Request $request)
        {
            $validated = $request->validate([
                'hotel_id' => 'required|exists:hotels,id',
                'etage' => 'required|integer|min:1',
                'type' => 'required|in:simple,double',
                'vue' => 'nullable|in:mer,foret,piscine',
                'nombre_nuitees' => 'required|integer|min:1',
                'services_choisis' => 'nullable|array',
                'eco_friendly' => 'required|boolean',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
              
                
            ]);
            // Upload de l'image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/chambres', 'public');
            $validated['image'] = $path; // Enregistrer le chemin de l'image dans les données validées
        }
    
            // Récupérer l'hôtel
            $hotel = Hotel::find($request->hotel_id);
    
            // Calcul du tarif de base en fonction du type de chambre
            $tarif_base = ($request->type == 'simple') ? $request->tarif_simple : $request->tarif_double;
            $tarif_total = $tarif_base * $request->nombre_nuitees;
    
            // Ajouter les services choisis au tarif total
            if (!empty($request->services_choisis)) {
                $services = json_decode($hotel->services, true);
                foreach ($request->services_choisis as $service) {
                    if (isset($services[$service])) {
                        $tarif_total += $services[$service] * $request->nombre_nuitees;
                    }
                }
            }
    
            $validated['tarif_total'] = $tarif_total;
            $validated['services_choisis'] = json_encode($request->services_choisis);
            // Créer la chambre
            Chambre::create($validated);
    
            return redirect()->route('chambres.index')->with('success', 'Chambre créée avec succès.');
        }

        public function show($id)
        {
            $chambre = Chambre::findOrFail($id);
            return view('chambres.show', compact('chambre'));
        }

        public function edit($id)
        {
            // Trouver la chambre par ID
            $chambre = Chambre::findOrFail($id);
        
            // Retourner la vue d'édition avec les informations de la chambre
            return view('chambres.edit', compact('chambre'));
        }
        
        public function update(Request $request, $id)
        {
            // Validation des champs du formulaire
            $request->validate([
                'type' => 'required|string|max:255',
                'etage' => 'required|integer',
                'vue' => 'nullable|string|max:255',
                'tarif_total' => 'required|numeric',
                'eco_friendly' => 'required|boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            
            ]);
            
            // Trouver la chambre par ID
            $chambre = Chambre::findOrFail($id);
        
            // Mettre à jour les données de la chambre
            $chambre->type = $request->type;
            $chambre->etage = $request->etage;
            $chambre->vue = $request->vue;
            $chambre->tarif_total = $request->tarif_total;
            $chambre->eco_friendly = $request->eco_friendly;
            
            // Mise à jour de l'image si une nouvelle image est téléchargée
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images/chambres', 'public');
                $chambre->image = $imagePath;
            }
           
        
            // Enregistrer les modifications
            $chambre->save();
        
            // Rediriger vers la liste des chambres avec un message de succès
            return redirect()->route('chambres.index')->with('success', 'Chambre mise à jour avec succès.');
        }
        

    public function destroy($id)
{
    // Trouver la chambre par ID
    $chambre = Chambre::findOrFail($id);

    // Supprimer la chambre
    $chambre->delete();

    // Rediriger vers la liste des chambres avec un message de succès
    return redirect()->route('chambres.index')->with('success', 'Chambre supprimée avec succès.');
}
}
