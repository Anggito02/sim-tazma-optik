<?php

namespace App\Services\Modules\SalesMaster;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\SalesMasterDTOs\UpdateSalesMasterDTO;

use App\Repositories\Modules\SalesMaster\UpdateSalesMasterRepository;

class UpdateSalesMasterService {
    public function __construct(
        private UpdateSalesMasterRepository $updateSalesMasterRepository,
    )
    {}

    /**
     * Update Sales Master
     * @param Request $request
     * @return SalesMaster
     */
    public function updateSalesMaster(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|integer',
                'ref_sales_id' => 'required|integer',
                'sistem_pembayaran' => 'required|string',
                'nomor_kartu' => 'nullable|string',
                'nomor_referensi' => 'nullable|string',
                'dp' => 'required',
                'status' => 'required|string|in:DP,Lunas',
                'branch_id' => 'required|exists:branches,id',
                'employee_id' => 'required|exists:users,id',
                'customer_id' => 'nullable|exists:customers,id',
            ]);

            $updateSalesMasterDTO = new UpdateSalesMasterDTO(
                $request->id,
                $request->ref_sales_id,
                $request->sistem_pembayaran,
                $request->nomor_kartu,
                $request->nomor_referensi,
                $request->dp,
                $request->status,
                $request->branch_id,
                $request->employee_id,
                $request->customer_id,
            );

            $salesMasterDTO = $this->updateSalesMasterRepository->updateSalesMaster($updateSalesMasterDTO);

            return $salesMasterDTO;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
