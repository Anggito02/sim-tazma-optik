<?php

namespace App\Services\Modules\SalesMaster;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\SalesMasterDTOs\SalesMasterFilterDTO;

use App\Repositories\Modules\SalesMaster\GetAllSalesMasterRepository;

class GetAllSalesMasterService {
    public function __construct(
        private GetAllSalesMasterRepository $getAllSalesMasterRepository,
    )
    {}

    /**
     * Get All Sales Master
     * @param Request $request
     * @return array
     */
    public function getAllSalesMaster(Request $request) {
        try {
            // Valdate request
            $request->validate([
                'page' => 'required|integer',
                'limit' => 'required|integer',
                'branch_id' => 'nullable|integer',
                'nomor_transaksi' => 'exists:sales_masters,nomor_transaksi',
            ]);

            $salesMasterDTO = new SalesMasterFilterDTO(
                $request->page,
                $request->limit,
                $request->branch_id,
                $request->nomor_transaksi
            );

            $salesMasterInfoDTOs = $this->getAllSalesMasterRepository->getAllSalesMaster($salesMasterDTO);

            $salesMasterInfoArrays = [];

            foreach ($salesMasterInfoDTOs as $salesMasterInfoDTO) {
                array_push($salesMasterInfoArrays, $salesMasterInfoDTO->toArray());
            }

            return $salesMasterInfoArrays;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
