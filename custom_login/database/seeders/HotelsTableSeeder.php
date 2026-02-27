<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelsTableSeeder extends Seeder
{
    public function run()
    {
        Hotel::create([
            'name' => 'Hotel Sunshine',
            'location' => "Cox's Bazar, Bangladesh",
            'price' => 100.00,
        ]);

        Hotel::create([
            'name' => 'Ocean View Resort',
            'location' => "Cox's Bazar, Bangladesh",
            'price' => 200.00,
        ]);

        Hotel::create([
            'name' => 'Mountain Lodge',
            'location' => "Cox's Bazar, Bangladesh",
            'price' => 150.00,
        ]);

        Hotel::create([
            'name' => 'Seaview Lodge',
            'location' => "Cox's Bazar, Bangladesh",
            'price' => 180.00,
        ]);

        Hotel::create([
            'name' => 'Suite',
            'location' => "Cox's Bazar, Bangladesh",
            'price' => 250.00,
        ]);

        Hotel::create([
            'name' => 'Skyplane hotel',
            'location' => "Cox's Bazar, Bangladesh",
            'price' => 300.00,
        ]);
    }
}
