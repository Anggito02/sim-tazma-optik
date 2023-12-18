<?php

namespace Database\Seeders;

use App\Models\Index;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndexSeeder extends Seeder
{
    public function run(): void
    {
        Index::create([
            'value' => 1.50,
        ]);

        Index::create([
            'value' => 1.56,
        ]);

        Index::create([
            'value' => 1.59,
        ]);

        Index::create([
            'value' => 1.60,
        ]);

        Index::create([
            'value' => 1.61,
        ]);

        Index::create([
            'value' => 1.67,
        ]);

        Index::create([
            'value' => 1.74,
        ]);
    }
}
