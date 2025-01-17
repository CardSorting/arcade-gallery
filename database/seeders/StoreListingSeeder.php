<?php

namespace Database\Seeders;

use App\Models\StoreListing;
use Illuminate\Database\Seeder;

class StoreListingSeeder extends Seeder
{
    public function run()
    {
        // Create 10 published store listings
        StoreListing::factory()
            ->count(10)
            ->create(['published_at' => now()]);
            
        // Create 5 unpublished store listings
        StoreListing::factory()
            ->count(5)
            ->create(['published_at' => null]);
    }
}
