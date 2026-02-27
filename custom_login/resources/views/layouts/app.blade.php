<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" :class="{ 'dark': darkMode }">

<head>
    <script>
        // CRITICAL: Prevent dark mode flicker (FOUC) by checking theme BEFORE body renders
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/complaint.css') }}" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background-color: #F9FAFB;
            transition: background-color 0.3s ease;
        }

        .dark body {
            background-color: #111827;
        }

        /* Page Transition effect */
        .page-transition {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Toast Styles */
        #toast-container {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 100;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .toast {
            animation: slideIn 0.3s ease-out;
            min-width: 300px;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900 dark:text-gray-100">
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 page-transition">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header
                class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-md shadow-sm border-b border-gray-100 dark:border-gray-700 pt-16">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-bold text-2xl text-blue-600 dark:text-blue-400 leading-tight">
                        {{ $header }}
                    </h2>
                </div>
            </header>
        @endisset

        <!-- Toast Notifications Placeholder -->
        <div id="toast-container"></div>

        <main class="pt-16">
            @if(View::hasSection('content'))
                @yield('content')
            @else
                {{ $slot ?? '' }}
            @endif
        </main>
    </div>

    <script>
        // QOL: Toast Notification Helper
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            const bgClass = type === 'success' ? 'bg-green-600' : 'bg-red-600';

            toast.className = `toast ${bgClass} text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center justify-between gap-4 backdrop-blur-md`;
            toast.innerHTML = `
                <span class="font-bold text-sm">${message}</span>
                <button onclick="this.parentElement.remove()" class="text-white opacity-50 hover:opacity-100">&times;</button>
            `;

            container.appendChild(toast);
            setTimeout(() => {
                toast.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                setTimeout(() => toast.remove(), 500);
            }, 5000);
        }

        // Logic to show session messages as toasts
        @if(session('success'))
            window.onload = () => showToast("{{ session('success') }}", 'success');
        @endif
        @if(session('error'))
            window.onload = () => showToast("{{ session('error') }}", 'error');
        @endif

        // Dark Mode Toggle Listener
        document.addEventListener('dark-mode-toggle', () => {
            const isDark = document.documentElement.classList.contains('dark');
            localStorage.setItem('darkMode', !isDark);
        });
    </script>
</body>

</html>