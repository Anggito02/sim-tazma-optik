<?php

namespace App\Services\Modules\SalesMaster;

use App\DTO\Modules\SalesMasterDTOs\SalesMasterInfoDTO;
use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\SalesMasterDTOs\VerifySalesMasterDTO;

use App\Repositories\Modules\SalesMaster\VerifySalesMasterRepository;

use App\Services\Modules\BranchItem\UpdateBranchStokService;
use App\Repositories\Modules\SalesDetail\GetAllSalesDetailBranchItemRepository;
use App\Repositories\Modules\Kas\UpdateKasTotalRepository;

class VerifySalesMasterService {
    public function __construct(
        private VerifySalesMasterRepository $verifySalesMasterRepository,

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
                'branch_id' => 'required|exists:branches,id',
                'sistem_pembayaran' => 'required|string',

                'nomor_kartu' => 'required_unless:sistem_pembayaran,TUNAI',
                'nomor_referensi' => 'required_unless:sistem_pembayaran,TUNAI',

                'total_tagihan' => 'required|integer|gt:0',
            ]);

            // Update kas if sistem_pembayaran is 'TUNAI'
            if ($request->sistem_pembayaran == 'TUNAI') {
                $this->updateKasTotalRepository->updateKasTotal(
                    $request->branch_id,
                    date('Y-m-d H:i:s'),
                    $request->total_tagihan,
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

            // Get updated sales master
            $salesMasterVerifyInfo = new VerifySalesMasterDTO(
                $request->id,
                $request->sistem_pembayaran,
                $request->nomor_kartu,
                $request->nomor_referensi
            );

            $salesMaster = $this->verifySalesMasterRepository->verifySalesMaster($salesMasterVerifyInfo);

            return $salesMaster;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
