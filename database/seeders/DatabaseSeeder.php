<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Branch;
use App\Models\Vendor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ColorSeeder::class,
            BrandSeeder::class,
            IndexSeeder::class,
            LensCategorySeeder::class,
            FrameCategorySeeder::class,
        ]);

        $this->call([
            AdjustmentBranchSeeder::class,
            AdjustmentVendorSeeder::class,
        ]);

        Branch::factory(10)->create();
        Vendor::factory(40)->create();


        $this->call([
            ItemSeeder::class,
        ]);
    }
}
