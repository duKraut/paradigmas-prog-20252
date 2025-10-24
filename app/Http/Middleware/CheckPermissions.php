<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermissions
{
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => 'Usuário não autenticado'], Response::HTTP_UNAUTHORIZED);
        }

        foreach ($permissions as $permission) {
            if (!$user->hasPermission($permission)) {
                return response()->json(['message' => 'Permissão insuficiente: ' . $permission], Response::HTTP_FORBIDDEN);
            }
        }

        return $next($request);
    }
}
