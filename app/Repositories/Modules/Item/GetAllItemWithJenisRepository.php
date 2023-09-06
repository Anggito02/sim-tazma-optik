<?php

namespace App\Repositories\Modules\Item;

use Exception;

use App\DTO\Modules\ItemDTO;
use App\Models\Modules\Item;

class GetAllItemWithJenisRepository {
    /**
     * Get all item
     * @param string $jenis_item
     * @param int $page
     * @param int $limit
     * @return array ItemDTO
     */
    public function getAllItem(string $jenis_item,  int $page, int $limit) {
        try {
            // use pagination
            $items = Item::where('jenis_item', $jenis_item)->paginate($limit, ['*'], 'page', $page);

            $itemDTOs = [];

            foreach ($items as $item) {
                $itemDTO = new ItemDTO(
                    $item->id,
                    $item->jenis_item,
                    $item->kode_item,
                    $item->deskripsi,

                    // Frame
                    $item->frame_sku_vendor,
                    $item->frame_sub_kategori,
                    $item->frame_kode,
                    $item->frame_harga_beli,
                    $item->frame_harga_jual,

                    // Lens
                    $item->lensa_jenis_produk,
                    $item->lensa_kategori_lensa,
                    $item->lensa_harga_beli,

                    // Accessory
                    $item->aksesoris_nama_item,
                    $item->aksesoris_kategori,
                    $item->aksesoris_harga_beli,
                    $item->aksesoris_harga_jual,

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
