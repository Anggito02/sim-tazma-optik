<?php

namespace App\Repositories\Modules\Kas;

use Exception;

use App\DTO\Modules\KasDTOs\NewKasDTO;
use App\Models\Modules\Kas;

class AddNewDailyKasRepository {
    /**
     * Add New Daily Kas
     * @param NewKasDTO $newKasDTO
     * @return Kas
     */
    public function addNewDailyKas(NewKasDTO $newKasDTO) {
        try {
            $newKas = new Kas();
            $newKas->tanggal_buka_kas = $newKasDTO->getTanggalBukaKas();
            $newKas->modal_tambahan_harian = $newKasDTO->getModalTambahanHarian();
            $newKas->kas_awal_harian = $newKasDTO->getKasAwalHarian();
            $newKas->branch_id = $newKasDTO->getBranchId();
            $newKas->employee_id = $newKasDTO->getEmployeeId();
            $newKas->save();

            return $newKas;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
