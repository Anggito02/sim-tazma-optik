<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdjustmentVendorSeeder extends Seeder
{
    public function run(): void
    {
        Vendor::create([
            'kode_vendor' => 'ADJUSTMENT',
            'npwp_vendor' => 'ADJUSTMENT',
            'nama_vendor' => 'ADJUSTMENT',
            'alamat_vendor' => 'ADJUSTMENT',
            'init_date_supply' => '2021-01-01',
            'last_date_supply' => NULL,
            'pic_vendor' => 'ADJUSTMENT',
            'no_telp_vendor' => 'ADJUSTMENT',
            'no_telp_pic' => 'ADJUSTMENT',
            'status_blacklist' => FALSE
        ]);
    }
}
