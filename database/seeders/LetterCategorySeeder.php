<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LetterCategory;

class LetterCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Undangan',
                'code' => 'UND',
                'description' => 'Surat undangan resmi',
                'type' => 'both',
                'status' => 'active'
            ],
            [
                'name' => 'Nota Dinas',
                'code' => 'ND',
                'description' => 'Nota dinas internal',
                'type' => 'both',
                'status' => 'active'
            ],
            [
                'name' => 'Surat Keputusan',
                'code' => 'SK',
                'description' => 'Surat keputusan pimpinan',
                'type' => 'outgoing',
                'status' => 'active'
            ],
            [
                'name' => 'Surat Tugas',
                'code' => 'ST',
                'description' => 'Surat penugasan pegawai',
                'type' => 'outgoing',
                'status' => 'active'
            ],
            [
                'name' => 'Laporan',
                'code' => 'LAP',
                'description' => 'Laporan kegiatan atau kinerja',
                'type' => 'incoming',
                'status' => 'active'
            ],
            [
                'name' => 'Permohonan',
                'code' => 'PRM',
                'description' => 'Surat permohonan',
                'type' => 'both',
                'status' => 'active'
            ],
        ];

        foreach ($categories as $category) {
            LetterCategory::create($category);
        }
    }
}