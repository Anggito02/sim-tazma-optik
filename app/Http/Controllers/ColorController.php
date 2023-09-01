<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Color\GetColorService;
use App\Services\Color\GetAllColorService;
use App\Services\Color\AddColorService;
use App\Services\Color\DeleteColorService;
use App\Services\Color\EditColorService;

class ColorController extends Controller
{
    // Service Providers Contructs
    public function __construct(
        private GetColorService $getColorService,
        private GetAllColorService $getAllColorService,
        private AddColorService $addColorService,
        private DeleteColorService $deleteColorService,
        private EditColorService $editColorService
    ) {}

    /**
     * Get color by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getColor(Request $request) {
        try {
            $resultData = $this->getColorService->getColor($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Color retrieved successfully',
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
     * Get all color
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllColor(Request $request) {
        try {
            $resultData = $this->getAllColorService->getAllColor($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Color retrieved successfully',
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
     * Add color
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addColor(Request $request) {
        try {
            $resultData = $this->addColorService->addColor($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Color added successfully',
                'data' => $resultData
            ])->setStatusCode(201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(400);
        }
    }

    /**
     * Delete color
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteColor(Request $request) {
        try {
            $resultData = $this->deleteColorService->deleteColor($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Color deleted successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(400);
        }
    }

    /**
     * Edit color
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editColor(Request $request) {
        try {
            $resultData = $this->editColorService->editColor($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Color edited successfully',
                'data' => $resultData
            ])->setStatusCode(201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(400);
        }
    }
}
