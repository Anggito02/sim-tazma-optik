<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\Kas\AddNewDailyKasService;

class KasController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private AddNewDailyKasService $addNewDailyKasService
    ) {}

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
