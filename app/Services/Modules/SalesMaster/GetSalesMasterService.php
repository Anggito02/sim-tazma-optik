<?php

namespace App\Services\Modules\SalesMaster;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\SalesMaster\GetSalesMasterRepository;

class GetSalesMasterService
{
    public function __construct(
        private GetSalesMasterRepository $getSalesMasterRepository
    )
    {}

    /**
     * Get sales master
     *
     * @param Request $request
     * @return array
     */
    public function getSalesMaster(Request $request): array {
        try {
            // Validate request
            $request->validate([
                'nomor_transaksi' => 'required|exists:sales_masters,nomor_transaksi'
            ]);

            // Get sales master
            $salesMaster = $this->getSalesMasterRepository->getSalesMaster($request->nomor_transaksi);

            $salesMaster = $salesMaster->toArray();

            return $salesMaster;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
