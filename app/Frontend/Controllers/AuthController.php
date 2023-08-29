<?php

namespace App\Frontend\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller{
    public function login(Request $request){
        $headers = [
            'Content-Type' => 'application/json'
        ];

        $email = $request->email;
        $password = $request->password;

        $api_request = [
            'email' => $email,
            'password' => $password
        ];

        $response = Http::withHeaders($headers)->get('http://localhost:8000/api/login');
        // $response = Http::get('https://google.com');
        $data = $response->json();

        return view('dashboard', [
            'data' => $data
        ]);
    }
}
