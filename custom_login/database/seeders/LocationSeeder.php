<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run()
    {
        Location::create([
            'name' => 'Saint Martin',
            'address' => "9 km south of the tip of the Cox's Bazar-Teknaf peninsula",
            'description' => 'Beautiful beaches, crystal clear waters, and rich marine life',
            'image_url' => 'https://ttg.com.bd/uploads/tours/plans/206_1878484_saint-martins-island-bangladeshjpg.jpg',
        ]);
        // Add more dummy locations...
    }
}
