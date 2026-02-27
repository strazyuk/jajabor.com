<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Offer;
use Carbon\Carbon;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Offer::create([
            'title' => 'Summer Sale!',
            'subtitle' => 'Get up to 30% off on all summer destinations.',
            'discount_code' => 'SUMMER30',
            'image_url' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'valid_until' => Carbon::now()->addDays(30),
            'is_active' => true,
        ]);

        Offer::create([
            'title' => 'Early Bird Discount',
            'subtitle' => 'Book 3 months in advance and save 15%.',
            'discount_code' => 'EARLY15',
            'image_url' => 'https://images.unsplash.com/photo-1436491865332-7a61a109cc05?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'valid_until' => Carbon::now()->addDays(60),
            'is_active' => true,
        ]);
    }
}
