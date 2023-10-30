<?php

namespace App\Services\Modules\OutgoingDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\BranchItemDTOs\NewBranchItemDTO;
use App\DTO\Modules\BranchItemDTOs\UpdateStokBranchDTO;

use App\Repositories\Modules\OutgoingDetail\VerifyOutgoingDetailRepository;

use App\Repositories\Modules\Item\GetItemRepository;
use App\Repositories\Modules\Item\EditItemRepository;
use App\Repositories\Modules\Item\StockLogProcedureRepository;

use App\Repositories\Modules\Item\StockOut\CheckStockOutRepository;
use App\Repositories\Modules\Item\StockOut\AddStockOutProcedureRepository;
use App\Repositories\Modules\Item\StockOut\UpdateStockOutProcedureRepository;

use App\Repositories\Modules\BranchItem\BranchStockIn\CheckBranchStockInRepository;
use App\Repositories\Modules\BranchItem\BranchStockIn\AddBranchStockInProcedureRepository;
use App\Repositories\Modules\BranchItem\BranchStockIn\UpdateBranchStockInProcedureRepository;

use App\Repositories\Modules\ItemOutgoing\GetItemOutgoingRepository;

use App\Repositories\Modules\BranchItem\CheckBranchItemExistenceRepository;

use App\Repositories\Modules\BranchItem\GetBranchItemRepository;
use App\Repositories\Modules\BranchItem\AddBranchItemRepository;
use App\Repositories\Modules\BranchItem\UpdateBranchStokRepository;

use App\Repositories\Modules\BranchItem\BranchItemStockLogProcedureRepository;

class VerifyOutgoingDetailService {
    public function __construct(
        private VerifyOutgoingDetailRepository $outgoingDetailRepository,

        private GetItemRepository $getItemRepository,
        private EditItemRepository $editItemRepository,
        private StockLogProcedureRepository $stockLogProcedureRepository,
        private CheckStockOutRepository $checkStockOutRepository,
        private AddStockOutProcedureRepository $addStockOutProcedureRepository,
        private UpdateStockOutProcedureRepository $updateStockOutProcedureRepository,

        private CheckBranchStockInRepository $checkBranchStockInRepository,
        private AddBranchStockInProcedureRepository $addBranchStockInProcedureRepository,
        private UpdateBranchStockInProcedureRepository $updateBranchStockInProcedureRepository,

        private GetItemOutgoingRepository $getItemOutgoingRepository,
        private GetBranchItemRepository $getBranchItemRepository,
        private CheckBranchItemExistenceRepository $checkBranchItemExistenceRepository,
        private AddBranchItemRepository $addBranchItemRepository,
        private UpdateBranchStokRepository $updateBranchStokRepository,
        private BranchItemStockLogProcedureRepository $branchItemStockLogProcedure,
    )
    {}

    /**
     * Verify outgoing detail
     * @param Request $request
     * @return OutgoingDetailInfoDTO
     */
    public function verifyOutgoingDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:outgoing_details,id',
                'delivered_qty' => 'required|numeric|min:1',
                'item_id' => 'required|exists:items,id',
                'outgoing_id' => 'required|exists:item_outgoings,id',
            ]);

            // Get Item
            $itemDTO = $this->getItemRepository->getItem($request->item_id);

            $stok_sebelum = $itemDTO->stok;
            $stok_sesudah = $itemDTO->stok - $request->delivered_qty;

            // Update item stock
            $itemDTO->stok = $stok_sesudah;
            $itemDTO = $this->editItemRepository->editItem($itemDTO);

            // Add Stock Log
            $this->stockLogProcedureRepository->stockLogProcedure(
                date('Y-m-d H:i:s'),
                $stok_sebelum,
                $stok_sesudah,
                'pengurangan',
                $request->item_id,
                null,
                $request->outgoing_id
            );

            // Add Global Stock Out Log
            if ($this->checkStockOutRepository->checkStockOutExistence($request->item_id, date('m'), date('Y'))) {
                // update stok out
                $this->updateStockOutProcedureRepository->updateStockOutProcedure(
                    $itemDTO->kode_item,
                    date('m'),
                    date('Y'),
                    $request->delivered_qty,
                    $request->item_id
                );
            } else {
                // make new stok out
                $this->addStockOutProcedureRepository->addStockOutProcedure(
                    $itemDTO->kode_item,
                    date('m'),
                    date('Y'),
                    $request->delivered_qty,
                    $request->item_id
                );
            }

            // Add/Update Branch Stock In
            if ($this->checkBranchStockInRepository->checkBranchStockIn($request->item_id, date('m'), date('Y'))) {
                // update branch stok in
                $this->updateBranchStockInProcedureRepository->updateBranchStockInProcedure(
                    $itemDTO->kode_item,
                    date('m'),
                    date('Y'),
                    $request->delivered_qty,
                    $request->item_id
                );
            } else {
                // make new branch stok in
                $this->addBranchStockInProcedureRepository->addBranchStockInProcedure(
                    $itemDTO->kode_item,
                    date('m'),
                    date('Y'),
                    $request->delivered_qty,
                    $request->item_id
                );
            }

            // Add branch item
            // Get branch id from outgoing id
            $outgoingDTO = $this->getItemOutgoingRepository->getItemOutgoing($request->outgoing_id);
            $branch_id = $outgoingDTO->branch_id;

            // Check branch item existence
            $branchItemExistence = $this->checkBranchItemExistenceRepository->checkBranchItemExistence($branch_id, $request->item_id);

            if ($branchItemExistence) {
                // Update branch item
                $this->updateBranchStokRepository->updateBranchStok(new UpdateStokBranchDTO(
                    $branch_id,
                    $request->item_id,
                    $request->delivered_qty
                ));
            } else {
                // Add branch item
                $branchItem = $this->addBranchItemRepository->addBranchItem(new NewBranchItemDTO(
                    $request->item_id,
                    $branch_id,
                ));

                // Update branch item
                $this->updateBranchStokRepository->updateBranchStok(new UpdateStokBranchDTO(
                    $branch_id,
                    $request->item_id,
                    $request->delivered_qty
                ));
            }

            // Get branch item
            $branchItemDTO = $this->getBranchItemRepository->getBranchItem(date('m'), date('Y'));

            // Add branch item stock log
            $this->branchItemStockLogProcedure->branchItemStockLogProcedure(
                date('Y-m-d H:i:s'),
                $branchItemDTO->getStokBranch(),
                $branchItemDTO->getStokBranch() + $request->delivery_gty,
                $branchItemDTO->getStokBranch() + $request->delivery_gty - $branchItemDTO->getStokBranch(),
                'penambahan',
                false,
                $branchItemDTO->getId()
            );

            $outgoingDetailDTO = $this->outgoingDetailRepository->verifyOutgoingDetail($request->id);

            return $outgoingDetailDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
