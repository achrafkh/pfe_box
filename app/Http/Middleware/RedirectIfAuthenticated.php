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
            if (Auth::user()->role->title == 'com' || Auth::user()->role->title == 'admin') {
                return redirect('/'.Auth::user()->role->title.'/appointments');
            }
            return redirect('/'.$request->user()->role->title.'/dashboard');
        }

        return $next($request);
    }
}
