<?php

namespace App\Services\Modules\Item;

use Exception;
use Illuminate\Http\Request;

use App\DTO\ItemDTOs\ItemDTO;
use App\DTO\ItemDTOs\ItemFilterDTO;

use App\Repositories\Modules\Item\GetItemFilteredRepository;

class GetItemFilteredService {
    public function __construct(
        private GetItemFilteredRepository $itemRepository
    ) {}

    /**
     * Get item
     * @param Request $request
     * @return ItemDTO
     */
    public function getItem(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required|gte:0',
                'limit' => 'required|gte:0',
                'kode_item' => 'nullable',
                'harga_beli_from' => 'gte:0',
                'harga_beli_until' => 'gte:0',
                'harga_jual_from' => 'gte:0',
                'harga_jual_until' => 'gte:0',
                'diskon_from' => 'gte:0',
                'diskon_until' => 'gte:0',

                'frame_sku_vendor' => 'nullable',
                'frame_sub_kategori' => 'nullable',
                'frame_kode' => 'nullable',

                'lensa_jenis_produk' => 'nullable',
                'lensa_jenis_lensa' => 'nullable',

                'aksesoris_nama_item' => 'nullable',
                'aksesoris_kategori' => 'nullable',
            ]);

            $itemFilterDTO = new ItemFilterDTO(
                $request->page,
                $request->limit,
                $request->kode_item,
                $request->harga_beli_from ? $request->harga_beli_from : 0,
                $request->harga_beli_until ? $request->harga_beli_until : 99999999999,
                $request->harga_jual_from ? $request->harga_jual_from : 0,
                $request->harga_jual_until ? $request->harga_jual_until : 99999999999,
                $request->diskon_from ? $request->diskon_from : 0,
                $request->diskon_until ? $request->diskon_until : 100,
                $request->frame_sku_vendor ,
                $request->frame_sub_kategori,
                $request->frame_kode,
                $request->lensa_jenis_produk,
                $request->lensa_jenis_lensa,
                $request->aksesoris_nama_item,
                $request->aksesoris_kategori
            );

            $itemDTO = $this->itemRepository->getItemFiltered($itemFilterDTO);

            return $itemDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
