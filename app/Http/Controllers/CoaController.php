<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Coa\AddCoaService;
use App\Services\Coa\EditCoaService;
use App\Services\Coa\DeleteCoaService;
use App\Services\Coa\GetAllCoaService;
use App\Services\Coa\GetCoaService;

class CoaController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private AddCoaService $addCoaService,
        private EditCoaService $editCoaService,
        private DeleteCoaService $deleteCoaService,
        private GetAllCoaService $getAllCoaService,
        private GetCoaService $getCoaService
    ) {}

    /**
     * Get coa by id
     * @param Request $request
     * @return CoaDTO
     */
    public function getCoa(Request $request) {
        try {
            $coaDTO = $this->getCoaService->getCoa($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Successfully get coa',
                'data' => $coaDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all coa
     * @param Request $request
     * @return CoaDTO
     */
    public function getAllCoa(Request $request) {
        try {
            $coaDTO = $this->getAllCoaService->getAllCoa($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Successfully get all coa',
                'data' => $coaDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Add coa
     * @param Request $request
     * @return CoaDTO
     */
    public function addCoa(Request $request) {
        try {
            $coaDTO = $this->addCoaService->addCoa($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Successfully add coa',
                'data' => $coaDTO
            ], 201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Edit coa
     * @param Request $request
     * @return CoaDTO
     */
    public function editCoa(Request $request) {
        try {
            $coaDTO = $this->editCoaService->editCoa($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Successfully edit coa',
                'data' => $coaDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Delete coa
     * @param Request $request
     * @return CoaDTO
     */
    public function deleteCoa(Request $request) {
        try {
            $coaDTO = $this->deleteCoaService->deleteCoa($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Successfully delete coa',
                'data' => $coaDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ], 500);
        }
    }
}
