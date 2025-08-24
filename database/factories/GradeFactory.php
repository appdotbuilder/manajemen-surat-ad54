<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->regexify('(II|III|IV)/[a-e]'),
            'code' => $this->faker->unique()->lexify('???_?'),
            'description' => $this->faker->sentence(),
            'salary_base' => $this->faker->numberBetween(2000000, 6000000),
            'status' => 'active',
        ];
    }
}