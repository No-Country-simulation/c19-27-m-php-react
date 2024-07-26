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
            'price'=>1200000,
            'quantity'=>15,
            //'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaCYt_Skg_DdS56k7TJ6K6bjyh2l-8W_3_WA&s',
            'brand_id'=>1,
            'categories_id'=>1
        ]);
        Product::updateOrCreate([
            'name'=>'Motorola One Fusion Plus',
            'price'=>1000000,
            'quantity'=>20,
            'brand_id'=>2,
            'categories_id'=>2
        ]);
        Product::updateOrCreate([
            'name'=>'Samsung J5',
            'price'=>800000,
            'quantity'=>10,
            'brand_id'=>3,
            'categories_id'=>2
        ]);
    }
}
