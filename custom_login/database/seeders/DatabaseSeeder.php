<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call other seeders
        $this->call(HotelsTableSeeder::class);
        $this->call(FlightSeeder::class);
        $this->call(LocationSeeder::class);


        // Check if the test user already exists
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'is_admin' => false,
            ]);
        }

        // Seed an Admin User
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Super Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'), // or Hash::make('password')
                'is_admin' => true,
            ]);
        }

        // Seed Frontpage Dynamic Content
        $this->call([
            PackageSeeder::class,
            OfferSeeder::class,
            NewsSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
