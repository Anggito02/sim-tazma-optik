<?php

namespace App\Repositories\Modules\SalesMaster;

use Exception;

use App\Repositories\Modules\SalesMaster\CheckSalesMasterVerifiedRepository;

use App\DTO\Modules\SalesMasterDTOs\UpdateSalesMasterDTO;

use App\Models\Modules\SalesMaster;

class UpdateSalesMasterRepository {
    public function __construct(
        private CheckSalesMasterVerifiedRepository $checkSalesMasterVerifiedRepository
    )
    {}

    /**
     * Update Sales Master
     * @param UpdateSalesMasterDTO $updateSalesMasterDTO
     * @return SalesMaster
     */
    public function updateSalesMaster(UpdateSalesMasterDTO $updateSalesMasterDTO) {
        try {
            $salesMaster = SalesMaster::find($updateSalesMasterDTO->getId());

            $salesMaster->ref_sales_id = $updateSalesMasterDTO->getRefSalesId();
            $salesMaster->sistem_pembayaran = $updateSalesMasterDTO->getSistemPembayaran();
            $salesMaster->nomor_kartu = $updateSalesMasterDTO->getNomorKartu();
            $salesMaster->nomor_referensi = $updateSalesMasterDTO->getNomorReferensi();
            $salesMaster->dp = $updateSalesMasterDTO->getDp();
            $salesMaster->potongan_manual = $updateSalesMasterDTO->getPotonganManual();
            $salesMaster->status = $updateSalesMasterDTO->getStatus();

            $salesMaster->branch_id = $updateSalesMasterDTO->getBranchId();
            $salesMaster->employee_id = $updateSalesMasterDTO->getEmployeeId();
            $salesMaster->customer_id = $updateSalesMasterDTO->getCustomerId();

            $salesMaster->save();

            return $salesMaster;
        } catch (Exception $e) {
            throw $e;
        }
    }
}

?>
