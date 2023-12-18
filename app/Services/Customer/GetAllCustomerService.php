<?php

namespace App\Services\Customer;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Customer\CustomerFilterDTO;

use App\Repositories\Customer\GetAllCustomerRepository;

class GetAllCustomerService {
    public function __construct(
        private GetAllCustomerRepository $getAllCustomerRepository
    )
    {}

    /**
     * Get all customers
     * @param Request $request
     * @return CustomerInfoDTO
     */
    public function getAllCustomer(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required|integer',
                'limit' => 'required|integer',
                'nama_depan' => 'nullable|string',
                'nama_belakang' => 'nullable|string',
                'usia_from' => 'integer',
                'usia_until' => 'integer',
                'gender' => 'in:laki-laki,perempuan',
                'branch_id' => 'exists:branches,id',
                'kabkota_id' => 'exists:ref_kabkota,ID_KK',
            ]);

            $customerFilter = new CustomerFilterDTO(
                $request->page,
                $request->limit,
                $request->nama_depan,
                $request->nama_belakang,
                $request->usia_from ? $request->usia_from : 0,
                $request->usia_until,
                $request->gender,
                $request->branch_id,
                $request->kabkota_id
            );

            $customerDTOs = $this->getAllCustomerRepository->getAllCustomer($customerFilter);

            $customerArrays = [];

            foreach ($customerDTOs as $customerDTO) {
                array_push($customerArrays, $customerDTO->toArray());
            }

            return $customerArrays;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

}

?>
