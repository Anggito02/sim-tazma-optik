<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\CustomerDiagnose\AddCustomerDiagnoseService;
use App\Services\Modules\CustomerDiagnose\GetCustomerDiagnoseFilteredService;

class CustomerDiagnoseController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private AddCustomerDiagnoseService $addCustomerDiagnoseService,
        private GetCustomerDiagnoseFilteredService $getCustomerDiagnoseFilteredService
    ) {}

    /**
     * Add customer diagnose
     * @param Request $request
     * @return JsonResponse
     */
    public function addCustomerDiagnose(Request $request) {
        try {
            $customerDiagnoseDTO = $this->addCustomerDiagnoseService->addCustomerDiagnose($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add customer diagnose success',
                'data' => $customerDiagnoseDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add customer diagnose failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Get customer diagnose
     * @param Request $request
     * @return JsonResponse
     */
    public function getCustomerDiagnoseFiltered(Request $request) {
        try {
            $customerDiagnoseDTO = $this->getCustomerDiagnoseFilteredService->getCustomerDiagnoseFiltered($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get customer diagnose success',
                'data' => $customerDiagnoseDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get customer diagnose failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}
