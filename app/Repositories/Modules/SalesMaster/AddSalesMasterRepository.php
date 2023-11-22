<?php

namespace App\Repositories\Modules\SalesMaster;

use Exception;

use App\Models\Modules\SalesMaster;

use App\DTO\Modules\SalesMasterDTOs\NewSalesMasterDTO;

class AddSalesMasterRepository {
    /**
     * Add Sales Master
     * @param NewSalesMasterDTO $newSalesMasterDTO
     * @return int
     */
    public function addSalesMaster(NewSalesMasterDTO $newSalesMasterDTO) {
        try {
            $salesMaster = new SalesMaster();

            $salesMaster->ref_sales_id = $newSalesMasterDTO->getRefSalesId();
            $salesMaster->nomor_transaksi = $newSalesMasterDTO->getNomorTransaksi();
            $salesMaster->tanggal_transaksi = $newSalesMasterDTO->getTanggalTransaksi();
            $salesMaster->sistem_pembayaran = $newSalesMasterDTO->getSistemPembayaran();
            $salesMaster->nomor_kartu = $newSalesMasterDTO->getNomorKartu();
            $salesMaster->nomor_referensi = $newSalesMasterDTO->getNomorReferensi();
            $salesMaster->dp = $newSalesMasterDTO->getDp();
            $salesMaster->total_tagihan = $newSalesMasterDTO->getTotalTagihan();
            $salesMaster->status = $newSalesMasterDTO->getStatus();

            $salesMaster->branch_id = $newSalesMasterDTO->getBranchId();
            $salesMaster->employee_id = $newSalesMasterDTO->getEmployeeId();
            $salesMaster->customer_id = $newSalesMasterDTO->getCustomerId();

            $salesMaster->save();

            return $salesMaster;
        } catch (Exception $e) {
            throw $e;
        }
    }
}

?>
