<?php

namespace App\Services\Modules\SalesMaster;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\SalesMaster\GetAllSalesMasterRepository;

use App\DTO\Modules\SalesMasterDTOs\SalesMasterInfoDTO;

class GetAllSalesMasterService {
    public function __construct(
        private GetAllSalesMasterRepository $getAllSalesMasterRepository,
    )
    {}

    /**
     * Get All Sales Master
     * @param Request $request
     * @return SalesMasterInfoDTO[]
     */
    public function getAllSalesMaster(Request $request) {
        try {
            // Valdate request
            $request->validate([
                'page' => 'required|integer',
                'limit' => 'required|integer',
                'branch_id' => 'required|exists:branches,id',
            ]);

            $page = $request->page;
            $limit = $request->limit;
            $branch_id = $request->branch_id;

            $salesMasterInfoDTOs = $this->getAllSalesMasterRepository->getAllSalesMaster($page, $limit, $branch_id);

            return $salesMasterInfoDTOs;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
