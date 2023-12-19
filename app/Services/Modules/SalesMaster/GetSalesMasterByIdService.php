<?php

namespace App\Services\Modules\SalesMaster;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\SalesMaster\GetSalesMasterByIdRepository;

class GetSalesMasterByIdService
{
    public function __construct(
        private GetSalesMasterByIdRepository $getSalesMasterRepository
    )
    {}

    /**
     * Get sales master by id
     *
     * @param Request $request
     * @return array
     */
    public function getSalesMaster(Request $request): array {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:sales_masters,id'
            ]);

            // Get sales master
            $salesMaster = $this->getSalesMasterRepository->getSalesMaster($request->id);

            $salesMaster = $salesMaster->toArray();

            return $salesMaster;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
