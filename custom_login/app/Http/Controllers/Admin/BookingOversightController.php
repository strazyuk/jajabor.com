<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingOversightController extends Controller
{
    public function index()
    {
        $flightBookings = \App\Models\Booking::with(['user', 'flight'])->orderBy('created_at', 'desc')->paginate(10, ['*'], 'flights_page');
        $hotelBookings = \App\Models\HotelBooking::with(['user', 'hotel'])->orderBy('created_at', 'desc')->paginate(10, ['*'], 'hotels_page');

        return view('admin.bookings.index', compact('flightBookings', 'hotelBookings'));
    }
}
