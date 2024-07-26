<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::updateOrCreate([
            'name'=>'Laptop',
            'description'=>'PC alta calidad',
            'price'=>1200000,
            'quantity'=>15,
            //'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaCYt_Skg_DdS56k7TJ6K6bjyh2l-8W_3_WA&s',
            'brand_id'=>1,
            'category_id'=>1
        ]);
        Product::updateOrCreate([
            'name'=>'Motorola One Fusion Plus',
            'description'=>'alta calidad',
            'price'=>1000000,
            'quantity'=>20,
            'brand_id'=>2,
            'category_id'=>2
        ]);
        Product::updateOrCreate([
            'name'=>'Samsung J5',
            'description'=>'Alta calidad',
            'price'=>800000,
            'quantity'=>10,
            'brand_id'=>3,
            'category_id'=>2
        ]);
    }
}
