<?php

namespace App\Repositories\Modules\CustomerDiagnose;

use App\DTO\Customer\EditCustomerDTO;
use Exception;

use App\DTO\Modules\CustomerDiagnoseDTOs\EditCustomerDiagnoseDTO;
use App\Models\Modules\CustomerDiagnose;

class EditCustomerDiagnoseRepository {
    /**
     * Edit Customer Diagnose
     * @param EditCustomerDiagnoseDTO $editCustomerDiagnoseDTO
     * @return CustomerDiagnose
     */
    public function editCustomerDiagnose(EditCustomerDiagnoseDTO $editCustomerDiagnoseDTO)
    {
        try {
            $customerDiagnose = CustomerDiagnose::where('id', $editCustomerDiagnoseDTO->id)
                ->update([
                    'tanggal_diagnosa' => $editCustomerDiagnoseDTO->getTanggalDiagnosa(),
                    'keluhan' => $editCustomerDiagnoseDTO->getKeluhan(),
                    'visus_tanpa_koreksi_R' => $editCustomerDiagnoseDTO->getVisusTanpaKoreksiR(),
                    'visus_tanpa_koreksi_L' => $editCustomerDiagnoseDTO->getVisusTanpaKoreksiL(),

                    'oculus_dextra_sph_R' => $editCustomerDiagnoseDTO->getOculusDextraSphR(),
                    'oculus_dextra_cyl_R' => $editCustomerDiagnoseDTO->getOculusDextraCylR(),
                    'axis_R' => $editCustomerDiagnoseDTO->getAxisR(),
                    'oculus_dextra_add_R' => $editCustomerDiagnoseDTO->getOculusDextraAddR(),
                    'oculus_dextra_visus_R' => $editCustomerDiagnoseDTO->getOculusDextraVisusR(),

                    'oculus_sinistra_sph_L' => $editCustomerDiagnoseDTO->getOculusSinistraSphL(),
                    'oculus_sinistra_cyl_L' => $editCustomerDiagnoseDTO->getOculusSinistraCylL(),
                    'axis_L' => $editCustomerDiagnoseDTO->getAxisL(),
                    'oculus_sinistra_add_L' => $editCustomerDiagnoseDTO->getOculusSinistraAddL(),
                    'oculus_sinistra_visus_L' => $editCustomerDiagnoseDTO->getOculusSinistraVisusL(),

                    'PD' => $editCustomerDiagnoseDTO->getPD(),
                    'diagnosa' => $editCustomerDiagnoseDTO->getDiagnosa(),
                    'catatan' => $editCustomerDiagnoseDTO->getCatatan(),

                    'customer_id' => $editCustomerDiagnoseDTO->getCustomerId(),
                    'branch_check_location_id' => $editCustomerDiagnoseDTO->getBranchCheckLocationId(),
                    'diagnosed_by' => $editCustomerDiagnoseDTO->getDiagnosedBy(),
                ]);

                return $customerDiagnose;
        } catch (Exception $e) {
            throw $e;
        }
    }

}

?>
