<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;

// Welcome Route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard Route (requires authentication)
Route::get('/dashboard', function () {
    return view('dashboard'); // Replace with the correct view for the dashboard
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated Routes
    // Profile Routes
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::match(['put', 'post'], 'profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Flight Routes
    Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');
    Route::get('/flights/{flight}', [FlightController::class, 'show'])->name('flights.show');

   

Route::middleware('auth')->group(function () {
    Route::get('/complaint', [ComplaintController::class, 'create'])->name('complaint.create');
    Route::post('/complaint', [ComplaintController::class, 'store'])->name('complaint.store');
});
    

// Include Auth Routes (login, register, etc.)
require __DIR__ . '/auth.php';
