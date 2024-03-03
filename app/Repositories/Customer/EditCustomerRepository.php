<?php

namespace App\Repositories\Customer;

use Exception;

use App\Models\Customer;

use App\DTO\Customer\EditCustomerDTO;

class EditCustomerRepository {
    /**
     * Edit customer data
     * @param EditCustomerDTO $editCustomerDTO
     * @return Customer
     */
    public function editCustomer(EditCustomerDTO $editCustomerDTO) {
        try {
            $customer = Customer::find($editCustomerDTO->getId());
            $customer->nama_depan = $editCustomerDTO->getNamaDepan();
            $customer->nama_belakang = $editCustomerDTO->getNamaBelakang();
            $customer->email = $editCustomerDTO->getEmail();
            $customer->nomor_telepon = $editCustomerDTO->getNomorTelepon();
            $customer->alamat = $editCustomerDTO->getAlamat();
            $customer->save();
            return $customer;
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}

?>
