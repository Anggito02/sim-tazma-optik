<?php

namespace App\Repositories\Modules\CustomerDiagnose;

use Exception;


use App\DTO\Modules\CustomerDiagnoseDTOs\CustomerDiagnoseInfoDTO;
use App\Models\Modules\CustomerDiagnose;

class GetCustomerDiagnoseRepository {
    /**
     * Get Customer Diagnose
     * @param int $customer_diagnose_id
     * @return CustomerDiagnose
     */
    public function getCustomerDiagnose(int $customer_diagnose_id)
    {
        try {
            $customerDiagnose = CustomerDiagnose::where('customer_diagnoses.id', '=', $customer_diagnose_id)
                ->leftJoin('customers', 'customers.id', '=', 'customer_diagnoses.customer_id')
                ->leftJoin('branches', 'branches.id', '=', 'customer_diagnoses.branch_check_location_id')
                ->leftJoin('users', 'users.id', '=', 'customer_diagnoses.diagnosed_by')
                ->select('customer_diagnoses.*', 'customers.nama_depan as customer_nama_depan', 'customers.nama_belakang as customer_nama_belakang', 'customers.nomor_telepon as customer_nomor_telepon', 'branches.kode_branch as branch_check_location_kode', 'branches.nama_branch as branch_check_location_nama', 'users.employee_name as diagnosed_by_nama')
                ->orderBy('customer_diagnoses.tanggal_diagnosa', 'desc')
                ->first();

            $customerDiagnoseDTO = new CustomerDiagnoseInfoDTO(
                $customerDiagnose->id,
                $customerDiagnose->tanggal_diagnosa,
                $customerDiagnose->keluhan,
                $customerDiagnose->visus_tanpa_koreksi_R,
                $customerDiagnose->visus_tanpa_koreksi_L,

                $customerDiagnose->oculus_dextra_sph_R,
                $customerDiagnose->oculus_dextra_cyl_R,
                $customerDiagnose->axis_R,
                $customerDiagnose->oculus_dextra_add_R,
                $customerDiagnose->oculus_dextra_visus_R,

                $customerDiagnose->oculus_dextra_sph_L,
                $customerDiagnose->oculus_dextra_cyl_L,
                $customerDiagnose->axis_L,
                $customerDiagnose->oculus_dextra_add_L,
                $customerDiagnose->oculus_dextra_visus_L,

                $customerDiagnose->PD,
                $customerDiagnose->diagnosa,
                $customerDiagnose->catatan,
                $customerDiagnose->customer_id,
                $customerDiagnose->customer_nama_depan,
                $customerDiagnose->customer_nama_belakang,
                $customerDiagnose->customer_nomor_telepon,
                $customerDiagnose->branch_check_location_id,
                $customerDiagnose->branch_check_location_kode,
                $customerDiagnose->branch_check_location_nama,
                $customerDiagnose->diagnosed_by,
                $customerDiagnose->diagnosed_by_nama
                );

            return $customerDiagnoseDTO;
        } catch (Exception $e) {
            throw $e;
        }
    }

}

?>
