<?php

namespace App\Services\Modules\CustomerDiagnose;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\CustomerDiagnoseDTOs\CustomerDiagnoseFilterDTO;

use App\Repositories\Modules\CustomerDiagnose\GetCustomerDiagnoseFilteredRepository;

class GetCustomerDiagnoseFilteredService {
    public function __construct(
        private GetCustomerDiagnoseFilteredRepository $getCustomerDiagnoseFilteredRepository
    ) {}

    /**
     * Get customer diagnose
     * @param Request $request
     * @return CustomerDiagnoseInfoDTO
     */
    public function getCustomerDiagnoseFiltered(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required|gte:0',
                'limit' => 'required|gte:0',
                'tahun' => 'digits:4',
                'bulan' => 'digits:2',
                'customer_id' => 'exists:customers,id',
                'customer_nama' => 'string',
                'customer_nomor_telepon' => 'string',
                'branch_id' => 'exists:branches,id',
                'diagnosed_by' => 'exists:users,id',
            ]);

            // Get customer diagnose
            $customerDiagnoseFilterDTO = new CustomerDiagnoseFilterDTO(
                $request->page,
                $request->limit,
                $request->tahun,
                $request->bulan,
                $request->customer_id,
                $request->customer_name,
                $request->customer_nomor_telepon,
                $request->branch_id,
                $request->diagnosed_by
            );

            return $this->getCustomerDiagnoseFilteredRepository->getCustomerDiagnoseFiltered($customerDiagnoseFilterDTO);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
