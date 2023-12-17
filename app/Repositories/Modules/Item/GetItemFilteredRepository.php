<?php

namespace App\Repositories\Modules\Item;

use Exception;

use App\DTO\ItemDTOs\ItemInfoDTO;
use App\DTO\ItemDTOs\ItemFilterDTO;

use App\Models\Modules\Item;

class GetItemFilteredRepository {
    /**
     * Get item filtered
     * @param string ItemFilterDTO $itemFilterDTO
     * @return ItemInfoDTO[]
     */
    public function getItemFiltered(ItemFilterDTO $itemFilterDTO) {
        try {
            // Check if filter is active
            $activeFilter = [];

            $jenis_item_sql = $itemFilterDTO->jenis_item ? "jenis_item LIKE '%$itemFilterDTO->jenis_item%'" : null;
            array_push($activeFilter, $jenis_item_sql);

            $kode_item_sql = $itemFilterDTO->kode_item ? "kode_item LIKE '%$itemFilterDTO->kode_item%'" : null;
            array_push($activeFilter, $kode_item_sql);

            $harga_beli_sql = null;
            if (!$itemFilterDTO->harga_beli_until) {
                $harga_beli_sql = "harga_beli >= $itemFilterDTO->harga_beli_from";
            } elseif ($itemFilterDTO->harga_beli_until) {
                $harga_beli_sql = "harga_beli BETWEEN $itemFilterDTO->harga_beli_from AND $itemFilterDTO->harga_beli_until";
            }
            array_push($activeFilter, $harga_beli_sql);

            $harga_jual_sql = null;
            if ($itemFilterDTO->harga_jual_from && !$itemFilterDTO->harga_jual_until) {
                $harga_jual_sql = "harga_jual >= $itemFilterDTO->harga_jual_from";
            } elseif ($itemFilterDTO->harga_jual_until) {
                $harga_jual_sql = "harga_jual BETWEEN $itemFilterDTO->harga_jual_from AND $itemFilterDTO->harga_jual_until";
            }
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

            $vendor_id = $itemFilterDTO->vendor_id ? "vendor_id = $itemFilterDTO->vendor_id" : null;
            array_push($activeFilter, $vendor_id);

            $brand_id = $itemFilterDTO->brand_id ? "brand_id = $itemFilterDTO->brand_id" : null;
            array_push($activeFilter, $brand_id);

            $category_id = $itemFilterDTO->category_id ? "category_id = $itemFilterDTO->category_id" : null;
            array_push($activeFilter, $category_id);

            $activeFilter = array_filter($activeFilter, function ($filter) {
                return $filter !== null;
            });

            $activeFilter = implode(' AND ', $activeFilter);

            // Get item filtered
            $items = Item::whereRaw($activeFilter)
                ->join('brands', 'items.brand_id', '=', 'brands.id')
                ->join('vendors', 'items.vendor_id', '=', 'vendors.id')
                ->join('categories', 'items.category_id', '=', 'categories.id')
                ->leftJoin('colors', 'items.frame_color_id', '=', 'colors.id')
                ->leftJoin('indices', 'items.lensa_index_id', '=', 'indices.id')
                ->select(
                    'items.*',
                    'brands.nama_brand',
                    'vendors.nama_vendor',
                    'categories.nama_kategori',
                    'colors.color_name',
                    'indices.value',
                )
                ->orderBy('items.id', 'asc')
                ->paginate($itemFilterDTO->limit, ['*'], 'page', $itemFilterDTO->page);

            // use pagination
            $itemDTOs = [];

            foreach ($items as $item) {
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

                    // Foreign Keys
                    // BRAND //
                    $item->brand_id,
                    $item->nama_brand,

                    // VENDOR //
                    $item->vendor_id,
                    $item->nama_vendor,

                    // CATEGORY //
                    $item->category_id,
                    $item->nama_kategori,

                    // FRAME //
                    $item->frame_color_id,
                    $item->color_name,

                    // LENS //
                    $item->lensa_index_id,
                    $item->value,
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
