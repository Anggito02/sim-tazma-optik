<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\OutgoingDetail\AddOutgoingDetailService;

class OutgoingDetailController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private AddOutgoingDetailService $addOutgoingDetailService
    ) {}

    /**
     * Add outgoing detail
     * @param Request $request
     * @return JsonResponse
     */
    public function addOutgoingDetail(Request $request) {
        try {
            $outgoingDetailDTO = $this->addOutgoingDetailService->addOutgoingDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add outgoing detail success',
                'data' => $outgoingDetailDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add outgoing detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

}
