<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package::create([
            'title' => 'Bali Getaway',
            'description' => 'Experience the magic of Bali with our exclusive 7-day getaway package. Includes luxury accommodation, guided tours to ancient temples, and relaxing spa sessions.',
            'price' => 1299.00,
            'duration' => 7,
            'image_url' => 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'is_active' => true,
        ]);

        Package::create([
            'title' => 'Swiss Alps Adventure',
            'description' => 'Embark on an unforgettable adventure in the Swiss Alps. Enjoy skiing, snowboarding, and breathtaking mountain views from your cozy chalet.',
            'price' => 2499.00,
            'duration' => 5,
            'image_url' => 'https://images.unsplash.com/photo-1530122037265-a5f1f91d3b99?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'is_active' => true,
        ]);

        Package::create([
            'title' => 'Maldives Honeymoon',
            'description' => 'Celebrate your love with a romantic honeymoon in the Maldives. Stay in an overwater villa, enjoy private dining, and explore vibrant coral reefs.',
            'price' => 3999.00,
            'duration' => 10,
            'image_url' => 'https://images.unsplash.com/photo-1514282401047-d79a71a590e8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'is_active' => true,
        ]);
    }
}
