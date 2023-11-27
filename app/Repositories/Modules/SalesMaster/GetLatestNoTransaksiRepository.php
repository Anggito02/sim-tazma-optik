<?php

namespace App\Repositories\Modules\SalesMaster;

use Exception;

use App\Models\Modules\SalesMaster;

class GetLatestNoTransaksiRepository {
    /**
     * Get Latest No Transaksi
     * @param int $branchId
     * @return SalesMaster
     */
    public function getLatestNoTransaksi(int $branchId) {
        try {
            $latestNoTransaksi = SalesMaster::where('branch_id', $branchId)->latest()->first();

            return $latestNoTransaksi;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
