<?php

namespace App\Repositories\Modules\Kas;

use Exception;
use Illuminate\Support\Facades\DB;

class UpdateKasTotalRepository {
    /**
     * Update Kas Total
     * @param int $branch_id
     * @param string $tanggal_buka_kas
     * @param int $total_perubahan
     * @return Kas
     */
    public function updateKasTotal(int $branch_id, string $tanggal_buka_kas, int $total_perubahan) {
        try {
            $updateKasTotal = DB::statement('
                UPDATE kas
                SET
                    kas_akhir_harian = kas_akhir_harian + ' . $total_perubahan . '
                WHERE
                    branch_id =' . $branch_id . '
                    AND CAST(tanggal_buka_kas AS DATE) = CAST("' . $tanggal_buka_kas . '" AS DATE)
                ORDER BY tanggal_buka_kas DESC
                LIMIT 1
            ');

            if (!$updateKasTotal) return false;

            return true;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
