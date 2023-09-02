<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\FrameCategory\GetFrameCategoryService;
use App\Services\FrameCategory\GetAllFrameCategoryService;
use App\Services\FrameCategory\AddFrameCategoryService;
use App\Services\FrameCategory\DeleteFrameCategoryService;
use App\Services\FrameCategory\EditFrameCategoryService;

class FrameCategoryController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetFrameCategoryService $getFrameCategoryService,
        private GetAllFrameCategoryService $getAllFrameCategoryService,
        private AddFrameCategoryService $addFrameCategoryService,
        private DeleteFrameCategoryService $deleteFrameCategoryService,
        private EditFrameCategoryService $editFrameCategoryService,
    ) {}

    /**
     * Get frame category by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFrameCategory(Request $request) {
        try {
            $resultData = $this->getFrameCategoryService->getFrameCategory($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Frame category retrieved successfully',
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
     * Get all frame category
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllFrameCategory(Request $request) {
        try {
            $resultData = $this->getAllFrameCategoryService->getAllFrameCategory($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Frame category retrieved successfully',
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
     * Add frame category
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addFrameCategory(Request $request) {
        try {
            $resultData = $this->addFrameCategoryService->addFrameCategory($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Frame category added successfully',
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
     * Delete frame category
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteFrameCategory(Request $request) {
        try {
            $resultData = $this->deleteFrameCategoryService->deleteFrameCategory($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Frame category deleted successfully',
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
     * Edit frame category
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editFrameCategory(Request $request) {
        try {
            $resultData = $this->editFrameCategoryService->editFrameCategory($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Frame category edited successfully',
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
