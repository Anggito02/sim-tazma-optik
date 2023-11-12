<?php

namespace App\Repositories\Modules\Item;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Exception;

use App\DTO\ItemDTOs\ItemDTO;
use App\Models\Modules\Item;
use Illuminate\Support\Facades\Storage;

class AddItemRepository {
    /**
     * Add item
     * @param ItemDTO $itemDTO
     * @return ItemDTO
     */
    public function addItem(ItemDTO $itemDTO) {
        try {
            $newItem = new Item();
            $newItem->kode_item = $itemDTO->getKodeItem();
            $newItem->jenis_item = $itemDTO->getJenisItem();
            $newItem->deskripsi = $itemDTO->getDeskripsi();
            $newItem->stok = $itemDTO->getStok();
            $newItem->harga_beli = $itemDTO->getHargaBeli();
            $newItem->harga_jual = $itemDTO->getHargaJual();
            $newItem->diskon = $itemDTO->getDiskon();

            // Frame
            $newItem->frame_sku_vendor = $itemDTO->getFrameSkuVendor();
            $newItem->frame_sub_kategori = $itemDTO->getFrameSubKategori();
            $newItem->frame_kode = $itemDTO->getFrameKode();

            // Lens
            $newItem->lensa_jenis_produk = $itemDTO->getLensaJenisProduk();
            $newItem->lensa_jenis_lensa = $itemDTO->getLensaJenisLensa();

            // Accessory
            $newItem->aksesoris_nama_item = $itemDTO->getAksesorisNamaItem();
            $newItem->aksesoris_kategori = $itemDTO->getAksesorisKategori();

            // Foreign Keys
            $newItem->frame_frame_category_id = $itemDTO->getFrameFrameCategoryId();
            $newItem->frame_brand_id = $itemDTO->getFrameBrandId();
            $newItem->frame_vendor_id = $itemDTO->getFrameVendorId();
            $newItem->frame_color_id = $itemDTO->getFrameColorId();

            $newItem->lensa_lens_category_id = $itemDTO->getLensaLensCategoryId();
            $newItem->lensa_brand_id = $itemDTO->getLensaBrandId();
            $newItem->lensa_index_id = $itemDTO->getLensaIndexId();

            $newItem->aksesoris_brand_id = $itemDTO->getAksesorisBrandId();

            $newItem->save();

            // Json qr/barcode data
            $qrData = [
                'id' => $newItem->id,
                'kode_item' => $newItem->kode_item,
                'harga_jual' => $newItem->harga_jual,
                'diskon' => $newItem->diskon,
            ];

            $qr = QrCode::size(500)
                ->format('png')
                ->generate(json_encode($qrData));

            $qr_path = 'qr/item/' . $newItem->id . '_' . str_replace(' ', '-', $newItem->kode_item) . '.png';
            Storage::put($qr_path, $qr);

            $newItem->qr_path = $qr_path;

            $newItem->save();

            return $newItem;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
