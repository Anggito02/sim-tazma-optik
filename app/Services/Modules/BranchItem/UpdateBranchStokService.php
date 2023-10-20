<?php

namespace App\Services\Modules\BranchItem;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\BranchItemDTOs\UpdateStokBranchDTO;

use App\Repositories\Modules\BranchItem\UpdateBranchStokRepository;

class UpdateBranchStokService {
    public function __construct(
        private UpdateBranchStokRepository $branchItemRepository
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

            $branchItemDTO = $this->branchItemRepository->updateBranchStok($updateStokBranchDTO);

            return $branchItemDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
?>
