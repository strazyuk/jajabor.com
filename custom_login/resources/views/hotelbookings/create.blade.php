<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Hotel</title>
    <style>
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
            width: 90%;
            max-width: 600px;
            margin: 30px auto;
        }

        label {
            font-size: 18px;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

<<<<<<< Updated upstream
        input, select {
=======
        input[type="date"], input[type="number"], select, input[type="text"] {
>>>>>>> Stashed changes
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        button[type="submit"], button[type="button"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover, button[type="button"]:hover {
            background-color: #45a049;
        }

        #map {
            height: 300px;
            width: 100%;
            margin: 20px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .hotel-images {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }

        .hotel-images img {
            max-width: 250px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .price, .discounted-price, .total-price {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .discounted-price {
            text-decoration: line-through;
            color: #ff4c4c;
        }
<<<<<<< Updated upstream
=======

        .back-btn:hover {
            background-color: #ddd;
        }

        #map {
            height: 400px;
            width: 100%;
            margin: 20px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .price {
            font-size: 20px;
            font-weight: bold;
            color: #4CAF50;
            margin-bottom: 20px;
            text-align: center;
        }

        .discounted-price {
            text-decoration: line-through;
            color: #ff4c4c;
        }

>>>>>>> Stashed changes
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

    @if($hotel->latitude && $hotel->longitude)
        <div id="map"></div>
        <script>
            const hotelLat = {{ $hotel->latitude }};
            const hotelLon = {{ $hotel->longitude }};
            const map = L.map('map').setView([hotelLat, hotelLon], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);
            L.marker([hotelLat, hotelLon]).addTo(map)
                .bindPopup('<b>{{ $hotel->name }}</b><br>Here is your hotel location.')
                .openPopup();
        </script>
    @else
        <p style="text-align: center; color: red;">Map coordinates are missing for this hotel.</p>
    @endif

<<<<<<< Updated upstream
    <div class="hotel-images">
        @foreach($hotel->images as $image)
            <img src="{{ asset($image) }}" alt="{{ $hotel->name }}">
        @endforeach
    </div>

    <form id="bookingForm" action="{{ route('hotel.payment.createCheckoutSession', $hotel->id) }}" method="POST">
        @csrf
        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
        <input type="hidden" name="total_price" id="total_price" value="">

        <label for="check_in_date">Check-in Date:</label>
        <input type="date" name="check_in_date" id="check_in_date" required min="{{ date('Y-m-d') }}">

        <label for="check_out_date">Check-out Date:</label>
        <input type="date" name="check_out_date" id="check_out_date" required min="{{ date('Y-m-d') }}">
=======
<!-- Booking Form -->
<form id="bookingForm" action="{{ route('hotel.payment.createCheckoutSession', $hotel->id) }}" method="POST">
<form id="bookingForm" action="{{ route('hotel.payment.createCheckoutSession', $hotel->id) }}" method="POST">
    @csrf
    <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
    <input type="hidden" name="total_price" id="total_price" value="">
    <input type="hidden" name="total_price" id="total_price" value="">

    <label for="check_in_date">Check-in Date:</label>
    <input type="date" name="check_in_date" id="check_in_date" required>
    <input type="date" name="check_in_date" id="check_in_date" required>

    <label for="check_out_date">Check-out Date:</label>
    <input type="date" name="check_out_date" id="check_out_date" required>
    <input type="date" name="check_out_date" id="check_out_date" required>

    <label for="number_of_guests">Number of Guests:</label>
    <input type="number" name="number_of_guests" id="number_of_guests" min="1" required>
>>>>>>> Stashed changes

        <label for="number_of_guests">Number of Guests:</label>
        <input type="number" name="number_of_guests" id="number_of_guests" min="1" required>

<<<<<<< Updated upstream
        <label for="room_type">Room Type:</label>
        <select name="room_type" required>
            <option value="1-bedroom">1 Bedroom</option>
            <option value="2-bedroom">2 Bedroom</option>
        </select>
=======
    <!-- Coupon Code -->
    <label for="coupon_code">Coupon Code (if any):</label>
    <input type="text" name="coupon_code" id="coupon_code" placeholder="Enter coupon code">

    <button type="button" id="apply_coupon_button">Apply Coupon</button>

    <!-- Display Price Above Book Now Button -->
    <div class="price" id="price_display">
        Original Price: ${{ number_format($hotel->price, 2) }} per night
    </div>

    <div class="price" id="discounted_price_display">
        Discounted Price: ${{ number_format($hotel->price, 2) }} per night
    </div>

    <div class="price" id="total_price_display">
        Total Price: $0.00
    </div>

    <button type="submit" id="bookNowBtn">Book Now</button>
</form>


<script>
    const hotelPrice = {{ $hotel->price }};
    const hotelPrice = {{ $hotel->price }};
    const hotelLat = {{ $hotel->latitude }};
    const hotelLon = {{ $hotel->longitude }};
    
    let finalPrice = hotelPrice;

    
    let finalPrice = hotelPrice;

    // Initialize the map
    const map = L.map('map').setView([hotelLat, hotelLon], 13);
>>>>>>> Stashed changes

        <label for="coupon_code">Coupon Code (if any):</label>
        <input type="text" name="coupon_code" id="coupon_code" placeholder="Enter coupon code">
        <button type="button" id="apply_coupon_button">Apply Coupon</button>

<<<<<<< Updated upstream
        <div class="price">Original Price: ${{ number_format($hotel->price, 2) }} per night</div>
        <div class="discounted-price" id="discounted_price_display">Discounted Price: </div>
        <div class="total-price" id="total_price_display">Total Price: </div>

        <button type="submit" id="bookNowBtn">Book Now</button>
    </form>

    <script>
        const hotelPrice = {{ $hotel->price }};
        let finalPrice = hotelPrice;

        function calculateTotalPrice() {
            const checkInDate = document.getElementById('check_in_date').value;
            const checkOutDate = document.getElementById('check_out_date').value;
            const guests = document.getElementById('number_of_guests').value;

            if (checkInDate && checkOutDate && guests) {
                const startDate = new Date(checkInDate);
                const endDate = new Date(checkOutDate);
                const days = Math.max((endDate - startDate) / (1000 * 3600 * 24), 0);
                finalPrice = days * hotelPrice * guests;
                document.getElementById('total_price_display').innerText = `Total Price: $${finalPrice.toFixed(2)}`;
                document.getElementById('total_price').value = finalPrice.toFixed(2);
            }
        }

        document.getElementById('apply_coupon_button').addEventListener('click', () => {
            const coupon = document.getElementById('coupon_code').value.trim();
            if (coupon === "DISCOUNT10") {
                finalPrice *= 0.9; // Apply 10% discount
                alert("Coupon applied! 10% discount added.");
            } else {
                alert("Invalid coupon code!");
            }
            calculateTotalPrice();
        });

        ['check_in_date', 'check_out_date', 'number_of_guests'].forEach(id =>
            document.getElementById(id).addEventListener('change', calculateTotalPrice)
        );

        calculateTotalPrice();
    </script>
=======
    // Add a marker with more detailed information
    L.marker([hotelLat, hotelLon]).addTo(map)
        .bindPopup('<b>{{ $hotel->name }}</b><br>' +
                  'Address: {{ $hotel->address }}<br>' + 
                  'Price: ${{ number_format($hotel->price, 2) }} per night')
        .bindPopup('<b>{{ $hotel->name }}</b><br>' +
                  'Address: {{ $hotel->address }}<br>' + 
                  'Price: ${{ number_format($hotel->price, 2) }} per night')
        .openPopup();

    // JavaScript function to calculate number of days, total price, and guests
    function calculateTotalPrice() {
        const checkInDate = document.getElementById('check_in_date').value;
        const checkOutDate = document.getElementById('check_out_date').value;
        const numberOfGuests = document.getElementById('number_of_guests').value;

        if (checkInDate && checkOutDate && numberOfGuests) {
            const checkIn = new Date(checkInDate);
            const checkOut = new Date(checkOutDate);

            const timeDifference = checkOut - checkIn;
            const numberOfDays = timeDifference / (1000 * 3600 * 24); // Convert time difference to days

            if (numberOfDays > 0) {
                finalPrice = numberOfDays * hotelPrice * numberOfGuests;
                updatePriceDisplays();
            } else {
                document.getElementById('total_price_display').innerHTML = 'Total Price: $0.00';
                document.getElementById('total_price').value = '';
            }
        }
    }

    // JavaScript function to apply coupon discount
    function applyCoupon() {
        const couponCode = document.getElementById('coupon_code').value.trim();

        if (couponCode === "DISCOUNT10") {
            const discount = 0.1; // 10% discount
            const discountedPrice = finalPrice - (finalPrice * discount);
            finalPrice = discountedPrice;
            alert("Coupon applied! You got a 10% discount.");
        } else {
            alert("Invalid Coupon Code!");
        }

        updatePriceDisplays();
    }

    // Update the price display elements
    function updatePriceDisplays() {
        document.getElementById('total_price_display').innerHTML = `Total Price: $${finalPrice.toFixed(2)}`;
        document.getElementById('discounted_price_display').innerHTML = `Discounted Price: $${finalPrice.toFixed(2)}`;
        document.getElementById('total_price').value = finalPrice.toFixed(2);
    }

    // Event listener for applying the coupon
    document.getElementById('apply_coupon_button').addEventListener('click', applyCoupon);

    // Attach event listeners to recalculate total price when dates or guests are selected
    document.getElementById('check_in_date').addEventListener('change', calculateTotalPrice);
    document.getElementById('check_out_date').addEventListener('change', calculateTotalPrice);
    document.getElementById('number_of_guests').addEventListener('change', calculateTotalPrice);

    calculateTotalPrice();

    document.getElementById('bookNowBtn').addEventListener('click', function(event) {
        event.preventDefault(); 

        
        document.getElementById('total_price').value = finalPrice.toFixed(2);

        document.getElementById('bookingForm').submit();
    });

    // JavaScript function to calculate number of days, total price, and guests
    function calculateTotalPrice() {
        const checkInDate = document.getElementById('check_in_date').value;
        const checkOutDate = document.getElementById('check_out_date').value;
        const numberOfGuests = document.getElementById('number_of_guests').value;

        if (checkInDate && checkOutDate && numberOfGuests) {
            const checkIn = new Date(checkInDate);
            const checkOut = new Date(checkOutDate);

            const timeDifference = checkOut - checkIn;
            const numberOfDays = timeDifference / (1000 * 3600 * 24); // Convert time difference to days

            if (numberOfDays > 0) {
                finalPrice = numberOfDays * hotelPrice * numberOfGuests;
                updatePriceDisplays();
            } else {
                document.getElementById('total_price_display').innerHTML = 'Total Price: $0.00';
                document.getElementById('total_price').value = '';
            }
        }
    }

    // JavaScript function to apply coupon discount
    function applyCoupon() {
        const couponCode = document.getElementById('coupon_code').value.trim();

        if (couponCode === "DISCOUNT10") {
            const discount = 0.1; // 10% discount
            const discountedPrice = finalPrice - (finalPrice * discount);
            finalPrice = discountedPrice;
            alert("Coupon applied! You got a 10% discount.");
        } else {
            alert("Invalid Coupon Code!");
        }

        updatePriceDisplays();
    }

    // Update the price display elements
    function updatePriceDisplays() {
        document.getElementById('total_price_display').innerHTML = `Total Price: $${finalPrice.toFixed(2)}`;
        document.getElementById('discounted_price_display').innerHTML = `Discounted Price: $${finalPrice.toFixed(2)}`;
        document.getElementById('total_price').value = finalPrice.toFixed(2);
    }

    // Event listener for applying the coupon
    document.getElementById('apply_coupon_button').addEventListener('click', applyCoupon);

    // Attach event listeners to recalculate total price when dates or guests are selected
    document.getElementById('check_in_date').addEventListener('change', calculateTotalPrice);
    document.getElementById('check_out_date').addEventListener('change', calculateTotalPrice);
    document.getElementById('number_of_guests').addEventListener('change', calculateTotalPrice);

    calculateTotalPrice();

    document.getElementById('bookNowBtn').addEventListener('click', function(event) {
        event.preventDefault(); 

        
        document.getElementById('total_price').value = finalPrice.toFixed(2);

        document.getElementById('bookingForm').submit();
    });
</script>

>>>>>>> Stashed changes
@endif

</body>
</html>
