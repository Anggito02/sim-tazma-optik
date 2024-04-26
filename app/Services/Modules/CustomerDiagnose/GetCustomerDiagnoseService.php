<?php

namespace App\Services\Modules\CustomerDiagnose;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\CustomerDiagnose\GetCustomerDiagnoseRepository;

class GetCustomerDiagnoseService {
    public function __construct(
        private GetCustomerDiagnoseRepository $getCustomerDiagnoseRepository
    ) {}

    /**
     * Get customer diagnose
     * @param Request $request
     * @return CustomerDiagnoseInfoDTO
     */
    public function getCustomerDiagnose(Request $request) {
        try {
            // Validate request
            $request->validate([
                'customer_diagnose_id' => 'exists:customer_diagnoses,id',
            ]);

            // Get customer diagnose
            return $this->getCustomerDiagnoseRepository->getCustomerDiagnose($request->customer_diagnose_id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
