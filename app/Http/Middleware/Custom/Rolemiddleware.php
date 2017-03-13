<?php

namespace App\Http\Middleware\Custom;

use Closure;
use Auth;

class Rolemiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::user()->role->title != $role) {
            return redirect('/'.$request->user()->role->title);
        }
        return $next($request);
    }
}
