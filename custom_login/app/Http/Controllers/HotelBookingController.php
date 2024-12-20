<?php

namespace App\Http\Controllers;

use App\Models\HotelBooking;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelBookingController extends Controller
{
    // Store the booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'number_of_guests' => 'required|integer|min:1',
            'room_type' => 'required|string', // Changed field to match "room_type"
        ]);

        HotelBooking::create([
            'user_id' => auth()->id(),
            'hotel_id' => $validated['hotel_id'],
            'check_in_date' => $validated['check_in_date'],
            'check_out_date' => $validated['check_out_date'],
            'number_of_guests' => $validated['number_of_guests'],
            'bedroom_type' => $validated['room_type'], // Save as bedroom_type
        ]);

        return redirect()->route('hotels.index')->with('success', 'Your hotel is booked successfully!');
    }

    // Show booking form for a specific hotel
    public function create($id)
    {
        $hotel = Hotel::findOrFail($id);
    
        // Example: Adding coordinates to the hotel model (replace with real values)
        $hotel->latitude = 23.8103; // Set hotel's latitude
        $hotel->longitude = 90.4125; // Set hotel's longitude
        
        return view('hotelbookings.create', compact('hotel'));
    }

    // List hotels
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotels.index', compact('hotels'));
    }



}
