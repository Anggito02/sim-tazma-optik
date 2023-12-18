<?php

namespace App\Repositories\Customer;

use Exception;

use App\Models\Customer;

use App\DTO\Customer\CustomerInfoDTO;

class GetAllCustomerRepository {
    /**
     * Get all customers
     * @param int $page
     * @param int $limit
     * @return CustomerInfoDTO[]
     */
    public function getAllCustomer(int $page, int $limit): array {
        try {
            $customers = Customer::join('branches', 'customers.branch_id', '=', 'branches.id')
                ->join('ref_kabkota', 'customers.kabkota_id', '=', 'ref_kabkota.ID_KK')
                ->select(
                    'customers.*',
                    'branches.nama_branch',
                    'ref_kabkota.nama_kabkota'
                )
                ->paginate($limit, ['*'], 'page', $page);

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
