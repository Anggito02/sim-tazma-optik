<?php

namespace App\Services\Customer;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Customer\EditCustomerDTO;

use App\Repositories\Customer\EditCustomerRepository;

class EditCustomerService {
    public function __construct(
        private EditCustomerRepository $editCustomerRepository
    )
    {}

    /**
     * Edit customer data
     * @param Request $request
     * @param Customer
     */
    public function editCustomer(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:customers,id',
                'nama_depan' => 'required|min:3|max:50',
                'nama_belakang' => 'required|min:3|max:50',
                'email' => 'required|email:dns',
                'nomor_telepon' => 'required|digits_between:8,13',
                'alamat' => 'required|min:3|max:100',
            ]);

            $customerDTO = new EditCustomerDTO(
                $request->id,
                $request->nama_depan,
                $request->nama_belakang,
                $request->email,
                $request->nomor_telepon,
                $request->alamat
            );

            $customer = $this->editCustomerRepository->editCustomer($customerDTO);

            return $customer;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
