<?php

namespace App\Services\Customer;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Customer\DeleteCustomerRepository;

class DeleteCustomerService {
    public function __construct(
        private DeleteCustomerRepository $deleteCustomerRepository
    )
    {}

    /**
     * Delete customer
     * @param Request $request
     */
    public function deleteCustomer(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:customers,id',
            ]);

            $customer = $this->deleteCustomerRepository->deleteCustomer($request->id);

            return $customer;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
