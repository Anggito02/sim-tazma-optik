<?php

namespace App\Repositories\Coa;

use Exception;

use App\DTO\CoaDTO;
use App\Models\Coa;

class EditCoaRepository {
    /**
     * Edit coa
     * @param CoaDTO $coaDTO
     * @return CoaDTO
     */
    public function editCoa(CoaDTO $coaDTO) {
        try {
            $coa = Coa::find($coaDTO->id);
            $coa->kode_coa = $coaDTO->kode_coa;
            $coa->deskripsi = $coaDTO->deskripsi;
            $coa->kategori = $coaDTO->kategori;
            $coa->save();

            return $coa;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
