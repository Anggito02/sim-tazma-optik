<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdjustmentBranchSeeder extends Seeder
{
    public function run(): void
    {
        Branch::create([
            'kode_branch' => 'ADJUSTMENT',
            'nama_branch' => 'ADJUSTMENT',
            'alamat' => 'ADJUSTMENT',

            'employee_id_pic_branch' => 1,
        ]);
    }
}
