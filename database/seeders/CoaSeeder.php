<?php

namespace Database\Seeders;

use App\Models\Coa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coa::create([
            'kode_coa' => '1001',
            'deskripsi' => 'Penjualan Barang',
            'kategori' => 'pendapatan kas',
        ]);


        Coa::create([
            'kode_coa' => '1002',
            'deskripsi' => 'Modal Awal',
            'kategori' => 'pendapatan kas',
        ]);

        Coa::create([
            'kode_coa' => '2001',
            'deskripsi' => 'Tarik modal',
            'kategori' => 'pengeluaran kas',
        ]);

        Coa::create([
            'kode_coa' => '2002',
            'deskripsi' => 'Pengeluaran lainnya',
            'kategori' => 'pengeluaran',
        ]);
    }
}
