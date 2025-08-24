<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@simasuke.com',
        ]);

        // Seed master data
        $this->call([
            LetterCategorySeeder::class,
            LetterTypeSeeder::class,
            PositionSeeder::class,
            GradeSeeder::class,
            DepartmentSeeder::class,
        ]);

        // Create sample employees
        Employee::factory(25)->active()->create();
        Employee::factory(5)->inactive()->create();
    }
}
