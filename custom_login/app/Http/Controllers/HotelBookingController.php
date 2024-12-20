<?php

namespace App\Http\Controllers;
use App\Models\HotelBooking;
use App\Models\Hotel;

use Illuminate\Http\Request;

class HotelBookingController extends Controller
{
    public function store(Request $request)
{
    // Validate the form input
    $validated = $request->validate([
        'hotel_id' => 'required|exists:hotels,id',
        'check_in_date' => 'required|date',
        'check_out_date' => 'required|date|after:check_in_date',
        'number_of_guests' => 'required|integer|min:1',
        'bedroom_type' => 'required|string',
    ]);

    // Store the booking details
    HotelBooking::create([
        'user_id' => auth()->id(),
        'hotel_id' => $validated['hotel_id'],
        'check_in_date' => $validated['check_in_date'],
        'check_out_date' => $validated['check_out_date'],
        'number_of_guests' => $validated['number_of_guests'],
        'bedroom_type' => $validated['bedroom_type'],
    ]);

    // Redirect with success message
    return redirect()->route('hotelbookings.create', $validated['hotel_id'])->with('success', 'Your hotel is booked successfully!');
}


   

public function create($id)
{
    $hotel = Hotel::findOrFail($id);
    
    // Example: Adding coordinates to the hotel model (replace with real values)
    $hotel->latitude = 23.8103; // Set hotel's latitude
    $hotel->longitude = 90.4125; // Set hotel's longitude
    
    return view('hotelbookings.create', compact('hotel'));
}

     
    public function index(Request $request)
{
    $hotels = Hotel::all(); // Get all hotels or apply search/filter
    $favoriteHotels = []; // Or fetch favorite hotels if applicable
    return view('hotels.index', compact('hotels', 'favoriteHotels'));
}

}

