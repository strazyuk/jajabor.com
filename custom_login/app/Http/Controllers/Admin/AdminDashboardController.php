<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = \App\Models\User::count();
        $flightBookingsCounts = \App\Models\Booking::count(); // flights
        $hotelBookingsCounts = \App\Models\HotelBooking::count(); // hotels

        // Calculate Revenue
        $flightRevenue = \App\Models\Booking::sum('total_price');
        $hotelRevenue = \App\Models\HotelBooking::sum('total_price');
        $totalRevenue = $flightRevenue + $hotelRevenue;

        return view('admin.dashboard', compact('totalUsers', 'flightBookingsCounts', 'hotelBookingsCounts', 'totalRevenue'));
    }
}
