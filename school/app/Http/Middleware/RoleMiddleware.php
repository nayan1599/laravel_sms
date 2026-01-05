<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {

        if (!Auth::check() || !in_array(Auth::user()->role, $roles)) {
            abort(403);
        }

        return $next($request);
    }
}
