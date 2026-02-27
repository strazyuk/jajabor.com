<x-app-layout>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 flex transition-colors duration-300">

        <!-- Admin Sidebar -->
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
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-2xl font-medium transition">
                    Dashboard
                </a>
                <p class="px-2 text-[10px] font-bold uppercase tracking-widest text-gray-400 mt-6 mb-2">Inventory</p>
                <a href="{{ route('admin.flights.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-2xl font-medium transition">
                    Flights
                </a>
                <a href="{{ route('admin.hotels.index') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-400 rounded-2xl font-bold transition">
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
                    <a href="{{ route('admin.hotels.index') }}"
                        class="p-2 bg-white dark:bg-gray-800 rounded-full shadow hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight">
                            {{ isset($hotel) ? 'Edit Hotel' : 'Create Hotel' }}
                        </h1>
                        <p class="text-gray-500 dark:text-gray-400 font-medium mt-1">
                            {{ isset($hotel) ? 'Update hotel details below.' : 'Add a new hotel to the inventory.' }}
                        </p>
                    </div>
                </header>

                <div
                    class="bg-white dark:bg-gray-800 rounded-[2.5rem] shadow-sm border border-gray-100 dark:border-gray-700 p-8 md:p-12">
                    <form
                        action="{{ isset($hotel) ? route('admin.hotels.update', $hotel) : route('admin.hotels.store') }}"
                        method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        @if(isset($hotel))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Hotel Name -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Hotel
                                    Name</label>
                                <input type="text" name="name" value="{{ old('name', $hotel->name ?? '') }}" required
                                    class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">
                                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Location -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Location /
                                    Address</label>
                                <input type="text" name="location" value="{{ old('location', $hotel->location ?? '') }}"
                                    required
                                    class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">
                                @error('location') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Coordinates -->
                            <div>
                                <label
                                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Latitude</label>
                                <input type="number" step="any" name="latitude"
                                    value="{{ old('latitude', $hotel->latitude ?? '') }}"
                                    class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">
                                @error('latitude') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label
                                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Longitude</label>
                                <input type="number" step="any" name="longitude"
                                    value="{{ old('longitude', $hotel->longitude ?? '') }}"
                                    class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">
                                @error('longitude') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Price per night -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Price per
                                    Night ($)</label>
                                <input type="number" step="0.01" name="price"
                                    value="{{ old('price', $hotel->price ?? '') }}" required
                                    class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">
                                @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Image Upload -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Main Image
                                    (Optional)</label>
                                <input type="file" name="image_upload" accept="image/*"
                                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                @if(isset($hotel) && is_array($hotel->images) && count($hotel->images) > 0)
                                    <div class="mt-4">
                                        <p class="text-xs text-gray-500 mb-2">Current Image:</p>
                                        <img src="{{ $hotel->images[0] }}"
                                            class="h-20 w-32 object-cover rounded-lg border border-gray-200">
                                    </div>
                                @endif
                                @error('image_upload') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="flex justify-end gap-4 pt-6 border-t border-gray-100 dark:border-gray-700">
                            <a href="{{ route('admin.hotels.index') }}"
                                class="px-6 py-3 rounded-2xl font-bold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                Cancel
                            </a>
                            <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-2xl font-black shadow-lg shadow-indigo-500/30 transition">
                                {{ isset($hotel) ? 'Update Hotel' : 'Create Hotel' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>