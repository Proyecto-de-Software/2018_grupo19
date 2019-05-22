<?php

namespace App\Http\Middleware;

use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (! $request->user()) {
            return redirect('/login');
        }

        if (! $request->user()->can($permission)) {
            return redirect('/login');
        }

        return $next($request);
    }
}
