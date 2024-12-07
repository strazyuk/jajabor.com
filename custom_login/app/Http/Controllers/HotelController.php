<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel; // Import the Hotel model
use App\Models\Favorite;

class HotelController extends Controller
{
    public function index()
    {
        // Retrieve all hotels
        $hotels = Hotel::all();
        $favoriteHotels = Favorite::where('user_id', auth()->id())->pluck('hotel_id')->toArray();

        return view('hotels.index', compact('hotels', 'favoriteHotels'));
    }

    public function search(Request $request)
{
    $query = Hotel::query();

    // Check if the search input is filled
    if ($request->filled('search')) {
        $search = $request->search;

        // Search by name OR location
        $query->where('name', 'like', '%' . $search . '%')
              ->orWhere('location', 'like', '%' . $search . '%');
    }

    $hotels = $query->get();

    return view('hotels.index', compact('hotels'));
}

}
