<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Search</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        h1, h3 {
            text-align: center;
            color: #4CAF50;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        .search-box {
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .search-box input[type="text"] {
            width: calc(100% - 110px);
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .search-box button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .search-box button:hover {
            background-color: #45a049;
        }

        /* Results Styles */
        .hotel-list {
            margin-top: 20px;
        }
        .hotel-card {
            padding: 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .hotel-card h4 {
            margin: 0 0 10px;
        }
        .hotel-card p {
            margin: 5px 0;
        }
        .heart-button {
            font-size: 24px;
            color: gray;
            background: none;
            border: none;
            cursor: pointer;
        }
        .heart-button.active {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search for Hotels</h1>
        <div class="search-box">
            <form action="{{ route('hotels.search') }}" method="GET">
                <input type="text" name="search" placeholder="Search by hotel name or location" value="{{ request('search') }}">
                <button type="submit">Search</button>
            </form>
        </div>

        <div class="hotel-list">
            @if($hotels->isNotEmpty())
                <h3>Search Results</h3>
                @foreach ($hotels as $hotel)
    <div class="hotel-card">
        <h4>{{ $hotel->name }}</h4>
        <p><strong>Location:</strong> {{ $hotel->location }}</p>

        <!-- Heart Button -->
        <form action="{{ route('favorites.toggle') }}" method="POST" style="display: inline;">

            @csrf
            <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
            <button type="submit" style="background: none; border: none; cursor: pointer;">
                <span style="font-size: 24px; color: {{ in_array($hotel->id, $favoriteHotels) ? 'red' : 'gray' }};">
                    ♥
                </span>
            </button>
        </form>
    </div>
@endforeach

            @else
                <p>No hotels found for "{{ request('search') }}".</p>
            @endif
        </div>
    </div>
</body>
</html>
