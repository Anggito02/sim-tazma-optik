<?php

namespace App\Repositories\Modules\Item;

use Exception;

use App\DTO\Modules\ItemDTO;
use App\Models\Modules\Item;

class GetAllItemRepository {
    /**
     * Get all item
     * @return array ItemDTO
     */
    public function getAllItem() {
        try {
            $items = Item::all();

            $itemDTOs = [];

            foreach ($items as $item) {
                $itemDTO = new ItemDTO(
                    $item->id,
                    $item->jenis_item,
                    $item->kode_item,
                    $item->deskripsi,
                    $item->stok,
                    $item->harga_beli,
                    $item->harga_jual,
                    $item->diskon,

                    // Frame
                    $item->frame_sku_vendor,
                    $item->frame_sub_kategori,
                    $item->frame_kode,

                    // Lens
                    $item->lensa_jenis_produk,
                    $item->lensa_jenis_lensa,

                    // Accessory
                    $item->aksesoris_nama_item,
                    $item->aksesoris_kategori,

                    // Foreign Keys
                    // FRAME //
                    $item->frame_frame_category_id,
                    $item->frame_brand_id,
                    $item->frame_vendor_id,
                    $item->frame_color_id,

                    // LENS //
                    $item->lensa_lens_category_id,
                    $item->lensa_brand_id,
                    $item->lensa_index_id,

                    // ACCESSORY //
                    $item->aksesoris_brand_id,
                );

                array_push($itemDTOs, $itemDTO);
            }

            return $itemDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
