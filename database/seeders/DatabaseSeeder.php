<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ColorSeeder::class,
            VendorSeeder::class,
            BrandSeeder::class,
            BranchSeeder::class,
            IndexSeeder::class,
        ]);
    }
}
