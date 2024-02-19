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
use App\Repositories\Modules\BranchItem\BranchStockOut\CheckBranchStockOutRepository;
use App\Repositories\Modules\BranchItem\BranchStockOut\AddBranchStockOutProcedureRepository;
use App\Repositories\Modules\BranchItem\BranchStockOut\UpdateBranchStockOutProcedureRepository;


use App\Repositories\Modules\BranchItem\BranchItemStockLogProcedureRepository;

class UpdateBranchStokService {
    public function __construct(
        private UpdateBranchStokRepository $branchItemRepository,

        private GetItemRepository $getItemRepository,
        private GetBranchItemRepository $getBranchItemRepository,

        private CheckBranchStockInRepository $checkBranchStockInRepository,
        private AddBranchStockInProcedureRepository $addBranchStockInProcedureRepository,
        private UpdateBranchStockInProcedureRepository $updateBranchStockInProcedureRepository,
        private CheckBranchStockOutRepository $checkBranchStockOutRepository,
        private AddBranchStockOutProcedureRepository $addBranchStockOutProcedureRepository,
        private UpdateBranchStockOutProcedureRepository $updateBranchStockOutProcedureRepository,

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

            $jumlah_perubahan = abs($request->jumlah_perubahan);

            $updateStokBranchDTO = new UpdateStokBranchDTO(
                $request->branch_id,
                $request->item_id,
                $jumlah_perubahan,
            );

            // Get item
            $itemDTO = $this->getItemRepository->getItem($request->item_id);

            // Get branch item
            $branchItemDTO = $this->getBranchItemRepository->getBranchItem($request->branch_id, $request->item_id);

            // Add/Update Branch Stock In
            // if branch stock in exist
            if ($request->jenis_perubahan == 'penambahan') {
                if ($this->checkBranchStockInRepository->checkBranchStockIn($request->item_id, $request->branch_id, $branchItemDTO->getId(),  date('m'), date('Y'))) {
                    // update branch stok in
                    $this->updateBranchStockInProcedureRepository->updateBranchStockInProcedure(
                        $itemDTO->getKodeItem(),
                        date('m'),
                        date('Y'),
                        $jumlah_perubahan,
                        $request->item_id,
                        $request->branch_id,
                        $branchItemDTO->getId()
                    );
                } else {
                    // make new branch stok in
                    $this->addBranchStockInProcedureRepository->addBranchStockInProcedure(
                        $itemDTO->getKodeItem(),
                        date('m'),
                        date('Y'),
                        $jumlah_perubahan,
                        $request->item_id,
                        $request->branch_id,
                        $branchItemDTO->getId()
                    );
                }
            }
            else if ($request->jenis_perubahan == 'pengurangan') {
                if ($this->checkBranchStockOutRepository->checkBranchStockOut($request->item_id, $request->branch_id, $branchItemDTO->getId(), date('m'), date('Y'))) {
                    // update branch stok out
                    $this->updateBranchStockOutProcedureRepository->updateBranchStockOutProcedure(
                        $itemDTO->getKodeItem(),
                        date('m'),
                        date('Y'),
                        $jumlah_perubahan,
                        $request->item_id,
                        $request->branch_id,
                        $branchItemDTO->getId()
                    );
                } else {
                    // make new branch stok out
                    $this->addBranchStockOutProcedureRepository->addBranchStockOutProcedure(
                        $itemDTO->getKodeItem(),
                        date('m'),
                        date('Y'),
                        $jumlah_perubahan,
                        $request->item_id,
                        $request->branch_id,
                        $branchItemDTO->getId()
                    );
                }
            }

            // Add branch item stock log
            if ($request->jenis_perubahan == 'penambahan') {
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
            } else if ($request->jenis_perubahan == 'pengurangan') {
                // Add branch item stock log
                $this->branchItemStockLogProcedure->branchItemStockLogProcedure(
                    date('Y-m-d H:i:s'),
                    $branchItemDTO->getStokBranch(),
                    $branchItemDTO->getStokBranch() - $jumlah_perubahan,
                    $jumlah_perubahan,
                    'pengurangan',
                    false,
                    $branchItemDTO->getId()
                );
            }

            // Update Branch Item
            if ($request->jenis_perubahan == 'penambahan')
                $updateStokBranchDTO->setStokBerubah($jumlah_perubahan);
            else if ($request->jenis_perubahan == 'pengurangan')
                $updateStokBranchDTO->setStokBerubah(-$jumlah_perubahan);

            $branchItemDTO = $this->branchItemRepository->updateBranchStok($updateStokBranchDTO);

            return $branchItemDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
?>
