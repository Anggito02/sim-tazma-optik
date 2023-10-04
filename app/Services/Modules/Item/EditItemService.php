<?php

namespace App\Services\Modules\Item;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ItemDTO;

use App\Repositories\Modules\Item\EditItemRepository;
use App\Repositories\Modules\Item\GetItemRepository;
use App\Repositories\Modules\Item\PriceLogProcedureRepository;
use App\Repositories\Modules\Item\StockLogProcedureRepository;

class EditItemService {
    public function __construct(
        private EditItemRepository $editItemRepository,
        private GetItemRepository $getItemRepository,

        private PriceLogProcedureRepository $priceLogProcedureRepository,
        private StockLogProcedureRepository $stockLogProcedureRepository
    ) {}

    /**
     * Edit item
     * @param Request $request
     * @return ItemDTO
     */
    public function editItem(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:items,id',
                'jenis_item' => 'required|in:frame,lensa,aksesoris',
                'deskripsi' => 'required',
                'stok' => 'required',
                'harga_beli' => 'required',
                'harga_jual' => 'required',

                // Frame
                'frame_sku_vendor' => 'required_if:jenis_item,frame|nullable',
                'frame_sub_kategori' => 'required_if:jenis_item,frame|nullable',
                'frame_kode' => 'required_if:jenis_item,frame|nullable',

                // Lens
                'lensa_jenis_produk' => 'required_if:jenis_item,lensa|nullable',
                'lensa_jenis_lensa' => 'required_if:jenis_item,lensa|nullable',

                // Accessory
                'aksesoris_nama_item' => 'required_if:jenis_item,aksesoris|nullable',
                'aksesoris_kategori' => 'required_if:jenis_item,aksesoris|nullable',

                // Foreign Keys
                // FRAME //
                'frame_frame_category_id' => 'required_if:jenis_item,frame|exists:frame_categories,id|nullable',
                'frame_brand_id' => 'required_if:jenis_item,frame|exists:brands,id|nullable',
                'frame_vendor_id' => 'required_if:jenis_item,frame|exists:vendors,id|nullable',
                'frame_color_id' => 'required_if:jenis_item,frame|exists:colors,id|nullable',

                // LENS //
                'lensa_lens_category_id' => 'required_if:jenis_item,lensa|exists:lens_categories,id|nullable',
                'lensa_brand_id' => 'required_if:jenis_item,lensa|exists:brands,id|nullable',
                'lensa_index_id' => 'required_if:jenis_item,lensa|exists:indices,id|nullable',

                // ACCESSORY //
                'aksesoris_brand_id' => 'required_if:jenis_item,aksesoris|exists:brands,id|nullable',
            ]);

            $itemDTO = $this->getItemRepository->getItem($request->id);

            // cek jika harga_beli / harga_jual berubah
            if ((int)$itemDTO->harga_beli != $request->harga_beli) {
                $this->priceLogProcedureRepository->priceLogProcedure(
                    'harga_beli',
                    date('Y-m-d H:i:s'),
                    $itemDTO->harga_beli,
                    $request->harga_beli,
                    'manual',
                    $request->id,
                    null
                );
            }

            if ((int)$itemDTO->harga_jual != $request->harga_jual) {
                $this->priceLogProcedureRepository->priceLogProcedure(
                    'harga_jual',
                    date('Y-m-d H:i:s'),
                    $itemDTO->harga_jual,
                    $request->harga_jual,
                    'manual',
                    $request->id,
                    null
                );
            }

            // cek jika stok berubah
            if ((int)$itemDTO->stok != $request->stok) {
                $bentuk_perubahan = (int)$itemDTO->stok > $request->stok ? 'pengurangan' : 'penambahan';
                $this->stockLogProcedureRepository->stockLogProcedure(
                    date('Y-m-d H:i:s'),
                    $itemDTO->stok,
                    $request->stok,
                    $bentuk_perubahan,
                    $request->id,
                    null
                );
            }

            $itemDto = new ItemDTO(
                $request->id,
                $request->jenis_item,
                null,
                $request->deskripsi,
                $request->stok,
                $request->harga_beli,
                $request->harga_jual,

                // Frame
                $request->frame_sku_vendor,
                $request->frame_sub_kategori,
                $request->frame_kode,

                // Lens
                $request->lensa_jenis_produk,
                $request->lensa_jenis_lensa,

                // Accessory
                $request->aksesoris_nama_item,
                $request->aksesoris_kategori,

                // Foreign Keys
                // FRAME //
                $request->frame_frame_category_id,
                $request->frame_brand_id,
                $request->frame_vendor_id,
                $request->frame_color_id,

                // LENS //
                $request->lensa_lens_category_id,
                $request->lensa_brand_id,
                $request->lensa_index_id,

                // ACCESSORY //
                $request->aksesoris_brand_id,
            );

            return $this->editItemRepository->editItem($itemDto);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
