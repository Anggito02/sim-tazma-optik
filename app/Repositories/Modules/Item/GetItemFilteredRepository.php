<?php

namespace App\Repositories\Modules\Item;

use Exception;

use App\DTO\ItemDTOs\ItemDTO;
use App\DTO\ItemDTOs\ItemFilterDTO;

use App\Models\Modules\Item;

class GetItemFilteredRepository {
    /**
     * Get item filtered
     * @param string ItemFilterDTO $itemFilterDTO
     * @return array ItemDTO
     */
    public function getItemFiltered(ItemFilterDTO $itemFilterDTO) {
        try {
            // Check if filter is active
            $activeFilter = [];

            $kode_item_sql = $itemFilterDTO->kode_item ? "kode_item LIKE '%$itemFilterDTO->kode_item%'" : null;
            array_push($activeFilter, $kode_item_sql);

            $harga_beli_sql = $itemFilterDTO->harga_beli_from || $itemFilterDTO->harga_beli_until ? "harga_beli BETWEEN $itemFilterDTO->harga_beli_from AND $itemFilterDTO->harga_beli_until" : null;
            array_push($activeFilter, $harga_beli_sql);

            $harga_jual_sql = $itemFilterDTO->harga_jual_from || $itemFilterDTO->harga_jual_until ? "harga_jual BETWEEN $itemFilterDTO->harga_jual_from AND $itemFilterDTO->harga_jual_until" : null;
            array_push($activeFilter, $harga_jual_sql);

            $diskon_sql = $itemFilterDTO->diskon_from || $itemFilterDTO->diskon_until ? "diskon BETWEEN $itemFilterDTO->diskon_from AND $itemFilterDTO->diskon_until" : null;
            array_push($activeFilter, $diskon_sql);

            $frame_sku_vendor_sql = $itemFilterDTO->frame_sku_vendor ? "frame_sku_vendor LIKE '%$itemFilterDTO->frame_sku_vendor%'" : null;
            array_push($activeFilter, $frame_sku_vendor_sql);

            $frame_sub_kategori_sql = $itemFilterDTO->frame_sub_kategori ? "frame_sub_kategori LIKE '%$itemFilterDTO->frame_sub_kategori%'" : null;
            array_push($activeFilter, $frame_sub_kategori_sql);

            $frame_kode_sql = $itemFilterDTO->frame_kode ? "frame_kode LIKE '%$itemFilterDTO->frame_kode%'" : null;
            array_push($activeFilter, $frame_kode_sql);

            $lensa_jenis_produk_sql = $itemFilterDTO->lensa_jenis_produk ? "lensa_jenis_produk LIKE '%$itemFilterDTO->lensa_jenis_produk%'" : null;
            array_push($activeFilter, $lensa_jenis_produk_sql);

            $lensa_jenis_lensa_sql = $itemFilterDTO->lensa_jenis_lensa ? "lensa_jenis_lensa LIKE '%$itemFilterDTO->lensa_jenis_lensa%'" : null;
            array_push($activeFilter, $lensa_jenis_lensa_sql);

            $aksesoris_nama_item_sql = $itemFilterDTO->aksesoris_nama_item ? "aksesoris_nama_item LIKE '%$itemFilterDTO->aksesoris_nama_item%'" : null;
            array_push($activeFilter, $aksesoris_nama_item_sql);

            $aksesoris_kategori_sql = $itemFilterDTO->aksesoris_kategori ? "aksesoris_kategori LIKE '%$itemFilterDTO->aksesoris_kategori%'" : null;
            array_push($activeFilter, $aksesoris_kategori_sql);

            $activeFilter = array_filter($activeFilter, function ($filter) {
                return $filter !== null;
            });

            $activeFilter = implode(' AND ', $activeFilter);

            // Get item filtered
            $items = Item::whereRaw($activeFilter)->paginate($itemFilterDTO->limit, ['*'], 'page', $itemFilterDTO->page);

            // use pagination
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
                    $item->aksesoris_brand_id
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
