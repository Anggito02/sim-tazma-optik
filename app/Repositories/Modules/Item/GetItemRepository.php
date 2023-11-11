<?php

namespace App\Repositories\Modules\Item;

use Exception;

use App\DTO\ItemDTOs\ItemDTO;
use App\Models\Modules\Item;

class GetItemRepository {
    /**
     * Get item
     * @param int $id
     * @return ItemDTO
     */
    public function getItem(int $id) {
        try {
            $item = Item::find($id);

            $itemDTO = new ItemDTO(
                $item->id,
                $item->jenis_item,
                $item->kode_item,
                $item->deskripsi,
                $item->stok,
                $item->harga_beli,
                $item->harga_jual,
                $item->diskon,
                $item->frame_sku_vendor,
                $item->frame_sub_kategori,
                $item->frame_kode,
                $item->lensa_jenis_produk,
                $item->lensa_kategori_lensa,
                $item->aksesoris_nama_item,
                $item->aksesoris_kategori,
                $item->frame_frame_category_id,
                $item->frame_brand_id,
                $item->frame_vendor_id,
                $item->frame_color_id,
                $item->lensa_lens_category_id,
                $item->lensa_brand_id,
                $item->lensa_index_id,
                $item->aksesoris_brand_id,
                $item->created_at,
                $item->updated_at
            );

            return $itemDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
