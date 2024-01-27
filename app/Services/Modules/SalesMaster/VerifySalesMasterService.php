<?php

namespace App\Services\Modules\SalesMaster;

use App\DTO\Modules\SalesMasterDTOs\SalesMasterInfoDTO;
use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\SalesMaster\VerifySalesMasterRepository;
use App\Repositories\Modules\SalesMaster\CheckSalesMasterVerifiedRepository;
use App\Repositories\Modules\SalesMaster\GetSalesMasterByIdRepository;

use App\Services\Modules\BranchItem\UpdateBranchStokService;
use App\Repositories\Modules\SalesDetail\GetAllSalesDetailBranchItemRepository;
use App\Repositories\Modules\Kas\UpdateKasTotalRepository;

class VerifySalesMasterService {
    public function __construct(
        private VerifySalesMasterRepository $verifySalesMasterRepository,
        private CheckSalesMasterVerifiedRepository $checkSalesMasterVerifiedRepository,
        private GetSalesMasterByIdRepository $getSalesMasterByIdRepository,

        private UpdateBranchStokService $updateBranchStokService,
        private GetAllSalesDetailBranchItemRepository $getAllSalesDetailRepository,
        private UpdateKasTotalRepository $updateKasTotalRepository,
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

            // Check if verify sales master is verified
            $this->checkSalesMasterVerifiedRepository->isSalesMasterVerified($request->id);

            // Get total_tagihan
            $salesMaster = $this->getSalesMasterByIdRepository->getSalesMaster($request->id);

            $branch_id = $salesMaster->getBranchId();
            $total_tagihan = $salesMaster->getTotalTagihan();
            $dp = $salesMaster->getDp();
            $sistem_pembayaran = $salesMaster->getSistemPembayaran();

            // Update kas if sistem_pembayaran is 'TUNAI'
            if ($sistem_pembayaran == 'TUNAI') {
                $this->updateKasTotalRepository->updateKasTotal(
                    $branch_id,
                    date('Y-m-d H:i:s'),
                    $total_tagihan*$dp/100,
                );
            }

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

            // verify sales master
            $salesMaster = $this->verifySalesMasterRepository->verifySalesMaster($request->id);

            return $salesMaster;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
