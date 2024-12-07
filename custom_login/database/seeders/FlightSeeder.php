<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Flight;

class FlightSeeder extends Seeder
{
    public function run(): void
    {
        Flight::create([
            'flight_number' => 'FL123',
            'departure' => 'New York',
            'destination' => 'Los Angeles',
            'departure_time' => now()->addDays(2),
            'arrival_time' => now()->addDays(2)->addHours(6),
            'price' => 300.50,
            'is_available' => true,
        ]);

        Flight::create([
            'flight_number' => 'FL456',
            'departure' => 'Chicago',
            'destination' => 'Miami',
            'departure_time' => now()->addDays(3),
            'arrival_time' => now()->addDays(3)->addHours(4),
            'price' => 200.75,
            'available_seats' => 100,
            'is_available' => true,
        ]);
    }
}

