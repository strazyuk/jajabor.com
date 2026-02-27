<x-app-layout>
    <div class="py-10 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-10 text-center">
                <h1 class="text-4xl font-black text-gray-900 dark:text-white tracking-tight">Weather <span
                        class="text-blue-600">Forecast</span></h1>
                <p class="text-gray-500 dark:text-gray-400 font-medium mt-2">Check the current weather conditions for
                    your next destination.</p>
            </div>

            <!-- Search Card -->
            <div
                class="bg-white dark:bg-gray-800 rounded-[2.5rem] p-8 shadow-xl border border-gray-100 dark:border-gray-700 mb-8 max-w-2xl mx-auto">
                <form method="GET" action="{{ url('weather') }}" class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" id="city" name="city" placeholder="Enter city name..."
                            value="{{ $city ?? '' }}"
                            class="w-full pl-11 pr-4 py-4 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm font-medium">
                    </div>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-black py-4 px-8 rounded-2xl transition shadow-lg shadow-blue-500/30 whitespace-nowrap">
                        Check Weather
                    </button>
                </form>
            </div>

            @if(isset($weather['error']))
                <div
                    class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-[2rem] p-6 text-center max-w-2xl mx-auto text-red-600 dark:text-red-400 font-bold shadow-sm">
                    {{ $weather['error'] }}
                </div>
            @elseif(isset($weather['current']))
                <!-- Weather Display Bento -->
                <div
                    class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[2.5rem] p-10 shadow-2xl relative overflow-hidden text-white max-w-3xl mx-auto">
                    <!-- Decorative blur -->
                    <div class="absolute -top-24 -right-24 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl"></div>

                    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-10">
                        <div class="text-center md:text-left">
                            <h2 class="text-xl font-bold text-blue-100 uppercase tracking-widest mb-1">Current Weather</h2>
                            <h1 class="text-5xl font-black mb-4">{{ $city }}</h1>
                            <div class="flex items-center justify-center md:justify-start gap-4">
                                @if(isset($weather['current']['condition']['icon']))
                                    <img src="https:{{ $weather['current']['condition']['icon'] }}" alt="Weather Icon"
                                        class="w-16 h-16 filter drop-shadow-md">
                                @endif
                                <span class="text-3xl font-bold">{{ $weather['current']['condition']['text'] }}</span>
                            </div>
                        </div>

                        <div class="flex flex-col gap-6 w-full md:w-auto">
                            <!-- Temperature -->
                            <div
                                class="bg-white/10 backdrop-blur-md rounded-3xl p-6 border border-white/20 flex flex-col md:flex-row items-center justify-between gap-4 md:gap-8">
                                <span class="text-blue-100 font-bold uppercase tracking-widest text-sm">Temperature</span>
                                <span class="text-5xl font-black">{{ $weather['current']['temp_c'] }}°C</span>
                            </div>
                            <!-- Details Details -->
                            <div class="grid grid-cols-2 gap-4">
                                <div
                                    class="bg-white/10 backdrop-blur-md rounded-[2rem] p-5 border border-white/20 text-center flex flex-col justify-center">
                                    <svg class="w-6 h-6 mx-auto mb-2 text-blue-200" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                                        </path>
                                    </svg>
                                    <span class="block text-2xl font-black">{{ $weather['current']['humidity'] }}%</span>
                                    <span
                                        class="text-[10px] text-blue-100 font-bold uppercase tracking-widest mt-1">Humidity</span>
                                </div>
                                <div
                                    class="bg-white/10 backdrop-blur-md rounded-[2rem] p-5 border border-white/20 text-center flex flex-col justify-center">
                                    <svg class="w-6 h-6 mx-auto mb-2 text-blue-200" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                    <span class="block text-2xl font-black">{{ $weather['current']['wind_kph'] }}</span>
                                    <span class="text-[10px] text-blue-100 font-bold uppercase tracking-widest mt-1">Wind
                                        (km/h)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>