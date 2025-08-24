<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->jobTitle(),
            'code' => $this->faker->unique()->lexify('???'),
            'description' => $this->faker->sentence(),
            'level' => $this->faker->numberBetween(1, 5),
            'status' => 'active',
        ];
    }
}