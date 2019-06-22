<?php

namespace App\Http\Middleware;
use App\Http\Controllers\ConfigController;

use Closure;

class SitioMantenimientoMiddleware
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
        if (ConfigController::isActive()) {
            return $next($request);
        } else {
            return redirect('/mantenimiento');
        }
    }
}
