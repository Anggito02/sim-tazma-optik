<?php

namespace App\Repositories\Customer;

use Exception;

use App\Models\Customer;

use App\DTO\Customer\NewCustomerDTO;

class AddCustomerRepository {
    /**
     * Add new customer
     * @param NewCustomerDTO $newCustomerDTO
     * @return CustomerInfoDTO
     */
    public function addCustomer(NewCustomerDTO $newCustomerDTO) {
        try {
            $newCustomer = new Customer();
            $newCustomer->nama_depan = $newCustomerDTO->getNamaDepan();
            $newCustomer->nama_belakang = $newCustomerDTO->getNamaBelakang();
            $newCustomer->email = $newCustomerDTO->getEmail();
            $newCustomer->nomor_telepon = $newCustomerDTO->getNomorTelepon();
            $newCustomer->alamat = $newCustomerDTO->getAlamat();
            $newCustomer->kota = $newCustomerDTO->getKota();
            $newCustomer->usia = $newCustomerDTO->getUsia();
            $newCustomer->tanggal_lahir = $newCustomerDTO->getTanggalLahir();
            $newCustomer->gender = $newCustomerDTO->getGender();
            $newCustomer->branch_id = $newCustomerDTO->getBranchId();
            $newCustomer->save();

            return $newCustomer;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
