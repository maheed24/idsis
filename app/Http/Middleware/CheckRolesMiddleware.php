<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRolesMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the user has either "super-admin" or "admin" role
        if (Auth::check() && (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))) {
            return $next($request);
        }

        return abort(403, 'Unauthorized');
    }
}