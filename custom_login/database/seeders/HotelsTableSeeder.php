<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelsTableSeeder extends Seeder
{
    public function run()
    {
        Hotel::create([
            'name' => 'Grand Hotel',
            'location' => 'New York, USA',
            'latitude' => 40.7128,
            'longitude' => -74.0060,
            'images' => json_encode([
                'images/grand_hotel_1.jpg',
                'images/grand_hotel_2.jpg',
                'images/grand_hotel_3.jpg',
            ]),
        ]);

        Hotel::create([
            'name' => 'Sea Breeze Resort',
            'location' => 'Malibu, USA',
            'latitude' => 34.0259,
            'longitude' => -118.7798,
            'images' => json_encode([
                'images/sea_breeze_1.jpg',
                'images/sea_breeze_2.jpg',
                'images/sea_breeze_3.jpg',
            ]),
        ]);
        Hotel::create([
            'name' => 'Divine Eco Resort',
            'location' => 'Cox\'s Bazar',
            'latitude' => 21.417471476545575,
            'longitude' => 91.98119112029967,
            'images' => json_encode([
                'images/divine_eco1.jpg',
                'images/divine_eco2.jpg',
                'images/divine_eco3.jpg',
            ]),
        ]);
        Hotel::create([
            'name' => 'Ocean Paradise Hotel and Resort',
            'location' => 'Cox\'s Bazar',
            'latitude' => 21.41867002572701,
            'longitude' => 91.98243566520455,
            'images' => json_encode([
                'images/ocean_paradise1.jpg',
                'images/ocean_paradise2.jpg',
                'images/ocean_paradise3.jpg',
            ]),
        ]);
        Hotel::create([
            'name' => 'Green Nature Resort and Suites',
            'location' => 'Cox\'s Bazar',
            'latitude' => 21.419678796998955, 
            'longitude' => 91.97932430294233,
            'images' => json_encode([
                'images/ocean_paradise1.jpg',
                'images/ocean_paradise2.jpg',
                'images/ocean_paradise3.jpg',
            ]),
        ]);
        Hotel::create([
            'name' => 'Hotel the Glanz',
            'location' => 'Tokyo',
            'latitude' =>35.65448539007813, 
            'longitude' => 139.73667249054432,
            'images' => json_encode([
                'images/ocean_paradise1.jpg',
                'images/ocean_paradise2.jpg',
                'images/ocean_paradise3.jpg',
            ]),
        ]);
        Hotel::create([
            'name' => 'The Grand Hotel',
            'location' => 'Sylhet',
            'latitude' =>24.901839776665373, 
            'longitude' => 91.86974174805091,
            'images' => json_encode([
                'images/ocean_paradise1.jpg',
                'images/ocean_paradise2.jpg',
                'images/ocean_paradise3.jpg',
            ]),
        ]);
        Hotel::create([
            'name' => 'Sylhet Paradise Inn',
            'location' => 'Sylhet',
            'latitude' =>24.893231854603446, 
            'longitude' => 91.8784026200995,
            'images' => json_encode([
                'images/ocean_paradise1.jpg',
                'images/ocean_paradise2.jpg',
                'images/ocean_paradise3.jpg',
            ]),
        ]);
        Hotel::create([
            'name' => 'Blue Marine Resort',
            'location' => 'Saint Martin',
            'latitude' => 20.63422270943849, 
            'longitude' => 92.32688325259814,
            'images' => json_encode([
                'images/ocean_paradise1.jpg',
                'images/ocean_paradise2.jpg',
                'images/ocean_paradise3.jpg',
            ]),
        ]);
        


    

    }
}
