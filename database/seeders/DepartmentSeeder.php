<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Root departments
        $departments = [
            [
                'name' => 'Sekretariat',
                'code' => 'SEKR',
                'description' => 'Sekretariat Dinas',
                'parent_id' => null,
                'head_employee_id' => null,
                'status' => 'active'
            ],
            [
                'name' => 'Bidang Administrasi',
                'code' => 'BID_ADM',
                'description' => 'Bidang Administrasi dan Keuangan',
                'parent_id' => null,
                'head_employee_id' => null,
                'status' => 'active'
            ],
            [
                'name' => 'Bidang Teknis',
                'code' => 'BID_TEK',
                'description' => 'Bidang Teknis dan Operasional',
                'parent_id' => null,
                'head_employee_id' => null,
                'status' => 'active'
            ],
            [
                'name' => 'Bidang Perencanaan',
                'code' => 'BID_REN',
                'description' => 'Bidang Perencanaan dan Evaluasi',
                'parent_id' => null,
                'head_employee_id' => null,
                'status' => 'active'
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }

        // Sub departments
        $subDepartments = [
            [
                'name' => 'Sub Bagian Umum',
                'code' => 'SUBAG_UM',
                'description' => 'Sub Bagian Umum dan Kepegawaian',
                'parent_id' => 1, // Sekretariat
                'head_employee_id' => null,
                'status' => 'active'
            ],
            [
                'name' => 'Sub Bagian Keuangan',
                'code' => 'SUBAG_KEU',
                'description' => 'Sub Bagian Keuangan',
                'parent_id' => 1, // Sekretariat
                'head_employee_id' => null,
                'status' => 'active'
            ],
            [
                'name' => 'Seksi Administrasi',
                'code' => 'SEKSI_ADM',
                'description' => 'Seksi Administrasi',
                'parent_id' => 2, // Bidang Administrasi
                'head_employee_id' => null,
                'status' => 'active'
            ],
            [
                'name' => 'Seksi Operasional',
                'code' => 'SEKSI_OPS',
                'description' => 'Seksi Operasional',
                'parent_id' => 3, // Bidang Teknis
                'head_employee_id' => null,
                'status' => 'active'
            ],
        ];

        foreach ($subDepartments as $department) {
            Department::create($department);
        }
    }
}