<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\FavoriteController;
use app\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LocationController;

use App\Http\Controllers\WeatherController;

use App\Http\Controllers\HotelBookingController;

use App\Http\Controllers\PaymentController; // Import PaymentController

use Illuminate\Support\Facades\Route;


Route::post('/hotelbookings', [HotelBookingController::class, 'store'])->name('hotelbookings.store');

Route::get('/hotelbookings/create/{id}', [HotelBookingController::class, 'create'])->name('hotelbookings.create');

Route::delete('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');

Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');


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

    // Stripe Payment Routes
    Route::prefix('payment')->group(function () {
        Route::get('/checkout/{flight}', [PaymentController::class, 'showPaymentPage'])->name('payment.checkout');
        Route::post('/checkout/{flight}', [PaymentController::class, 'createCheckoutSession'])->name('payment.createCheckoutSession');
        Route::get('/success/{flight}', [PaymentController::class, 'success'])->name('payment.success');
        Route::get('/cancel/{flight}', [PaymentController::class, 'cancel'])->name('payment.cancel');
    });

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
Route::get('/home', [HomeController::class, 'index'])->name('home');

//weather
Route::get('weather', [WeatherController::class, 'showWeather'])->name('weather.show');
<<<<<<< HEAD
Route::get('/home', [HomeController::class, 'index'])->name('home');

=======
>>>>>>> 4bfb21637b8602ff9855b42b6e943a9f24c9ec99
// Auth Routes
require __DIR__ . '/auth.php';
