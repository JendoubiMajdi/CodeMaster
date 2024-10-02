<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation; 
use App\Models\Chambre;    
use App\Models\Transport;  

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create($id)
    {
        // Trouver la chambre par ID
        $chambre = Chambre::findOrFail($id);

        // Retourner la vue de création de réservation avec les informations de la chambre
        return view('reservations.create', compact('chambre'));
    }

    // Stocker la réservation
    public function store(Request $request)
{
    // Validation des champs du formulaire
    $request->validate([
        'nombre_personnes' => 'required|integer|min:1',
        'date_debut' => 'required|date|after_or_equal:today',
        'date_fin' => 'required|date|after:date_debut',
        'tarif_total' => 'required|numeric',
        'chambre_id' => 'required|exists:chambres,id',
        'type_chambre' => 'required|string', // Ajouter cette ligne pour valider le type de chambre
    ]);

    // Créer la réservation
    Reservation::create([
        'nombre_personnes' => $request->nombre_personnes,
        'date_debut' => $request->date_debut,
        'date_fin' => $request->date_fin,
        'tarif_total' => $request->tarif_total,
        'chambre_id' => $request->chambre_id,
        'type_chambre' => $request->type_chambre, // Ajouter cette ligne pour stocker le type de chambre
    ]);

    // Mettre à jour l'état de la chambre en réservée
    $chambre = Chambre::findOrFail($request->chambre_id);
    $chambre->reserver = true;
    $chambre->save();

    // Rediriger vers la liste des chambres avec un message de succès
    return redirect()->route('chambres.index')->with('success', 'Réservation effectuée avec succès.');
}
}