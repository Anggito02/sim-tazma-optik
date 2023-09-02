<?php

namespace Database\Seeders;

use App\Models\FrameCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrameCategorySeeder extends Seeder
{
    public function run(): void
    {
        FrameCategory::create([
            'nama_kategori' => 'low',
        ]);

        FrameCategory::create([
            'nama_kategori' => 'mid',
        ]);

        FrameCategory::create([
            'nama_kategori' => 'high',
        ]);
    }
}
