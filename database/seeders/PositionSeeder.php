<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            [
                'name' => 'Kepala Dinas',
                'code' => 'KADIS',
                'description' => 'Kepala Dinas',
                'level' => 1,
                'status' => 'active'
            ],
            [
                'name' => 'Sekretaris Dinas',
                'code' => 'SEKDIS',
                'description' => 'Sekretaris Dinas',
                'level' => 2,
                'status' => 'active'
            ],
            [
                'name' => 'Kepala Bidang',
                'code' => 'KABID',
                'description' => 'Kepala Bidang',
                'level' => 3,
                'status' => 'active'
            ],
            [
                'name' => 'Kepala Sub Bagian',
                'code' => 'KASUBAG',
                'description' => 'Kepala Sub Bagian',
                'level' => 4,
                'status' => 'active'
            ],
            [
                'name' => 'Kepala Seksi',
                'code' => 'KASI',
                'description' => 'Kepala Seksi',
                'level' => 4,
                'status' => 'active'
            ],
            [
                'name' => 'Staff',
                'code' => 'STAFF',
                'description' => 'Staff',
                'level' => 5,
                'status' => 'active'
            ],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}