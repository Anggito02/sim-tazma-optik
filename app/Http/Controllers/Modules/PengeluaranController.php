<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\Pengeluaran\AddPengeluaranService;

class PengeluaranController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private AddPengeluaranService $addPengeluaranService,
    )
    {}

    /**
     * Add pengeluaran
     * @param Request $request
     * @return JsonResponse
     */
    public function addPengeluaran(Request $request) {
        try {
            $pengeluaranDTO = $this->addPengeluaranService->addPengeluaran($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add pengeluaran success',
                'data' => $pengeluaranDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add pengeluaran failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}
