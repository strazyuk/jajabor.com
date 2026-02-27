<x-app-layout>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 flex transition-colors duration-300">

        <!-- Admin Sidebar (Same as other admin views) -->
        <aside
            class="w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 hidden md:flex flex-col shadow-sm z-10 flex-shrink-0">
            <div class="p-6">
                <h2 class="text-2xl font-black text-gray-900 dark:text-white tracking-tight flex items-center gap-2">
                    <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                        </path>
                    </svg>
                    Admin <span class="text-indigo-600">Panel</span>
                </h2>
            </div>
            <nav class="mt-4 px-4 space-y-2 flex-1 overflow-y-auto pb-6">
                <!-- Links... just linking back to Flights for this form -->
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-2xl font-medium transition">
                    Dashboard
                </a>
                <p class="px-2 text-[10px] font-bold uppercase tracking-widest text-gray-400 mt-6 mb-2">Inventory</p>
                <a href="{{ route('admin.flights.index') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-400 rounded-2xl font-bold transition">
                    Flights
                </a>
                <a href="{{ route('admin.hotels.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-2xl font-medium transition">
                    Hotels
                </a>
                <a href="{{ route('admin.coupons.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-2xl font-medium transition">
                    Coupons
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 md:p-10 overflow-y-auto">
            <div class="max-w-4xl mx-auto space-y-10">
                <header class="flex items-center gap-4">
                    <a href="{{ route('admin.flights.index') }}"
                        class="p-2 bg-white dark:bg-gray-800 rounded-full shadow hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight">
                            {{ isset($flight) ? 'Edit Flight' : 'Create Flight' }}
                        </h1>
                        <p class="text-gray-500 dark:text-gray-400 font-medium mt-1">
                            {{ isset($flight) ? 'Update flight details below.' : 'Add a new flight to the inventory.' }}
                        </p>
                    </div>
                </header>

                <div
                    class="bg-white dark:bg-gray-800 rounded-[2.5rem] shadow-sm border border-gray-100 dark:border-gray-700 p-8 md:p-12">
                    <form
                        action="{{ isset($flight) ? route('admin.flights.update', $flight) : route('admin.flights.store') }}"
                        method="POST" class="space-y-8">
                        @csrf
                        @if(isset($flight))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Flight Number -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Flight
                                    Number</label>
                                <input type="text" name="flight_number"
                                    value="{{ old('flight_number', $flight->flight_number ?? '') }}" required
                                    class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">
                                @error('flight_number') <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Departure -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Departure
                                    City</label>
                                <input type="text" name="departure"
                                    value="{{ old('departure', $flight->departure ?? '') }}" required
                                    class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">
                                @error('departure') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Destination -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Destination
                                    City</label>
                                <input type="text" name="destination"
                                    value="{{ old('destination', $flight->destination ?? '') }}" required
                                    class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">
                                @error('destination') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Departure Time -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Departure
                                    Time</label>
                                <input type="datetime-local" name="departure_time"
                                    value="{{ old('departure_time', isset($flight) ? \Carbon\Carbon::parse($flight->departure_time)->format('Y-m-d\TH:i') : '') }}"
                                    required
                                    class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">
                                @error('departure_time') <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Arrival Time -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Arrival
                                    Time</label>
                                <input type="datetime-local" name="arrival_time"
                                    value="{{ old('arrival_time', isset($flight) ? \Carbon\Carbon::parse($flight->arrival_time)->format('Y-m-d\TH:i') : '') }}"
                                    required
                                    class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">
                                @error('arrival_time') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Price -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Price
                                    ($)</label>
                                <input type="number" step="0.01" name="price"
                                    value="{{ old('price', $flight->price ?? '') }}" required
                                    class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">
                                @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Availability status -->
                            <div class="flex items-center mt-8">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_available" value="1" class="sr-only peer" {{ old('is_available', $flight->is_available ?? true) ? 'checked' : '' }}>
                                    <div
                                        class="relative w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600">
                                    </div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Is
                                        Available</span>
                                </label>
                            </div>
                        </div>

                        <div class="flex justify-end gap-4 pt-6 border-t border-gray-100 dark:border-gray-700">
                            <a href="{{ route('admin.flights.index') }}"
                                class="px-6 py-3 rounded-2xl font-bold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                Cancel
                            </a>
                            <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-2xl font-black shadow-lg shadow-indigo-500/30 transition">
                                {{ isset($flight) ? 'Update Flight' : 'Create Flight' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>