<?php

namespace App\Services\Modules\SalesMaster;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\SalesMaster\GetAllSalesMasterKasInRepository;

class GetAllSalesMasterKasInService
{
    public function __construct(
        private GetAllSalesMasterKasInRepository $getSalesMasterRepository
    )
    {}

    /**
     * Get sales master kas in
     *
     * @param Request $request
     * @return array
     */
    public function getAllSalesMasterKasIn(Request $request): array {
        try {
            // Validate request
            $request->validate([
                'branch_id' => 'required|exists:branches,id',
                'page' => 'required|integer',
                'limit' => 'required|integer',
            ]);

            // Get sales master
            $salesMasterKasInDTO = $this->getSalesMasterRepository->getAllSalesMasterKasIn($request->branch_id, $request->page, $request->limit);

            $salesMasterKasInArrays = [];

            foreach ($salesMasterKasInDTO as $salesMasterKasInDTO) {
                $salesMasterKasInArray = $salesMasterKasInDTO->toArray();

                array_push($salesMasterKasInArrays, $salesMasterKasInArray);
            }

            return $salesMasterKasInArrays;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
