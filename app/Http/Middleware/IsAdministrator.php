<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->role !== 'administrator') {
            return response()->json([
                'status' => 'error',
                'message' => 'You are not authorized to access this resource'
            ])->setStatusCode(403);
        } else {
            return $next($request);
        }
    }
}
