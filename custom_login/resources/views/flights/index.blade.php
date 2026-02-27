<x-app-layout>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Bento Header/Search Section -->
            <div
                class="bg-white dark:bg-gray-800 rounded-[2.5rem] p-8 shadow-xl border border-gray-100 dark:border-gray-700 mb-10 relative overflow-hidden transition-all hover:shadow-2xl duration-500">
                <div class="relative z-10">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
                        <div>
                            <h1 class="text-4xl font-black text-gray-900 dark:text-white tracking-tight">Book Your <span
                                    class="text-blue-600">Flight</span></h1>
                            <p class="text-gray-500 dark:text-gray-400 mt-2 font-medium">Find the best deals across the
                                globe with Jajabor.</p>
                        </div>
                        <div
                            class="flex items-center gap-3 bg-blue-50 dark:bg-blue-900/30 px-4 py-2 rounded-2xl border border-blue-100 dark:border-blue-800">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm font-bold text-blue-700 dark:text-blue-300">{{ count($flights) }}
                                available flights today</span>
                        </div>
                    </div>

                    <form action="{{ route('flights.search') }}" method="POST"
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                        @csrf
                        <div
                            class="lg:col-span-1 bg-gray-50 dark:bg-gray-700/50 p-4 rounded-3xl border border-transparent focus-within:border-blue-400 focus-within:bg-white dark:focus-within:bg-gray-700 transition-all">
                            <label
                                class="block text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-1">From</label>
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <input type="text" name="departure" placeholder="Departure"
                                    class="w-full bg-transparent border-none p-0 text-gray-900 dark:text-white font-bold placeholder-gray-400 focus:ring-0"
                                    required>
                            </div>
                        </div>

                        <div
                            class="lg:col-span-1 bg-gray-50 dark:bg-gray-700/50 p-4 rounded-3xl border border-transparent focus-within:border-blue-400 focus-within:bg-white dark:focus-within:bg-gray-700 transition-all">
                            <label
                                class="block text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-1">To</label>
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <input type="text" name="destination" placeholder="Destination"
                                    class="w-full bg-transparent border-none p-0 text-gray-900 dark:text-white font-bold placeholder-gray-400 focus:ring-0"
                                    required>
                            </div>
                        </div>

                        <div
                            class="lg:col-span-1 bg-gray-50 dark:bg-gray-700/50 p-4 rounded-3xl border border-transparent focus-within:border-blue-400 focus-within:bg-white dark:focus-within:bg-gray-700 transition-all">
                            <label
                                class="block text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-1">Journey
                                Date</label>
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <input type="date" name="date"
                                    class="w-full bg-transparent border-none p-0 text-gray-900 dark:text-white font-bold focus:ring-0"
                                    required>
                            </div>
                        </div>

                        <div
                            class="lg:col-span-1 bg-gray-50 dark:bg-gray-700/50 p-4 rounded-3xl border border-transparent focus-within:border-blue-400 focus-within:bg-white dark:focus-within:bg-gray-700 transition-all">
                            <label
                                class="block text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-1">Travelers</label>
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                                <input type="number" name="travelers" min="1" value="1"
                                    class="w-full bg-transparent border-none p-0 text-gray-900 dark:text-white font-bold focus:ring-0"
                                    required>
                            </div>
                        </div>

                        <button type="submit"
                            class="lg:col-span-1 bg-blue-600 hover:bg-blue-700 text-white rounded-3xl font-black text-lg transition shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:scale-[1.03] active:scale-95 py-4">
                            Details
                        </button>
                    </form>
                </div>
                <!-- Abstract Design Elements -->
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-400/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-indigo-400/10 rounded-full blur-3xl"></div>
            </div>

            <!-- Results Section -->
            <div class="mb-6 flex items-center justify-between px-2">
                <h2 class="text-2xl font-black text-gray-800 dark:text-gray-100 flex items-center gap-3">
                    Available Results
                    <span class="block w-20 h-1 bg-blue-500 rounded-full"></span>
                </h2>
                <div class="flex gap-2">
                    <button
                        class="p-2 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 text-gray-400 hover:text-blue-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($flights as $flight)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-[2rem] p-6 shadow-lg border border-gray-100 dark:border-gray-700 transition hover:shadow-2xl hover:scale-[1.02] duration-300 group">
                        <div class="flex justify-between items-start mb-6">
                            <div class="bg-blue-100 dark:bg-blue-900/50 px-3 py-1 rounded-full">
                                <span
                                    class="text-xs font-black text-blue-700 dark:text-blue-300 uppercase tracking-tighter">{{ $flight->flight_number }}</span>
                            </div>
                            <div class="text-right">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Seats Left</p>
                                <span
                                    class="text-xs font-black {{ $flight->available_seats < 10 ? 'text-red-500' : 'text-green-500' }} bg-gray-50 dark:bg-gray-700 px-2 py-1 rounded-lg border border-gray-100 dark:border-gray-600">
                                    {{ $flight->available_seats }}
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-4 mb-8">
                            <div class="text-left">
                                <h3 class="text-2xl font-black text-gray-900 dark:text-white leading-none">
                                    {{ $flight->departure }}</h3>
                                <p class="text-sm text-gray-500 font-medium mt-1">Origin</p>
                            </div>
                            <div class="flex flex-col items-center grow px-4 group-hover:px-6 transition-all duration-500">
                                <div class="w-full h-px bg-gray-200 dark:bg-gray-700 relative">
                                    <div
                                        class="absolute inset-0 bg-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-700 origin-left">
                                    </div>
                                    <div
                                        class="absolute -top-3 left-1/2 -translate-x-1/2 bg-white dark:bg-gray-800 p-1 rounded-full border border-gray-100 dark:border-gray-700 shadow-sm transition-transform duration-500 group-hover:rotate-45">
                                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <h3 class="text-2xl font-black text-gray-900 dark:text-white leading-none">
                                    {{ $flight->destination }}</h3>
                                <p class="text-sm text-gray-500 font-medium mt-1">Dest</p>
                            </div>
                        </div>

                        <div
                            class="bg-gray-50 dark:bg-gray-700/30 rounded-2xl p-4 mb-6 border border-gray-100 dark:border-gray-700/50">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-sm text-gray-500 font-medium flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Departure Time
                                </span>
                            </div>
                            <p class="text-lg font-bold text-gray-900 dark:text-white font-mono tracking-tight">
                                {{ \Carbon\Carbon::parse($flight->departure_time)->format('M d, Y') }} | <span
                                    class="text-blue-600 dark:text-blue-400">{{ \Carbon\Carbon::parse($flight->departure_time)->format('h:i A') }}</span>
                            </p>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Standard Fare
                                </p>
                                <p class="text-3xl font-black text-gray-900 dark:text-white leading-none">
                                    ${{ number_format($flight->price, 2) }}</p>
                            </div>
                            <form action="{{ route('flights.buy', $flight->id) }}" method="GET" class="grow">
                                @csrf
                                <input type="hidden" name="travelers" value="1">
                                <button type="submit"
                                    class="w-full bg-gray-900 dark:bg-blue-600 hover:bg-blue-600 dark:hover:bg-blue-500 text-white rounded-2xl py-4 font-black transition-all hover:shadow-lg active:scale-95 group-hover:translate-y-[-2px]">
                                    Book Now
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div
                        class="col-span-full py-20 bg-white dark:bg-gray-800 rounded-[3rem] border-2 border-dashed border-gray-200 dark:border-gray-700 flex flex-col items-center justify-center text-center">
                        <div
                            class="w-24 h-24 bg-gray-50 dark:bg-gray-700/50 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-12 h-12 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black text-gray-900 dark:text-white">No Flights Found</h3>
                        <p class="text-gray-500 dark:text-gray-400 mt-2 max-w-xs">Try adjusting your search criteria or
                            explore other destinations.</p>
                        <a href="{{ route('flights.index') }}" class="mt-8 text-blue-600 font-bold hover:underline">View All
                            Flights</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>