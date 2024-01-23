<?php

namespace App\Services\Modules\SalesMaster;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\SalesMasterDTOs\UpdateSalesMasterDTO;

use App\Repositories\Modules\SalesMaster\UpdateSalesMasterRepository;

use App\Repositories\Customer\UpdateCustomerDeleteableRepository;

class UpdateSalesMasterService {
    public function __construct(
        private UpdateSalesMasterRepository $updateSalesMasterRepository,

        private UpdateCustomerDeleteableRepository $updateCustomerDeleteableRepository
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
                'nomor_kartu' => 'nullable|string',
                'nomor_referensi' => 'nullable|string',
                'dp' => 'required|integer',
                'branch_id' => 'required|exists:branches,id',
                'employee_id' => 'required|exists:users,id',
                'customer_id' => 'nullable|exists:customers,id',
            ]);

            $status = $request->dp == 100 ? "Lunas" : "DP";

            if ($request->customer_id) {
                $this->updateCustomerDeleteableRepository->updateCustomerDeleteable($request->customer_id, FALSE);
            }

            $updateSalesMasterDTO = new UpdateSalesMasterDTO(
                $request->id,
                $request->ref_sales_id,
                $request->nomor_kartu,
                $request->nomor_referensi,
                $request->dp,
                $status,
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
