<?php

namespace App\Services\Modules\SalesMaster;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\SalesMasterDTOs\UpdateSalesMasterDTO;

use App\Repositories\Modules\SalesMaster\CheckSalesMasterVerifiedRepository;
use App\Repositories\Modules\SalesMaster\GetSalesMasterByIdRepository;
use App\Repositories\Modules\SalesMaster\UpdateSalesMasterRepository;
use App\Repositories\Modules\SalesMaster\UpdateTotalHargaProcedureRepository;

use App\Services\Modules\BranchItem\UpdateBranchStokService;
use App\Repositories\Modules\SalesDetail\GetAllSalesDetailBranchItemRepository;
use App\Repositories\Modules\Kas\UpdateKasTotalRepository;

use App\Repositories\Customer\UpdateCustomerDeleteableRepository;

class UpdateSalesMasterService {
    public function __construct(
        private CheckSalesMasterVerifiedRepository $checkSalesMasterVerifiedRepository,
        private GetSalesMasterByIdRepository $getSalesMasterByIdRepository,
        private UpdateSalesMasterRepository $updateSalesMasterRepository,
        private UpdateTotalHargaProcedureRepository $updateTotalHargaProcedureRepository,

        private UpdateBranchStokService $updateBranchStokService,
        private GetAllSalesDetailBranchItemRepository $getAllSalesDetailRepository,
        private UpdateKasTotalRepository $updateKasTotalRepository,
        private UpdateCustomerDeleteableRepository $updateCustomerDeleteableRepository
    )
    {}

    /**
     * Update Sales Master
     * @param Request $request
     * @return SalesMaster
     */
    public function updateSalesMaster(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|integer',
                'ref_sales_id' => 'required|integer',
                'sistem_pembayaran' => 'required|string',
                'nomor_kartu' => 'required_unless:sistem_pembayaran,TUNAI',
                'nomor_referensi' => 'required_unless:sistem_pembayaran,TUNAI',
                'dp' => 'required|integer',
                'potongan_manual' => 'integer|min:0',
                'branch_id' => 'required|exists:branches,id',
                'employee_id' => 'required|exists:users,id',
                'customer_id' => 'nullable|exists:customers,id',
            ]);

            $status = $request->dp == 100 ? "Lunas" : "DP";

            if ($request->ref_sales_id != 0 && $request->sistem_pembayaran == "TUNAI") {
                // logic pelunasan
                $salesMasterRef = $this->getSalesMasterByIdRepository->getSalesMaster($request->ref_sales_id);

                $dp = $salesMasterRef->getDp();
                $sisa_tagihan = $salesMasterRef->getTotalTagihan() * (100 - $dp) / 100;

                // Update total_tagihan
                $this->updateTotalHargaProcedureRepository->updateTotalHargaProcedure($request->id, $sisa_tagihan, "penambahan");
            }

            if ($request->customer_id) {
                $this->updateCustomerDeleteableRepository->updateCustomerDeleteable($request->customer_id, FALSE);
            }

            $updateSalesMasterDTO = new UpdateSalesMasterDTO(
                $request->id,
                $request->ref_sales_id,
                $request->sistem_pembayaran,
                $request->nomor_kartu,
                $request->nomor_referensi,
                $request->dp,
                $request->potongan_manual,
                $status,
                $request->branch_id,
                $request->employee_id,
                $request->customer_id,
            );

            $salesMasterDTO = $this->updateSalesMasterRepository->updateSalesMaster($updateSalesMasterDTO);

            return $salesMasterDTO;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
