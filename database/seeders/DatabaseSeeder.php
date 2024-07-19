<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
        BrandSeeder::class,
        CategorySeeder::class,
        UserSeeder::class,
        ProductSeeder::class,
        CartSeeder::class
       ]);
    }
}
