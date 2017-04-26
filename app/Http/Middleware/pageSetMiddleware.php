<?php

namespace App\Http\Middleware;

use Closure;
use App\Access;
class pageSetMiddleware
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
        $settings = Access::first();
        if(isset($settings))
        {
             return $next($request);
        }
       return redirect('admin/pages/settings');
    }
}
