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
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if(Auth::check()){
            $role = Auth::user()->role;
            $AccessRole = in_array($role, $roles);

            if(!$AccessRole){
                abort(403);
            }
        }
        return $next($request);
    }
}
