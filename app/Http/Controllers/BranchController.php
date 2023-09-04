<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Branch\AddBranchService;
use App\Services\Branch\EditBranchService;
use App\Services\Branch\DeleteBranchService;
use App\Services\Branch\GetAllBranchService;
use App\Services\Branch\GetBranchService;

use App\Services\Branch\GetEmployeeByBranchIdService;

class BranchController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private AddBranchService $addBranchService,
        private EditBranchService $editBranchService,
        private DeleteBranchService $deleteBranchService,
        private GetAllBranchService $getAllBranchService,
        private GetBranchService $getBranchService,


        private GetEmployeeByBranchIdService $getEmployeeByBranchIdService
    ) {}

    /**
     * Get branch by id
     * @param Request $request
     * @return BranchDTO
     */
    public function getBranch(Request $request) {
        try {
            $branchDTO = $this->getBranchService->getBranch($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get branch success',
                'data' => $branchDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get branch failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Get all branch
     * @param Request $request
     * @return BranchDTO
     */
    public function getAllBranch(Request $request) {
        try {
            $branchDTO = $this->getAllBranchService->getAllBranch($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all branch success',
                'data' => $branchDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all branch failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add branch
     * @param Request $request
     * @return BranchDTO
     */
    public function addBranch(Request $request) {
        try {
            $branchDTO = $this->addBranchService->addBranch($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add branch success',
                'data' => $branchDTO
            ], 201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add branch failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Delete branch
     * @param Request $request
     * @return BranchDTO
     */
    public function deleteBranch(Request $request) {
        try {
            $branchDTO = $this->deleteBranchService->deleteBranch($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Delete branch success',
                'data' => $branchDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Delete branch failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Edit branch
     * @param Request $request
     * @return BranchDTO
     */
    public function editBranch(Request $request) {
        try {
            $branchDTO = $this->editBranchService->editBranch($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Edit branch success',
                'data' => $branchDTO
            ], 201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Edit branch failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /* ========== */

    /**
     * Get employee by branch id
     * @param Request $request
     * @return BranchDTO
     */
    public function getEmployeeByBranchId(Request $request) {
        try {
            $branchDTO = $this->getEmployeeByBranchIdService->getEmployeeByBranchId($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get employee by branch id success',
                'data' => $branchDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get employee by branch id failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}
