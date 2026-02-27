<x-app-layout>
    <div class="py-10 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Bento Grid Header -->
            <div class="mb-10">
                <h1 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight">User <span
                        class="text-blue-600">Dashboard</span></h1>
                <p class="text-gray-500 dark:text-gray-400 font-medium">Manage your bookings, favorites, and explore
                    personalized recommendations.</p>
            </div>

            <!-- Bento Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 auto-rows-[minmax(180px,auto)]">

                <!-- 1. Profile Banner (Big Bento) -->
                <div
                    class="md:col-span-2 lg:col-span-3 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[2.5rem] p-8 text-white shadow-xl relative overflow-hidden flex flex-col justify-between group">
                    <div class="relative z-10 flex items-center gap-6">
                        <div
                            class="w-16 h-16 sm:w-24 sm:h-24 shrink-0 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-md border border-white/30 text-2xl sm:text-4xl font-black shadow-inner">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <h2 class="text-2xl sm:text-4xl font-black tracking-tight leading-tight">Welcome back, <br
                                    class="sm:hidden">{{ $user->name }}!</h2>
                            <p class="text-blue-100 mt-1 font-medium">{{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="relative z-10 mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('profile.edit') }}"
                            class="bg-white/10 hover:bg-white/20 backdrop-blur-md px-6 py-2.5 rounded-2xl text-sm font-bold border border-white/20 transition duration-300">
                            Edit Profile
                        </a>
                        <a href="{{ route('history.index') }}"
                            class="bg-white text-blue-600 px-6 py-2.5 rounded-2xl text-sm font-bold hover:bg-blue-50 transition duration-300 shadow-lg">
                            My Bookings
                        </a>
                    </div>

                    <!-- Decorative elements -->
                    <div
                        class="absolute -top-12 -right-12 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl transition-transform duration-1000 group-hover:scale-150">
                    </div>
                </div>

                <!-- 2. Quick Stats (Square Bento) -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-[2.5rem] p-8 shadow-lg border border-gray-100 dark:border-gray-700 flex flex-col justify-center items-center text-center group hover:border-blue-400 transition duration-300">
                    <div
                        class="bg-blue-50 dark:bg-blue-900/30 p-4 rounded-3xl mb-4 group-hover:scale-110 transition duration-300">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-sm font-black text-gray-500 uppercase tracking-widest">Total Trips</p>
                    <h4 class="text-4xl font-black text-gray-900 dark:text-white mt-1">
                        {{ $flightBookingsCount + $hotelBookingsCount }}
                    </h4>
                </div>

                <!-- 3. Recommendations (Tall Bento) -->
                <div
                    class="md:col-span-1 lg:row-span-2 bg-white dark:bg-gray-800 rounded-[2.5rem] p-6 shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col">
                    <h3 class="text-xl font-black text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        Pick for You
                    </h3>
                    <div class="space-y-4 flex-1">
                        @foreach($packages as $package)
                            <div
                                class="group relative rounded-3xl overflow-hidden h-40 border border-gray-100 dark:border-gray-700">
                                <img src="{{ $package->image_url }}" alt=""
                                    class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <h4 class="text-white font-bold text-sm leading-tight">{{ $package->title }}</h4>
                                    <p class="text-emerald-400 text-xs font-black mt-1">
                                        ${{ number_format($package->price, 0) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- 4. Quick Actions (Wide Bento) -->
                <div
                    class="md:col-span-2 lg:col-span-2 bg-white dark:bg-gray-800 rounded-[2.5rem] p-8 shadow-lg border border-gray-100 dark:border-gray-700 flex flex-col justify-center">
                    <h3 class="text-xl font-black text-gray-900 dark:text-white mb-6">Plan Your Next Voyage</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('flights.index') }}"
                            class="group bg-blue-50 dark:bg-blue-900/20 p-6 rounded-[2rem] border border-blue-100 dark:border-blue-800 transition hover:bg-blue-600 hover:text-white duration-300">
                            <svg class="w-8 h-8 text-blue-600 dark:group-hover:text-white group-hover:text-white mb-3"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            <span class="font-black text-lg">Flights</span>
                        </a>
                        <a href="{{ route('hotels.index') }}"
                            class="group bg-indigo-50 dark:bg-indigo-900/20 p-6 rounded-[2rem] border border-indigo-100 dark:border-indigo-800 transition hover:bg-indigo-600 hover:text-white duration-300">
                            <svg class="w-8 h-8 text-indigo-600 dark:group-hover:text-white group-hover:text-white mb-3"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                            <span class="font-black text-lg">Hotels</span>
                        </a>
                    </div>
                </div>

                <!-- 5. Interactive Coupons (1/3 width) -->
                <div
                    class="bg-gradient-to-br from-purple-600 to-fuchsia-700 rounded-[2.5rem] p-8 shadow-xl border border-purple-100 dark:border-purple-900/50 flex flex-col justify-between text-white relative overflow-hidden group">
                    <div class="relative z-10">
                        <h3 class="text-xl font-black mb-4 flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                                </path>
                            </svg>
                            Your Vouchers
                        </h3>
                        @forelse($coupons as $coupon)
                            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/20 mb-3 last:mb-0">
                                <div class="flex justify-between items-center">
                                    <span class="font-mono font-black text-lg tracking-widest">{{ $coupon->code }}</span>
                                    <span
                                        class="text-xs font-bold bg-white text-purple-600 px-2 py-0.5 rounded-lg">{{ $coupon->discount_value }}{{ $coupon->discount_type === 'percentage' ? '%' : '$' }}</span>
                                </div>
                            </div>
                        @empty
                            <p class="text-purple-100 text-sm italic font-medium">No active coupons right now. Check back
                                soon!</p>
                        @endforelse
                    </div>
                    <!-- Glow -->
                    <div
                        class="absolute -bottom-12 -right-12 w-32 h-32 bg-white/20 rounded-full blur-2xl group-hover:scale-150 transition duration-700">
                    </div>
                </div>

                <!-- 6. Special Offer (Wide/Full Bento) -->
                @if($offers->count() > 0)
                    <div
                        class="md:col-span-2 lg:col-span-3 bg-gradient-to-r from-emerald-600 to-teal-700 rounded-[2.5rem] p-8 text-white shadow-xl relative overflow-hidden group">
                        <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-8">
                            <div class="flex-1">
                                <span
                                    class="bg-white/20 backdrop-blur-md px-3 py-0.5 rounded-full text-[10px] font-black uppercase tracking-widest border border-white/20 mb-4 inline-block">Exclusive
                                    Discount</span>
                                <h3 class="text-3xl font-black mb-2">{{ $offers[0]->title }}</h3>
                                <p class="text-emerald-50 font-medium opacity-90">{{ $offers[0]->subtitle }}</p>
                            </div>
                            <div
                                class="bg-white text-emerald-700 px-8 py-5 rounded-[2rem] text-3xl font-black tracking-tighter shadow-2xl flex flex-col items-center">
                                <span class="text-[10px] text-emerald-500 uppercase tracking-widest mb-1">Use Code</span>
                                {{ $offers[0]->discount_code }}
                            </div>
                        </div>
                        <div
                            class="absolute -right-24 -top-24 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl group-hover:scale-150 transition duration-1000">
                        </div>
                    </div>
                @endif

                <!-- 7. Customer Voices (Miniature grid entries) -->
                <div
                    class="md:col-span-2 lg:col-span-1 bg-white dark:bg-gray-800 rounded-[2.5rem] p-6 shadow-lg border border-gray-100 dark:border-gray-700 flex flex-col">
                    <h3 class="text-lg font-black text-gray-900 dark:text-white mb-4">Traveler Stories</h3>
                    <div class="space-y-4 flex-1">
                        @foreach($reviews as $review)
                            <div
                                class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-3xl border border-gray-100 dark:border-gray-600">
                                <p class="text-gray-600 dark:text-gray-400 text-xs italic leading-relaxed mb-3">
                                    "{{ Str::limit($review->comment, 60) }}"</p>
                                <div class="flex items-center gap-2">
                                    <img src="{{ $review->avatar_url }}" class="w-6 h-6 rounded-full">
                                    <span
                                        class="text-[10px] font-black text-gray-900 dark:text-white">{{ $review->reviewer }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- 8. Latest News Feed (The remaining space) -->
                <div
                    class="md:col-span-2 lg:col-span-3 bg-white dark:bg-gray-800 rounded-[2.5rem] p-8 shadow-lg border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-xl font-black text-gray-900 dark:text-white">Travel Intelligence</h3>
                        <span class="text-xs font-black text-blue-600 uppercase tracking-widest">New updates every
                            day</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach($news as $item)
                            <div class="flex gap-4 group">
                                <div
                                    class="w-24 h-24 shrink-0 rounded-3xl overflow-hidden border border-gray-100 dark:border-gray-700">
                                    <img src="{{ $item->image_url }}" alt=""
                                        class="w-full h-full object-cover transition group-hover:scale-110">
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h4
                                        class="font-bold text-gray-900 dark:text-white text-lg leading-tight group-hover:text-blue-600 transition">
                                        {{ $item->title }}
                                    </h4>
                                    <p class="text-gray-500 text-sm mt-1 line-clamp-2">{{ $item->excerpt }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>