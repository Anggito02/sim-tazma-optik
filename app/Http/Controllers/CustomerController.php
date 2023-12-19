<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Customer\GetCustomerService;
use App\Services\Customer\GetAllCustomerService;
use App\Services\Customer\AddCustomerService;
use App\Services\Customer\EditCustomerService;

class CustomerController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetCustomerService $getCustomerService,
        private GetAllCustomerService $getAllCustomerService,
        private AddCustomerService $addCustomerService,
        private EditCustomerService $editCustomerService
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
     * Get all customers
     * @param Request $request
     * @return JsonResponse
    */
    public function getAllCustomer(Request $request) {
        try {
            $customerDTOs = $this->getAllCustomerService->getAllCustomer($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Success get all customer',
                'data' => $customerDTOs
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed get all customer',
                'data' => $error->getMessage()
            ], 400);
        }
    }


    /**
     * Add new customer
     * @param Request $request
     * @return Customer
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

    /**
     * Edit customer
     * @param Request $request
     * @return Customer
     */
    public function editCustomer(Request $request) {
        try {
            $customerDTO = $this->editCustomerService->editCustomer($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Success edit customer',
                'data' => $customerDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed edit customer',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}
