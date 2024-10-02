<?php

namespace App\Http\Controllers;

use App\Models\Feedback; // Assurez-vous que c'est bien Feedback
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all(); // Récupérer tous les feedbacks
        return view('feedback.index', compact('feedbacks')); // Passer les feedbacks à la vue
    }

    public function create()
    {
        return view('feedback.create'); // Retourner la vue de création
    }
    public function store(Request $request)
    {
        \Log::info($request->all()); // Ajoutez ceci pour voir les données reçues
    
        // Validation des données
        $request->validate([
            'username' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    
        Feedback::create($request->only('username', 'message'));
    
        return redirect()->route('feedback.index')->with('success', 'Feedback créé avec succès !');
    }
    

    

    public function show(Feedback $feedback)
    {
        return view('feedback.show', compact('feedback')); // Afficher un feedback spécifique
    }

    public function edit(Feedback $feedback)
    {
        return view('feedback.edit', compact('feedback')); // Retourner la vue d'édition
    }

    public function update(Request $request, Feedback $feedback)
    {
        // Validation des données
        $request->validate([
            'username' => 'required|string|max:255', // Utilisez le bon nom de champ
            'message' => 'required|string',
        ]);
    
        // Mettre à jour le feedback
        $feedback->update($request->all()); // Utilisez les données de la requête
    
        return redirect()->route('feedback.index')->with('success', 'Feedback mis à jour avec succès !');
    }
    

    public function destroy(Feedback $feedback)
    {
        // Supprimer le feedback
        $feedback->delete();

        return redirect()->route('feedback.index')->with('success', 'Feedback supprimé avec succès !');
    }
}
