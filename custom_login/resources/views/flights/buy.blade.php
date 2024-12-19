<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Purchase</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
            <div class="p-6">
                <h2 class="text-3xl font-semibold text-gray-900 mb-6">Confirm Purchase</h2>
                <!-- Dynamic flight details -->
                <p class="text-gray-700 mb-4"><strong>Flight Number:</strong> {{ $flight->flight_number }}</p>
                <p class="text-gray-700 mb-4"><strong>Departure:</strong> {{ $flight->departure }}</p>
                <p class="text-gray-700 mb-4"><strong>Destination:</strong> {{ $flight->destination }}</p>
                <p class="text-gray-700 mb-4"><strong>Price:</strong> ${{ number_format($flight->price, 2) }}</p>
                <p class="text-gray-700 mb-6"><strong>Seats Available:</strong> {{ $flight->available_seats }}</p>

                <!-- Redirect to Payment Page -->
                <form action="{{ route('payment.createCheckoutSession', $flight->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-green-500 text-white py-3 rounded-lg shadow-md hover:bg-green-600 transition-all duration-300 hover:shadow-lg active:scale-95">
                        Proceed to Payment
                    </button>
                </form>

                <a href="{{ route('flights.index') }}" class="inline-block mt-4 text-blue-500 hover:underline transition-all duration-300">
                    Cancel
                </a>
            </div>
        </div>
    </div>
</body>
</html>
