<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyXAuthorization
{
    public function handle(Request $request, Closure $next): Response
    {
        $expectedToken = env('X_AUTHORIZATION_SECRET');
        $token = $request->header('X-Authorization');

        if (!$token || $token !== $expectedToken) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}