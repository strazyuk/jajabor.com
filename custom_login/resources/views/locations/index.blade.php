@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-4">
    <h1 class="text-2xl font-bold mb-4">Explore Locations</h1>

    <!-- Search Bar -->
    <form method="GET" action="{{ route('locations.index') }}">
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}" 
            placeholder="Search for a location..." 
            class="border border-gray-300 p-2 rounded-lg w-full mb-4"
        >
        <button 
            type="submit" 
            class="bg-blue-500 text-white p-2 rounded-lg"
        >
            Search
        </button>
    </form>

    <!-- Locations List -->
    @if ($locations)
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    
    @foreach ($locations as $location)
        <a href="{{ route('locations.show', $location->id) }}">
            <div class="p-4 border border-gray-300 rounded-lg">
                <h2 class="text-xl font-semibold">{{ $location['name'] }}</h2>
                <p class="text-gray-600">{{ $location['description'] }}</p>
            </div>
            </a>
    @endforeach
    </div>
@else
    <p>No locations found.</p>
@endif
</div>
@endsection
