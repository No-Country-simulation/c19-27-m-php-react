<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory(20)->create([
        //     'name' => fake()->name(),
        //     'email' => fake()->email()->unique(),
        // ]);
         // Llama al UserSeeder
         $this->call(UserSeeder::class);

    // Llama a las factories     
    User::factory(30)->create();    
    Category::factory(20)->create();
    Brand::factory(20)->create();
    Product::factory(50)->create();
    
   } 
}
