<?php

namespace App\Services\Modules\CustomerDiagnose;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\CustomerDiagnoseDTOs\NewCustomerDiagnoseDTO;

use App\Repositories\Modules\CustomerDiagnose\AddCustomerDiagnoseRepository;

class AddCustomerDiagnoseService {
    public function __construct(
        private AddCustomerDiagnoseRepository $customerDiagnoseRepository
    ) {}

    /**
     * Add new customer diagnose
     * @param Request $request
     * @return CustomerDiagnoseInfoDTO
     */
    public function addCustomerDiagnose(Request $request) {
        try {
            // Validate request
            $request->validate([
                'tanggal_diagnosa' => 'required',
                'keluhan' => 'required|min:3|max:100',
                'visus_tanpa_koreksi_R' => 'nullable|min:3|max:10',
                'visus_tanpa_koreksi_L' => 'nullable|min:3|max:10',
                'oculus_dextra_sph_R' => 'nullable|min:3|max:10',
                'oculus_dextra_cyl_R' => 'nullable|min:3|max:10',
                'axis_R' => 'nullable|min:3|max:10',
                'oculus_dextra_add_R' => 'nullable|min:3|max:10',
                'oculus_dextra_visus_R' => 'nullable|min:3|max:10',
                'oculus_sinistra_sph_L' => 'nullable|min:3|max:10',
                'oculus_sinistra_cyl_L' => 'nullable|min:3|max:10',
                'axis_L' => 'nullable|min:3|max:10',
                'oculus_sinistra_add_L' => 'nullable|min:3|max:10',
                'oculus_sinistra_visus_L' => 'nullable|min:3|max:10',
                'PD' => 'nullable|min:3|max:10',
                'diagnosa' => 'nullable|min:3|max:100',
                'catatan' => 'nullable|min:3|max:100',

                // Foreign Key
                // Customer
                'customer_id' => 'required|exists:customers,id',
            ]);

            $newCustomerDiagnoseDTO = new NewCustomerDiagnoseDTO(
                $request->tanggal_diagnosa,
                $request->keluhan,
                $request->visus_tanpa_koreksi_R,
                $request->visus_tanpa_koreksi_L,
                $request->oculus_dextra_sph_R,
                $request->oculus_dextra_cyl_R,
                $request->axis_R,
                $request->oculus_dextra_add_R,
                $request->oculus_dextra_visus_R,
                $request->oculus_sinistra_sph_L,
                $request->oculus_sinistra_cyl_L,
                $request->axis_L,
                $request->oculus_sinistra_add_L,
                $request->oculus_sinistra_visus_L,
                $request->PD,
                $request->diagnosa,
                $request->catatan,
                $request->customer_id,
            );

            $customerDiagnose = $this->customerDiagnoseRepository->addCustomerDiagnose($newCustomerDiagnoseDTO);

            return $customerDiagnose;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
