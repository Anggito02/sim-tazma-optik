<?php

namespace App\Repositories\Modules\CustomerDiagnose;

use Exception;

use App\DTO\Modules\CustomerDiagnoseDTOs\NewCustomerDiagnoseDTO;

use App\Models\Modules\CustomerDiagnose;

class AddCustomerDiagnoseRepository {
    public function __construct(
        private CustomerDiagnose $customerDiagnose
    ) {}

    /**
     * Add new customer diagnose
     * @param NewCustomerDiagnoseDTO $newCustomerDiagnoseDTO
     * @return CustomerDiagnose
     */
    public function addCustomerDiagnose(NewCustomerDiagnoseDTO $newCustomerDiagnoseDTO) {
        try {
            $customerDiagnose = $this->customerDiagnose->create([
                'tanggal_diagnosa' => $newCustomerDiagnoseDTO->getTanggalDiagnosa(),
                'keluhan' => $newCustomerDiagnoseDTO->getKeluhan(),
                'visus_tanpa_koreksi_R' => $newCustomerDiagnoseDTO->getVisusTanpaKoreksiR(),
                'visus_tanpa_koreksi_L' => $newCustomerDiagnoseDTO->getVisusTanpaKoreksiL(),
                'oculus_dextra_sph_R' => $newCustomerDiagnoseDTO->getOculusDextraSphR(),
                'oculus_dextra_cyl_R' => $newCustomerDiagnoseDTO->getOculusDextraCylR(),
                'axis_R' => $newCustomerDiagnoseDTO->getAxisR(),
                'oculus_dextra_add_R' => $newCustomerDiagnoseDTO->getOculusDextraAddR(),
                'oculus_dextra_visus_R' => $newCustomerDiagnoseDTO->getOculusDextraVisusR(),
                'oculus_sinistra_sph_L' => $newCustomerDiagnoseDTO->getOculusSinistraSphL(),
                'oculus_sinistra_cyl_L' => $newCustomerDiagnoseDTO->getOculusSinistraCylL(),
                'axis_L' => $newCustomerDiagnoseDTO->getAxisL(),
                'oculus_sinistra_add_L' => $newCustomerDiagnoseDTO->getOculusSinistraAddL(),
                'oculus_sinistra_visus_L' => $newCustomerDiagnoseDTO->getOculusSinistraVisusL(),
                'PD' => $newCustomerDiagnoseDTO->getPD(),
                'diagnosa' => $newCustomerDiagnoseDTO->getDiagnosa(),
                'catatan' => $newCustomerDiagnoseDTO->getCatatan(),
                'customer_id' => $newCustomerDiagnoseDTO->getCustomerId(),
                'branch_check_location_id' => $newCustomerDiagnoseDTO->getBranchCheckLocationId(),
                'diagnosed_by' => $newCustomerDiagnoseDTO->getDiagnosedBy(),
            ]);

            return $customerDiagnose;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
