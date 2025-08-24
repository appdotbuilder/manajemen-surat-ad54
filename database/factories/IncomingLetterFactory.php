<?php

namespace Database\Factories;

use App\Models\LetterCategory;
use App\Models\LetterType;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IncomingLetter>
 */
class IncomingLetterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'letter_number' => $this->faker->unique()->numerify('####/###/####'),
            'internal_number' => $this->faker->unique()->numerify('SM-####/###/####'),
            'subject' => $this->faker->sentence(),
            'sender' => $this->faker->company(),
            'sender_address' => $this->faker->address(),
            'letter_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'received_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'category_id' => LetterCategory::factory(),
            'letter_type_id' => LetterType::factory(),
            'received_by' => Employee::factory(),
            'notes' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['received', 'processed', 'archived']),
        ];
    }
}