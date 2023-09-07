<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        Branch::create([
            'kode_branch' => 'B001',
            'nama_branch' => 'Optik Tunggal',
            'alamat' => 'Jl. Test',
            'employee_id_pic_branch' => 1,
        ]);

        Branch::create([
            'kode_branch' => 'B002',
            'nama_branch' => 'Optik Tunggal 2',
            'alamat' => 'Jl. Test 2',
            'employee_id_pic_branch' => 1,
        ]);

        Branch::create([
            'kode_branch' => 'B003',
            'nama_branch' => 'Optik Tunggal 3',
            'alamat' => 'Jl. Test 3',
            'employee_id_pic_branch' => 2,
        ]);

        Branch::create([
            'kode_branch' => 'B004',
            'nama_branch' => 'Optik Tunggal 4',
            'alamat' => 'Jl. Test 4',
            'employee_id_pic_branch' => 2,
        ]);

        Branch::create([
            'kode_branch' => 'B005',
            'nama_branch' => 'Optik Tunggal 5',
            'alamat' => 'Jl. Test 5',
            'employee_id_pic_branch' => 1,
        ]);

        Branch::create([
            'kode_branch' => 'B006',
            'nama_branch' => 'Optik Tunggal 6',
            'alamat' => 'Jl. Test 6',
            'employee_id_pic_branch' => 1,
        ]);

        Branch::create([
            'kode_branch' => 'B007',
            'nama_branch' => 'Optik Tunggal 7',
            'alamat' => 'Jl. Test 7',
            'employee_id_pic_branch' => 1,
        ]);

        Branch::create([
            'kode_branch' => 'B008',
            'nama_branch' => 'Optik Tunggal 8',
            'alamat' => 'Jl. Test 8',
            'employee_id_pic_branch' => 1,
        ]);

        Branch::create([
            'kode_branch' => 'B009',
            'nama_branch' => 'Optik Tunggal 9',
            'alamat' => 'Jl. Test 9',
            'employee_id_pic_branch' => 1,
        ]);
    }
}
