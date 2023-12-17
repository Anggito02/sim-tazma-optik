<?php

namespace App\Repositories\KabKota;

use Exception;
use Illuminate\Support\Facades\DB;

class GetAllKabKotaRepository {
    /**
     * Get all kabkota
     * @param int $page
     * @param int $limit
     * @return KabKota[]
     */
    public function getAllKabKota(int $page, int $limit) {
        try {
            $kabKotaData = DB::select("
                SELECT *
                FROM
                    ref_kabkota
                LIMIT $page, $limit
            ");

            return $kabKotaData;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}

?>
