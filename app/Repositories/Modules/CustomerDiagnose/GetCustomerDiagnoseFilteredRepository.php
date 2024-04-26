<?php

namespace App\Repositories\Modules\CustomerDiagnose;

use Exception;

use App\DTO\Modules\CustomerDiagnoseDTOs\CustomerDiagnoseFilterDTO;
use App\DTO\Modules\CustomerDiagnoseDTOs\CustomerDiagnoseInfoDTO;
use App\Models\Modules\CustomerDiagnose;

class GetCustomerDiagnoseFilteredRepository {
    /**
     * Get Customer Diagnose filtered
     * @param CustomerDiagnoseFilterDTO $customerDiagnoseFilterDTO
     * @return CustomerDiagnose
     */
    public function getCustomerDiagnoseFiltered(CustomerDiagnoseFilterDTO $customerDiagnoseFilterDTO)
    {
        try {
            // Check active filters
            $activeFilters = [];

            $tahun_sql = $customerDiagnoseFilterDTO->getTahun() ? 'YEAR(tanggal_diagnosa)=YEAR(' . $customerDiagnoseFilterDTO->getTahun() . ')' : null;
            array_push($activeFilters, $tahun_sql);

            $bulan_sql = $customerDiagnoseFilterDTO->getBulan() ? 'MONTH(tanggal_diagnosa)=MONTH(' . $customerDiagnoseFilterDTO->getBulan() . ')' : null;
            array_push($activeFilters, $bulan_sql);

            $customer_id_sql = $customerDiagnoseFilterDTO->getCustomerId() ? 'customer_id=' . $customerDiagnoseFilterDTO->getCustomerId() : null;
            array_push($activeFilters, $customer_id_sql);

            $customer_name_sql = $customerDiagnoseFilterDTO->getCustomerNama() ? 'customer_name LIKE "%' . $customerDiagnoseFilterDTO->getCustomerNama() . '%"' : null;
            array_push($activeFilters, $customer_name_sql);

            $customer_nomor_telepon_sql = $customerDiagnoseFilterDTO->getCustomerNomorTelepon() ? 'customer_nomor_telepon LIKE "%' . $customerDiagnoseFilterDTO->getCustomerNomorTelepon() . '%"' : null;
            array_push($activeFilters, $customer_nomor_telepon_sql);

            $branch_check_location_id = $customerDiagnoseFilterDTO->getBranchCheckLocationId() ? 'branch_check_location_id=' . $customerDiagnoseFilterDTO->getBranchCheckLocationId() : null;
            array_push($activeFilters, $branch_check_location_id);

            $diagnosed_by_sql = $customerDiagnoseFilterDTO->getDiagnosedBy() ? 'diagnosed_by=' . $customerDiagnoseFilterDTO->getDiagnosedBy() . '%"' : null;
            array_push($activeFilters, $diagnosed_by_sql);

            $activeFilters = array_filter($activeFilters, function ($filter) {
                return $filter != null;
            });

            $activeFilters = implode(' AND ', $activeFilters);

            $customerDiagnoses = CustomerDiagnose::whereRaw($activeFilters ? $activeFilters : 1)
                ->leftJoin('customers', 'customers.id', '=', 'customer_diagnoses.customer_id')
                ->leftJoin('branches', 'branches.id', '=', 'customer_diagnoses.branch_check_location_id')
                ->leftJoin('users', 'users.id', '=', 'customer_diagnoses.diagnosed_by')
                ->select('customer_diagnoses.*', 'customers.nama_depan as customer_nama_depan', 'customers.nama_belakang as customer_nama_belakang', 'customers.nomor_telepon as customer_nomor_telepon', 'branches.kode_branch as branch_check_location_kode', 'branches.nama_branch as branch_check_location_nama', 'users.employee_name as diagnosed_by_nama')
                ->orderBy('customer_diagnoses.tanggal_diagnosa', 'desc')
                ->paginate($customerDiagnoseFilterDTO->getLimit(), ['*'], 'page', $customerDiagnoseFilterDTO->getPage());

            $customerDiagnoseDTOs = [];

            foreach ($customerDiagnoses as $customerDiagnose) {
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

                    $customerDiagnose->oculus_sinistra_sph_L,
                    $customerDiagnose->oculus_sinistra_cyl_L,
                    $customerDiagnose->axis_L,
                    $customerDiagnose->oculus_sinistra_add_L,
                    $customerDiagnose->oculus_sinistra_visus_L,

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

                array_push($customerDiagnoseDTOs, $customerDiagnoseDTO);
            }

            return $customerDiagnoseDTOs;
        } catch (Exception $e) {
            throw $e;
        }
    }

}

?>
