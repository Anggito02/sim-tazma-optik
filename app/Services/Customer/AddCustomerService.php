<?php

namespace App\Services\Customer;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Customer\NewCustomerDTO;

use App\Repositories\Customer\AddCustomerRepository;

class AddCustomerService {
    public function __construct(
        private AddCustomerRepository $customerRepository
    ) {}

    /**
     * Add new customer
     * @param Request $request
     * @return CustomerInfoDTO
     */
    public function addCustomer(Request $request) {
        try {
            // Validate request
            $request->validate([
                'nama_depan' => 'required|min:3|max:50',
                'nama_belakang' => 'required|min:3|max:50',
                'email' => 'required|email:dns',
                'nomor_telepon' => 'required|unique:customers,nomor_telepon|min:10|max:20',
                'alamat' => 'required|min:3|max:100',
                'kota' => 'required|min:3|max:50',
                'tanggal_lahir' => 'required',
                'gender' => 'required|in:laki-laki,perempuan',
                'branch_id' => 'required|exists:branches,id',
            ]);

            $newCustomerDTO = new NewCustomerDTO(
                $request->nama_depan,
                $request->nama_belakang,
                $request->email,
                $request->nomor_telepon,
                $request->alamat,
                $request->kota,
                date('Y') - date('Y', strtotime($request->tanggal_lahir)),
                $request->tanggal_lahir,
                $request->gender,
                $request->branch_id,
            );

            $customerDTO = $this->customerRepository->addCustomer($newCustomerDTO);

            return $customerDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
