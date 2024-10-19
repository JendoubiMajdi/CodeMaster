<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Feedback; 
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('feedback.index', compact('feedbacks')); 
    }

    public function create()
    {
        return view('feedback.create'); 
    }
    public function store(Request $request)
    {
        \Log::info($request->all()); 
    
        
        $request->validate([
            'username' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    
        Feedback::create($request->only('username', 'message'));
        Alert::success('Success', 'Feedback ajouté avec succès!');
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
        Alert::success('Success', 'feedback mis à jour avec succès');
        return redirect()->route('feedback.index')->with('success', 'Feedback mis à jour avec succès !');
    }
    

    public function destroy(Feedback $feedback)
    {
        // Supprimer le feedback
        $feedback->delete();
        Alert::success('Success', 'feedback supprimé avec succès');
        return redirect()->route('feedback.index')->with('success', 'Feedback supprimé avec succès !');
    }
}
