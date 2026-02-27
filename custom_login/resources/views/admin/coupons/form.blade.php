<x-app-layout>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 flex transition-colors duration-300">
        
        <!-- Admin Sidebar -->
        <aside class="w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 hidden md:flex flex-col shadow-sm z-10 flex-shrink-0">
            <div class="p-6">
                <h2 class="text-2xl font-black text-gray-900 dark:text-white tracking-tight flex items-center gap-2">
                    <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    Admin <span class="text-indigo-600">Panel</span>
                </h2>
            </div>
            <nav class="mt-4 px-4 space-y-2 flex-1 overflow-y-auto pb-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-2xl font-medium transition">
                    Dashboard
                </a>
                <p class="px-2 text-[10px] font-bold uppercase tracking-widest text-gray-400 mt-6 mb-2">Inventory</p>
                <a href="{{ route('admin.flights.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-2xl font-medium transition">
                    Flights
                </a>
                <a href="{{ route('admin.hotels.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-2xl font-medium transition">
                    Hotels
                </a>
                <a href="{{ route('admin.coupons.index') }}" class="flex items-center gap-3 px-4 py-3 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-400 rounded-2xl font-bold transition">
                    Coupons
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 md:p-10 overflow-y-auto">
            <div class="max-w-4xl mx-auto space-y-10">
                <header class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <a href="{{ route('admin.coupons.index') }}" class="p-2 bg-white dark:bg-gray-800 rounded-full shadow hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        </a>
                        <div>
                            <h1 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight">
                                {{ isset($coupon) ? 'Edit Coupon' : 'Create Coupon' }}
                            </h1>
                            <p class="text-gray-500 dark:text-gray-400 font-medium mt-1">
                                {{ isset($coupon) ? 'Update discount details below.' : 'Add a new discount code.' }}
                            </p>
                        </div>
                    </div>
                </header>

                <div class="bg-white dark:bg-gray-800 rounded-[2.5rem] shadow-sm border border-gray-100 dark:border-gray-700 p-8 md:p-12">
                    <form action="{{ isset($coupon) ? route('admin.coupons.update', $coupon) : route('admin.coupons.store') }}" method="POST" class="space-y-8">
                        @csrf
                        @if(isset($coupon))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Code -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Coupon Code</label>
                                <input type="text" name="code" value="{{ old('code', $coupon->code ?? '') }}" required placeholder="e.g. SUMMER24"
                                    class="w-full font-mono uppercase bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">
                                @error('code') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Discount Type -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Discount Type</label>
                                <select name="discount_type" required class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition aspect-select">
                                    <option value="percentage" {{ old('discount_type', $coupon->discount_type ?? '') == 'percentage' ? 'selected' : '' }}>Percentage (%)</option>
                                    <option value="flat" {{ old('discount_type', $coupon->discount_type ?? '') == 'flat' ? 'selected' : '' }}>Flat Amount ($)</option>
                                </select>
                                @error('discount_type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Discount Value -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Discount Value</label>
                                <input type="number" step="0.01" name="discount_value" value="{{ old('discount_value', $coupon->discount_value ?? '') }}" required
                                    class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">
                                @error('discount_value') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            
                            <!-- Expiration Date -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Expiration Date</label>
                                <input type="datetime-local" name="expiration_date" value="{{ old('expiration_date', isset($coupon) ? \Carbon\Carbon::parse($coupon->expiration_date)->format('Y-m-d\TH:i') : '') }}" required
                                    class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition">
                                @error('expiration_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Status</label>
                                <select name="status" required class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 block p-4 shadow-sm transition aspect-select">
                                    <option value="active" {{ old('status', $coupon->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="expired" {{ old('status', $coupon->status ?? '') == 'expired' ? 'selected' : '' }}>Expired</option>
                                </select>
                                @error('status') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="flex justify-end gap-4 pt-6 border-t border-gray-100 dark:border-gray-700">
                            <a href="{{ route('admin.coupons.index') }}" class="px-6 py-3 rounded-2xl font-bold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                Cancel
                            </a>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-2xl font-black shadow-lg shadow-indigo-500/30 transition">
                                {{ isset($coupon) ? 'Update Coupon' : 'Create Coupon' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
