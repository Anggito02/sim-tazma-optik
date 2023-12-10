<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\Kas\GetAllKasService;
use App\Services\Modules\Kas\AddNewDailyKasService;
use App\Models\Modules\Kas;

class KasController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetAllKasService $getAllKasService,
        private AddNewDailyKasService $addNewDailyKasService
    ) {}

    /**
     * Get all kas
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllKas(Request $request) {
        try {
            $kas = $this->getAllKasService->getAllKas($request); 

            return response()->json([
                'status' => 'success',
                'message' => 'Get all kas success',
                'data' => $kas
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all kas failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
    public function getEksistKas(Request $request)
    {
        print_r($request->input());
    }
    /**
     * Add new daily kas
     * @param Request $request
     * @return JsonResponse
     */
    public function addNewDailyKas(Request $request) {
        try {
            $kas = $this->addNewDailyKasService->addNewDailyKas($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add new daily kas success',
                'data' => $kas
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add new daily kas failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}
