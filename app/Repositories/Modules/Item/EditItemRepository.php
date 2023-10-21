<?php

namespace App\Repositories\Modules\Item;

use Exception;

use App\DTO\Modules\ItemDTO;
use App\Models\Modules\Item;

class EditItemRepository {
    /**
     * Edit item
     * @param ItemDTO $itemDTO
     * @return ItemDTO
     */
    public function editItem(ItemDTO $itemDTO) {
        try {
            $item = Item::find($itemDTO->id);

            $item->jenis_item = $itemDTO->jenis_item;
            $item->deskripsi = $itemDTO->deskripsi;
            $item->stok = $itemDTO->stok;
            $item->harga_beli = $itemDTO->harga_beli;
            $item->harga_jual = $itemDTO->harga_jual;

            // Frame
            $item->frame_sku_vendor = $itemDTO->frame_sku_vendor;
            $item->frame_sub_kategori = $itemDTO->frame_sub_kategori;
            $item->frame_kode = $itemDTO->frame_kode;

            // Lens
            $item->lensa_jenis_produk = $itemDTO->lensa_jenis_produk;
            $item->lensa_jenis_lensa = $itemDTO->lensa_jenis_lensa;

            // Accessory
            $item->aksesoris_nama_item = $itemDTO->aksesoris_nama_item;
            $item->aksesoris_kategori = $itemDTO->aksesoris_kategori;

            // Foreign Keys
            // FRAME //
            $item->frame_frame_category_id = $itemDTO->frame_frame_category_id;
            $item->frame_brand_id = $itemDTO->frame_brand_id;
            $item->frame_vendor_id = $itemDTO->frame_vendor_id;
            $item->frame_color_id = $itemDTO->frame_color_id;

            // LENS //
            $item->lensa_lens_category_id = $itemDTO->lensa_lens_category_id;
            $item->lensa_brand_id = $itemDTO->lensa_brand_id;
            $item->lensa_index_id = $itemDTO->lensa_index_id;

            // ACCESSORY //
            $item->aksesoris_brand_id = $itemDTO->aksesoris_brand_id;

            $item->save();

            return $item;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
