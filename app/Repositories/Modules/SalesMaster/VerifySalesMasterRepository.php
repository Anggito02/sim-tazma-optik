<?php

namespace App\Repositories\Modules\SalesMaster;

use Exception;

use App\Models\Modules\SalesMaster;

class VerifySalesMasterRepository {
    /**
     * Verify Sales Master
     * @param int $sales_master_id
     *
     * @return SalesMaster
     */
    public function verifySalesMaster(int $sales_master_id) {
        try {
            $salesMaster = SalesMaster::find($sales_master_id);

            $salesMaster->verified = true;

            $salesMaster->save();

            return $salesMaster;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
