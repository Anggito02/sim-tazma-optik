<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\BranchOutgoingDetail\GetAllBranchOutgoingDetailService;
use App\Services\Modules\BranchOutgoingDetail\AddBranchOutgoingDetailService;
use App\Services\Modules\BranchOutgoingDetail\EditBranchOutgoingDetailService;
use App\Services\Modules\BranchOutgoingDetail\DeleteBranchOutgoingDetailService;
use App\Services\Modules\BranchOutgoingDetail\VerifyBranchOutgoingDetailService;

class BranchOutgoingDetailController extends Controller
{
    // Services Providers Constructs

    public function __construct(
        private GetAllBranchOutgoingDetailService $getAllBranchOutgoingDetailService,
        private AddBranchOutgoingDetailService $addBranchOutgoingDetailService,
        private EditBranchOutgoingDetailService $editBranchOutgoingDetailService,
        private DeleteBranchOutgoingDetailService $deleteBranchOutgoingDetailService,
        private VerifyBranchOutgoingDetailService $verifyBranchOutgoingDetailService
    ) {}

    /**
     * Get all branch outgoing detail
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllBranchOutgoingDetail(Request $request) {
        try {
            $branchOutgoingDetailDTOs = $this->getAllBranchOutgoingDetailService->getAllBranchOutgoingDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all branch outgoing detail success',
                'data' => $branchOutgoingDetailDTOs
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all branch outgoing detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add branch outgoing detail
     * @param Request $request
     * @return JsonResponse
     */
    public function addBranchOutgoingDetail(Request $request) {
        try {
            $branchOutgoingDetailDTO = $this->addBranchOutgoingDetailService->addBranchOutgoingDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add branch outgoing detail success',
                'data' => $branchOutgoingDetailDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add branch outgoing detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Edit branch outgoing detail
     * @param Request $request
     * @return JsonResponse
     */
    public function editBranchOutgoingDetail(Request $request) {
        try {
            $branchOutgoingDetailDTO = $this->editBranchOutgoingDetailService->editBranchOutgoingDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Edit branch outgoing detail success',
                'data' => $branchOutgoingDetailDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Edit branch outgoing detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Delete branch outgoing detail
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteBranchOutgoingDetail(Request $request) {
        try {
            $branchOutgoingDetail = $this->deleteBranchOutgoingDetailService->deleteBranchOutgoingDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Delete branch outgoing detail success',
                'data' => $branchOutgoingDetail
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Delete branch outgoing detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Verify branch outgoing detail
     * @param Request $request
     * @return JsonResponse
     */
    public function verifyBranchOutgoingDetail(Request $request) {
        try {
            $branchOutgoingDetailDTO = $this->verifyBranchOutgoingDetailService->verifyBranchOutgoingDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Verify branch outgoing detail success',
                'data' => $branchOutgoingDetailDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Verify branch outgoing detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}
