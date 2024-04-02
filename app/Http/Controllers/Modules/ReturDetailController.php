<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\ReturDetail\GetAllReturDetailService;
use App\Services\Modules\ReturDetail\AddReturDetailService;
use App\Services\Modules\ReturDetail\EditReturDetailService;
use App\Services\Modules\ReturDetail\DeleteReturDetailService;
use App\Services\Modules\ReturDetail\VerifyReturDetailService;

class ReturDetailController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetAllReturDetailService $getAllReturDetailService,
        private AddReturDetailService $addReturDetailService,
        private EditReturDetailService $editReturDetailService,
        private DeleteReturDetailService $deleteReturDetailService,
        private VerifyReturDetailService $verifyReturDetailService
    ) {}

    /**
     * Get all retur detail
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllReturDetail(Request $request) {
        try {
            $returDetailDTOs = $this->getAllReturDetailService->getAllReturDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all retur detail success',
                'data' => $returDetailDTOs
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all retur detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add retur detail
     * @param Request $request
     * @return JsonResponse
     */
    public function addReturDetail(Request $request) {
        try {
            $returDetailDTO = $this->addReturDetailService->addReturDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add retur detail success',
                'data' => $returDetailDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add retur detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Edit retur detail
     * @param Request $request
     * @return JsonResponse
     */
    public function editReturDetail(Request $request) {
        try {
            $returDetailDTO = $this->editReturDetailService->editReturDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Edit retur detail success',
                'data' => $returDetailDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Edit retur detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Delete retur detail
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteReturDetail(Request $request) {
        try {
            $returDetail = $this->deleteReturDetailService->deleteReturDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Delete retur detail success',
                'data' => $returDetail
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Delete retur detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Verify retur detail
     * @param Request $request
     * @return JsonResponse
     */
    public function verifyReturDetail(Request $request) {
        try {
            $returDetailDTO = $this->verifyReturDetailService->verifyReturDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Verify retur detail success',
                'data' => $returDetailDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Verify retur detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}
