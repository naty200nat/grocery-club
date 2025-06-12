<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckTipo
{
    public function handle($request, Closure $next, ...$tipos)
    {
        $user = Auth::user();

        if (!$user || !in_array($user->tipo, $tipos)) {
            abort(403, 'Acesso não autorizado');
        }

        return $next($request);
    }
}
