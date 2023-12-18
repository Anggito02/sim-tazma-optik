<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Category\GetCategoryService;
use App\Services\Category\GetAllCategoryService;
use App\Services\Category\AddCategoryService;
use App\Services\Category\DeleteCategoryService;
use App\Services\Category\EditCategoryService;

class CategoryController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetCategoryService $getCategoryService,
        private GetAllCategoryService $getAllCategoryService,
        private AddCategoryService $addCategoryService,
        private DeleteCategoryService $deleteCategoryService,
        private EditCategoryService $editCategoryService,
    ) {}

    /**
     * Get category by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategory(Request $request) {
        try {
            $resultData = $this->getCategoryService->getCategory($request);

            return response()->json([
                'status' => 'success',
                'message' => ' category retrieved successfully',
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
     * Get all category
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllCategory(Request $request) {
        try {
            $resultData = $this->getAllCategoryService->getAllCategory($request);

            return response()->json([
                'status' => 'success',
                'message' => ' category retrieved successfully',
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
     * Add category
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCategory(Request $request) {
        try {
            $resultData = $this->addCategoryService->addCategory($request);

            return response()->json([
                'status' => 'success',
                'message' => ' category added successfully',
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
     * Delete category
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCategory(Request $request) {
        try {
            $resultData = $this->deleteCategoryService->deleteCategory($request);

            return response()->json([
                'status' => 'success',
                'message' => ' category deleted successfully',
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
     * Edit category
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editCategory(Request $request) {
        try {
            $resultData = $this->editCategoryService->editCategory($request);

            return response()->json([
                'status' => 'success',
                'message' => ' category edited successfully',
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
