<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Employee\GetEmployeeService;
use App\Services\Employee\GetAllEmployeeService;
use App\Services\Employee\AddEmployeeService;
use App\Services\Employee\DeleteEmployeeService;
use App\Services\Employee\EditEmployeeService;

class EmployeeController extends Controller
{
    // Service Providers Contructs
    public function __construct(
        private GetEmployeeService $getEmployeeService,
        private GetAllEmployeeService $getAllEmployeeService,
        private AddEmployeeService $addEmployeeService,
        private DeleteEmployeeService $deleteEmployeeService,
        private EditEmployeeService $editEmployeeService
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
     * Add employee
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addEmployee(Request $request) {
        try {
            $resultData = $this->addEmployeeService->addEmployee($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Employee added successfully',
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
}
