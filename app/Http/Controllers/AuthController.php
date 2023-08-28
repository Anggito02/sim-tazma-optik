<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

use App\Services\Auth\RegisterServiceProvider;
use App\Services\Auth\LoginServiceProvider;

class AuthController extends Controller {
    // Service Providers Contructs
    public function __construct(
        private RegisterServiceProvider $registerServiceProvider,
        private LoginServiceProvider $loginServiceProvider
    ) {}

    /**
     * Register new user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        try {
            $resultData = $this->registerServiceProvider->register($request);

            return response()->json([
                'status' => 'success',
                'message' => 'User registered successfully',
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
     * Login user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request) {
        try {
            $resultData = $this->loginServiceProvider->login($request);

            return response()->json([
                'status' => 'success',
                'message' => 'User logged in successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    /**
     * Logout user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request) {
        try {
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'User logged out successfully',
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }
}

?>
