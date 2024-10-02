<?php

namespace App\Http\Controllers;

use App\Models\Voyage;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class VoyageController extends Controller
{
    public function index()
    {
        $voyages = Voyage::with('destination')->get();
        return view('voyages.index', compact('voyages'));
    }

    public function create()
    {
        $destinations = Destination::all();
        return view('voyages.create', compact('destinations'));
    }
    
    public function store(Request $request)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'details' => 'required|string',
        'destination_id' => 'required|exists:destinations,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000', 
    ]);

    $voyage = new Voyage();
    $voyage->titre = $request->titre;
    $voyage->start_date = $request->start_date;
    $voyage->end_date = $request->end_date;
    $voyage->details = $request->details;
    $voyage->destination_id = $request->destination_id;

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public'); 
        $voyage->image = $path;
    }

    $voyage->save();

    return redirect()->route('voyages.index')->with('success', 'Voyage créé avec succès.');
}

    

public function show($id) {
    $voyage = Voyage::findOrFail($id);
    return view('voyages.show', compact('voyage'));
}


    public function edit($id)
{
    $voyage = Voyage::findOrFail($id); 
    $destinations = Destination::all(); 
    return view('voyages.edit', compact('voyage', 'destinations'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'destination_id' => 'required|exists:destinations,id',
        'details' => 'required|string|max:10000',
    ]);

    $voyage = Voyage::findOrFail($id);

    $voyage->update([
        'titre' => $request->titre,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'destination_id' => $request->destination_id,
        'details' => $request->details,
    ]);

    return redirect()->route('voyages.index')->with('success', 'Voyage mis à jour avec succès.');
}

public function destroy($id)
{
    $voyage = Voyage::findOrFail($id); 

    if ($voyage->image) {
        Storage::disk('public')->delete($voyage->image);
    }

    $voyage->delete(); 

    return redirect()->route('voyages.index')->with('success', 'Voyage supprimé avec succès.');
}



}
