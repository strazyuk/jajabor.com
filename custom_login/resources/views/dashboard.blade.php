<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Bento Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- 1. Profile Banner (Spans full width) -->
                <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-gradient-to-tr from-blue-600 to-indigo-600 rounded-[2rem] p-8 text-white shadow-xl relative overflow-hidden transition hover:shadow-2xl hover:scale-[1.01] duration-300">
                    <div class="relative z-10 flex items-center gap-6">
                        <div class="w-20 h-20 shrink-0 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-md border border-white/30 text-3xl font-bold shadow-inner">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <h2 class="text-3xl font-extrabold tracking-tight">Welcome back, {{ $user->name }}!</h2>
                            <p class="text-blue-100 mt-1 font-medium">{{ $user->email }}</p>
                        </div>
                    </div>
                    <!-- Decorative elements -->
                    <div class="absolute -top-24 -right-24 w-96 h-96 bg-white opacity-10 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 right-1/4 w-48 h-48 bg-indigo-900 opacity-30 rounded-full translate-y-1/2 blur-2xl"></div>
                </div>

                <!-- 2. Flight Bookings (Spans 2 columns) -->
                <div class="col-span-1 md:col-span-2 bg-white dark:bg-gray-800 rounded-[2rem] p-6 shadow-lg border border-gray-100 dark:border-gray-700 transition hover:shadow-xl duration-300 flex flex-col">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 flex items-center gap-2">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Flight Bookings
                        </h3>
                        <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full dark:bg-blue-900 dark:text-blue-200">
                            {{ count($flightBookings) }} Trips
                        </span>
                    </div>
                    
                    <div class="overflow-y-auto max-h-80 pr-2 space-y-4 grow styled-scrollbar">
                        @forelse ($flightBookings as $booking)
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-2xl p-4 border border-gray-100 dark:border-gray-600 hover:border-blue-300 dark:hover:border-blue-500 transition-colors">
                                <div class="flex flex-col sm:flex-row justify-between items-start gap-4">
                                    <div>
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="text-lg font-bold text-gray-900 dark:text-white">{{ $booking->flight->departure }}</span>
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                            <span class="text-lg font-bold text-gray-900 dark:text-white">{{ $booking->flight->destination }}</span>
                                        </div>
                                        <div class="flex flex-wrap gap-x-4 gap-y-1 mt-2 text-sm text-gray-600 dark:text-gray-400">
                                            <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg> {{ $booking->flight_name }}</span>
                                            <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> {{ \Carbon\Carbon::parse($booking->flight->departure_time)->format('M d, Y h:i A') }}</span>
                                        </div>
                                    </div>
                                    <div class="text-right flex flex-col items-start sm:items-end">
                                        <span class="px-2.5 py-1 text-[10px] font-bold tracking-wider uppercase rounded-md {{ strtolower($booking->status) == 'confirmed' ? 'bg-green-100 text-green-700 dark:bg-green-900/50 dark:text-green-400' : 'bg-gray-200 text-gray-700 dark:bg-gray-600 dark:text-gray-300' }}">
                                            {{ $booking->status }}
                                        </span>
                                        <p class="mt-2 text-lg font-black text-gray-900 dark:text-white">${{ number_format($booking->flight->price, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="flex flex-col items-center justify-center h-full py-8 text-gray-500 dark:text-gray-400">
                                <svg class="w-12 h-12 text-gray-300 dark:text-gray-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                <p>No flight bookings yet.</p>
                                <a href="{{ route('flights.index') }}" class="mt-3 text-sm text-blue-600 hover:text-blue-700 font-semibold">Browse Flights &rarr;</a>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- 3. Current Hotel Bookings (1 Column) -->
                <div class="col-span-1 bg-white dark:bg-gray-800 rounded-[2rem] p-6 shadow-lg border border-gray-100 dark:border-gray-700 transition hover:shadow-xl duration-300 flex flex-col">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 flex items-center gap-2">
                            <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            Current Stays
                        </h3>
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-bold px-3 py-1 rounded-full dark:bg-indigo-900 dark:text-indigo-200">
                            {{ count($currentBookings) }} Stays
                        </span>
                    </div>

                    <div class="overflow-y-auto max-h-80 pr-2 space-y-4 grow styled-scrollbar">
                        @forelse ($currentBookings as $booking)
                            <div class="bg-indigo-50/50 dark:bg-indigo-900/20 rounded-2xl p-4 border border-indigo-100 dark:border-indigo-800/50 hover:border-indigo-300 transition-colors">
                                <h4 class="font-bold text-indigo-900 dark:text-indigo-100 text-lg mb-2 truncate">{{ $booking->hotel_name }}</h4>
                                <div class="grid grid-cols-2 gap-2 text-sm text-gray-600 dark:text-gray-300">
                                    <div>
                                        <p class="text-xs text-indigo-400 font-semibold uppercase tracking-wider mb-0.5">Check-in</p>
                                        <p class="font-medium font-mono">{{ \Carbon\Carbon::parse($booking->check_in_date)->format('M d, Y') }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-indigo-400 font-semibold uppercase tracking-wider mb-0.5">Check-out</p>
                                        <p class="font-medium font-mono">{{ \Carbon\Carbon::parse($booking->check_out_date)->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="flex flex-col items-center justify-center h-full py-8 text-gray-500 dark:text-gray-400">
                                <svg class="w-12 h-12 text-gray-300 dark:text-gray-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                <p>No current hotel bookings.</p>
                                <a href="{{ route('hotels.index') }}" class="mt-3 text-sm text-indigo-600 hover:text-indigo-700 font-semibold">Find a Hotel &rarr;</a>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- 4. Past Bookings (Spans Full Width) -->
                <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white dark:bg-gray-800 rounded-[2rem] p-6 shadow-lg border border-gray-100 dark:border-gray-700 transition hover:shadow-xl duration-300 mt-2">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-2">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100">Past Stays</h3>
                        </div>
                        <span class="text-sm text-gray-500 font-medium border border-gray-200 dark:border-gray-600 px-3 py-1 rounded-full">{{ count($pastBookings) }} History</span>
                    </div>

                    @if(count($pastBookings) > 0)
                        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-4">
                            @foreach ($pastBookings as $booking)
                                <div class="bg-gray-50 dark:bg-gray-700/30 rounded-2xl p-4 border border-gray-100 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700/50 transition-colors">
                                    <h4 class="font-bold text-gray-700 dark:text-gray-200 mb-1 truncate" title="{{ $booking->hotel_name }}">{{ $booking->hotel_name }}</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 font-mono flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ \Carbon\Carbon::parse($booking->check_in_date)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($booking->check_out_date)->format('M d, Y') }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-6 text-gray-500 dark:text-gray-400 italic bg-gray-50 dark:bg-gray-700/30 rounded-2xl border border-dashed border-gray-300 dark:border-gray-600">
                            No past bookings found in your history.
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>

    <!-- Webkit scrollbar styles for aesthetic scrolling in widgets -->
    <style>
        .styled-scrollbar::-webkit-scrollbar {
            width: 5px;
        }
        .styled-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .styled-scrollbar::-webkit-scrollbar-thumb {
            background-color: #cbd5e1;
            border-radius: 20px;
        }
        .dark .styled-scrollbar::-webkit-scrollbar-thumb {
            background-color: #475569;
        }
        .styled-scrollbar::-webkit-scrollbar-thumb:hover {
            background-color: #94a3b8;
        }
    </style>
</x-app-layout>