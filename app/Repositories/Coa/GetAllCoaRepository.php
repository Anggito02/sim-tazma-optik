<?php

namespace App\Repositories\Coa;

use Exception;

use App\DTO\CoaDTO;
use App\Models\Coa;

class GetAllCoaRepository {
    /**
     * Get all coa
     * @param int $page
     * @param int $limit
     * @return CoaDTO
     */
    public function getAllCoa(int $page, int $limit) {
        try {
            // use pagination
            $coas = Coa::paginate($limit, ['*'], 'page', $page);

            $coaDTOs = [];
            foreach ($coas as $coa) {
                $coaDTO = new CoaDTO(
                    $coa->id,
                    $coa->kode_coa,
                    $coa->deskripsi,
                    $coa->kategori,
                );

                array_push($coaDTOs, $coaDTO);
            }

            return $coaDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
