<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LetterCategory>
 */
class LetterCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'code' => $this->faker->unique()->lexify('???'),
            'description' => $this->faker->sentence(),
            'type' => $this->faker->randomElement(['incoming', 'outgoing', 'both']),
            'status' => 'active',
        ];
    }
}