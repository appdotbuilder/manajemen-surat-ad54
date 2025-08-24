<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Grade;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeePosition>
 */
class EmployeePositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => Employee::factory(),
            'position_id' => Position::factory(),
            'grade_id' => Grade::factory(),
            'department_id' => Department::factory(),
            'start_date' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'end_date' => null,
            'is_active' => true,
        ];
    }
}