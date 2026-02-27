<x-app-layout>
    <div class="py-10 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-6">
                <div>
                    <h1 class="text-4xl font-black text-gray-900 dark:text-white tracking-tight">Explore <span
                            class="text-indigo-600">Locations</span></h1>
                    <p class="text-gray-500 dark:text-gray-400 font-medium mt-2">Discover breathtaking destinations for
                        your next adventure.</p>
                </div>

                <form method="GET" action="{{ route('locations.index') }}"
                    class="w-full md:w-auto flex shadow-sm rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
                    <div class="relative flex-1">
                        <div class="absolute inset-y-0 left-0 pl-14 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search destinations..."
                            class="w-full md:w-80 pl-12 pr-4 py-3 bg-transparent border-none text-gray-900 dark:text-white focus:ring-0 placeholder-gray-400 font-medium h-full outline-none">
                    </div>
                    <button type="submit"
                        class="bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-400 px-8 py-4 font-black tracking-wide hover:bg-indigo-100 dark:hover:bg-indigo-900/50 transition border-l border-gray-200 dark:border-gray-700">
                        Search
                    </button>
                </form>
            </div>

            @if ($locations->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach ($locations as $location)
                        <div
                            class="group relative bg-white dark:bg-gray-800 rounded-[2.5rem] shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col hover:shadow-xl transition duration-500 hover:-translate-y-2">
                            <div class="relative h-64 overflow-hidden">
                                <img src="{{ Str::startsWith($location->image_url, 'http') ? $location->image_url : asset($location->image_url) }}"
                                    alt="{{ $location->name }}"
                                    class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/30 to-transparent">
                                </div>
                                <div class="absolute bottom-6 left-6 right-6">
                                    <h2 class="text-white text-2xl font-black mb-1 drop-shadow-md tracking-tight">
                                        {{ $location->name }}</h2>
                                    <div
                                        class="flex items-center gap-2 text-emerald-400 text-xs font-black uppercase tracking-widest">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        Destination
                                    </div>
                                </div>
                            </div>
                            <div class="p-8 flex flex-col flex-1">
                                <p
                                    class="text-gray-600 dark:text-gray-400 text-sm font-medium leading-relaxed mb-6 line-clamp-3 flex-1">
                                    {{ $location->description }}
                                </p>
                                <a href="{{ route('locations.show', $location->id) }}"
                                    class="inline-flex items-center justify-center gap-2 w-full bg-indigo-50 dark:bg-indigo-900/20 text-indigo-700 dark:text-indigo-400 font-bold py-3.5 px-6 rounded-2xl hover:bg-indigo-600 hover:text-white dark:hover:bg-indigo-500 transition duration-300">
                                    Explore Details
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div
                    class="bg-white dark:bg-gray-800 rounded-[2.5rem] shadow-sm border border-gray-100 dark:border-gray-700 p-16 text-center max-w-2xl mx-auto flex flex-col items-center">
                    <div class="bg-gray-50 dark:bg-gray-900 w-24 h-24 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-2">No locations found</h3>
                    <p class="text-gray-500 dark:text-gray-400 font-medium">We couldn't find any locations matching your
                        search. Try adjusting your keywords to discover more incredible places.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>