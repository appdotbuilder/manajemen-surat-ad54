<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LetterType>
 */
class LetterTypeFactory extends Factory
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
            'code' => $this->faker->unique()->lexify('?'),
            'description' => $this->faker->sentence(),
            'priority' => $this->faker->randomElement(['low', 'normal', 'high', 'urgent']),
            'color_code' => $this->faker->hexColor(),
            'status' => 'active',
        ];
    }
}