<?php

namespace App\Services\Modules\StockOpnameBranchDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameBranchDetailDTOs\AdjustInfoSOBranchDetailDTO;

use App\Services\Modules\BranchItem\UpdateBranchStokService;

class AdjustInSOBranchDetailService {
    public function __construct(
        private UpdateBranchStokService $updareBranchStokService,
    )
    {}

    /**
     * Make Adjust In Stock Opname Branch Detail
     * @param AdjustInfoSOBranchDetailDTO
     */
    public function makeAdjustmentSOBranchDetail(AdjustInfoSOBranchDetailDTO $adjustInfoSOBranchDetailDTO) {
        try {
            // Update Branch Stok
            $this->updareBranchStokService->updateBranchStok(new Request([
                'item_id' => $adjustInfoSOBranchDetailDTO->getItemId(),
                'branch_id' => $adjustInfoSOBranchDetailDTO->getBranchId(),
                'jumlah_perubahan' => $adjustInfoSOBranchDetailDTO->getInOutQty(),
                'jenis_perubahan' => 'penambahan',
            ]));

            return true;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
