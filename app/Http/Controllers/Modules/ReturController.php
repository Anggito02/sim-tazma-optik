<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\Retur\GetAllReturService;
use App\Services\Modules\Retur\GetReturService;
use App\Services\Modules\Retur\AddReturService;
use App\Services\Modules\Retur\EditReturService;
use App\Services\Modules\Retur\DeleteReturService;

class ReturController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetAllReturService $getAllReturService,
        private GetReturService $getReturService,
        private AddReturService $addReturService,
        private EditReturService $editReturService,
        private DeleteReturService $deleteReturService
    ) {}

    /**
     * Get retur
     * @param Request $request
     * @return JsonResponse
     */
    public function getRetur(Request $request) {
        try {
            $returDTO = $this->getReturService->getRetur($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get retur success',
                'data' => $returDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get retur failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Get all retur
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllRetur(Request $request) {
        try {
            $returDTO = $this->getAllReturService->getAllRetur($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all retur success',
                'data' => $returDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all retur failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add new retur
     * @param Request $request
     * @return JsonResponse
     */
    public function addRetur(Request $request) {
        try {
            $returDTO = $this->addReturService->addRetur($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add new retur success',
                'data' => $returDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add new retur failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Edit retur
     * @param Request $request
     * @return JsonResponse
     */
    public function editRetur(Request $request) {
        try {
            $returDTO = $this->editReturService->editRetur($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Edit retur success',
                'data' => $returDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Edit retur failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Delete retur
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteRetur(Request $request) {
        try {
            $retur = $this->deleteReturService->deleteRetur($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Delete retur success',
                'data' => $retur
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Delete retur failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}
