<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::updateOrCreate([
            'name'=>'HP'
        ]);
        Brand::updateOrCreate([
            'name'=>'Motorola'
        ]);
        Brand::updateOrCreate([
            'name'=>'Samsung'
        ]);
    }
}
