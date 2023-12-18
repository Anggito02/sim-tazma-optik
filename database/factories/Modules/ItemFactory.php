<?php

namespace Database\Factories\Modules;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jenis_item' => $this->faker->randomElement(['frame', 'lensa', 'aksesoris']),
            'kode_item' => $this->faker->unique()->regexify('[A-Z]{3}-[0-9]{4}'),
            'deskripsi' => $this->faker->sentence(),
            'stok' => $this->faker->numberBetween(1, 100),
            'harga_beli' => $this->faker->numberBetween(100000, 1000000),
            'harga_jual' => $this->faker->numberBetween(100000, 1000000),
            'diskon' => $this->faker->numberBetween(0, 100),
            'frame_sku_vendor' => $this->faker->unique()->regexify('[A-Z]{3}-[0-9]{4}'),
            'frame_sub_kategori' => $this->faker->randomElement(['low', 'mid', 'high']),
            'frame_kode' => $this->faker->unique()->regexify('[A-Z]{3}-[0-9]{4}'),
            'frame_color_id' => $this->faker->numberBetween(1, 3),
            'lensa_jenis_produk' => $this->faker->randomElement(['lensa', 'frame']),
            'lensa_jenis_lensa' => $this->faker->randomElement(['lensa', 'frame']),
            'lensa_index_id' => $this->faker->numberBetween(1, 3),
            'aksesoris_nama_item' => $this->faker->sentence(),
            'brand_id' => $this->faker->numberBetween(1, 3),
            'vendor_id' => $this->faker->numberBetween(1, 3),
            'category_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
