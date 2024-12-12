@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <!-- Page Title -->
        <h2 class="text-4xl font-bold text-center text-gray-900 mb-12">Find Your Next Flight</h2>

        <!-- Search Form -->
        <form action="{{ route('flights.search') }}" method="POST" class="bg-white shadow-lg rounded-3xl p-8 mb-12 max-w-7xl mx-auto">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Departure City -->
                <div class="flex flex-col">
                    <label for="departure" class="text-gray-700 font-medium mb-2">Departure City</label>
                    <input type="text" id="departure" name="departure" class="w-full p-4 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none placeholder-gray-400 transition-colors" placeholder="Enter Departure City" required>
                </div>

                <!-- Destination City -->
                <div class="flex flex-col">
                    <label for="destination" class="text-gray-700 font-medium mb-2">Destination City</label>
                    <input type="text" id="destination" name="destination" class="w-full p-4 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none placeholder-gray-400 transition-colors" placeholder="Enter Destination City" required>
                </div>

                <!-- Departure Date -->
                <div class="flex flex-col">
                    <label for="date" class="text-gray-700 font-medium mb-2">Departure Date</label>
                    <input type="date" id="date" name="date" class="w-full p-4 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-colors" required>
                </div>
            </div>

            <button type="submit" class="mt-8 w-full py-4 bg-blue-600 text-white rounded-xl font-semibold text-lg hover:bg-blue-700 focus:outline-none transition-all duration-300">
                Search Flights
            </button>
        </form>
    </div>
@endsection
