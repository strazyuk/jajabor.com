@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <!-- Page Title -->
        <h2 class="text-4xl font-bold text-center text-gray-900 mb-8">Available Flights</h2>

        <!-- Card-like Flight Items -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($flights as $flight)
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-2xl font-semibold text-gray-900">{{ $flight->flight_number }}</h3>
                    <p class="text-gray-700 mt-2"><strong>Departure:</strong> {{ $flight->departure }}</p>
                    <p class="text-gray-700"><strong>Destination:</strong> {{ $flight->destination }}</p>
                    <p class="text-gray-700"><strong>Departure Time:</strong> {{ $flight->departure_time }}</p>
                    <p class="text-gray-700"><strong>Arrival Time:</strong> {{ $flight->arrival_time }}</p>
                    <p class="text-lg font-semibold text-blue-500 mt-4">${{ number_format($flight->price, 2) }}</p>

                    <!-- Action Button -->
                    <div class="mt-6">
                        <a href="{{ route('flights.show', $flight) }}" class="bg-blue-600 text-black py-2 px-6 rounded-full inline-block hover:bg-blue-700 transition-colors text-sm">View</a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-4 text-gray-500">No flights available.</div>
            @endforelse
        </div>
    </div>
@endsection
