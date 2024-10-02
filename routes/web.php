<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ChambreController;
use App\Models\Hotel;

route::get('/',[TemplateController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/hotels1', [HotelController::class, 'create'])->name('hotels.create');
    Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');
    Route::get('/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
Route::put('/hotels/{id}', [HotelController::class, 'update'])->name('hotels.update');
    Route::get('/properties', function () {
        $hotels = Hotel::all(); // Fetch all hotels from the database
        return view('hotels.properties', compact('hotels')); // Pass the hotels to the view
    })->name('properties');
    Route::delete('/hotels/{hotel}', [HotelController::class, 'destroy'])->name('hotels.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('hotels', HotelController::class)->except(['create', 'store','edit', 'update', 'destroy']);
    Route::resource('chambres', ChambreController::class);
    
    
});

require __DIR__.'/auth.php';
