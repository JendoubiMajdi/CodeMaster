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
route::get('/',[TemplateController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('hotel', HotelController::class);
    Route::resource('reservation', ReservationController::class);
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
});

require __DIR__.'/auth.php';
