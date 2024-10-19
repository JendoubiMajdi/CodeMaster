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
    Route::middleware('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('sensibilisation', SensibilisationController::class);
    Route::resource('hotel', HotelController::class);
    Route::resource('feedback', FeedbackController::class);
 

    //emna
    Route::resource('destinations', DestinationController::class);



// Routes pour les voyages
    Route::resource('voyages', VoyageController::class);


    Route::resource('chambres', ChambreController::class); 

    Route::resource('transports', TransportController::class); // Afficher la liste des transports

    // Routes CRUD pour Réservations
    Route::resource('reservations', ReservationController::class);

  


});
//user normal
Route::get('sensibilisation', [SensibilisationController::class, 'index'])->name('sensibilisation.index');
Route::get('/transports', [TransportController::class, 'index'])->name('transports.index'); 
Route::get('/hotels', [HotelController::class, 'index'])->name('hotel.index'); 
Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedback.index');
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/voyages', [VoyageController::class, 'index'])->name('voyages.index');
Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');
Route::get('/chambres', [ChambreController::class, 'index'])->name('chambres.index');
Route::get('/hotels/{hotel}', [HotelController::class, 'show'])->name('hotel.show'); 
Route::get('/chambre/{id}', [ChambreController::class, 'show'])->name('chambres.show');
Route::get('/transports/{transport}', [TransportController::class, 'show'])->name('transports.show'); 
Route::get('/voyages/{voyage}', [VoyageController::class, 'show'])->name('voyages.show');
Route::get('/destinations/{destination}', [DestinationController::class, 'show'])->name('destinations.show');
Route::get('/feedback/{feedback}', [FeedbackController::class, 'show'])->name('feedback.show');
});

require __DIR__.'/auth.php';
