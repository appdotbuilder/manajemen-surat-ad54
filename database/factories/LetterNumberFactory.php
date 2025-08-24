<?php

namespace Database\Factories;

use App\Models\LetterCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LetterNumber>
 */
class LetterNumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['incoming', 'outgoing']),
            'category_id' => LetterCategory::factory(),
            'prefix' => $this->faker->lexify('???'),
            'format' => '{prefix}/{number}/{month}/{year}',
            'current_number' => 0,
            'year' => date('Y'),
            'reset_yearly' => true,
            'status' => 'active',
        ];
    }
}