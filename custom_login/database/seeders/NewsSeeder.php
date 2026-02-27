<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::create([
            'title' => 'New Direct Flights to Tokyo Added!',
            'excerpt' => 'We are excited to announce new direct flights to Tokyo from major hubs starting next month.',
            'content' => 'We are excited to announce new direct flights to Tokyo from major hubs starting next month. This expansion aims to provide better connectivity and more options for our travelers looking to explore the vibrant city of Tokyo.',
            'image_url' => 'https://images.unsplash.com/photo-1503899036084-c55cdd92da26?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'published_at' => Carbon::now()->subDays(2),
            'is_published' => true,
        ]);

        News::create([
            'title' => 'Top 10 Hidden Gems in Europe',
            'excerpt' => 'Discover the lesser-known but incredibly beautiful destinations in Europe for your next trip.',
            'content' => 'Discover the lesser-known but incredibly beautiful destinations in Europe for your next trip. From quaint villages in France to stunning coastal towns in Italy, our guide covers the best hidden gems that are off the beaten path.',
            'image_url' => 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'published_at' => Carbon::now()->subDays(5),
            'is_published' => true,
        ]);
    }
}
