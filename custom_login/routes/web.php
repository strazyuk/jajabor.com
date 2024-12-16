<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LocationController;


use App\Http\Controllers\HotelBookingController;

use Illuminate\Support\Facades\Route;


Route::post('/hotelbookings', [HotelBookingController::class, 'store'])->name('hotelbookings.store');

Route::get('/hotelbookings/create/{id}', [HotelBookingController::class, 'create'])->name('hotelbookings.create');

Route::delete('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');

Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');



// Welcome page
Route::get('/', function () {
    return view('welcome');
});


// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::match(['PUT', 'POST'], 'profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Flight Routes


        // Booking Routes
        Route::get('/flights/history', [BookingController::class, 'history'])->name('booking.history'); // View booking history
        Route::post('/flights/confirm/{flight}', [BookingController::class, 'confirm'])->name('flights.confirm'); // Confirm booking
        Route::post('/flights/cancel/{id}', [BookingController::class, 'cancel'])->name('flights.cancel'); // Cancel booking
   
        // Flight Routes
        Route::get('/flights', [FlightController::class, 'index'])->name('flights.index'); // List all flights
        Route::get('/flights/{flight}', [FlightController::class, 'show'])->name('flights.show'); // Flight details
        
        //asir
        Route::get('/flights/{flight}/buy', [FlightController::class, 'buy'])->name('flights.buy');
        Route::post('/flights/{flight}/complete-purchase', [FlightController::class, 'completePurchase'])->name('flights.completePurchase');
    
        // Flight Search Routes
        Route::post('/search', [FlightController::class, 'search'])->name('flights.search');






    // Complaint Routes
    Route::get('/complaint', [ComplaintController::class, 'create'])->name('complaint.create');
    Route::post('/complaint', [ComplaintController::class, 'store'])->name('complaint.store');
});


// Favorites Routes
Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');


// Hotel Routes
Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index'); // Show hotels
Route::get('/hotels/search', [HotelController::class, 'search'])->name('hotels.search'); // Search for hotels

//location
Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');


// Auth Routes
require __DIR__ . '/auth.php';

