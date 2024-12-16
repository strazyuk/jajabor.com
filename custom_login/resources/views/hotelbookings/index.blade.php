<h1>Your Hotel Bookings</h1>
<ul>
    @foreach($bookings as $booking)
        <li>{{ $booking->hotel->name }} - {{ $booking->check_in_date }} to {{ $booking->check_out_date }}</li>
    @endforeach
</ul>
