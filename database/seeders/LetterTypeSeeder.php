<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LetterType;

class LetterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Biasa',
                'code' => 'B',
                'description' => 'Surat dengan sifat biasa',
                'priority' => 'normal',
                'color_code' => '#6B7280',
                'status' => 'active'
            ],
            [
                'name' => 'Penting',
                'code' => 'P',
                'description' => 'Surat dengan sifat penting',
                'priority' => 'high',
                'color_code' => '#F59E0B',
                'status' => 'active'
            ],
            [
                'name' => 'Segera',
                'code' => 'S',
                'description' => 'Surat yang harus segera ditindaklanjuti',
                'priority' => 'urgent',
                'color_code' => '#EF4444',
                'status' => 'active'
            ],
            [
                'name' => 'Rahasia',
                'code' => 'R',
                'description' => 'Surat dengan sifat rahasia',
                'priority' => 'high',
                'color_code' => '#7C3AED',
                'status' => 'active'
            ],
            [
                'name' => 'Sangat Rahasia',
                'code' => 'SR',
                'description' => 'Surat dengan sifat sangat rahasia',
                'priority' => 'urgent',
                'color_code' => '#DC2626',
                'status' => 'active'
            ],
        ];

        foreach ($types as $type) {
            LetterType::create($type);
        }
    }
}