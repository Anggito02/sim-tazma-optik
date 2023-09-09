<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Employee\GetEmployeeService;
use App\Services\Employee\GetAllEmployeeService;
use App\Services\Employee\DeleteEmployeeService;
use App\Services\Employee\EditEmployeeService;

use App\Services\Employee\GetAllBranchByEmployeeIdService;

class EmployeeController extends Controller
{
    public function __construct(
        // Service Providers Contructs
        private GetEmployeeService $getEmployeeService,
        private GetAllEmployeeService $getAllEmployeeService,
        private DeleteEmployeeService $deleteEmployeeService,
        private EditEmployeeService $editEmployeeService,

        private GetAllBranchByEmployeeIdService $getAllBranchByEmployeeIdService
    ) {}

    /**
     * Get employee by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEmployee(Request $request) {
        try {
            $resultData = $this->getEmployeeService->getEmployee($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Employee retrieved successfully',
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
     * Get all employee
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllEmployees(Request $request) {
        try {
            $resultData = $this->getAllEmployeeService->getAllEmployees($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Employee retrieved successfully',
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
     * Edit employee
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editEmployee(Request $request) {
        try {
            $resultData = $this->editEmployeeService->editEmployee($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Employee edited successfully',
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
     * Delete employee
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteEmployee(Request $request) {
        try {
            $resultData = $this->deleteEmployeeService->deleteEmployee($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Employee deleted successfully',
                'data' => $resultData
            ])->setStatusCode(201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(400);
        }
    }

    /* ========== */

    /**
     * Get all branch by employee id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllBranchByEmployeeId(Request $request) {
        try {
            $resultData = $this->getAllBranchByEmployeeIdService->getAllBranchByEmployeeId($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Branch retrieved successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(404);
        }
    }
}
