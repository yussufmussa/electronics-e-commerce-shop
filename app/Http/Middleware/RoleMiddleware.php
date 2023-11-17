<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roleId): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
                if ($user->role_id == $roleId) {
                    // Allow access to the requested route
                    return $next($request);
                }else{
                    return abort('403', 'You are not authorized to access this page.');
    
                }
            }
    }
}
