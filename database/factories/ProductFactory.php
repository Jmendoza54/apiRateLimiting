<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos>
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
            'name' => $this->faker->word(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 10, 50),
            'category' => $this->faker->randomElement(['a', 'b', 'c', 'd', 'e']),
        ];
    }
}
