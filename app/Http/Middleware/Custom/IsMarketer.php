<?php

namespace App\Http\Middleware\Custom;

use Closure;

class IsMarketer
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
        if ($request->user()->role != 'mark') {
            return redirect('/'.$request->user()->role);
        }

        return $next($request);
    }
}
