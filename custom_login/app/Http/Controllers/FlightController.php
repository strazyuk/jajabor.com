<?php
namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of available flights.
     */
    public function index()
    {
        // Fetch only available flights
        $flights = Flight::where('is_available', true)->get();

        // Pass flights to the view
        return view('flights.index', compact('flights'));
    }

    /**
     * Display the specified flight.
     */
    public function show(Flight $flight)
    {
        // Optional: Check if the flight is available or add any restrictions
        if (!$flight->is_available) {
            abort(404, 'Flight not available.');
        }

        // Pass the flight to the view
        return view('flights.show', compact('flight'));
    }
}
