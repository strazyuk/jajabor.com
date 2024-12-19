<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

// Welcome Page
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
    Route::prefix('profile')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::match(['PUT', 'POST'], '/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Flight Routes
    Route::prefix('flights')->group(function () {
        Route::get('/', [FlightController::class, 'index'])->name('flights.index');
        Route::get('/{flight}', [FlightController::class, 'show'])->name('flights.show');
        
        Route::get('/{flight}/buy', [FlightController::class, 'buy'])->name('flights.buy');
        Route::post('/{flight}/complete-purchase', [FlightController::class, 'completePurchase'])->name('flights.completePurchase');
        Route::post('/confirm/{flight}', [BookingController::class, 'confirm'])->name('flights.confirm');
        Route::post('/cancel/{id}', [BookingController::class, 'cancel'])->name('flights.cancel');
        Route::get('/history', [BookingController::class, 'history'])->name('booking.history');
    });

    // Flight Search
    Route::post('/search', [FlightController::class, 'search'])->name('flights.search');

    // Complaint Routes
    Route::get('/complaint', [ComplaintController::class, 'create'])->name('complaint.create');
    Route::post('/complaint', [ComplaintController::class, 'store'])->name('complaint.store');
});

// Favorites Routes
Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');

// Hotel Routes
Route::prefix('hotels')->group(function () {
    Route::get('/', [HotelController::class, 'index'])->name('hotels.index');
    Route::get('/search', [HotelController::class, 'search'])->name('hotels.search');
});

// Location Routes
Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');

// Auth Routes
require __DIR__ . '/auth.php';
