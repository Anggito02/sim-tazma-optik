<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\SalesDetail\AddSalesDetailService;

class SalesDetailController extends Controller
{
    public function __construct(
        private AddSalesDetailService $addSalesDetailService,
    )
    {}

    /**
     * Add Sales Detail
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addSalesDetail(Request $request) {
        try {
            $salesDetailDTO = $this->addSalesDetailService->addSalesDetail($request);

            return response()->json([
                'status' => 'success',
                'data' => $salesDetailDTO,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
