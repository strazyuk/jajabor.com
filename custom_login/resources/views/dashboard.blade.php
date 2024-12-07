<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div style="padding: 30px; background-color: #f4f4f4;">
        <div style="max-width: 800px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <div style="text-align: center; margin-bottom: 20px; color: #333;">
                {{ __("You're logged in!") }}
            </div>

          
        </div>
    </div>
</x-app-layout>
