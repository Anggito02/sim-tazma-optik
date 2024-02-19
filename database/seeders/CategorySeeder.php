<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'nama_kategori' => 'low',
        ]);

        Category::create([
            'nama_kategori' => 'mid',
        ]);

        Category::create([
            'nama_kategori' => 'high',
        ]);
    }
}
