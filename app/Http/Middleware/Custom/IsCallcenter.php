<?php

namespace App\Http\Middleware\Custom;

use Closure;

class IsCallcenter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->role != 'op') {
            return redirect('/'.$request->user()->role);
        }
        
        return $next($request);
    }
}
