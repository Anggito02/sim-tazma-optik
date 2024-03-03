<?php

namespace App\Repositories\Modules\SalesMaster;

use Exception;

use App\Models\Modules\SalesMaster;

class CheckSalesMasterVerifiedRepository {
    /**
     * Check Sales Master Verify Status
     * @param int $sales_master_id
     * @return Exception|false
     */
    public function isSalesMasterVerified(int $sales_master_id) {
        try {
            $salesMaster = SalesMaster::find($sales_master_id);

            if ($salesMaster->verified) {
                throw new Exception('Sales Master sudah diverifikasi');
            }

            return false;
        } catch (Exception $e) {
            throw $e;
        }
    }
}

?>
