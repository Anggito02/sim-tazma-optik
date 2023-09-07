<?php

namespace App\Repositories\Coa;

use Exception;

use App\DTO\CoaDTO;
use App\Models\Coa;

class DeleteCoaRepository {
    /**
     * Delete coa
     * @param CoaDTO $coaDTO
     * @return CoaDTO
     */
    public function deleteCoa(int $id) {
        try {
            $coa = Coa::find($id);
            $coa->delete();

            return $coa;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
