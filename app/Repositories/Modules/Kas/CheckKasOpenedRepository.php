<?php

namespace App\Repositories\Modules\Kas;

use Exception;

use Illuminate\Support\Facades\DB;

class CheckKasOpenedRepository {
    /**
     * Check Kas Opened
     * @param int $branch_id
     * @param string $tanggal_buka_kas
     * @return bool
     */
    public function checkKasOpened(int $branch_id, string $tanggal_buka_kas) {
        try {
            $kasOpened = DB::statement('
                SELECT EXISTS(
                    SELECT *
                    FROM kas
                    WHERE
                        branch_id =' . $branch_id . '
                        AND CAST(tanggal_buka_kas AS DATE) = CAST("' . $tanggal_buka_kas . '" AS DATE)
                    ORDER BY tanggal_buka_kas DESC
                    LIMIT 1
                )
            ');

            if (!$kasOpened) return false;

            return true;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
