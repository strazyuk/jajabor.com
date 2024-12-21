<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dashboard') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/dashboard.css') }}" rel= "stylesheet">

    <!-- Custom Twitter-like Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-image: url('{{ asset('images/background.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #14171A;
            margin: 0;
            padding: 0;
        }

        .bg-gray-100 {
            background-color: #F5F8FA;
        }

        .dark\:bg-gray-900 {
            background-color: #1A1C1D;
        }

        .bg-white {
            background-color: #FFFFFF;
        }

        .dark\:bg-gray-800 {
            background-color: #1C1E21;
        }

        .shadow {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .min-h-screen {
            min-height: 100vh;
        }

        .font-sans {
            font-family: 'Figtree', sans-serif;
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Button styles */
        .btn-primary {
            background-color: #1DA1F2;
            color: white;
            border-radius: 30px;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #1991DB;
        }

        /* Header styling */
        .header {
            color: #1DA1F2;
            font-size: 24px;
            font-weight: bold;
        }

        .max-w-7xl {
            max-width: 80%;
        }

        /* Responsive padding */
        .py-6 {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .sm\:px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .lg\:px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        @media (min-width: 768px) {
            .max-w-7xl {
                max-width: 90%;
            }
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/dashboard.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-extrabold text-blue-700 dark:text-blue-300 leading-tight">
                    Dashboard
                </h2>
            </div>
        </header>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="mt-6 space-y-8">
            <!-- User Info Section -->
            <div class="bg-white shadow-sm rounded-lg p-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                    </div>
                    <div class="profile">
                        <h3>Your Profile</h3>

                        <!-- Display Profile Image -->
                        @if ($user->profile_image)
                            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" width="150" height="150">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Default Profile Image" width="150" height="150">
                        @endif
                    </div>
                </div>
            </div>

            <!-- Past Bookings Section -->
            <div class="mt-6 space-y-8">
                <div class="bg-white shadow-sm rounded-lg p-6">
                    <h4 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-6">Past Bookings</h4>
                    @if ($pastBookings->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">No past bookings found.</p>
                    @else
                        <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($pastBookings as $booking)
                                <div class="bg-gray-50 dark:bg-gray-700 p-5 rounded-lg shadow">
                                    <div class="flex items-center justify-between mb-4">
                                        <strong class="text-lg text-gray-800 dark:text-gray-200">Hotel: </strong>
                                        <span class="text-base text-gray-600 dark:text-gray-300">{{ $booking->hotel_name }}</span>
                                    </div>
                                    <div class="flex items-center justify-between mb-4">
                                        <strong class="text-lg text-gray-800 dark:text-gray-200">Check-in Date: </strong>
                                        <span class="text-sm text-gray-600 dark:text-gray-300">{{ $booking->check_in_date }}</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <strong class="text-lg text-gray-800 dark:text-gray-200">Check-out Date: </strong>
                                        <span class="text-sm text-gray-600 dark:text-gray-300">{{ $booking->check_out_date }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Current Bookings Section -->
                <div class="bg-white shadow-sm rounded-lg p-6">
                    <h4 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-6">Current Bookings</h4>
                    @if ($currentBookings->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">No current bookings found.</p>
                    @else
                        <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($currentBookings as $booking)
                                <div class="bg-gray-50 dark:bg-gray-700 p-5 rounded-lg shadow">
                                    <div class="flex items-center justify-between mb-4">
                                        <strong class="text-lg text-gray-800 dark:text-gray-200">Hotel: </strong>
                                        <span class="text-base text-gray-600 dark:text-gray-300">{{ $booking->hotel_name }}</span>
                                    </div>
                                    <div class="flex items-center justify-between mb-4">
                                        <strong class="text-lg text-gray-800 dark:text-gray-200">Booking Date: </strong>
                                        <span class="text-sm text-gray-600 dark:text-gray-300">{{ $booking->check_in_date }}</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <strong class="text-lg text-gray-800 dark:text-gray-200">Check-out-date: </strong>
                                        <span class="text-sm text-gray-600 dark:text-gray-300">{{ $booking->check_out_date }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>
