<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|max:20',
            'description' => 'nullable|string',
            'localisation' => 'required|string|max:20',
            'certification' => 'nullable|string|max:20',
            'contact_number' => 'nullable|digits:8',
        'website' => 'nullable|url',
        'rating' => 'nullable|numeric|min:0|max:5',
        'number_of_rooms' => 'nullable|integer',
            'adresse' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'nombre_etages' => 'required|integer|min:1',
            'services' => 'nullable|string',
            'activites' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

            // Format the services
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
    $validatedData['services'] = json_encode($services_array);

    // Format the activities
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
    $validatedData['activites'] = json_encode($activites_array);

    // Create a new Hotel instance and save it to the database
    $hotel = new Hotel;
    $hotel->name = $validatedData['name'];
    $hotel->description = $validatedData['description'] ?? null;
    $hotel->localisation = $validatedData['localisation'];
    $hotel->certification = $validatedData['certification'] ?? null;
    $hotel->contact_number = $validatedData['contact_number'] ?? null;
    $hotel->website = $validatedData['website'] ?? null;
    $hotel->rating = $validatedData['rating'] ?? null;
    $hotel->number_of_rooms = $validatedData['number_of_rooms'] ?? null;
    $hotel->adresse = $validatedData['adresse'];
    $hotel->pays = $validatedData['pays'];
    $hotel->nombre_etages = $validatedData['nombre_etages'];
    $hotel->services = $validatedData['services'] ?? null;
    $hotel->activites = $validatedData['activites'] ?? null;

    // Handle the image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images/hotels', 'public'); // Store in 'storage/app/public/images/hotels'
        $hotel->image = $imagePath;  // Save the image path in the database
    }
    // Save the hotel to the database
    $hotel->save();

    // Redirect to the hotels list page or show success message
    return redirect()->route('properties')->with('success', 'Hotel created successfully!');
    } 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'name' => 'required|max:20',
            'description' => 'nullable|string',
            'localisation' => 'required|string|max:20',
            'certification' => 'nullable|string|max:20',
            'contact_number' => 'nullable|digits:8',
        'website' => 'nullable|url',
        'rating' => 'nullable|numeric|min:0|max:5',
        'number_of_rooms' => 'nullable|integer',
            'adresse' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'nombre_etages' => 'required|integer|min:1',
            'services' => 'nullable|string',
            'activites' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());
        
    
        return redirect()->route('properties')->with('success', 'Hotel updated successfully.');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return redirect()->route('properties')->with('success', 'Hotel deleted successfully!');
    }
}
