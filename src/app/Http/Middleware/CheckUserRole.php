<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = $request->user();

        if ($role === 'admin' && !$user->isAdmin()) {
            return response()->json(['message' => 'Acesso negado: apenas administradores podem realizar esta ação.'], 403);
        }

        if ($role === 'user' && !$user->isUser()) {
            return response()->json(['message' => 'Acesso negado: apenas usuários comuns podem realizar esta ação.'], 403);
        }

        return $next($request);
    }
}