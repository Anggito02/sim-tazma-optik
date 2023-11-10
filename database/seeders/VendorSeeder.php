<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendor::create([
            'kode_vendor' => 'ABC',
            'npwp_vendor' => '456789012345678',
            'nama_vendor' => 'PT. Cahaya Abadi',
            'alamat_vendor' => 'Jl. Raya Bogor KM 30',
            'init_date_supply' => '2021-02-01',
            'last_date_supply' => null,
            'pic_vendor' => 'Sukirman',
            'no_telp_vendor' => '0821431241421',
            'no_telp_pic' => '084214214214',
            'status_blacklist' => false,
        ]);

        Vendor::create([
            'kode_vendor' => 'DEF',
            'npwp_vendor' => '412345678901234',
            'nama_vendor' => 'PT. Duta Abadi',
            'alamat_vendor' => 'Jl. Bintaro Raya No. 10',
            'init_date_supply' => '2021-03-03',
            'last_date_supply' => null,
            'pic_vendor' => 'Agus',
            'no_telp_vendor' => '084124124124',
            'no_telp_pic' => '081124124124',
            'status_blacklist' => false,
        ]);

        Vendor::create([
            'kode_vendor' => 'GHI',
            'npwp_vendor' => '345678901234567',
            'nama_vendor' => 'PT. Abadi Jaya',
            'alamat_vendor' => 'Jl. Raya Cibubur No. 5',
            'init_date_supply' => '2021-02-14',
            'last_date_supply' => null,
            'pic_vendor' => 'Budi',
            'no_telp_vendor' => '081241241241',
            'no_telp_pic' => '081241241241',
            'status_blacklist' => false,
        ]);

        Vendor::create([
            'kode_vendor' => 'JKL',
            'npwp_vendor' => '234567890123456',
            'nama_vendor' => 'PT. Abadi Sentosa',
            'alamat_vendor' => 'Jl. Raya Cisitu No. 15',
            'init_date_supply' => '2021-02-12',
            'last_date_supply' => null,
            'pic_vendor' => 'Budi',
            'no_telp_vendor' => '081241241241',
            'no_telp_pic' => '081241241241',
            'status_blacklist' => false,
        ]);

        Vendor::create([
            'kode_vendor' => 'MNO',
            'npwp_vendor' => '123456789012345',
            'nama_vendor' => 'PT. Abadi Makmur',
            'alamat_vendor' => 'Jl. Makmur No. 2',
            'init_date_supply' => '2021-02-12',
            'last_date_supply' => null,
            'pic_vendor' => 'Rudolf',
            'no_telp_vendor' => '081241241241',
            'no_telp_pic' => '081241241241',
            'status_blacklist' => false,
        ]);

        Vendor::create([
            'kode_vendor' => 'PQR',
            'npwp_vendor' => '567890123456789',
            'nama_vendor' => 'PT. Abadi Sejahtera',
            'alamat_vendor' => 'Jl. Nusa Indah No. 1',
            'init_date_supply' => '2021-02-12',
            'last_date_supply' => null,
            'pic_vendor' => 'Rudolf',
            'no_telp_vendor' => '081141241241',
            'no_telp_pic' => '0812415131241',
            'status_blacklist' => false,
        ]);

        Vendor::create([
            'kode_vendor' => 'STU',
            'npwp_vendor' => '678901234567890',
            'nama_vendor' => 'PT. Abadi Sentosa',
            'alamat_vendor' => 'Jl. Abadi No. 15',
            'init_date_supply' => '2021-02-12',
            'last_date_supply' => '2023-03-23',
            'pic_vendor' => 'Ron',
            'no_telp_vendor' => '081241241241',
            'no_telp_pic' => '081241241241',
            'status_blacklist' => true,
        ]);

        Vendor::create([
            'kode_vendor' => 'VWX',
            'npwp_vendor' => '789012345678901',
            'nama_vendor' => 'PT. Abadi Jaya',
            'alamat_vendor' => 'Jl. Cisitu Baru No. 15',
            'init_date_supply' => '2021-02-12',
            'last_date_supply' => '2023-05-21',
            'pic_vendor' => 'Ron',
            'no_telp_vendor' => '081241241241',
            'no_telp_pic' => '081241241241',
            'status_blacklist' => true,
        ]);

        Vendor::create([
            'kode_vendor' => 'YZA',
            'npwp_vendor' => '890123456789012',
            'nama_vendor' => 'PT. Abadi Makmur',
            'alamat_vendor' => 'Jl. Bogor Raya No. 2',
            'init_date_supply' => '2021-02-12',
            'last_date_supply' => '2023-05-21',
            'pic_vendor' => 'Ron',
            'no_telp_vendor' => '081241241241',
            'no_telp_pic' => '081241241241',
            'status_blacklist' => true,
        ]);
    }
}
