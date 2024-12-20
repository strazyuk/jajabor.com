<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Leaflet CSS -->
<link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
/>
<!-- Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Hotel</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            font-size: 36px;
            margin-top: 50px;
        }

        form {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 60%;
            margin: 30px auto;
        }

        label {
            font-size: 18px;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        input[type="date"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        select {
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .success-message {
            text-align: center;
            font-size: 24px;
            color: green;
            margin-top: 50px;
        }

        .back-btn {
            display: block;
            text-align: center;
            margin-top: 20px;
            background-color: #f2f2f2;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            color: #333;
        }

        .back-btn:hover {
            background-color: #ddd;
        }

    </style>
    <style>
    #map {
        height: 400px;
        width: 100%;
        margin: 20px 0;
        border: 1px solid #ccc;
        border-radius: 8px;
    }
</style>
    
</head>
<body>

@if(session('success'))
    <div class="success-message">
        {{ session('success') }}
        <a href="{{ route('hotels.index') }}" class="back-btn">Go Back to Hotels</a>
    </div>
@else
    
<h1>Book {{ $hotel->name }}</h1>

<!-- Map Container -->
<div id="map"></div>

<!-- Booking Form -->
<form action="{{ route('hotelbookings.store') }}" method="POST">
    @csrf
    <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

    <label for="check_in_date">Check-in Date:</label>
    <input type="date" name="check_in_date" required>

    <label for="check_out_date">Check-out Date:</label>
    <input type="date" name="check_out_date" required>

    <label for="number_of_guests">Number of Guests:</label>
    <input type="number" name="number_of_guests" min="1" required>

    <label for="room_type">Room Type:</label>
    <select name="room_type" required>
        <option value="1-bedroom">1 Bedroom</option>
        <option value="2-bedroom">2 Bedroom</option>
    </select>

    <button type="submit">Book Now</button>
</form>
<script>
    const hotelLat = {{ $hotel->latitude }};
    const hotelLon = {{ $hotel->longitude }};
    
    // Initialize the map
    const map = L.map('map').setView([hotelLat, hotelLon], 13);

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add a marker
    L.marker([hotelLat, hotelLon]).addTo(map)
        .bindPopup('<b>{{ $hotel->name }}</b><br>Here is your hotel location.')
        .openPopup();
</script>



@endif

</body>
</html>
