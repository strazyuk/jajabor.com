<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" :class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .mesh-gradient {
            background-color: #f8fafc;
            background-image:
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(168, 85, 247, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(236, 72, 153, 0.15) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(59, 130, 246, 0.15) 0px, transparent 50%);
        }

        .dark .mesh-gradient {
            background-color: #0f172a;
            background-image:
                radial-gradient(at 0% 0%, rgba(79, 70, 229, 0.2) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(147, 51, 234, 0.2) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(219, 39, 119, 0.2) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(37, 99, 235, 0.2) 0px, transparent 50%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .dark .glass-card {
            background: rgba(30, 41, 59, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="antialiased mesh-gradient min-h-screen">
    <div class="fixed top-6 right-6 z-50" x-cloak>
        <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
            class="p-3 rounded-2xl bg-white/50 dark:bg-gray-800/50 backdrop-blur-md border border-white/20 dark:border-gray-700/30 text-gray-700 dark:text-gray-300 hover:scale-110 transition-all duration-300 shadow-xl">
            <template x-if="!darkMode">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                    </path>
                </svg>
            </template>
            <template x-if="darkMode">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v1m0 16v1m9-9h1M4 9H3m15.364 6.364l.707.707M6.343 6.343l.707.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
            </template>
        </button>
    </div>

    <div class="min-h-screen flex flex-col justify-center items-center p-6">
        <div class="w-full sm:max-w-md">
            <div class="flex justify-center mb-8">
                <a href="/" class="group">
                    <div
                        class="p-4 bg-indigo-600 rounded-2xl shadow-2xl shadow-indigo-500/50 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2 2 2 0 012 2v.653m4.113-6.476l-.707.707a2 2 0 00-.586 1.414v1.854a2 2 0 01-.586 1.414l-.707.707a2 2 0 00-.586 1.414v1.5a2 2 0 01-.586 1.414l-.707.707a2 2 0 01-1.414.586h-1.25">
                            </path>
                        </svg>
                    </div>
                </a>
            </div>

            <div class="glass-card shadow-[0_32px_64px_-16px_rgba(0,0,0,0.1)] rounded-[2.5rem] overflow-hidden">
                <div class="p-8 sm:p-10">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>