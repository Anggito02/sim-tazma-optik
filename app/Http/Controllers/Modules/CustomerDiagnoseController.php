<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\CustomerDiagnose\AddCustomerDiagnoseService;

class CustomerDiagnoseController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private AddCustomerDiagnoseService $addCustomerDiagnoseService
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
}
