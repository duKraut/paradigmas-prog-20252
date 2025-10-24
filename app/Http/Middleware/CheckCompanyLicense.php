<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCompanyLicense
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => 'Usuário não autenticado'], Response::HTTP_UNAUTHORIZED);
        }

        if (!$user->company) {
            return response()->json(['message' => 'Usuário não está vinculado a nenhuma empresa'], Response::HTTP_FORBIDDEN);
        }

        if (!$user->company->license_active) {
            return response()->json(['message' => 'Licença da empresa expirada ou não ativa'], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
