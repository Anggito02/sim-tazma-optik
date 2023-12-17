<?php

namespace App\Repositories\Customer;

use Exception;

use App\Models\Customer;
use App\Models\Branch;

use App\DTO\Customer\CustomerInfoDTO;

class GetCustomerRepository {
    /**
     * Get customer by nomor telepon
     * @param string $nomorTelepon
     * @return CustomerInfoDTO
     */
    public function getCustomer(string $nomorTelepon) {
        try {
            $customer = Customer::where('nomor_telepon', $nomorTelepon)
                ->join('branches', 'customers.branch_id', '=', 'branches.id')
                ->join('ref_kabkota', 'customers.kabkota_id', '=', 'ref_kabkota.ID_KK')
                ->select(
                    'customers.*',
                    'branches.nama_branch',
                    'ref_kabkota.nama_kabkota'
                )
                ->firstOrFail();

            if (!$customer) return $customer;

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

            return $customerInfoDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
