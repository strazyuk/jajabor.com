<x-app-layout>
    <!-- Hero Section -->
    <div class="relative bg-gray-900 rounded-b-3xl overflow-hidden py-24 sm:py-32 shadow-xl shadow-blue-900/10 mb-16">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1506929562872-bb42150eae15?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80"
                alt="Hero background" class="h-full w-full object-cover opacity-30 object-center">
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/80 to-transparent"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:max-w-4xl text-left">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-6xl drop-shadow-md">
                    Explore the World with <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400 drop-shadow-lg">Jajabor</span>
                </h1>
                <p class="mt-6 text-xl leading-8 text-gray-300 font-medium">Discover breathtaking locations, book luxury
                    hotels, and find the best flights perfectly tailored for your next adventure.</p>
                <div class="mt-10 flex items-center gap-x-6">
                    <a href="{{ route('hotels.index') }}"
                        class="rounded-full bg-blue-600 px-8 py-4 text-sm font-bold text-white shadow-xl hover:bg-blue-500 hover:scale-105 transition duration-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                        Book a Hotel
                    </a>
                    <a href="{{ route('flights.index') }}"
                        class="text-sm font-bold leading-6 text-white hover:text-blue-300 transition duration-300 flex items-center gap-2 group">
                        Find Flights <span aria-hidden="true"
                            class="group-hover:translate-x-1 transition duration-300">→</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Container for Bento Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24 space-y-24">

        <!-- Packages Bento Section -->
        @if($packages->count() > 0)
            <section>
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2
                            class="text-3xl font-black text-gray-900 dark:text-white tracking-tight flex items-center gap-3">
                            <span class="bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 p-2 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </span>
                            Featured Packages
                        </h2>
                        <p class="text-gray-500 dark:text-gray-400 mt-2 font-medium">Curated travel experiences just for
                            you.</p>
                    </div>
                    <button
                        class="hidden md:flex text-blue-600 dark:text-blue-400 font-bold hover:underline items-center gap-1 group">
                        View all packages <span aria-hidden="true"
                            class="group-hover:translate-x-1 transition duration-300">→</span>
                    </button>
                </div>

                <!-- Bento Grid layout for Packages -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($packages as $index => $package)
                        <div
                            class="group relative overflow-hidden rounded-[2.5rem] bg-white dark:bg-gray-800 shadow-sm border border-gray-100 dark:border-gray-700 transition hover:shadow-2xl hover:shadow-blue-900/10 {{ $index === 0 ? 'md:col-span-2 md:row-span-2' : '' }}">
                            <div class="aspect-w-16 aspect-h-9 w-full {{ $index === 0 ? 'md:h-[400px]' : 'h-64' }}">
                                <img src="{{ $package->image_url ?? 'https://via.placeholder.com/800x600?text=Package' }}"
                                    alt="{{ $package->title }}"
                                    class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 p-8">
                                <div class="flex items-center gap-3 mb-3">
                                    <span
                                        class="bg-blue-600 text-white text-xs font-black uppercase tracking-widest px-3 py-1 rounded-full shadow-lg">
                                        {{ $package->duration }} Days
                                    </span>
                                </div>
                                <h3
                                    class="text-2xl {{ $index === 0 ? 'md:text-4xl' : '' }} font-black text-white mb-2 leading-tight">
                                    {{ $package->title }}
                                </h3>
                                @if($index === 0)
                                    <p class="text-white/80 line-clamp-2 md:line-clamp-3 mb-6 pr-8">{{ $package->description }}</p>
                                @endif
                                <div class="flex items-center justify-between mt-4">
                                    <span class="text-emerald-400 font-black text-2xl drop-shadow-md">
                                        ${{ number_format($package->price, 2) }}
                                    </span>
                                    <button
                                        class="rounded-full bg-white/20 backdrop-blur-md px-6 py-2 text-sm font-bold text-white hover:bg-white/40 transition duration-300 border border-white/20">
                                        Details
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- Offers & Coupons Bento Row -->
        <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- 1. Big Offer Card (2/3 width) -->
            @if($offers->count() > 0)
                <div
                    class="lg:col-span-2 bg-gradient-to-br from-indigo-600 to-blue-700 rounded-[3rem] p-10 md:p-16 text-white relative overflow-hidden shadow-2xl shadow-blue-900/20 group">
                    <div class="relative z-10 max-w-xl">
                        <span
                            class="bg-white/20 backdrop-blur-md px-4 py-1 rounded-full text-xs font-black uppercase tracking-widest border border-white/20 mb-6 inline-block">Flash
                            Deal</span>
                        <h2 class="text-4xl md:text-6xl font-black mb-6 leading-tight">{{ $offers[0]->title }}</h2>
                        <p class="text-xl text-blue-100 mb-10 font-medium">{{ $offers[0]->subtitle }}</p>
                        <div class="flex items-center gap-4">
                            <div
                                class="bg-white text-blue-600 px-8 py-4 rounded-2xl font-black text-2xl tracking-tighter shadow-xl">
                                {{ $offers[0]->discount_code }}
                            </div>
                            <p class="text-sm font-bold text-blue-200 uppercase tracking-widest">Valid until
                                {{ \Carbon\Carbon::parse($offers[0]->valid_until)->format('M d') }}</p>
                        </div>
                    </div>
                    <!-- Decorative Circle -->
                    <div
                        class="absolute top-1/2 right-0 -translate-y-1/2 translate-x-1/4 w-96 h-96 bg-white/10 rounded-full blur-3xl transition-transform duration-1000 group-hover:scale-150">
                    </div>
                </div>
            @endif

            <!-- 2. Interactive Coupons (1/3 width) -->
            <div
                class="bg-white dark:bg-gray-800 rounded-[3rem] p-10 shadow-xl border border-gray-100 dark:border-gray-700 flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-6">Hot <span
                            class="text-purple-600">Coupons</span></h3>
                    <div class="space-y-4">
                        @forelse($coupons as $coupon)
                            <div
                                class="group cursor-pointer bg-gray-50 dark:bg-gray-700/50 p-6 rounded-3xl border border-dashed border-gray-300 dark:border-gray-600 hover:border-purple-500 transition-all">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-xs font-black text-purple-600 uppercase tracking-tighter mb-1">
                                            {{ $coupon->discount_value }}{{ $coupon->discount_type === 'percentage' ? '%' : '$' }} Discount</p>
                                        <h4
                                            class="font-mono text-xl font-bold text-gray-900 dark:text-white tracking-widest">
                                            {{ $coupon->code }}</h4>
                                    </div>
                                    <div class="bg-purple-100 dark:bg-purple-900/40 p-2 rounded-xl text-purple-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-400 italic">More coupons coming soon!</p>
                        @endforelse
                    </div>
                </div>
                <p class="text-gray-400 text-xs font-bold mt-8 uppercase tracking-widest">Apply at checkout</p>
            </div>
        </section>

        <!-- Customer Reviews Bento Section -->
        <section>
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-5xl font-black text-gray-900 dark:text-white tracking-tight">Voices of <span
                        class="text-blue-600">Adventure</span></h2>
                <p class="text-gray-500 dark:text-gray-400 mt-4 font-medium max-w-2xl mx-auto text-lg">See why thousands
                    of travelers trust Jajabor for their world explorations.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($reviews as $review)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-[2.5rem] p-8 shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-2xl hover:scale-[1.02] transition duration-300 relative flex flex-col">
                        <div class="flex items-center gap-4 mb-8">
                            <img src="{{ $review->avatar_url ?? 'https://i.pravatar.cc/150' }}"
                                alt="{{ $review->reviewer }}"
                                class="w-14 h-14 rounded-2xl object-cover border-2 border-blue-500/20">
                            <div>
                                <h4 class="font-black text-gray-900 dark:text-white">{{ $review->reviewer }}</h4>
                                <p class="text-sm text-blue-600 dark:text-blue-400 font-bold uppercase tracking-widest">
                                    Traveling to {{ $review->review_for }}</p>
                            </div>
                        </div>
                        <blockquote class="text-gray-600 dark:text-gray-400 text-lg leading-relaxed italic flex-1">
                            "{{ $review->comment }}"
                        </blockquote>
                        <div class="flex text-yellow-500 mt-8">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            @endfor
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- News & Guides Section -->
        @if($news->count() > 0)
            <section>
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2
                            class="text-3xl font-black text-gray-900 dark:text-white tracking-tight flex items-center gap-3">
                            <span
                                class="bg-emerald-100 dark:bg-emerald-900/50 text-emerald-600 dark:text-emerald-400 p-2 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14">
                                    </path>
                                </svg>
                            </span>
                            Latest News & Guides
                        </h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($news as $article)
                        <article
                            class="flex flex-col bg-white dark:bg-gray-800 rounded-[2.5rem] shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-2xl hover:shadow-emerald-900/10 transition group h-full">
                            <div class="aspect-w-16 aspect-h-9 overflow-hidden">
                                <img src="{{ $article->image_url ?? 'https://via.placeholder.com/600x400?text=News' }}"
                                    alt="{{ $article->title }}"
                                    class="object-cover w-full h-48 transition-transform duration-700 group-hover:scale-105">
                            </div>
                            <div class="p-8 flex flex-col flex-1">
                                <div
                                    class="flex items-center gap-2 mb-4 text-sm font-medium text-emerald-600 dark:text-emerald-400">
                                    <time
                                        datetime="{{ $article->published_at }}">{{ \Carbon\Carbon::parse($article->published_at)->format('M d, Y') }}</time>
                                </div>
                                <h3
                                    class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition leading-snug">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 dark:text-gray-400 line-clamp-3 mb-6 flex-1">
                                    {{ $article->excerpt }}
                                </p>
                                <div class="flex items-center text-sm font-bold text-gray-900 dark:text-white mt-auto">
                                    Read Article <span aria-hidden="true"
                                        class="ml-2 group-hover:translate-x-1 transition duration-300">→</span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</x-app-layout>