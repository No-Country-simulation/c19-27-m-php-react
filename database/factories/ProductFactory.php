<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //

            'name' => fake()->name(),
            'description' => fake()->sentence(),
            'price' => fake()->numberBetween(100, 1000),
            'quantity' => fake()->numberBetween(0, 100),
            'categories_idcategories' => fake()->numberBetween(1,20),
            'brands_id' => fake()->numberBetween(1,20),
            'image' => $this->faker->imageUrl(640, 480, 'products', true),

        ];
    }
}
