<x-app-layout>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 pb-20">
        <!-- Hero Section -->
        <div class="relative h-[60vh] overflow-hidden">
            <img src="{{ Str::startsWith($location->image_url, 'http') ? $location->image_url : asset($location->image_url) }}" 
                alt="{{ $location->name }}" 
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>
            
            <div class="absolute inset-0 flex flex-col justify-end pb-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                        <div>
                            <nav class="flex mb-4 text-blue-400 text-xs font-black uppercase tracking-[0.2em]">
                                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                                <span class="mx-2 text-gray-500">/</span>
                                <a href="{{ route('locations.index') }}" class="hover:text-white transition">Locations</a>
                                <span class="mx-2 text-gray-500">/</span>
                                <span class="text-white">{{ $location->name }}</span>
                            </nav>
                            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter leading-none mb-4">
                                {{ $location->name }}
                            </h1>
                            <div class="flex items-center gap-4">
                                <span class="px-4 py-1.5 bg-blue-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-lg shadow-blue-500/30">
                                    Premium Destination
                                </span>
                                <div class="flex items-center gap-1 text-emerald-400">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <span class="text-sm font-black">4.9/5 Rating</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4">
                            <button class="bg-white text-gray-900 font-black px-8 py-4 rounded-2xl hover:bg-blue-50 transition shadow-xl flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                Save to Favorites
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-20">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Main Description (Wide) -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white dark:bg-gray-800 rounded-[2.5rem] p-10 shadow-xl border border-gray-100 dark:border-gray-700">
                        <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-6">About this Destination</h3>
                        <div class="prose prose-indigo dark:prose-invert max-w-none text-gray-600 dark:text-gray-400 font-medium leading-relaxed">
                            <p class="text-lg leading-relaxed first-letter:text-5xl first-letter:font-black first-letter:text-blue-600 first-letter:mr-3 first-letter:float-left">
                                {{ $location->description }}
                            </p>
                        </div>

                        <div class="mt-10 pt-10 border-t border-gray-100 dark:border-gray-700">
                            <h4 class="text-lg font-black text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                                <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Historical Context
                            </h4>
                            <p class="text-gray-500 dark:text-gray-400 font-medium leading-relaxed italic">
                                "{{ Str::limit($wikiExtract, 350) }}"
                            </p>
                            <button onclick="openModal()" class="mt-4 text-indigo-600 dark:text-indigo-400 font-black text-sm uppercase tracking-widest hover:underline flex items-center gap-1">
                                Read Full History
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Amenities/Highlights -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white dark:bg-gray-800 rounded-[2rem] p-6 shadow-sm border border-gray-100 dark:border-gray-700 text-center group hover:bg-indigo-600 transition duration-300">
                            <div class="w-12 h-12 bg-indigo-50 dark:bg-indigo-900/30 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-white/20 transition">
                                <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h1.5a2.5 2.5 0 002.5-2.5V10a2 2 0 012-2h1.065M9 9H9.01M12 12H12.01M15 15H15.01"></path></svg>
                            </div>
                            <h4 class="font-black text-gray-900 dark:text-white group-hover:text-white">Cultural Tour</h4>
                        </div>
                        <div class="bg-white dark:bg-gray-800 rounded-[2rem] p-6 shadow-sm border border-gray-100 dark:border-gray-700 text-center group hover:bg-emerald-600 transition duration-300">
                            <div class="w-12 h-12 bg-emerald-50 dark:bg-emerald-900/30 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-white/20 transition">
                                <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                            </div>
                            <h4 class="font-black text-gray-900 dark:text-white group-hover:text-white">Fine Dining</h4>
                        </div>
                        <div class="bg-white dark:bg-gray-800 rounded-[2rem] p-6 shadow-sm border border-gray-100 dark:border-gray-700 text-center group hover:bg-blue-600 transition duration-300">
                            <div class="w-12 h-12 bg-blue-50 dark:bg-blue-900/30 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-white/20 transition">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                            </div>
                            <h4 class="font-black text-gray-900 dark:text-white group-hover:text-white">Sightseeing</h4>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Info -->
                <div class="space-y-8">
                    <!-- Quick Info -->
                    <div class="bg-white dark:bg-gray-800 rounded-[2.5rem] p-8 shadow-xl border border-gray-100 dark:border-gray-700">
                        <h3 class="text-xl font-black text-gray-900 dark:text-white mb-6">Quick Details</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between py-3 border-b border-gray-50 dark:border-gray-700">
                                <span class="text-gray-500 font-bold text-sm uppercase tracking-wider">Type</span>
                                <span class="font-black text-gray-900 dark:text-white">City Tour</span>
                            </div>
                            <div class="flex items-center justify-between py-3 border-b border-gray-50 dark:border-gray-700">
                                <span class="text-gray-500 font-bold text-sm uppercase tracking-wider">Duration</span>
                                <span class="font-black text-gray-900 dark:text-white">3-5 Days Recommended</span>
                            </div>
                            <div class="flex items-center justify-between py-3">
                                <span class="text-gray-500 font-bold text-sm uppercase tracking-wider">Difficulty</span>
                                <span class="font-black text-emerald-500 uppercase">Easy</span>
                            </div>
                        </div>
                        <button class="w-full mt-8 bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-2xl transition shadow-lg shadow-blue-500/30">
                            Book This Destination
                        </button>
                    </div>

                    <!-- Weather Preview (Static/Mock for this page context) -->
                    <div class="bg-gradient-to-br from-blue-500 to-cyan-500 rounded-[2.5rem] p-8 shadow-xl text-white relative overflow-hidden group">
                        <div class="relative z-10">
                            <h3 class="text-lg font-black mb-4">Local Weather</h3>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-4xl font-black">28°C</span>
                                    <p class="text-blue-100 font-bold text-sm uppercase tracking-widest mt-1">Sunny Intervals</p>
                                </div>
                                <svg class="w-16 h-16 text-white/50" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"/></svg>
                            </div>
                            <a href="{{ route('weather.show', ['city' => $location->name]) }}" class="mt-6 block text-center bg-white/20 backdrop-blur-md border border-white/30 rounded-xl py-2 text-xs font-black uppercase tracking-widest hover:bg-white/30 transition">
                                View Full Forecast
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- History Modal -->
        <div id="descriptionModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6">
            <div class="absolute inset-0 bg-gray-900/80 backdrop-blur-sm" onclick="closeModal()"></div>
            <div class="relative bg-white dark:bg-gray-800 rounded-[2.5rem] shadow-2xl w-full max-w-2xl overflow-hidden border border-gray-100 dark:border-gray-700 animate-in fade-in zoom-in duration-300">
                <div class="p-8 sm:p-12">
                    <div class="flex justify-between items-center mb-8">
                        <h2 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight">{{ $location->name }} History</h2>
                        <button onclick="closeModal()" class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-white transition">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                    <div class="max-h-[60vh] overflow-y-auto pr-4 custom-scrollbar">
                        <div class="prose prose-indigo dark:prose-invert max-w-none text-gray-600 dark:text-gray-400 font-medium leading-relaxed">
                            <p>{{ $wikiExtract }}</p>
                        </div>
                    </div>
                    <div class="mt-8 pt-8 border-t border-gray-100 dark:border-gray-700 flex justify-end">
                        <button onclick="closeModal()" class="bg-gray-900 dark:bg-gray-100 dark:text-gray-900 text-white font-black px-10 py-4 rounded-2xl transition shadow-xl">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function openModal() {
                const modal = document.getElementById('descriptionModal');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }

            function closeModal() {
                const modal = document.getElementById('descriptionModal');
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }
        </script>

        <style>
            .custom-scrollbar::-webkit-scrollbar {
                width: 6px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: transparent;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #e5e7eb;
                border-radius: 10px;
            }
            .dark .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #374151;
            }
        </style>
    </div>
</x-app-layout>
