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
                'nomor_telepon' => 'required|unique:customers,nomor_telepon|digits_between:8,13',
                'alamat' => 'required|min:3|max:100',
                'tanggal_lahir' => 'required',
                'gender' => 'required|in:laki-laki,perempuan',
                'branch_id' => 'required|exists:branches,id',
                'kabkota_id' => 'exists:ref_kabkota,ID_KK'
            ]);

            $newCustomerDTO = new NewCustomerDTO(
                $request->nama_depan,
                $request->nama_belakang,
                $request->email,
                $request->nomor_telepon,
                $request->alamat,
                floor(abs(strtotime(date('Y-m-d'))-strtotime($request->tanggal_lahir))/(60*60*24*365)),
                $request->tanggal_lahir,
                $request->gender,
                $request->branch_id,
                $request->kabkota_id
            );

            $customerDTO = $this->customerRepository->addCustomer($newCustomerDTO);

            return $customerDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
