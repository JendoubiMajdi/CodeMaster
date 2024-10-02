<?php

namespace App\Http\Controllers;

use App\Models\Transport; 
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $transports = Transport::all();
        return view('transports.index', compact('transports'));
    }

    public function create()
    {
        return view('transports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'mode' => 'required|string',
            'cout' => 'required|numeric',
            'horaire_depart' => 'required|date_format:H:i',
            'horaire_arrivee' => 'required|date_format:H:i',
            'eco_friendly' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);

        $data = $request->all();

        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $data['image'] = $path; // Ajouter le chemin de l'image aux données
        }

        Transport::create($data);

        return redirect()->route('transports.index')->with('success', 'Transport ajouté avec succès.');
    }

    public function show(Transport $transport)
    {
        return view('transports.show', compact('transport'));
    }

    public function edit(Transport $transport)
    {
        return view('transports.edit', compact('transport'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'mode' => 'required|string|in:bus,train,avion',
            'cout' => 'required|numeric',
            'horaire_depart' => 'required|date_format:H:i',
            'horaire_arrivee' => 'required|date_format:H:i',
            'eco_friendly' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);

        $transport = Transport::findOrFail($id);

        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($transport->image) {
                Storage::disk('public')->delete($transport->image);
            }
            $path = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $path; // Mettre à jour le chemin de l'image
        }

        $transport->update($validatedData);

        return redirect()->route('transports.index')->with('success', 'Transport mis à jour avec succès.');
    }

    public function destroy(Transport $transport)
    {
        // Supprimer l'image si elle existe
        if ($transport->image) {
            Storage::disk('public')->delete($transport->image);
        }

        $transport->delete();

        return redirect()->route('transports.index')->with('success', 'Transport supprimé avec succès.');
    }
}