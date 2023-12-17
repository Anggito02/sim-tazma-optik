<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\KabKota\GetAllKabKotaService;

class KabKotaController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetAllKabKotaService $getAllKabKotaService
    ) {}

    /**
     * Get All Kab/Kota
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllKabKota(Request $request)
    {
        try {
            $kabKotaInfo = $this->getAllKabKotaService->getAllKabKota($request);

            return response()->json([
                'message' => 'Success',
                'data' => $kabKotaInfo,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'message' => $error->getMessage(),
            ], 500);
        }
    }
}
