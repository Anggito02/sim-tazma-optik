<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdjustmentCustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::create([
            'nama_depan' => 'ADJUSTMENT',
            'nama_belakang' => 'ADJUSTMENT',
            'email' => 'ADJUSTMENT',
            'nomor_telepon' => 'ADJUSTMENT',
            'alamat' => 'ADJUSTMENT',
            'usia' => 1,
            'tanggal_lahir' => '2000-01-01 01:01:01',
            'gender' => 'laki-laki',
            'deleteable' => false,
            'branch_id' => 1,
            'kabkota_id' => 108,
        ]);
    }
}

?>
