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
                'success' => true,
                'message' => 'User registered successfully',
                'data' => $resultData
            ]);
        } catch (Exception $error) {
            return response()->json([
                'success' => false,
                'message' => 'User registration failed',
                'data' => $error->getMessage()
            ]);
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
                'success' => true,
                'message' => 'User logged in successfully',
                'data' => $request->all()
            ]);
        } catch (Exception $error) {
            return response()->json([
                'success' => false,
                'message' => 'User login failed',
                'data' => $error->getMessage()
            ]);
        }
    }
}

?>
