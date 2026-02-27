<x-app-layout>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Bento Header/Search Section -->
            <div
                class="bg-white dark:bg-gray-800 rounded-[2.5rem] p-8 shadow-xl border border-gray-100 dark:border-gray-700 mb-10 relative overflow-hidden transition-all hover:shadow-2xl duration-500">
                <div class="relative z-10 text-center md:text-left">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
                        <div>
                            <h1 class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white tracking-tight">
                                Stay in <span class="text-green-600">Style</span></h1>
                            <p class="text-gray-500 dark:text-gray-400 mt-2 font-medium">Discover hand-picked hotels and
                                luxury stays for your next journey.</p>
                        </div>
                        <div
                            class="flex items-center gap-3 bg-green-50 dark:bg-green-900/30 px-4 py-2 rounded-2xl border border-green-100 dark:border-green-800 self-center md:self-auto">
                            <span class="relative flex h-3 w-3">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                            </span>
                            <span class="text-sm font-bold text-green-700 dark:text-green-300">{{ $hotels->count() }}
                                Hotels available</span>
                        </div>
                    </div>

                    <form action="{{ route('hotels.search') }}" method="GET" class="relative max-w-3xl">
                        <div
                            class="group relative bg-gray-50 dark:bg-gray-700/50 rounded-[2rem] p-2 border border-transparent focus-within:border-green-400 focus-within:bg-white dark:focus-within:bg-gray-700 transition-all shadow-inner">
                            <div class="flex items-center gap-4 px-4">
                                <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input type="text" name="search" placeholder="Search by hotel name or location..."
                                    value="{{ request('search') }}"
                                    class="w-full bg-transparent border-none py-4 text-gray-900 dark:text-white font-bold placeholder-gray-400 focus:ring-0">
                                <button type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white rounded-2xl px-8 py-3 font-black transition shadow-lg shadow-green-500/30 hover:shadow-green-500/50 active:scale-95 whitespace-nowrap">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Abstract Design Elements -->
                <div class="absolute -top-10 -right-10 w-48 h-48 bg-green-400/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-teal-400/10 rounded-full blur-3xl"></div>
            </div>

            <!-- Results Section Title -->
            <div class="mb-8 flex items-center justify-between px-2">
                <h2 class="text-2xl font-black text-gray-800 dark:text-gray-100 flex items-center gap-3 lowercase">
                    @if(request('search')) search results for "{{ request('search') }}" @else explorer's choice @endif
                    <span class="block w-20 h-1 bg-green-500 rounded-full"></span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse ($hotels as $hotel)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-[2rem] p-5 shadow-lg border border-gray-100 dark:border-gray-700 transition hover:shadow-2xl hover:scale-[1.02] duration-300 group flex flex-col relative overflow-hidden">

                        <!-- Hotel Image Placeholder with Gradient -->
                        <div
                            class="relative h-48 mb-4 rounded-3xl overflow-hidden bg-gradient-to-br from-green-100 to-teal-100 dark:from-green-900/50 dark:to-teal-900/50">
                            <div
                                class="absolute inset-0 flex items-center justify-center text-green-200 dark:text-green-800">
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </div>
                            <!-- Tags Overlay -->
                            <div class="absolute top-3 left-3 flex flex-wrap gap-2">
                                <span
                                    class="bg-white/90 dark:bg-gray-900/90 backdrop-blur-md px-3 py-1 rounded-full text-[10px] font-black uppercase text-gray-800 dark:text-gray-200 tracking-tighter shadow-sm border border-white/20">
                                    {{ $hotel->location }}
                                </span>
                            </div>

                            <!-- Favorite Toggle -->
                            <form action="{{ route('favorites.toggle') }}" method="POST"
                                class="absolute top-3 right-3 z-10">
                                @csrf
                                <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                                <button type="submit"
                                    class="w-10 h-10 rounded-full flex items-center justify-center backdrop-blur-md transition shadow-md {{ in_array($hotel->id, $favoriteHotels) ? 'bg-red-500 text-white' : 'bg-white/50 dark:bg-black/50 text-gray-400 hover:text-red-500 hover:bg-white' }}">
                                    <svg class="w-5 h-5"
                                        fill="{{ in_array($hotel->id, $favoriteHotels) ? 'currentColor' : 'none' }}"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                        </path>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <div class="grow px-1">
                            <h4
                                class="text-xl font-black text-gray-900 dark:text-white mb-2 line-clamp-1 decoration-green-500 decoration-2 group-hover:underline">
                                {{ $hotel->name }}</h4>
                            <div class="flex items-center gap-1 text-gray-400 mb-4">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-xs font-medium">{{ $hotel->location }}</span>
                            </div>
                        </div>

                        <div
                            class="flex items-center justify-between mt-4 bg-gray-50 dark:bg-gray-700/50 p-4 rounded-3xl border border-gray-50 dark:border-gray-700 transition group-hover:bg-green-50 dark:group-hover:bg-green-900/10">
                            <div>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-0.5">Price /
                                    Night</p>
                                <p class="text-2xl font-black text-gray-900 dark:text-white tracking-tighter">
                                    ${{ number_format($hotel->price, 2) }}</p>
                            </div>
                            <a href="{{ route('hotelbookings.create', $hotel->id) }}"
                                class="bg-gray-900 dark:bg-green-600 hover:bg-green-600 dark:hover:bg-green-500 text-white font-black px-6 py-3 rounded-2xl text-sm transition-all shadow-md active:scale-95 group-hover:translate-x-1">
                                Book
                            </a>
                        </div>
                    </div>
                @empty
                    <div
                        class="col-span-full py-20 bg-white dark:bg-gray-800 rounded-[3rem] border-2 border-dashed border-gray-200 dark:border-gray-700 flex flex-col items-center justify-center text-center px-6">
                        <div
                            class="w-24 h-24 bg-gray-50 dark:bg-gray-700/50 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-12 h-12 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black text-gray-900 dark:text-white uppercase tracking-tight">No escapes
                            found</h3>
                        <p class="text-gray-500 dark:text-gray-400 mt-2 max-w-sm font-medium">We couldn't find any hotels
                            matching "{{ request('search') }}". Use broader terms or explore our curated selection.</p>
                        <a href="{{ route('hotels.index') }}"
                            class="mt-8 bg-gray-900 dark:bg-gray-100 text-white dark:text-gray-900 px-8 py-3 rounded-2xl font-black shadow-lg hover:scale-105 transition">Explore
                            All Hotels</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>