<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\FavoriteController;

use App\Http\Controllers\HotelBookingController;

use Illuminate\Support\Facades\Route;


Route::post('/hotelbookings', [HotelBookingController::class, 'store'])->name('hotelbookings.store');

Route::get('/hotelbookings/create/{id}', [HotelBookingController::class, 'create'])->name('hotelbookings.create');

Route::delete('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');

Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard'); // Replace with the correct view for the dashboard
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated Routes
    // Profile Routes
    Route::middleware('auth')->group(function () {
        Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::match(['PUT', 'POST'], 'profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Flight Routes
    Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');
    Route::get('/flights/{flight}', [FlightController::class, 'show'])->name('flights.show');
    });



   

Route::middleware('auth')->group(function () {
    Route::get('/complaint', [ComplaintController::class, 'create'])->name('complaint.create');
    Route::post('/complaint', [ComplaintController::class, 'store'])->name('complaint.store');
});

require __DIR__.'/auth.php';

Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('/hotels/search', [HotelController::class, 'search'])->name('hotels.search');

