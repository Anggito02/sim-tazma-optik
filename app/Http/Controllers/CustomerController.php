<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Customer\GetCustomerService;
use App\Services\Customer\AddCustomerService;

class CustomerController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetCustomerService $getCustomerService,
        private AddCustomerService $addCustomerService,
    ) {}

    /**
     * Get customer by nomor telepon
     * @param Request $request
     * @return CustomerDTO
     */
    public function getCustomer(Request $request) {
        try {
            $customerDTO = $this->getCustomerService->getCustomer($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Success get customer',
                'data' => $customerDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed get customer',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add new customer
     * @param Request $request
     * @return CustomerDTO
     */
    public function addCustomer(Request $request) {
        try {
            $customerDTO = $this->addCustomerService->addCustomer($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Success add customer',
                'data' => $customerDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed add customer',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}
