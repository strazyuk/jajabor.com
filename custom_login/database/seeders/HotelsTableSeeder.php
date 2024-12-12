<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('hotels')->insert([
            ['name' => 'Hotel Sunshine', 'location' => "Cox's bazar"],
            ['name' => 'Ocean View Resort', 'location' => "Cox's bazar"],
            ['name' => 'Mountain Lodge', 'location' => "Cox's bazar"],
            ['name' => 'Seaview Lodge', 'location' => "Cox's bazar"],
            ['name' => 'Suite', 'location' => "Cox's bazar"],
            ['name' => 'Skyplane hotel', 'location' => "Cox's bazar"],
        ]);
    }
}
