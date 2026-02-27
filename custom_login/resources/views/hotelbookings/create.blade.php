<x-app-layout>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Leaflet CSS/JS (Head Injection handled by x-app-layout usually, but we keep it here for specific needs if not global) -->
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

            <!-- Back Navigation -->
            <div class="mb-8">
                <a href="{{ route('hotels.index') }}"
                    class="inline-flex items-center gap-2 text-sm font-bold text-gray-400 hover:text-green-500 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Selection
                </a>
            </div>

            @if(session('success'))
                <div
                    class="bg-white dark:bg-gray-800 rounded-[2.5rem] p-12 shadow-xl border border-gray-100 dark:border-gray-700 text-center animate-bounce">
                    <div
                        class="w-20 h-20 bg-green-100 dark:bg-green-900/50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-4">Stay Booked!</h2>
                    <p class="text-gray-500 dark:text-gray-400 mb-8 font-medium">{{ session('success') }}</p>
                    <a href="{{ route('dashboard') }}"
                        class="bg-green-600 hover:bg-green-700 text-white font-black px-10 py-4 rounded-3xl transition shadow-lg shadow-green-500/30 hover:shadow-green-500/50">
                        View Dashboard
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                    <!-- Left Column: Hotel Info & Map -->
                    <div class="lg:col-span-12">
                        <div
                            class="bg-white dark:bg-gray-800 rounded-[2.5rem] p-8 shadow-xl border border-gray-100 dark:border-gray-700 relative overflow-hidden">
                            <div
                                class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                                <div>
                                    <h1
                                        class="text-3xl font-black text-gray-900 dark:text-white mb-2 leading-none tracking-tight">
                                        Booking <span
                                            class="text-green-600 underline decoration-green-500/30">{{ $hotel->name }}</span>
                                    </h1>
                                    <p class="text-gray-500 dark:text-gray-400 font-medium flex items-center gap-2">
                                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ $hotel->location }}
                                    </p>
                                </div>
                                <div
                                    class="bg-gray-50 dark:bg-gray-700/50 px-6 py-3 rounded-2xl border border-gray-100 dark:border-gray-600">
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Standard
                                        Rate</p>
                                    <p class="text-2xl font-black text-gray-900 dark:text-white shrink-0">
                                        ${{ number_format($hotel->price, 2) }} <span
                                            class="text-sm font-medium text-gray-400">/ night</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Booking Form -->
                    <div class="lg:col-span-7">
                        <div
                            class="bg-white dark:bg-gray-800 rounded-[2.5rem] p-10 shadow-xl border border-gray-100 dark:border-gray-700">
                            <form id="bookingForm" action="{{ route('hotel.payment.createCheckoutSession', $hotel->id) }}"
                                method="POST" class="space-y-6">
                                @csrf
                                <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                                <input type="hidden" name="total_price" id="total_price" value="">

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div
                                        class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-3xl border border-transparent focus-within:border-green-400 focus-within:bg-white dark:focus-within:bg-gray-700 transition-all">
                                        <label
                                            class="block text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-1">Check-in</label>
                                        <input type="date" name="check_in_date" id="check_in_date" required
                                            min="{{ date('Y-m-d') }}"
                                            class="w-full bg-transparent border-none p-0 text-gray-900 dark:text-white font-bold focus:ring-0">
                                    </div>
                                    <div
                                        class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-3xl border border-transparent focus-within:border-green-400 focus-within:bg-white dark:focus-within:bg-gray-700 transition-all">
                                        <label
                                            class="block text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-1">Check-out</label>
                                        <input type="date" name="check_out_date" id="check_out_date" required
                                            min="{{ date('Y-m-d') }}"
                                            class="w-full bg-transparent border-none p-0 text-gray-900 dark:text-white font-bold focus:ring-0">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div
                                        class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-3xl border border-transparent focus-within:border-green-400 focus-within:bg-white dark:focus-within:bg-gray-700 transition-all">
                                        <label
                                            class="block text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-1">Guests</label>
                                        <input type="number" name="number_of_guests" id="number_of_guests" min="1" value="1"
                                            required
                                            class="w-full bg-transparent border-none p-0 text-gray-900 dark:text-white font-bold focus:ring-0">
                                    </div>
                                    <div
                                        class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-3xl border border-transparent focus-within:border-green-400 focus-within:bg-white dark:focus-within:bg-gray-700 transition-all">
                                        <label
                                            class="block text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-1">Room
                                            Type</label>
                                        <select name="room_type"
                                            class="w-full bg-transparent border-none p-0 text-gray-900 dark:text-white font-bold focus:ring-0 appearance-none">
                                            <option value="1-bedroom">1 Bedroom Standard</option>
                                            <option value="2-bedroom">2 Bedroom Executive</option>
                                        </select>
                                    </div>
                                </div>

                                <div
                                    class="bg-gray-50 dark:bg-gray-700/30 p-4 rounded-3xl border border-dashed border-gray-200 dark:border-gray-600">
                                    <label
                                        class="block text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-1">Coupon
                                        Code</label>
                                    <div class="flex items-center gap-3">
                                        <input type="text" name="coupon_code" id="coupon_code" placeholder="ENTER CODE"
                                            class="grow bg-transparent border-none p-0 text-gray-900 dark:text-white font-mono font-bold focus:ring-0 placeholder:text-gray-300">
                                        <button type="button" id="apply_coupon_button"
                                            class="bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-700 dark:text-white px-4 py-2 rounded-xl text-xs font-black transition">Apply</button>
                                    </div>
                                </div>

                                <button type="submit" id="bookNowBtn"
                                    class="w-full bg-green-600 hover:bg-green-700 text-white font-black py-5 rounded-[2rem] text-xl transition-all shadow-xl shadow-green-500/20 hover:scale-[1.02] active:scale-95">
                                    Confirm & Pay
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Layout Column: Summary & Map -->
                    <div class="lg:col-span-5 space-y-8">
                        <!-- Invoice Style Bento Component -->
                        <div class="bg-gray-900 rounded-[2.5rem] p-8 text-white shadow-2xl relative overflow-hidden group">
                            <h3 class="text-sm font-black uppercase tracking-[0.2em] text-gray-500 mb-6">Price Summary</h3>
                            <div class="space-y-4 relative z-10">
                                <div class="flex justify-between items-center opacity-60">
                                    <span class="text-sm font-bold">Base Price</span>
                                    <span class="font-mono" id="price_display">${{ number_format($hotel->price, 2) }}</span>
                                </div>
                                <div class="flex justify-between items-center opacity-60">
                                    <span class="text-sm font-bold">Duration</span>
                                    <span class="font-mono" id="duration_display">0 nights</span>
                                </div>
                                <div class="border-t border-white/10 my-4 pt-4 flex justify-between items-center">
                                    <span class="text-lg font-black tracking-tight">Total Bill</span>
                                    <div class="text-right">
                                        <p class="text-3xl font-black text-green-400 tracking-tighter"
                                            id="total_price_display">$0.00</p>
                                        <p class="text-[10px] font-bold uppercase text-gray-500"
                                            id="discounted_price_display"></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Decorative background icon -->
                            <svg class="absolute -bottom-10 -right-10 w-40 h-40 text-white opacity-[0.03] transform rotate-12"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z">
                                </path>
                            </svg>
                        </div>

                        <!-- Map Bento Component -->
                        <div
                            class="bg-white dark:bg-gray-800 rounded-[2.5rem] p-4 shadow-xl border border-gray-100 dark:border-gray-700 h-[350px] overflow-hidden">
                            @if($hotel->latitude && $hotel->longitude)
                                <div id="map" class="w-full h-full rounded-[1.8rem] z-0"></div>
                                <script>
                                    const hotelLat = {{ $hotel->latitude }};
                                    const hotelLon = {{ $hotel->longitude }};
                                    const map = L.map('map', {
                                        scrollWheelZoom: false,
                                        zoomControl: false
                                    }).setView([hotelLat, hotelLon], 13);

                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        attribution: '&copy; OpenStreetMap'
                                    }).addTo(map);

                                    L.marker([hotelLat, hotelLon]).addTo(map)
                                        .bindPopup('<b>{{ $hotel->name }}</b>')
                                        .openPopup();

                                    L.control.zoom({ position: 'bottomright' }).addTo(map);
                                </script>
                            @else
                                <div
                                    class="w-full h-full rounded-[1.8rem] bg-gray-100 dark:bg-gray-700 flex flex-col items-center justify-center text-center p-6">
                                    <svg class="w-12 h-12 text-gray-300 mb-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                    </svg>
                                    <p class="text-sm font-bold text-gray-400">Map unavailable for this location</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        const hotelPrice = {{ $hotel->price }};
        let finalPrice = 0;

        function calculateTotalPrice() {
            const checkInDate = document.getElementById('check_in_date').value;
            const checkOutDate = document.getElementById('check_out_date').value;
            const guests = document.getElementById('number_of_guests').value;

            if (checkInDate && checkOutDate && guests) {
                const startDate = new Date(checkInDate);
                const endDate = new Date(checkOutDate);
                const timeDiff = endDate.getTime() - startDate.getTime();
                const days = Math.max(Math.ceil(timeDiff / (1000 * 3600 * 24)), 0);

                document.getElementById('duration_display').innerText = `${days} night${days !== 1 ? 's' : ''}`;

                finalPrice = days * hotelPrice * guests;
                updateDiscountedPrice(); // Apply discount if any

                document.getElementById('total_price_display').innerText = `$${finalPrice.toFixed(2)}`;
                document.getElementById('total_price').value = finalPrice.toFixed(2);
            }
        }

        function updateDiscountedPrice() {
            const coupon = document.getElementById('coupon_code').value.trim();
            if (coupon === "DISCOUNT10") {
                const discountAmount = finalPrice * 0.1;
                finalPrice = finalPrice - discountAmount;
                document.getElementById('discounted_price_display').innerText = `10% Discount Applied! (-$${discountAmount.toFixed(2)})`;
            } else {
                document.getElementById('discounted_price_display').innerText = '';
            }
        }

        document.getElementById('apply_coupon_button').addEventListener('click', () => {
            calculateTotalPrice();
            if (document.getElementById('coupon_code').value.trim() === "DISCOUNT10") {
                if (typeof showToast === 'function') showToast("Coupon DISCOUNT10 applied!", 'success');
            } else if (document.getElementById('coupon_code').value.trim() !== "") {
                if (typeof showToast === 'function') showToast("Invalid coupon code", 'error');
            }
        });

        ['check_in_date', 'check_out_date', 'number_of_guests'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.addEventListener('change', calculateTotalPrice);
        });

        // Initialize display
        calculateTotalPrice();
    </script>
</x-app-layout>