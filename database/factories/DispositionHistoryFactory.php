<?php

namespace Database\Factories;

use App\Models\Disposition;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DispositionHistory>
 */
class DispositionHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'disposition_id' => Disposition::factory(),
            'employee_id' => Employee::factory(),
            'action' => $this->faker->randomElement(['created', 'forwarded', 'completed', 'returned']),
            'previous_status' => $this->faker->optional()->randomElement(['pending', 'in_progress', 'completed']),
            'new_status' => $this->faker->randomElement(['pending', 'in_progress', 'completed', 'returned', 'archived']),
            'notes' => $this->faker->sentence(),
            'metadata' => null,
        ];
    }
}