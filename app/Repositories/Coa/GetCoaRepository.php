<?php

namespace App\Repositories\Coa;

use Exception;

use App\DTO\CoaDTO;
use App\Models\Coa;

class GetCoaRepository {
    /**
     * Get coa
     * @param CoaDTO $coaDTO
     * @return CoaDTO
     */
    public function getCoa(int $id) {
        try {
            $coa = Coa::find($id);

            $coaDTO = new CoaDTO(
                $coa->id,
                $coa->kode_coa,
                $coa->deskripsi,
                $coa->kategori,
            );

            return $coaDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
