<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * Check to avoid duplicates when running the seeder
         */
        Category::firstOrCreate(
            [
                'slug' => 'remessa_parcial'
            ],
            [
                'name' => 'Remessa Parcial'
            ]
        );

        Category::firstOrCreate(
            [
                'slug' => 'remessa',
            ],
            [
                'name' => 'Remessa'
            ]
        );
    }
}
