<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // Seed portfolio items from existing images (1.jpg through 99.jpg)
        for ($i = 1; $i <= 99; $i++) {
            Portfolio::firstOrCreate(
                ['image' => "portfolio/{$i}.jpg"],
                [
                    'title' => '',
                    'description' => null,
                    'category' => null,
                    'is_active' => true,
                    'sort_order' => $i,
                ]
            );
        }
    }
}
