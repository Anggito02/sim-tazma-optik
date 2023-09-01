<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\LensCategory\GetLensCategoryService;
use App\Services\LensCategory\GetAllLensCategoryService;
use App\Services\LensCategory\AddLensCategoryService;
use App\Services\LensCategory\DeleteLensCategoryService;
use App\Services\LensCategory\EditLensCategoryService;
class LensCategoryController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetLensCategoryService $getLensCategoryService,
        private GetAllLensCategoryService $getAllLensCategoryService,
        private AddLensCategoryService $addLensCategoryService,
        private DeleteLensCategoryService $deleteLensCategoryService,
        private EditLensCategoryService $editLensCategoryService
    ) {}

    /**
     * Get lens category by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLensCategory(Request $request) {
        try {
            $resultData = $this->getLensCategoryService->getLensCategory($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Lens category retrieved successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(404);
        }
    }

    /**
     * Get all lens category
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllLensCategory(Request $request) {
        try {
            $resultData = $this->getAllLensCategoryService->getAllLensCategory($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Lens category retrieved successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(404);
        }
    }

    /**
     * Add lens category
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addLensCategory(Request $request) {
        try {
            $resultData = $this->addLensCategoryService->addLensCategory($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Lens category added successfully',
                'data' => $resultData
            ])->setStatusCode(201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(500);
        }
    }

    /**
     * Delete lens category
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteLensCategory(Request $request) {
        try {
            $resultData = $this->deleteLensCategoryService->deleteLensCategory($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Lens category deleted successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(500);
        }
    }

    /**
     * Edit lens category
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editLensCategory(Request $request) {
        try {
            $resultData = $this->editLensCategoryService->editLensCategory($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Lens category edited successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(500);
        }
    }
}
