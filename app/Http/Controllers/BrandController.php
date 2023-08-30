<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Brand\AddBrandService;
use App\Services\Brand\EditBrandService;
use App\Services\Brand\DeleteBrandService;
use App\Services\Brand\GetAllBrandService;
use App\Services\Brand\GetBrandService;

class BrandController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private AddBrandService $addBrandService,
        private EditBrandService $editBrandService,
        private DeleteBrandService $deleteBrandService,
        private GetAllBrandService $getAllBrandService,
        private GetBrandService $getBrandService,
    ) {}

    /**
     * Get brand by id
     * @param Request $request
     * @return BrandDTO
     */
    public function getBrand(Request $request) {
        try {
            $brandDTO = $this->getBrandService->getBrand($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Success get brand',
                'data' => $brandDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed get brand',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Get all brand
     * @param Request $request
     * @return BrandDTO
     */
    public function getAllBrand(Request $request) {
        try {
            $brandDTO = $this->getAllBrandService->getAllBrand($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Success get all brand',
                'data' => $brandDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed get all brand',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add brand
     * @param Request $request
     * @return BrandDTO
     */
    public function addBrand(Request $request) {
        try {
            $brandDTO = $this->addBrandService->addBrand($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Success add brand',
                'data' => $brandDTO
            ], 201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed add brand',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Delete brand
     * @param Request $request
     * @return BrandDTO
     */
    public function deleteBrand(Request $request) {
        try {
            $brandDTO = $this->deleteBrandService->deleteBrand($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Success delete brand',
                'data' => $brandDTO
            ], 201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed delete brand',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Edit brand
     * @param Request $request
     * @return BrandDTO
     */
    public function editBrand(Request $request) {
        try {
            $brandDTO = $this->editBrandService->editBrand($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Success edit brand',
                'data' => $brandDTO
            ], 201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed edit brand',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}
