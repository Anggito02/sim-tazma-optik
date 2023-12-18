<?php

namespace App\Services\Customer;

use Exception;
use Illuminate\Http\Request;

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
            ]);

            $customerDTOs = $this->getAllCustomerRepository->getAllCustomer($request->page, $request->limit);

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
