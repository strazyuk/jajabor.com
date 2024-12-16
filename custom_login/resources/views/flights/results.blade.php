<!-- resources/views/flights/results.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>

<h1>Available Flights</h1>

@if(count($flights) > 0)
    <ul>
        @foreach($flights as $flight)
            <li>
                <strong>Airline:</strong> {{ $flight->airline }}<br>
                <strong>Price:</strong> ${{ $flight->price }}<br>
                <strong>Duration:</strong> {{ $flight->duration }}<br>
                <strong>Departure Date:</strong> {{ $flight->departure_date }}<br>
                <strong>Seats Available:</strong> {{ $flight->available_seats }}<br>

                <!-- Booking Button -->
                <form action="{{ route('flights.buy', $flight) }}" method="GET">
                    <button type="submit">Book Now</button>
                </form>
            </li>
        @endforeach
    </ul>
@else
    <p>No flights found.</p>
@endif

</body>
</html>
