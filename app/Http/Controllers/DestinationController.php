<?php

namespace App\Http\Controllers;
use App\Models\Destination;

use Illuminate\Http\Request;

class DestinationController extends Controller
{
   
    public function index()
    {
        $destinations = Destination::all(); 
        return view('destinations.index', compact('destinations')); 
        }

   
    public function create()
    {
        return view('destinations.create');
    }

 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'lieu_visite' => 'required|string|max:255',
            'region' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);
    
      
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('destinations', 'public');
        }
    
        Destination::create($validatedData);
    
        return redirect()->route('destinations.index')->with('success', 'Destination créée avec succès.');
        }

    public function show(string $id)
    {
        $destination = Destination::findOrFail($id);
        return view('destinations.show', compact('destination'));    }

    public function edit(string $id)
    {
        $destination = Destination::findOrFail($id);
        return view('destinations.edit', compact('destination'));    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'lieu_visite' => 'required|string|max:255',
            'region' => 'required|string|max:255', 
            'type' => 'required|string|max:255', 
            'description' => 'required|string',
        ]);
    
        $destination = Destination::findOrFail($id);
        $destination->update($request->all());
    
        return redirect()->route('destinations.index')->with('success', 'Destination mise à jour avec succès.');
        }

   
    public function destroy(string $id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();
        return redirect()->route('destinations.index')->with('success', 'Destination supprimée avec succès.');   
     }
}
