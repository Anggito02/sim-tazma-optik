<?php

namespace Database\Seeders;

use App\Models\LensCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LensCategorySeeder extends Seeder
{
    public function run(): void
    {
        LensCategory::create([
            'nama_kategori' => 'low',
        ]);

        LensCategory::create([
            'nama_kategori' => 'mid',
        ]);

        LensCategory::create([
            'nama_kategori' => 'high',
        ]);
    }
}
