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
    public function buy(Flight $flight)
{
    // Example functionality: Check availability and display a confirmation page
    if ($flight->available_seats <= 0) {
        return redirect()->route('flights.index')->with('error', 'No seats available for this flight.');
    }

    // Display the purchase confirmation page
    return view('flights.buy', ['flight' => $flight]);
    
    
}
public function completePurchase(Flight $flight)
    {
        // Check availability again
        if ($flight->available_seats <= 0) {
            return redirect()->route('flights.index')->with('error', 'No seats available for this flight.');
        }
    
        // Simulate purchase logic (e.g., reduce seats, log purchase, etc.)
        $flight->available_seats -= 1;
        $flight->save();
    
        // Redirect with success message
        return redirect()->route('flights.index')->with('success', 'Purchase completed successfully!');
    }
}

