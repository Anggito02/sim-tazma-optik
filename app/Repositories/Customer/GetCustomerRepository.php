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
            $customer = Customer::where('nomor_telepon', $nomorTelepon)->firstOrFail();

            $customer->branch_nama = Branch::where('id', $customer->branch_id)->first()->nama_branch;

            if (!$customer) return $customer;

            $customerInfoDTO = new CustomerInfoDTO(
                $customer->id,
                $customer->nama_depan,
                $customer->nama_belakang,
                $customer->email,
                $customer->nomor_telepon,
                $customer->alamat,
                $customer->kota,
                $customer->usia,
                $customer->tanggal_lahir,
                $customer->gender,
                $customer->branch_id,
                $customer->branch_nama,
            );

            return $customerInfoDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
