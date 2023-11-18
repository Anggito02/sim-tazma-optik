<?php

namespace App\Repositories\Modules\Item;

use Exception;

use App\DTO\ItemDTOs\ItemInfoDTO;
use App\Models\Modules\Item;

class GetItemRepository {
    /**
     * Get item
     * @param int $id
     * @return ItemInfoDTO
     */
    public function getItem(int $id) {
        try {
            $item = Item::find($id);

            if ($item->jenis_item == 'frame') {
                $item = $item->join('brands', 'items.brand_id', '=', 'brands.id')
                    ->join('frame_categories', 'items.frame_frame_category_id', '=', 'frame_categories.id')
                    ->join('vendors', 'items.frame_vendor_id', '=', 'vendors.id')
                    ->join('colors', 'items.frame_color_id', '=', 'colors.id')
                    ->select(
                        'items.*',
                        'brands.nama_brand',
                        'frame_categories.nama_kategori',
                        'vendors.nama_vendor',
                        'colors.color_name',
                    )
                    ->first();

            } else if ($item->jenis_item == 'lensa') {
                $item = $item->join('brands', 'items.brand_id', '=', 'brands.id')
                    ->join('lens_categories', 'items.lensa_lens_category_id', '=', 'lens_categories.id')
                    ->join('indices', 'items.lensa_index_id', '=', 'indices.id')
                    ->select(
                        'items.*',
                        'brands.nama_brand',
                        'lens_categories.nama_kategori',
                        'indices.value',
                    )
                    ->first();
            } else if ($item->jenis_item == 'aksesoris') {
                $item = $item->join('brands', 'items.brand_id', '=', 'brands.id')
                    ->select(
                        'items.*',
                        'brands.nama_brand',
                    )
                    ->first();
            }

            $itemDTO = new ItemInfoDTO(
                $item->id,
                $item->jenis_item,
                $item->kode_item,
                $item->deskripsi,
                $item->stok,
                $item->harga_beli,
                $item->harga_jual,
                $item->diskon,
                $item->qr_path,
                $item->deleteable,

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
                // BRAND //
                $item->brand_id,
                $item->nama_brand,

                // FRAME //
                $item->frame_frame_category_id,
                $item->nama_kategori,
                $item->frame_vendor_id,
                $item->nama_vendor,
                $item->frame_color_id,
                $item->color_name,

                // LENS //
                $item->lensa_lens_category_id,
                $item->nama_kategori,
                $item->lensa_index_id,
                $item->value,
            );

            $itemDTO = $itemDTO->toArray();

            return $itemDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
