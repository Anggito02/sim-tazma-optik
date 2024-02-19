<?php

namespace App\Repositories\Coa;

use Exception;

use App\DTO\CoaDTO;
use App\Models\Coa;

class AddCoaRepository {
    /**
     * Add coa
     * @param CoaDTO $coaDTO
     * @return CoaDTO
     */
    public function addCoa(CoaDTO $coaDTO) {
        try {
            $newCoa = new Coa();
            $newCoa->kode_coa = $coaDTO->getKodeCoa();
            $newCoa->deskripsi = $coaDTO->getDeskripsi();
            $newCoa->kategori = $coaDTO->getKategori();
            $newCoa->save();

            return $newCoa;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
