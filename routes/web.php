<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SensibilisationController;

use App\Http\Controllers\ItineraireController;
use App\Http\Controllers\FeedbackController;
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
});

require __DIR__.'/auth.php';
