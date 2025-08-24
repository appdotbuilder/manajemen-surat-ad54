<?php

namespace Database\Factories;

use App\Models\IncomingLetter;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Disposition>
 */
class DispositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'disposition_number' => $this->faker->unique()->numerify('DISP-####/###/####'),
            'incoming_letter_id' => IncomingLetter::factory(),
            'from_employee_id' => Employee::factory(),
            'to_employee_id' => Employee::factory(),
            'to_department_id' => Department::factory(),
            'disposition_type' => $this->faker->randomElement(['untuk_ditindaklanjuti', 'untuk_diketahui', 'untuk_dipelajari', 'untuk_dikoordinasikan']),
            'instructions' => $this->faker->sentence(),
            'notes' => $this->faker->sentence(),
            'due_date' => $this->faker->optional()->dateTimeBetween('now', '+30 days'),
            'priority' => $this->faker->randomElement(['low', 'normal', 'high', 'urgent']),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed', 'returned', 'archived']),
            'completed_at' => null,
            'completion_notes' => null,
        ];
    }
}