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
        $manufactures = ['Electrolux', 'Brastemp', 'Fischer', 'Samsung', 'LG'];

        return [
            'name' => fake()->words(2, true),
            'description' => fake()->text(),
            'voltage' => fake()->randomNumber(5, false),
            'manufacturer' => fake()->randomElement($manufactures),
        ];
    }
}
