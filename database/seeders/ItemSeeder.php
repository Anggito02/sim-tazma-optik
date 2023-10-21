<?php

namespace Database\Seeders;

use App\Models\Modules\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'jenis_item' => 'frame',
            'kode_item' => 'FRM-0001',
            'deskripsi' => 'Frame 1',
            'stok' => 10,
            'harga_beli' => 100000,
            'harga_jual' => 200000,
            'frame_sku_vendor' => 'FRM-0001',
            'frame_sub_kategori' => 'low',
            'frame_kode' => 'FRM-0001',
            'frame_frame_category_id' => 1,
            'frame_brand_id' => 1,
            'frame_vendor_id' => 1,
            'frame_color_id' => 1,
        ]);

        Item::create([
            'jenis_item' => 'frame',
            'kode_item' => 'FRM-0002',
            'deskripsi' => 'Frame 2',
            'stok' => 10,
            'harga_beli' => 100000,
            'harga_jual' => 200000,
            'frame_sku_vendor' => 'FRM-0002',
            'frame_sub_kategori' => 'mid',
            'frame_kode' => 'FRM-0002',
            'frame_frame_category_id' => 2,
            'frame_brand_id' => 2,
            'frame_vendor_id' => 2,
            'frame_color_id' => 2,
        ]);

        Item::create([
            'jenis_item' => 'frame',
            'kode_item' => 'FRM-0003',
            'deskripsi' => 'Frame 3',
            'stok' => 10,
            'harga_beli' => 100000,
            'harga_jual' => 200000,
            'frame_sku_vendor' => 'FRM-0003',
            'frame_sub_kategori' => 'high',
            'frame_kode' => 'FRM-0003',
            'frame_frame_category_id' => 3,
            'frame_brand_id' => 3,
            'frame_vendor_id' => 3,
            'frame_color_id' => 3,
        ]);

        Item::create([
            'jenis_item' => 'lensa',
            'kode_item' => 'LENS-0001',
            'deskripsi' => 'Lensa 1',
            'stok' => 10,
            'harga_beli' => 100000,
            'harga_jual' => 200000,
            'lensa_jenis_produk' => 'Lensa 1',
            'lensa_jenis_lensa' => 'Lensa 1',
            'lensa_lens_category_id' => 1,
            'lensa_brand_id' => 1,
            'lensa_index_id' => 1,
        ]);

        Item::create([
            'jenis_item' => 'lensa',
            'kode_item' => 'LENS-0002',
            'deskripsi' => 'Lensa 2',
            'stok' => 10,
            'harga_beli' => 100000,
            'harga_jual' => 200000,
            'lensa_jenis_produk' => 'Lensa 2',
            'lensa_jenis_lensa' => 'Lensa 2',
            'lensa_lens_category_id' => 2,
            'lensa_brand_id' => 2,
            'lensa_index_id' => 2,
        ]);

        Item::create([
            'jenis_item' => 'lensa',
            'kode_item' => 'LENS-0003',
            'deskripsi' => 'Lensa 3',
            'stok' => 10,
            'harga_beli' => 100000,
            'harga_jual' => 200000,
            'lensa_jenis_produk' => 'Lensa 3',
            'lensa_jenis_lensa' => 'Lensa 3',
            'lensa_lens_category_id' => 3,
            'lensa_brand_id' => 3,
            'lensa_index_id' => 3,
        ]);

        Item::create([
            'jenis_item' => 'aksesoris',
            'kode_item' => 'AKS-0001',
            'deskripsi' => 'Aksesoris 1',
            'stok' => 10,
            'harga_beli' => 100000,
            'harga_jual' => 200000,
            'aksesoris_nama_item' => 'Aksesoris 1',
            'aksesoris_kategori' => 'Aksesoris 1',
            'aksesoris_brand_id' => 1,
        ]);

        Item::create([
            'jenis_item' => 'aksesoris',
            'kode_item' => 'AKS-0002',
            'deskripsi' => 'Aksesoris 2',
            'stok' => 10,
            'harga_beli' => 100000,
            'harga_jual' => 200000,
            'aksesoris_nama_item' => 'Aksesoris 2',
            'aksesoris_kategori' => 'Aksesoris 2',
            'aksesoris_brand_id' => 2,
        ]);

        Item::create([
            'jenis_item' => 'aksesoris',
            'kode_item' => 'AKS-0003',
            'deskripsi' => 'Aksesoris 3',
            'stok' => 10,
            'harga_beli' => 100000,
            'harga_jual' => 200000,
            'aksesoris_nama_item' => 'Aksesoris 3',
            'aksesoris_kategori' => 'Aksesoris 3',
            'aksesoris_brand_id' => 3,
        ]);
    }
}
