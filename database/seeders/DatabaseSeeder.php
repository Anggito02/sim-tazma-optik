<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Branch;
use App\Models\Modules\Item;
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
            CategorySeeder::class,
        ]);

        $this->call([
            AdjustmentBranchSeeder::class,
            AdjustmentVendorSeeder::class,
            VendorSeeder::class,
        ]);

        Branch::factory(10)->create();
        Item::factory(2000)->create();


        // $this->call([
        //     ItemSeeder::class,
        // ]);
    }
}
