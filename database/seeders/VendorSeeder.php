<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    public function run(): void
    {
        Vendor::create([
            'kode_vendor' => 'V001',
            'npwp_vendor' => '123456789',
            'nama_vendor' => 'PT. Optik Tunggal',
            'alamat_vendor' => 'Jl. Test',
            'init_date_supply' => '2021-09-02',
            'last_date_supply' => null,
            'pic_vendor' => 'Budi',
            'no_telp_vendor' => '0812345678',
            'no_telp_pic' => '0812345678',
            'status_blacklist' => false,
        ]);

        Vendor::create([
            'kode_vendor' => 'V002',
            'npwp_vendor' => '123456789',
            'nama_vendor' => 'PT. Optik Tunggal',
            'alamat_vendor' => 'Jl. Test',
            'init_date_supply' => '2021-09-02',
            'last_date_supply' => null,
            'pic_vendor' => 'Toni',
            'no_telp_vendor' => '0812345678',
            'no_telp_pic' => '0812345678',
            'status_blacklist' => false,
        ]);

        Vendor::create([
            'kode_vendor' => 'V003',
            'npwp_vendor' => '123456789',
            'nama_vendor' => 'PT. Optik Tunggal',
            'alamat_vendor' => 'Jl. Test',
            'init_date_supply' => '2021-09-02',
            'last_date_supply' => '2023-01-05',
            'pic_vendor' => 'Tono',
            'no_telp_vendor' => '0812345678',
            'no_telp_pic' => '0812345678',
            'status_blacklist' => false,
        ]);

        Vendor::create([
            'kode_vendor' => 'V004',
            'npwp_vendor' => '123456789',
            'nama_vendor' => 'PT. Optik Tunggal',
            'alamat_vendor' => 'Jl. Test',
            'init_date_supply' => '2021-09-02',
            'last_date_supply' => '2022-12-31',
            'pic_vendor' => 'Tini',
            'no_telp_vendor' => '0812345678',
            'no_telp_pic' => '0812345678',
            'status_blacklist' => false,
        ]);

        Vendor::create([
            'kode_vendor' => 'V005',
            'npwp_vendor' => '123456789',
            'nama_vendor' => 'PT. Optik Tunggal',
            'alamat_vendor' => 'Jl. Test',
            'init_date_supply' => '2021-09-02',
            'last_date_supply' => '2022-06-01',
            'pic_vendor' => 'Tina',
            'no_telp_vendor' => '0812345678',
            'no_telp_pic' => '0812345678',
            'status_blacklist' => true,
        ]);
    }
}
