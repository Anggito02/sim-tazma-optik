<?php

namespace Database\Factories\Modules;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'jenis_item' => $this->faker->randomElement(['Frame', 'Lensa', 'Aksesoris']),
            'kode_item' => $this->faker->unique()->regexify('[A-Z]{3}'),
            'deskripsi' => $this->faker->sentence(),

            // Frame
            'frame_sku_vendor' => $this->faker->unique()->regexify('[A-Z]{3}'),
            'frame_sub_kategori' => $this->faker->randomElement(['Low', 'Mid', 'High']),
            'frame_kode' => $this->faker->unique()->regexify('[A-Z]{3}'),
            'frame_harga_beli' => $this->faker->numberBetween(100000, 1000000),
            'frame_harga_jual' => $this->faker->numberBetween(100000, 1000000),

            // Lens
            'lensa_jenis_produk' => $this->faker->randomElement(['LIGHT D CLEAR', 'LIGHT D BLUEGARD', 'LIGHT D PHOTOFUSION', 'LIGHT 3D CLEAR', 'LIGHT 3D BLUEGARD', 'LIGHT 3D PHOTOFUSION', 'LIGHT 3Dve CLEAR', 'LIGHT 3Dve BLUEGARD', 'LIGHT 3Dve PHOTOFUSION', 'LIGHT 3Dv CLEAR', 'LIGHT 3Dv BLUEGARD', 'LIGHT 3Dv PHOTOFUSION']),
            'lensa_kategori_lensa' => $this->faker->randomElement(['High', 'Mid', 'Low']),
            'lensa_harga_beli' => $this->faker->numberBetween(100000, 1000000),

            // Accessory
            'aksesoris_nama_item' => $this->faker->sentence(),
            'aksesoris_kategori' => $this->faker->randomElement(['High', 'Mid', 'Low']),
            'aksesoris_harga_beli' => $this->faker->numberBetween(100000, 1000000),
            'aksesoris_harga_jual' => $this->faker->numberBetween(100000, 1000000),

            // Foreign Keys
            // FRAME //
            'frame_frame_category_id' => $this->faker->numberBetween(1, 3),
            'frame_brand_id' => $this->faker->numberBetween(1, 8),
            'frame_vendor_id' => $this->faker->numberBetween(1, 35),
            'frame_color_id' => $this->faker->numberBetween(1, 30),

            // LENS //
            'lensa_lens_category_id' => $this->faker->numberBetween(1, 3),
            'lensa_brand_id' => $this->faker->numberBetween(1, 8),
            'lensa_index_id' => $this->faker->numberBetween(1, 3),

            // ACCESSORY //
            'aksesoris_brand_id' => $this->faker->numberBetween(1, 8),
        ];
    }
}
