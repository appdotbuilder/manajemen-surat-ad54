<?php

namespace Database\Factories;

use App\Models\LetterCategory;
use App\Models\LetterType;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OutgoingLetter>
 */
class OutgoingLetterFactory extends Factory
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
            'subject' => $this->faker->sentence(),
            'recipient' => $this->faker->company(),
            'recipient_address' => $this->faker->address(),
            'letter_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'sent_date' => $this->faker->optional()->dateTimeBetween('-1 year', 'now'),
            'category_id' => LetterCategory::factory(),
            'letter_type_id' => LetterType::factory(),
            'created_by' => Employee::factory(),
            'signed_by' => Employee::factory(),
            'content' => $this->faker->paragraphs(3, true),
            'notes' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['draft', 'pending_approval', 'approved', 'sent', 'archived']),
        ];
    }
}