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
                <p class="px-2 text-[10px] font-bold uppercase tracking-widest text-gray-400 mt-6 mb-2">Content</p>
                <a href="{{ route('admin.reviews.index') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-400 rounded-2xl font-bold transition">
                    Reviews
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 md:p-10 overflow-y-auto">
            <div class="max-w-4xl mx-auto space-y-10">
                <header class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <a href="{{ route('admin.reviews.index') }}"
                            class="p-2 bg-white dark:bg-gray-800 rounded-full shadow hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </a>
                        <div>
                            <h1 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight">
                                {{ isset($review) ? 'Edit Review' : 'Add Review' }}
                            </h1>
                            <p class="text-gray-500 dark:text-gray-400 font-medium mt-1">
                                {{ isset($review) ? 'Update customer testimonial.' : 'Add a new customer testimonial manually.' }}
                            </p>
                        </div>
                    </div>
                </header>

                <div
                    class="bg-white dark:bg-gray-800 rounded-[2.5rem] shadow-sm border border-gray-100 dark:border-gray-700 p-8 md:p-12">
                    <form
                        action="{{ isset($review) ? route('admin.reviews.update', $review) : route('admin.reviews.store') }}"
                        method="POST" class="space-y-8">
                        @csrf
                        @if(isset($review))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Reviewer Name -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Reviewer
                                    Name</label>
                                <input type="text" name="reviewer"
                                    value="{{ old('reviewer', $review->reviewer ?? '') }}" required
                                    class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">
                                @error('reviewer') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Review For -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Review For
                                    (Destination/Hotel)</label>
                                <input type="text" name="review_for"
                                    value="{{ old('review_for', $review->review_for ?? '') }}" required
                                    placeholder="e.g. Bali Package"
                                    class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">
                                @error('review_for') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Comment -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Review
                                    Comment</label>
                                <textarea name="comment" rows="5" required
                                    class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">{{ old('comment', $review->comment ?? '') }}</textarea>
                                @error('comment') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                        </div>

                        <div class="flex justify-end gap-4 pt-6 border-t border-gray-100 dark:border-gray-700">
                            <a href="{{ route('admin.reviews.index') }}"
                                class="px-6 py-3 rounded-2xl font-bold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                Cancel
                            </a>
                            <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-2xl font-black shadow-lg shadow-indigo-500/30 transition">
                                {{ isset($review) ? 'Update Review' : 'Add Review' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>