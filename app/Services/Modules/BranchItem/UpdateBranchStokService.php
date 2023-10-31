<?php

namespace App\Services\Modules\BranchItem;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\BranchItemDTOs\UpdateStokBranchDTO;

use App\Repositories\Modules\BranchItem\UpdateBranchStokRepository;

use App\Repositories\Modules\Item\GetItemRepository;
use App\Repositories\Modules\BranchItem\GetBranchItemRepository;

use App\Repositories\Modules\BranchItem\BranchStockIn\CheckBranchStockInRepository;
use App\Repositories\Modules\BranchItem\BranchStockIn\AddBranchStockInProcedureRepository;
use App\Repositories\Modules\BranchItem\BranchStockIn\UpdateBranchStockInProcedureRepository;

use App\Repositories\Modules\BranchItem\BranchItemStockLogProcedureRepository;

class UpdateBranchStokService {
    public function __construct(
        private UpdateBranchStokRepository $branchItemRepository,

        private GetItemRepository $getItemRepository,
        private GetBranchItemRepository $getBranchItemRepository,

        private CheckBranchStockInRepository $checkBranchStockInRepository,
        private AddBranchStockInProcedureRepository $addBranchStockInProcedureRepository,
        private UpdateBranchStockInProcedureRepository $updateBranchStockInProcedureRepository,

        private BranchItemStockLogProcedureRepository $branchItemStockLogProcedure,

    ) {}

    /**
     * Update branch stok
     * @param Request $request
     * @return BranchItemInfoDTO
     */
    public function updateBranchStok(Request $request) {
        try {
            // Validate request
            $request->validate([
                'item_id' => 'required|exists:items,id',
                'branch_id' => 'required|exists:branches,id',
                'jumlah_perubahan' => 'required',
                'jenis_perubahan' => 'required|in:penambahan,pengurangan'
            ]);

            $jumlah_perubahan = $request->jumlah_perubahan;

            if ($request->jenis_perubahan == 'penambahan') {
                $jumlah_perubahan = abs($jumlah_perubahan);
            } else {
                $jumlah_perubahan = -abs($jumlah_perubahan);
            }

            $updateStokBranchDTO = new UpdateStokBranchDTO(
                $request->item_id,
                $request->branch_id,
                $jumlah_perubahan,
            );

            // Add/Update Branch Stock In
            // Get item
            $itemDTO = $this->getItemRepository->getItem($request->item_id);

            // if branch stock in exist
            if ($this->checkBranchStockInRepository->checkBranchStockIn($request->item_id, date('m'), date('Y'))) {
                // update branch stok in
                $this->updateBranchStockInProcedureRepository->updateBranchStockInProcedure(
                    $itemDTO->kode_item,
                    date('m'),
                    date('Y'),
                    $jumlah_perubahan,
                    $request->item_id
                );
            } else {
                // make new branch stok in
                $this->addBranchStockInProcedureRepository->addBranchStockInProcedure(
                    $itemDTO->kode_item,
                    date('m'),
                    date('Y'),
                    $jumlah_perubahan,
                    $request->item_id
                );
            }

            // Add branch item stock log
            // Get branch item
            $branchItemDTO = $this->getBranchItemRepository->getBranchItem($request->branch_id, $request->item_id);

            // Add branch item stock log
            $this->branchItemStockLogProcedure->branchItemStockLogProcedure(
                date('Y-m-d H:i:s'),
                $branchItemDTO->getStokBranch(),
                $branchItemDTO->getStokBranch() + $jumlah_perubahan,
                $jumlah_perubahan,
                'penambahan',
                false,
                $branchItemDTO->getId()
            );

            // Update Branch Item
            $branchItemDTO = $this->branchItemRepository->updateBranchStok($updateStokBranchDTO);

            return $branchItemDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
?>
