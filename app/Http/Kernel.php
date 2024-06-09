<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
            if ($guard == 'admin') {
                return redirect('/login'); // Redirect if the user is authenticated as admin
            }
            // Modify this line according to your user authentication redirection
            return redirect('/login'); // Redirect if the user is authenticated as regular user
        }

        return $next($request);
    }
}
