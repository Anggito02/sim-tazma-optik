<?php

namespace App\Services\Modules\ReturDetail;

use App\DTO\ItemDTOs\UpdateItemDTO;
use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\ReturDetail\VerifyReturDetailRepository;

use App\Repositories\Modules\Item\GetItemRepository;
use App\Repositories\Modules\Item\EditItemRepository;
use App\Repositories\Modules\Item\StockLogProcedureRepository;

use App\Repositories\Modules\Item\StockOut\CheckStockOutRepository;
use App\Repositories\Modules\Item\StockOut\AddStockOutProcedureRepository;
use App\Repositories\Modules\Item\StockOut\UpdateStockOutProcedureRepository;

use App\Repositories\Modules\Retur\GetReturRepository;

use App\Repositories\Modules\BranchItem\CheckBranchItemExistenceRepository;

use App\Services\Modules\BranchItem\AddBranchItemService;
use App\Services\Modules\BranchItem\UpdateBranchStokService;

class VerifyReturDetailService {
    public function __construct(
        private VerifyReturDetailRepository $returDetailRepository,

        private GetItemRepository $getItemRepository,
        private EditItemRepository $editItemRepository,
        private StockLogProcedureRepository $stockLogProcedureRepository,
        private CheckStockOutRepository $checkStockOutRepository,
        private AddStockOutProcedureRepository $addStockOutProcedureRepository,
        private UpdateStockOutProcedureRepository $updateStockOutProcedureRepository,

        private GetReturRepository $getReturRepository,
        private CheckBranchItemExistenceRepository $checkBranchItemExistenceRepository,

        private AddBranchItemService $addBranchItemService,
        private UpdateBranchStokService $updateBranchStokService,
    )
    {}

    /**
     * Verify retur detail
     * @param Request $request
     * @return ReturDetailInfoDTO
     */
    public function verifyReturDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:retur_details,id',
                'delivered_qty' => 'required|numeric|min:1',
                'item_id' => 'required|exists:items,id',
                'retur_id' => 'required|exists:item_returs,id',
            ]);

            // Get retur
            $retur = $this->getReturRepository->getRetur($request->retur_id);
            $branch_id = $retur->getBranchId();

            // Get branch item
            $branch_item = $this->checkBranchItemExistenceRepository->checkBranchItemExistence($branch_id, $request->item_id);
            if (!$branch_item) {
                throw new Exception('Item not found in branch');
            }

            // Get Item
            $itemDTO = $this->getItemRepository->getItem($request->item_id);

            $stok_sebelum = $itemDTO->getStok();
            $stok_sesudah = $itemDTO->getStok() + $request->delivered_qty;

            // Update item stock
            $itemDTO = $this->editItemRepository->editItem(new UpdateItemDTO(
                $itemDTO->getId(),
                $itemDTO->getKodeItem(),
                $itemDTO->getDeskripsi(),
                $stok_sesudah,
                $itemDTO->getHargaBeli(),
                $itemDTO->getHargaJual(),
                $itemDTO->getDiskon(),
                $itemDTO->getQrPath(),
                $itemDTO->getFrameSkuVendor(),
                $itemDTO->getFrameSubKategori(),
                $itemDTO->getFrameKode(),
                $itemDTO->getLensaJenisProduk(),
                $itemDTO->getLensaJenisLensa(),
                $itemDTO->getAksesorisNamaItem(),
                $itemDTO->getBrandId(),
                $itemDTO->getVendorId(),
                $itemDTO->getCategoryId(),
                $itemDTO->getFrameColorId(),
                $itemDTO->getLensaIndexId(),
            ));

            // Add Global Stock Log
            $this->stockLogProcedureRepository->stockLogProcedure(
                date('Y-m-d H:i:s'),
                $stok_sebelum,
                $stok_sesudah,
                $request->delivered_qty,
                'penambahan',
                $request->item_id,
                null,
                null,
                $request->retur_id
            );

            // Add/Update Global Stock Out Log
            if ($this->checkStockOutRepository->checkStockOutExistence($request->item_id, date('m'), date('Y'))) {
                // update global stok out
                $this->updateStockOutProcedureRepository->updateStockOutProcedure(
                    $itemDTO->kode_item,
                    date('m'),
                    date('Y'),
                    $request->delivered_qty,
                    $request->item_id
                );
            } else {
                // make new global stok out
                $this->addStockOutProcedureRepository->addStockOutProcedure(
                    $itemDTO->kode_item,
                    date('m'),
                    date('Y'),
                    $request->delivered_qty,
                    $request->item_id
                );
            }

            // Update branch item
            $this->updateBranchStokService->updateBranchStok(new Request([
                'item_id' => $request->item_id,
                'branch_id' => $branch_id,
                'jumlah_perubahan' => $request->delivered_qty,
                'jenis_perubahan' => 'pengurangan'
            ]));

            $returDetailDTO = $this->returDetailRepository->verifyReturDetail($request->id);

            return $returDetailDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
