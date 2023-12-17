<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\KabKota\AddKabKotaService;

class KabKotaController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private AddKabKotaService $addKabKotaService
    ) {}

    /**
     * Add Kab/Kota
     * @param Request $request
     * @return JsonResponse
     */
    public function addKabKota(Request $request): JsonResponse
    {
        try {
            $kabKota = $this->addKabKotaService->addKabKota($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Kab/Kota added successfully',
                'data' => $kabKota
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to add Kab/Kota',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}
