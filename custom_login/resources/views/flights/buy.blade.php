@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-3xl font-semibold text-gray-900 mb-6">Confirm Purchase</h2>
                <p class="text-gray-700 mb-4"><strong>Flight Number:</strong> {{ $flight->flight_number }}</p>
                <p class="text-gray-700 mb-4"><strong>Departure:</strong> {{ $flight->departure }}</p>
                <p class="text-gray-700 mb-4"><strong>Destination:</strong> {{ $flight->destination }}</p>
                <p class="text-gray-700 mb-4"><strong>Price:</strong> ${{ number_format($flight->price, 2) }}</p>
                <p class="text-gray-700 mb-6"><strong>Seats Available:</strong> {{ $flight->available_seats }}</p>

                <!-- Confirm Purchase Form -->
                <form action="{{ route('flights.completePurchase', $flight) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white py-2 px-6 rounded-full hover:bg-green-600 transition-colors">
                        Confirm and Buy
                    </button>
                </form>

                <a href="{{ route('flights.index') }}" class="inline-block mt-4 text-blue-500 hover:underline">
                    Cancel
                </a>
            </div>
        </div>
    </div>
@endsection
