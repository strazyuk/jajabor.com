<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'reviewer' => 'Sarah Connor',
            'review_for' => 'Switzerland',
            'comment' => 'The Alps adventure was life-changing! Jajabor made everything so easy, from flights to a cozy chalet stay.',
            'avatar_url' => 'https://i.pravatar.cc/150?u=sarah',
            'is_featured' => true,
        ]);

        Review::create([
            'reviewer' => 'James Wilson',
            'review_for' => 'Bali',
            'comment' => 'Luxury and peace. The Bali package was perfectly curated. I highly recommend the spa sessions!',
            'avatar_url' => 'https://i.pravatar.cc/150?u=james',
            'is_featured' => true,
        ]);

        Review::create([
            'reviewer' => 'Elena Rodriguez',
            'review_for' => 'Maldives',
            'comment' => 'Absolute paradise. The overwater villa was a dream come true. Thank you Jajabor!',
            'avatar_url' => 'https://i.pravatar.cc/150?u=elena',
            'is_featured' => true,
        ]);
    }
}
