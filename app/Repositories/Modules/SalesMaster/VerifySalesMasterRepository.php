<?php

namespace App\Repositories\Modules\SalesMaster;

use Exception;

use App\Models\Modules\SalesMaster;

class VerifySalesMasterRepository {
    /**
     * Verify Sales Master
     * @param int $id
     * @return SalesMaster
     */
    public function verifySalesMaster(int $id) {
        try {
            $salesMaster = SalesMaster::find($id);

            $salesMaster->verified = true;

            $salesMaster->save();

            return $salesMaster;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
