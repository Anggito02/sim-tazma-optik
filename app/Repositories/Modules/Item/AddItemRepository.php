<?php

namespace App\Repositories\Modules\Item;

use Exception;

use App\DTO\ItemDTOs\NewItemDTO;
use App\DTO\ItemDTOs\ItemQRInfoDTO;

use App\Models\Modules\Item;
use App\Services\Modules\Item\MakeItemQRService;

class AddItemRepository {
    public function __construct(
        private MakeItemQRService $makeItemQRService
    )
    {}

    /**
     * Add item
     * @param NewItemDTO $itemDTO
     * @return Item
     */
    public function addItem(NewItemDTO $itemDTO) {
        try {
            $newItem = new Item();
            $newItem->jenis_item = $itemDTO->getJenisItem();
            $newItem->kode_item = $itemDTO->getKodeItem();
            $newItem->deskripsi = $itemDTO->getDeskripsi();

            // Frame
            $newItem->frame_sub_kategori = $itemDTO->getFrameSubKategori();
            $newItem->frame_kode = $itemDTO->getFrameKode();

            // Lens
            $newItem->lensa_jenis_produk = $itemDTO->getLensaJenisProduk();
            $newItem->lensa_jenis_lensa = $itemDTO->getLensaJenisLensa();

            // Accessory
            $newItem->aksesoris_nama_item = $itemDTO->getAksesorisNamaItem();
            $newItem->aksesoris_kategori = $itemDTO->getAksesorisKategori();

            // Foreign Keys
            $newItem->brand_id = $itemDTO->getBrandId();

            $newItem->vendor_id = $itemDTO->getVendorId();

            $newItem->frame_frame_category_id = $itemDTO->getFrameFrameCategoryId();
            $newItem->frame_color_id = $itemDTO->getFrameColorId();

            $newItem->lensa_lens_category_id = $itemDTO->getLensaLensCategoryId();
            $newItem->lensa_index_id = $itemDTO->getLensaIndexId();

            $newItem->save();

            // Generate QR
            $newItem->qr_path = $this->makeItemQRService->makeItemQR(new ItemQRInfoDTO(
                $newItem->id,
                $newItem->kode_item,
                0,
                0,
            ));

            $newItem->save();

            return $newItem;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
