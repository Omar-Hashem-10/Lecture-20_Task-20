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
            'title'         => $this->faker->word(),
            'price'         => $this->faker->numberBetween(100, 5000),
            'description'   => fake()->paragraph(),
            'is_new'        => fake()->boolean(),
            'image'         => fake()->imageUrl(400, 400, 'products', true)
        ];
    }
}
