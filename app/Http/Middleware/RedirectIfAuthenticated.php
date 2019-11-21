<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if ($request->user()->hasRole(['ROLE_ADMIN'])) {
                return redirect('/admin');
            }
            //if logged in contributor try to access /login
            elseif ($request->user()->hasRole(['ROLE_CONTRIBUTOR'])){
                return redirect('/contributor');
            }
        }

        return $next($request);
    }
}
