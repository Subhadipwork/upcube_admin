<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subcategory>
 */
class SubcategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'category_id' => $this->faker->numberBetween(1, 20),
            'image' => $this->faker->imageUrl(640, 480, 'category', true), // Generates a random image URL
            'status' => $this->faker->randomElement(['1', '0']), 
            // 'status' => $this->faker->boolean,
        ];
    }
}
