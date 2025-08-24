<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            [
                'name' => 'IV/e',
                'code' => 'IV_E',
                'description' => 'Pembina Utama',
                'salary_base' => 6000000.00,
                'status' => 'active'
            ],
            [
                'name' => 'IV/d',
                'code' => 'IV_D',
                'description' => 'Pembina Utama Madya',
                'salary_base' => 5500000.00,
                'status' => 'active'
            ],
            [
                'name' => 'IV/c',
                'code' => 'IV_C',
                'description' => 'Pembina Utama Muda',
                'salary_base' => 5000000.00,
                'status' => 'active'
            ],
            [
                'name' => 'IV/b',
                'code' => 'IV_B',
                'description' => 'Pembina Tingkat I',
                'salary_base' => 4500000.00,
                'status' => 'active'
            ],
            [
                'name' => 'IV/a',
                'code' => 'IV_A',
                'description' => 'Pembina',
                'salary_base' => 4000000.00,
                'status' => 'active'
            ],
            [
                'name' => 'III/d',
                'code' => 'III_D',
                'description' => 'Penata Tingkat I',
                'salary_base' => 3500000.00,
                'status' => 'active'
            ],
            [
                'name' => 'III/c',
                'code' => 'III_C',
                'description' => 'Penata',
                'salary_base' => 3000000.00,
                'status' => 'active'
            ],
            [
                'name' => 'III/b',
                'code' => 'III_B',
                'description' => 'Penata Muda Tingkat I',
                'salary_base' => 2800000.00,
                'status' => 'active'
            ],
            [
                'name' => 'III/a',
                'code' => 'III_A',
                'description' => 'Penata Muda',
                'salary_base' => 2500000.00,
                'status' => 'active'
            ],
            [
                'name' => 'II/d',
                'code' => 'II_D',
                'description' => 'Pengatur Tingkat I',
                'salary_base' => 2300000.00,
                'status' => 'active'
            ],
        ];

        foreach ($grades as $grade) {
            Grade::create($grade);
        }
    }
}