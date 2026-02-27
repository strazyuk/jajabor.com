<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: true }" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #020617;
            background-image:
                radial-gradient(circle at 20% 20%, rgba(30, 58, 138, 0.15) 0%, transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(79, 70, 229, 0.15) 0%, transparent 40%);
        }

        .heading-font {
            font-family: 'Space Grotesk', sans-serif;
        }

        .admin-glass {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .input-dark {
            background-color: rgba(2, 6, 23, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-dark:focus {
            background-color: rgba(2, 6, 23, 1);
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .admin-glow {
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.3);
        }

        @keyframes scan {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(100%);
            }
        }

        .scanline {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, transparent, rgba(99, 102, 241, 0.05), transparent);
            animation: scan 4s linear infinite;
            pointer-events: none;
        }
    </style>
</head>

<body class="antialiased min-h-screen flex flex-col justify-center items-center p-6 overflow-hidden">
    <div class="scanline"></div>

    <div class="w-full max-w-lg relative">
        <!-- Abstract Background Orbs -->
        <div class="absolute -top-24 -left-24 w-64 h-64 bg-indigo-600/10 rounded-full blur-[100px]"></div>
        <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-blue-600/10 rounded-full blur-[100px]"></div>

        <div class="flex justify-center mb-10 relative">
            <div class="flex items-center gap-4">
                <div class="p-3.5 bg-indigo-600 rounded-2xl admin-glow">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="heading-font text-2xl font-bold text-white tracking-widest uppercase">Admin
                        Panel</span>
                    <span class="text-xs font-bold text-indigo-400 tracking-[0.3em] uppercase opacity-80">Jajabor
                        Control System</span>
                </div>
            </div>
        </div>

        <div class="admin-glass rounded-[2rem] overflow-hidden relative group">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-transparent pointer-events-none"></div>

            <div class="p-10 sm:p-12">
                <div class="mb-10">
                    <h1 class="heading-font text-3xl font-bold text-white mb-2 tracking-tight">System Authentication
                    </h1>
                    <p class="text-gray-400 font-medium">Restricted access area. Please identify yourself.</p>
                </div>

                <form method="POST" action="{{ route('admin.login') }}" class="space-y-8">
                    @csrf

                    <div>
                        <label for="email"
                            class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-3 ml-1">Administrator
                            ID (Email)</label>
                        <div class="relative group/input">
                            <div
                                class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-gray-500 group-focus-within/input:text-indigo-500 transition-colors duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 11-8 0 4 4 0 018 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206">
                                    </path>
                                </svg>
                            </div>
                            <input id="email" type="email" name="email" :value="old('email')" required autofocus
                                class="block w-full pl-14 pr-5 py-5 input-dark rounded-2xl text-white placeholder-gray-600 outline-none"
                                placeholder="admin@jajabor.com">
                        </div>
                        @if($errors->has('email'))
                            <p class="mt-3 text-sm font-bold text-rose-500 ml-1">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-3 ml-1">
                            <label for="password"
                                class="block text-xs font-bold text-gray-500 uppercase tracking-widest">Access Protocol
                                (Password)</label>
                        </div>
                        <div class="relative group/input">
                            <div
                                class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-gray-500 group-focus-within/input:text-indigo-500 transition-colors duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required
                                class="block w-full pl-14 pr-5 py-5 input-dark rounded-2xl text-white placeholder-gray-600 outline-none"
                                placeholder="••••••••••••">
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="w-5 h-5 text-indigo-600 border-gray-700 bg-gray-900 rounded focus:ring-indigo-500 cursor-pointer">
                        <label for="remember_me"
                            class="ml-3 text-sm font-bold text-gray-500 uppercase tracking-widest cursor-pointer select-none">Maintain
                            Link Session</label>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="w-full flex justify-center items-center py-5 px-6 border border-transparent rounded-2xl text-white font-bold bg-indigo-600 hover:bg-indigo-700 focus:outline-none transition-all duration-300 transform hover:scale-[1.02] active:scale-95 admin-glow">
                            Initialize Login Sequence
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <div class="px-10 py-6 bg-white/5 border-t border-white/5 flex justify-between items-center">
                <span class="text-[10px] font-black uppercase text-gray-600 tracking-[0.2em]">Status: Core Online</span>
                <span class="text-[10px] font-black uppercase text-gray-600 tracking-[0.2em]">Auth Layer v2.1.0</span>
            </div>
        </div>

        <div class="mt-8 flex justify-center">
            <a href="{{ route('home') }}"
                class="text-xs font-bold text-gray-600 uppercase tracking-widest hover:text-indigo-400 transition-colors duration-300">
                &lsaquo; Return to Terminal
            </a>
        </div>
    </div>
</body>

</html>