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
        $user = Auth::user()->load('role');
        if ($user->role->title != $role && $user->role->title != 'admin') {
            return redirect('/'.$request->user()->role->title.'/dashboard');
        }
        return $next($request);
    }
}
