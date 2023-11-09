<?php

namespace App\Services\Customer;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Customer\CustomerInfoDTO;

use App\Repositories\Customer\GetCustomerRepository;

class GetCustomerService {
    public function __construct(
        private GetCustomerRepository $customerRepository
    ) {}

    /**
     * Get customer by nomor telepon
     * @param Request $request
     * @return CustomerInfoDTO
     */
    public function getCustomer(Request $request) {
        try {
            // Validate request
            $request->validate([
                'nomor_telepon' => 'required|min:10|max:20',
            ]);

            $customerDTO = $this->customerRepository->getCustomer($request->nomor_telepon);

            return $customerDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
