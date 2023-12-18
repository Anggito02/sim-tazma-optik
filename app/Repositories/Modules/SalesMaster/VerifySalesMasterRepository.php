<?php

namespace App\Repositories\Modules\SalesMaster;

use Exception;

use App\DTO\Modules\SalesMasterDTOs\VerifySalesMasterDTO;

use App\Models\Modules\SalesMaster;

class VerifySalesMasterRepository {
    /**
     * Verify Sales Master
     * @param VerifySalesMasterDTO $salesMasterDTO
     *
     * @return SalesMaster
     */
    public function verifySalesMaster(VerifySalesMasterDTO $salesMasterDTO) {
        try {
            $salesMaster = SalesMaster::find($salesMasterDTO->getId());

            $salesMaster->sistem_pembayaran = $salesMasterDTO->getSistemPembayaran();
            $salesMaster->nomor_kartu = $salesMasterDTO->getNomorKartu();
            $salesMaster->nomor_referensi = $salesMasterDTO->getNomorReferensi();

            $salesMaster->verified = true;

            $salesMaster->save();

            return $salesMaster;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
