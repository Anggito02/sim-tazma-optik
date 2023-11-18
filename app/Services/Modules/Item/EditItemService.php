<?php

namespace App\Services\Modules\Item;

use App\DTO\ItemDTOs\ItemQRInfoDTO;
use Exception;
use Illuminate\Http\Request;

use App\DTO\ItemDTOs\UpdateItemDTO;

use App\Repositories\Modules\Item\EditItemRepository;
use App\Repositories\Modules\Item\GetItemRepository;
use App\Services\Modules\Item\MakeItemQRService;
use App\Repositories\Modules\Item\PriceLogProcedureRepository;
use App\Repositories\Modules\Item\StockLogProcedureRepository;
use Illuminate\Support\Facades\Storage;

class EditItemService {
    public function __construct(
        private EditItemRepository $editItemRepository,
        private GetItemRepository $getItemRepository,
        private MakeItemQRService $makeItemQRService,

        private PriceLogProcedureRepository $priceLogProcedureRepository,
        private StockLogProcedureRepository $stockLogProcedureRepository
    ) {}

    /**
     * Edit item
     * @param Request $request
     * @return Item
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
                'diskon' => 'required',

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
                // BRAND //
                'brand_id' => 'required|exists:brands,id',

                // FRAME //
                'frame_frame_category_id' => 'required_if:jenis_item,frame|exists:frame_categories,id|nullable',
                'frame_vendor_id' => 'required_if:jenis_item,frame|exists:vendors,id|nullable',
                'frame_color_id' => 'required_if:jenis_item,frame|exists:colors,id|nullable',

                // LENS //
                'lensa_lens_category_id' => 'required_if:jenis_item,lensa|exists:lens_categories,id|nullable',
                'lensa_index_id' => 'required_if:jenis_item,lensa|exists:indices,id|nullable',
            ]);

            $itemDTO = $this->getItemRepository->getItem($request->id);

            // cek jika harga_beli / harga_jual berubah
            if ((int)$itemDTO->getHargaBeli() != $request->harga_beli) {
                $this->priceLogProcedureRepository->priceLogProcedure(
                    'harga_beli',
                    date('Y-m-d H:i:s'),
                    $itemDTO->getHargaBeli(),
                    $request->harga_beli,
                    'manual',
                    $request->id,
                    null
                );
            }

            if ((int)$itemDTO->getHargaJual() != $request->harga_jual) {
                $this->priceLogProcedureRepository->priceLogProcedure(
                    'harga_jual',
                    date('Y-m-d H:i:s'),
                    $itemDTO->getHargaJual(),
                    $request->harga_jual,
                    'manual',
                    $request->id,
                    null
                );
            }

            // cek jika stok berubah
            if ((int)$itemDTO->getStok() != $request->stok) {
                $bentuk_perubahan = (int)$itemDTO->getStok() > $request->stok ? 'pengurangan' : 'penambahan';
                $this->stockLogProcedureRepository->stockLogProcedure(
                    date('Y-m-d H:i:s'),
                    $itemDTO->getStok(),
                    $itemDTO->getStok() + $request->stok,
                    $request->stok,
                    $bentuk_perubahan,
                    $request->id,
                    null,
                    null
                );
            }

            // Auto naming kode_item
            $kode_item = "";
            if ($request->jenis_item == 'frame') {
                $kode_item = $request->nama_brand_item.'-'.$request->frame_sku_vendor.'-';

                $kode_warna = explode(" ", $request->warna_item);
                foreach ($kode_warna as $warna) {
                    $kode_item .= substr($warna, 0, 3);
                }
            }

            if ($request->jenis_item == 'lensa') {
                $kode_item = $request->nama_brand_item.'-'.$request->lensa_jenis_produk.'-'.$request->index_lensa.'-'.$request->lensa_jenis_lensa;
            }

            if ($request->jenis_item == 'aksesoris') {
                $kode_item = $request->aksesoris_nama_item.'-'.$request->nama_brand_item.'-'.$request->aksesoris_kategori;
            }

            // delete qr code lama
            if ($itemDTO->getQrPath() != null) {
                Storage::delete($itemDTO->getQrPath());
            }

            // generate qr code baru
            $newQrPath = $this->makeItemQRService->makeItemQR(new ItemQRInfoDTO(
                $request->id,
                $kode_item,
                $request->harga_jual,
                $request->diskon
            ));

            $itemDto = new UpdateItemDTO(
                $request->id,
                $kode_item,
                $request->deskripsi,
                $request->stok,
                $request->harga_beli,
                $request->harga_jual,
                $request->diskon,
                $newQrPath,

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
                // BRAND //
                $request->brand_id,
                // FRAME //
                $request->frame_frame_category_id,
                $request->frame_vendor_id,
                $request->frame_color_id,

                // LENS //
                $request->lensa_lens_category_id,
                $request->lensa_index_id,
            );

            return $this->editItemRepository->editItem($itemDto);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
