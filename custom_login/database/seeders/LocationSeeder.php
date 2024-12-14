<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run()
    {
        // Add 10 dummy locations to the locations table
        Location::create([
            'name' => 'New York',
            'address' => 'New York, USA',
            'description' => 'The city that never sleeps.',
        ]);

        Location::create([
            'name' => 'Los Angeles',
            'address' => 'California, USA',
            'description' => 'Known for Hollywood and its beaches.',
        ]);

        Location::create([
            'name' => 'Tokyo',
            'address' => 'Tokyo, Japan',
            'description' => 'A bustling metropolis known for technology and culture.',
        ]);

        Location::create([
            'name' => 'Paris',
            'address' => 'Paris, France',
            'description' => 'Home of the Eiffel Tower and rich history.',
        ]);

        Location::create([
            'name' => 'London',
            'address' => 'London, UK',
            'description' => 'Famous for Big Ben and the British Museum.',
        ]);

        Location::create([
            'name' => 'Rome',
            'address' => 'Rome, Italy',
            'description' => 'Rich in history, home of the Colosseum.',
        ]);

        Location::create([
            'name' => 'Sydney',
            'address' => 'Sydney, Australia',
            'description' => 'Famous for its Opera House and beautiful beaches.',
        ]);

        Location::create([
            'name' => 'Berlin',
            'address' => 'Berlin, Germany',
            'description' => 'Known for its modern history and the Berlin Wall.',
        ]);

        Location::create([
            'name' => 'Cape Town',
            'address' => 'Cape Town, South Africa',
            'description' => 'A city with beautiful beaches and mountains.',
        ]);

        Location::create([
            'name' => 'Dubai',
            'address' => 'Dubai, UAE',
            'description' => 'Known for its luxurious shopping and skyscrapers.',
        ]);
    }
}
