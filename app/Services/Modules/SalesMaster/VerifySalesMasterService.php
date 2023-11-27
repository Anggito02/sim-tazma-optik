<?php

namespace App\Services\Modules\SalesMaster;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\SalesMaster\VerifySalesMasterRepository;

use App\Services\Modules\BranchItem\UpdateBranchStokService;
use App\Repositories\Modules\SalesDetail\GetAllSalesDetailBranchItemRepository;

class VerifySalesMasterService {
    public function __construct(
        private VerifySalesMasterRepository $verifySalesMasterRepository,

        private UpdateBranchStokService $updateBranchStokService,
        private GetAllSalesDetailBranchItemRepository $getAllSalesDetailRepository,
    )
    {}

    /**
     * Verify Sales Master
     * @param Request $request
     * @return SalesMaster
     */
    public function verifySalesMaster(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:sales_masters,id',
            ]);

            // Get all sales detail
            $salesDetails = $this->getAllSalesDetailRepository->getAllSalesDetailBranchItem($request->id);

            // Update branch stok
            foreach ($salesDetails as $salesDetail) {
                $this->updateBranchStokService->updateBranchStok(new Request([
                    'item_id' => $salesDetail->getItemId(),
                    'branch_id' => $salesDetail->getBranchId(),
                    'jumlah_perubahan' => $salesDetail->getQty(),
                    'jenis_perubahan' => 'pengurangan',
                ]));
            }

            $salesMaster = $this->verifySalesMasterRepository->verifySalesMaster($request->id);

            return $salesMaster;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
