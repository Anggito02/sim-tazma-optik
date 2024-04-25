<?php

namespace App\Services\Modules\CustomerDiagnose;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\CustomerDiagnoseDTOs\EditCustomerDiagnoseDTO;

use App\Repositories\Modules\CustomerDiagnose\EditCustomerDiagnoseRepository;

class EditCustomerDiagnoseService {
    public function __construct(
        private EditCustomerDiagnoseRepository $editCustomerDiagnoseRepository
    ) {}

    /**
     * edit customer diagnose
     * @param Request $request
     * @return CustomerDiagnoseInfoDTO
     */
    public function editCustomerDiagnose(Request $request) {
        try {
            // Validate request
            $request->validate([
                'customer_diagnose_id' => 'required|exists:customer_diagnoses,id',
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

                // Branch
                'branch_check_location_id' => 'required|exists:branches,id',
            ]);

            $tanggal_diagnosa = date('Y-m-d');
            $diagnosed_by = $request->user()->id;

            $newCustomerDiagnoseDTO = new EditCustomerDiagnoseDTO(
                $request->id,
                $tanggal_diagnosa,
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
                $request->branch_check_location_id,
                $diagnosed_by,
            );

            $customerDiagnose = $this->editCustomerDiagnoseRepository->editCustomerDiagnose($newCustomerDiagnoseDTO);

            return $customerDiagnose;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
