<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run()
    {
        Location::create([
            'name' => 'New York',
            'address' => 'New York, USA',
            'description' => 'The city that never sleeps.',
            'image_url' => 'https://cdn.britannica.com/61/93061-050-99147DCE/Statue-of-Liberty-Island-New-York-Bay.jpg',
        ]);

        Location::create([
            'name' => 'Los Angeles',
            'address' => 'California, USA',
            'description' => 'Known for Hollywood and its beaches.',
            'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/20190616154621%21Echo_Park_Lake_with_Downtown_Los_Angeles_Skyline.jpg/800px-20190616154621%21Echo_Park_Lake_with_Downtown_Los_Angeles_Skyline.jpg',
        ]);

        Location::create([
            'name' => 'Tokyo',
            'address' => 'Tokyo, Japan',
            'description' => 'A bustling metropolis known for technology and culture.',
            'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOQmNpxrD9ccoxZ3Q23LOOE93wLr_tMR7LFQ&s',
        ]);

        // Add more dummy locations...
    }
}
