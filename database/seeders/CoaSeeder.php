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
            'kode_coa' => '1000',
            'deskripsi' => 'Penjualan',
            'kategori' => 'pendapatan',
        ]);

        Coa::create([
            'kode_coa' => '2000',
            'deskripsi' => 'Pembelian',
            'kategori' => 'pengeluaran',
        ]);
    }
}
