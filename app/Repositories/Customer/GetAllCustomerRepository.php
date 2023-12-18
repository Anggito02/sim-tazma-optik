<?php

namespace App\Repositories\Customer;

use Exception;

use App\Models\Customer;

use App\DTO\Customer\CustomerInfoDTO;
use App\DTO\Customer\CustomerFilterDTO;

class GetAllCustomerRepository {
    /**
     * Get all customers
     * @param CustomerFilterDTO $customerFilter
     * @return CustomerInfoDTO[]
     */
    public function getAllCustomer(CustomerFilterDTO $customerFilter): array {
        try {
            $activeFilter = [];

            $nama_depan_sql = $customerFilter->getNamaDepan() ? "customers.nama_depan LIKE '%" . $customerFilter->getNamaDepan() . "%'" : null;
            array_push($activeFilter, $nama_depan_sql);

            $nama_belakang_sql = $customerFilter->getNamaBelakang() ? "customers.nama_belakang LIKE '%" . $customerFilter->getNamaBelakang() . "%'" : null;
            array_push($activeFilter, $nama_belakang_sql);

            $usia_sql = null;
            if ($customerFilter->getUsiaUntil()) {
                $usia_sql = "customers.usia BETWEEN " . $customerFilter->getUsiaFrom() . " AND " . $customerFilter->getUsiaUntil();
            } elseif (!$customerFilter->getUsiaUntil()) {
                $usia_sql = "customers.usia >= " . $customerFilter->getUsiaFrom();
            }
            array_push($activeFilter, $usia_sql);

            $gender_sql = $customerFilter->getGender() ? "customers.gender = '" . $customerFilter->getGender() . "'" : null;
            array_push($activeFilter, $gender_sql);

            $branch_id_sql = $customerFilter->getBranchId() ? "customers.branch_id = " . $customerFilter->getBranchId() : null;
            array_push($activeFilter, $branch_id_sql);

            $kabkota_id_sql = $customerFilter->getKabkotaId() ? "customers.kabkota_id = " . $customerFilter->getKabkotaId() : null;
            array_push($activeFilter, $kabkota_id_sql);

            $activeFilter = array_filter($activeFilter, function ($filter) {
                return $filter != null;
            });

            $activeFilter = implode(' AND ', $activeFilter);

            $customers = Customer::whereRaw($activeFilter ? $activeFilter : 1)
                ->join('branches', 'customers.branch_id', '=', 'branches.id')
                ->join('ref_kabkota', 'customers.kabkota_id', '=', 'ref_kabkota.ID_KK')
                ->select(
                    'customers.*',
                    'branches.nama_branch',
                    'ref_kabkota.nama_kabkota'
                )
                ->paginate($customerFilter->getLimit(), ['*'], 'page', $customerFilter->getPage());

            if (!$customers) return [];

            $customerDTOs = [];

            foreach ($customers as $customer) {
                $customerInfoDTO = new CustomerInfoDTO(
                    $customer->id,
                    $customer->nama_depan,
                    $customer->nama_belakang,
                    $customer->email,
                    $customer->nomor_telepon,
                    $customer->alamat,
                    $customer->usia,
                    $customer->tanggal_lahir,
                    $customer->gender,
                    $customer->branch_id,
                    $customer->nama_branch,
                    $customer->kabkota_id,
                    $customer->nama_kabkota
                );

                array_push($customerDTOs, $customerInfoDTO);
            }

            return $customerDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
