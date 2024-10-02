<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SensibilisationController;
use App\Http\Controllers\ItineraireController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\VoyageController;
use App\Http\Controllers\CommunauteController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\TransportController;


route::get('/',[TemplateController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('sensibilisation', SensibilisationController::class);
    Route::resource('itineraire', ItineraireController::class);
    Route::resource('feedback', FeedbackController::class);
    Route::resource('communaute', CommunauteController::class);
    Route::get('sensibilisation', [SensibilisationController::class, 'index'])->name('sensibilisation.index');
    Route::post('sensibilisation', [SensibilisationController::class, 'store'])->name('sensibilisation.store');
    //emna
    Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/create', [DestinationController::class, 'create'])->name('destinations.create');
Route::post('/destinations', [DestinationController::class, 'store'])->name('destinations.store');
Route::get('/destinations/{id}', [DestinationController::class, 'show'])->name('destinations.show');
Route::get('/destinations/{id}/edit', [DestinationController::class, 'edit'])->name('destinations.edit');  // Nouvelle route pour l'édition
Route::put('/destinations/{id}', [DestinationController::class, 'update'])->name('destinations.update');  // Route pour la mise à jour
Route::delete('/destinations/{id}', [DestinationController::class, 'destroy'])->name('destinations.destroy');


// Routes pour les voyages
Route::get('/voyages', [VoyageController::class, 'index'])->name('voyages.index');
Route::get('/voyages/create', [VoyageController::class, 'create'])->name('voyages.create');
Route::post('/voyages', [VoyageController::class, 'store'])->name('voyages.store');
Route::get('/voyages/{id}', [VoyageController::class, 'show'])->name('voyages.show');
Route::get('/voyages/{id}/edit', [VoyageController::class, 'edit'])->name('voyages.edit');  // Nouvelle route pour l'édition
Route::put('/voyages/{id}', [VoyageController::class, 'update'])->name('voyages.update');  // Route pour la mise à jour
Route::delete('/voyages/{id}', [VoyageController::class, 'destroy'])->name('voyages.destroy');

Route::get('/chambres', [ChambreController::class, 'index'])->name('chambres.index'); 
Route::get('/chambres/create', [ChambreController::class, 'create'])->name('chambres.create'); 
Route::post('/chambres', [ChambreController::class, 'store'])->name('chambres.store'); 

Route::get('/chambres/{id}', [ChambreController::class, 'show'])->name('chambres.show');
Route::get('/chambres/{id}/edit', [ChambreController::class, 'edit'])->name('chambres.edit'); 
Route::put('/chambres/{id}', [ChambreController::class, 'update'])->name('chambres.update'); 
Route::delete('/chambres/{id}', [ChambreController::class, 'destroy'])->name('chambres.destroy'); 
Route::get('/transports', [TransportController::class, 'index'])->name('transports.index'); // Afficher la liste des transports
Route::get('/transports/create', [TransportController::class, 'create'])->name('transports.create'); // Afficher le formulaire de création
Route::post('/transports', [TransportController::class, 'store'])->name('transports.store'); // Enregistrer un nouveau transport
Route::get('/transports/{transport}', [TransportController::class, 'show'])->name('transports.show'); // Afficher un transport spécifique
Route::get('/transports/{transport}/edit', [TransportController::class, 'edit'])->name('transports.edit'); // Afficher le formulaire d'édition
Route::put('/transports/{transport}', [TransportController::class, 'update'])->name('transports.update');
Route::delete('/transports/{transport}', [TransportController::class, 'destroy'])->name('transports.destroy');
    // Routes CRUD pour Réservations
    Route::get('/reservations/create/{id}', [ReservationController::class, 'create'])->name('reservations.create');
     Route::post('/reservations/store', [ReservationController::class, 'store'])->name('reservations.store');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store'); // Enregistrer une nouvelle réservation
    Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->name('reservations.show'); // Afficher une réservation spécifique
    Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit'); // Afficher le formulaire d'édition
    Route::put('/reservations/{reservation}', [ReservationController::class, 'update'])->name('reservations.update'); // Mettre à jour une réservation
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy'); // Supprimer une réservation
    Route::get('/hotels', [HotelController::class, 'index'])->name('hotel.index'); // Afficher la liste des hôtels
    Route::get('/hotels/create', [HotelController::class, 'create'])->name('hotel.create'); // Afficher le formulaire de création
    Route::post('/hotels', [HotelController::class, 'store'])->name('hotel.store'); // Enregistrer un nouvel hôtel
    Route::get('/hotels/{hotel}', [HotelController::class, 'show'])->name('hotel.show'); // Afficher un hôtel spécifique
    Route::get('/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('hotel.edit'); // Afficher le formulaire d'édition
    Route::put('/hotels/{hotel}', [HotelController::class, 'update'])->name('hotel.update'); // Mettre à jour un hôtel
    Route::delete('/hotels/{hotel}', [HotelController::class, 'destroy'])->name('hotel.destroy'); // Supprimer un hôtel
});

require __DIR__.'/auth.php';
