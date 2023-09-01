<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Index\GetIndexService;
use App\Services\Index\GetAllIndexService;
use App\Services\Index\AddIndexService;
use App\Services\Index\DeleteIndexService;
use App\Services\Index\EditIndexService;

class IndexController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetIndexService $getIndexService,
        private GetAllIndexService $getAllIndexService,
        private AddIndexService $addIndexService,
        private DeleteIndexService $deleteIndexService,
        private EditIndexService $editIndexService,
    ) {}

    /**
     * Get index by id
     * @param Request $request
     * @return IndexDTO
     */
    public function getIndex(Request $request) {
        try {
            $indexDTO = $this->getIndexService->getIndex($request);

            return response()->json([
                'status' => 'success',
                'data' => $indexDTO,
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all index
     * @param Request $request
     * @return IndexDTO
     */
    public function getAllIndex(Request $request) {
        try {
            $indexDTO = $this->getAllIndexService->getAllIndex($request);

            return response()->json([
                'status' => 'success',
                'data' => $indexDTO,
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Add index
     * @param Request $request
     * @return IndexDTO
     */
    public function addIndex(Request $request) {
        try {
            $indexDTO = $this->addIndexService->addIndex($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Index added successfully',
                'data' => $indexDTO,
            ], 201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Delete index
     * @param Request $request
     * @return IndexDTO
     */
    public function deleteIndex(Request $request) {
        try {
            $indexDTO = $this->deleteIndexService->deleteIndex($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Index deleted successfully',
                'data' => $indexDTO,
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ], 500);
        }
    }
}
