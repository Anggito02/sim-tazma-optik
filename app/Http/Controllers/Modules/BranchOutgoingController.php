<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\BranchOutgoing\GetBranchOutgoingService;
use App\Services\Modules\BranchOutgoing\GetAllBranchOutgoingService;
use App\Services\Modules\BranchOutgoing\AddBranchOutgoingService;
use App\Services\Modules\BranchOutgoing\EditBranchOutgoingService;
use App\Services\Modules\BranchOutgoing\DeleteBranchOutgoingService;

class BranchOutgoingController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetBranchOutgoingService $getBranchOutgoingService,
        private GetAllBranchOutgoingService $getAllBranchOutgoingService,
        private AddBranchOutgoingService $addBranchBranchService,
        private EditBranchOutgoingService $editBranchOutgoingService,
        private DeleteBranchOutgoingService $deleteBranchOutgoingService
    ) {}

    /**
     * Get branch outgoing
     * @param Request $request
     * @return JsonResponse
     */
    public function getBranchOutgoing(Request $request) {
        try {
            $branchOutgoingDTO = $this->getBranchOutgoingService->getBranchOutgoing($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get branch outgoing success',
                'data' => $branchOutgoingDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get branch outgoing failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Get all branch outgoing
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllBranchOutgoing(Request $request) {
        try {
            $branchOutgoingDTO = $this->getAllBranchOutgoingService->getAllBranchOutgoing($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all branch outgoing success',
                'data' => $branchOutgoingDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all branch outgoing failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add new branch outgoing
     * @param Request $request
     * @return JsonResponse
     */
    public function addBranchOutgoing(Request $request) {
        try {
            $branchOutgoingDTO = $this->addBranchBranchService->addBranchOutgoing($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add new branch outgoing success',
                'data' => $branchOutgoingDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add new branch outgoing failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Edit branch outgoing
     * @param Request $request
     * @return JsonResponse
     */
    public function editBranchOutgoing(Request $request) {
        try {
            $branchOutgoingDTO = $this->editBranchOutgoingService->editBranchOutgoing($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Edit branch outgoing success',
                'data' => $branchOutgoingDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Edit branch outgoing failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Delete branch outgoing
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteBranchOutgoing(Request $request) {
        try {
            $branchOutgoing = $this->deleteBranchOutgoingService->deleteBranchOutgoing($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Delete branch outgoing success',
                'data' => $branchOutgoing
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Delete branch outgoing failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}
